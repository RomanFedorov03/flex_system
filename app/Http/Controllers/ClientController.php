<?php

namespace App\Http\Controllers;

use App\Models\Related\User_Client;
use App\Models\Staff;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientController extends Controller
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
            $user = User::find(Auth::id());
            return view('page.client.index')
                ->with('user',$user);
        }
    }

    public function action(){
        if (Auth::check()){
            $user = User::find(Auth::id());
            return view('page.client.create')
                ->with('user',$user);
        }
    }

    public function info(int $id){
        if (Auth::check()){
            $user = User::find(Auth::id());
            return view('page.client.single',['client' => Client::find($id)])
                ->with('user',$user);
        }
    }
    public function create(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $photo = $request->file('photo');

            $client = new Client();
            $client->name = $request->input('name');
            $client->surname = $request->input('surname');
            $client->patronymic = $request->input('patronymic');
            $client->birthdate = $request->input('birthdate');
            $client->phone = $request->input('phone');
            $client->email = $request->input('email');
            $client->country = $request->input('country');
            $client->city = $request->input('city');
            $client->address = $request->input('address');
            $client->company = $request->input('company');
            $client->contractSum = $request->input('contractSum');
            if ($photo != ''){
                $photo_name = Str::random(5).$photo->getClientOriginalName();
                $photo->move('files/image/client', $photo_name);
                $client->photo = $photo_name;
            }
            $client->save();
            $client_id = DB::table('clients')->max('id');


            $user_staff = new User_Client();
            $user_staff->user_id = $user->id;
            $user_staff->client_id = $client_id;
            $user_staff->save();

            return redirect()->route('clients.clients_info', ['id' => $client_id]);
        }
    }

    public function edit_client_content(Request $request){
        if (Auth::check()){
            $company = $this->company();
            return view('components.client.editClientContent')
                ->with('client',Client::find($request->input('id')))
                ->with('company',$company);
        }
    }
    public function edit_client_comment(Request $request){
        if (Auth::check()){
            $company = $this->company();
            return view('components.client.editClientComment')
                ->with('client',Client::find($request->input('id')))
                ->with('company',$company);
        }
    }

    public function edit_client_save(Request $request){
        if (Auth::check()){
            $client = Client::find($request->input('id'));
            $client->name = $request->input('name');
            $client->surname = $request->input('surname');
            $client->patronymic = $request->input('patronymic');
            $client->birthdate = $request->input('birthdate');
            $client->phone = $request->input('phone');
            $client->email = $request->input('email');
            $client->status = $request->input('status');
            $client->country = $request->input('country');
            $client->city = $request->input('city');
            $client->address = $request->input('address');
            $client->company = $request->input('company');
            $client->contractSum = $request->input('contractSum');
            $client->save();

            return view('components.client.singleClientContent')
                ->with('client',Client::find($request->input('id')));
        }
    }
    public function save_client_comment(Request $request){
        if (Auth::check()){
            $client = Client::find($request->input('id'));
            $client->comment = $request->input('comment');
            $client->save();

            return view('components.client.singleClientComment')
                ->with('client',Client::find($request->input('id')));
        }
    }
}
