<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Related\Staff_Profession;
use App\Models\Related\User_Staff;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    private function company(){
        $user = User::find(Auth::id());
        if ($user->type == 'staff'){
            $user = Staff::find(Auth::id())->admin->first();
        }
        return $user;
    }

    public function index(){
        if (Auth::check()){
            $company = $this->company();
            $user = User::find(Auth::id());
            $staff = $user->staff;
            return view('page.staff.index')
                ->with('user',$user)
                ->with('company',$company)
                ;
        }
    }
    public function action(){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $company = $this->company();
            return view('page.staff.create')
                ->with('user',$user)
                ->with('company',$company);
        }
    }
    public function info(int $id){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $company = $this->company();
            return view('page.staff.single',['staff' => Staff::find($id)])
                ->with('user',$user)
                ->with('company',$company);
        }
    }
    public function create(Request $request){
        if (Auth::check()){
            if (Staff::all()->where('email',$request->input('email'))->count() > 0){
                $user = User::find(Auth::id());
                $staff = '';
                $staffs = Staff::all()->where('email',$request->input('email'));
                foreach ($staffs as $staf){
                    $staff = $staf;
                }
                $error = 'Пользователь с таким Email уже зарегистрирован.';
                return back()->withInput([
                    'error' => $error,
                    'name' => $request->input('name'),
                    'surname' => $request->input('surname'),
                    'patronymic' => $request->input('patronymic'),
                    'birthdate' => $request->input('birthdate'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'rate' => $request->input('rate'),
                ]);
            }else{
                $company = $this->company();
                $user = User::find(Auth::id());
                $password = Str::random(8);
                $staff = new Staff();
                $staff->name = $request->input('name');
                $staff->surname = $request->input('surname');
                $staff->patronymic = $request->input('patronymic');
                $staff->birth_date = $request->input('birthdate');
                $staff->type = 'staff';
                $staff->phone = $request->input('phone');
                $staff->email = $request->input('email');
                $staff->rate = $request->input('rate');
                $staff->contract = $request->input('contract');
                $staff->password = Hash::make($password);
//                Доступы
                $staff->access_dashboard = $request->input('access_dashboard');
                $staff->access_project = $request->input('access_project');
                $staff->access_task = $request->input('access_task');
                $staff->access_template = $request->input('access_template');
                $staff->access_staff = $request->input('access_staff');
                $staff->access_client = $request->input('access_client');
                $staff->access_report = $request->input('access_report');
                $staff->access_finance = $request->input('access_finance');

//                Фото профиля, документ, паспорт.
                $photo = $request->file('photo');
                if ($photo != ''){
                    $photo_name = Str::random(5).$photo->getClientOriginalName();
                    $photo->move('files/image/staff', $photo_name);
                    $staff->photo = $photo_name;
                }
                $passport = $request->file('passport');
                if ($passport != ''){
                    $passport_name = Str::random(5).$passport->getClientOriginalName();
                    $passport->move('files/image/staff/passport', $passport_name);
                    $staff->passport = $passport_name;
                }
                $contract_file = $request->file('contract_file');
                if ($contract_file != ''){
                    $contract_file_name = Str::random(5).$contract_file->getClientOriginalName();
                    $contract_file->move('files/image/staff/contract', $contract_file_name);
                    $staff->contract_file = $contract_file_name;
                }
                $staff->save();
                $staff_id = DB::table('users')->max('id');

                $user_staff = new User_Staff();
                $user_staff->user_id = $company->id;
                $user_staff->staff_id = $staff_id;
                $user_staff->save();

                $staff = Staff::find($staff_id);

//          Оповещение сотрудника о добавлении в систему
                $to_name = $staff->surname.' '.$staff->name.' '.$staff->patronymic;
                $to_email = $staff->email;
                $data = array('password' => $password, 'staff' => $staff);
                Mail::send('components.email.staff_password',$data, function ($message) use ($to_name, $to_email){
                    $message->to($to_email,$to_name)->subject('Добро пожаловать в Flex Reality System!');
                    $message->from('test-pesonal@houseremake.com.ua','Flex Reality System');
                });

//          Получение id сотрудника с Web Work Tracker
                $login = 'o1@flexreality.pro';
                $password = 'Z123123qweqwe';
                $base64 = base64_encode($login.':'.$password);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://www.webwork-tracker.com/rest-api/users?email='.$staff->email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_POSTFIELDS => array('email' => $staff->email),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic '.$base64,
                        'Cookie: XSRF-TOKEN=eyJpdiI6Ilc2MnJ1ckVDMnVhelBjTGJCMVFlbEE9PSIsInZhbHVlIjoiUEVtUW9yYkZsSkNRWGxFMFV2Wk1ZZkpxQ015aDc5dHNXbXU2R1ZqZnNjN0lLdVF3VmJRa0dDcWZBTEJhMWFuQkY5OWcwWU9EcGJJbTI1eWEyWmxkOGFFNXVKRjRzRFBBRkJGcGxuZDJGSU9RQkFsSExnSEVWa1lmdHNNOHJSaVUiLCJtYWMiOiI5Njk1YmJmODczMmM4YzI0NTQxOTFkNjExMTkzYmMyZTdjMTM2YjIzYWZmYTE1YzMzMjE1NjFmNmVlMzUxNWMwIn0%3D; oGUoasNLDEplYuLgwOffsugDFxgXM7xRgUD6ZYKB=eyJpdiI6IlFocVUwMXErekprcE85K3kvZTdwL2c9PSIsInZhbHVlIjoiSHRPdjBQdU5SdlErQnFIdHliT2VCWk5ydmpLWVZTUEExY21EK3JGTHlHRmM1ZThkT1VQaVl1ZU54ZnhtNm1mMkJsMTZGVitBRGV3Uk4rM3k3dGU4ZFJQOThSVUFjNzJqcWx5bllRUkczSXd6ZExmcURxUE5ZMzBTWG9MMW90aUhYWG1nNWRYVlRUWWxsKy9ncE5HV2s1U09mOUlqNDAyN050L0tJRTdOS0ltclhOWWVQRnNaN096bEw1b1BOTzM1SjZpdEtLL1orSzVzcndJdUF6YVRwU1Q0WUowWjJTWnl5STVCTnNxVy9GdCtmbnRLK0F4OC9URUZ3UHZ5NkhiZG1NdjdORGZIOXpBZmZZZFBNY0FuZkt2UXdyWnp5bWNXUVI4SVNrMzlhQ3RxOXhoNmRERG1YKzVNR2QyYWJZY0htRHZPcTJsSFMyY3ZIZEVseVk1UE5CS0NxNXdGOUQwcGhsYkRmYWRlMzJnNStOZk8wcGZ4ZDZLTHZpR1BITktlV2t0Z3E4c0dWbkloY1JQWUxLcHJYQT09IiwibWFjIjoiZDlkMDI0MDgxMmYwMmNiYTA0NTE2ZDBhYWU5NTYzMzBiN2U4MjAwOTc1NjAxMmQxZTgyM2U5YWNiNWMwMjBmYiJ9; webwork_session=eyJpdiI6IllHVlAwaGxGZ1VOSEwvUE52QW9sVkE9PSIsInZhbHVlIjoidjRKdGI4T2cwWWVieUpZZEdHSW9QUVlqVTNOdkpRWHE2L2tpSU95dHNjcVlSS0U1a0JKWGdJYit0UW55OFczUVVMSDZhWkMxMm16emI5eTBQYmZFdm9OaXRoNk9IdkorNGtMWmVFYTc3MTRTTjFNRm11dEFzWUlxMFlwbDY3ZHUiLCJtYWMiOiJlMzM1NDJiNDNhNGJlZTk5NzI5M2VlMWUyZTYxMGU3N2UzODBiY2MwOGYyOGI5MTRhNDIxZWRiNmEzZGY3MjM0In0%3D'
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                if (json_decode(json_decode(json_encode($response))) != []){
                    $staff_webwork = json_decode(json_decode(json_encode($response)))->id;
                    $staff->webwork_id = $staff_webwork;
                    $staff->save();
                }

                return redirect()->route('staff.staff_info', ['id' => $staff_id]);
            }
        }
    }

    public function edit_staff_content(Request $request){
        if (Auth::check()){
            $company = $this->company();
            return view('components.staff.editStaffContent')
                ->with('staff',Staff::find($request->input('id')))
                ->with('company',$company);
        }
    }
    public function edit_staff_save(Request $request){
        if (Auth::check()){
            $company = $this->company();
            $staff = Staff::find($request->input('id'));
            $staff->name = $request->input('name');
            $staff->surname = $request->input('surname');
            $staff->patronymic = $request->input('patronymic');
            $staff->birth_date = $request->input('birth_date');
            $staff->phone = $request->input('phone');
            $staff->email = $request->input('email');
            $staff->status = $request->input('status');
            $staff->rate = $request->input('rate');
            $staff->save();

            $profession_id = $request->input('profession');
            if ($profession_id > 0){
                Staff_Profession::query()->where('staff_id',$staff->id)->delete();
                $st_pr = new Staff_Profession();
                $st_pr->staff_id = $staff->id;
                $st_pr->profession_id = $profession_id;
                $st_pr->save();
            }

            return view('components.staff.singleStaffContent')
                ->with('staff',Staff::find($request->input('id')))
                ->with('company',$company);
        }
    }



    public function create_profession(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $company = $this->company();

            $name = $request->input('name');
            $photo = $request->file('photo');

            $profession = new Profession();
            $profession->name = $name;
            if ($photo != ''){
                $photo_name = Str::random(5).$photo->getClientOriginalName();
                $photo->move('files/image/professions', $photo_name);
                $profession->photo = $photo_name;
            }
            $profession->user_id = $company->id;
            $profession->save();
            $profession_id = DB::table('professions')->max('id');
            $profession = Profession::find($profession_id);
            return view('components.staff.singleProfession')
                ->with('profession',$profession);
        }
    }

    public function profession_info(Request $request){
        if (Auth::check()){
            $profession = Profession::find($request->input('id'));
            $company = $this->company();
            return view('components.staff.ProfessionModalContent')
                ->with('profession',$profession)
                ->with('company',$company)
                ;
        }
    }


}
