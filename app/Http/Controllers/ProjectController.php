<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Column;
use App\Models\Project;
use App\Models\Related\Client_Project;
use App\Models\Related\Column_Task;
use App\Models\Related\Project_Column;
use App\Models\Related\Project_Staff;
use App\Models\Related\Project_Stage;
use App\Models\Related\Project_Step;
use App\Models\Related\Project_Task;
use App\Models\Related\Responsible_Project;
use App\Models\Related\Stage_Step;
use App\Models\Related\Stage_Task;
use App\Models\Related\Step_Task;
use App\Models\Related\Task_Participant;
use App\Models\Related\User_Project;
use App\Models\Staff;
use App\Models\Stage;
use App\Models\Step;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
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
            return view('page.project.index')
                ->with('user',$user);
        }
    }

    public function action(){
        if (Auth::check()){
            $user = User::find(Auth::id());
            return view('page.project.create')
                ->with('user',$user);
        }
    }

    public function view(int $id){
        if (Auth::check()){
            $user = User::find(Auth::id());
            return view('page.project.view',['project' => Project::find($id)])
                ->with('user',$user);
        }
    }

    public function create(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $client = Client::find($request->input('client'));
            $responsible = Staff::find($request->input('responsible'));

            $project = new Project();
            $project->name = $request->input('name');
            $project->client = $client->surname.' '.$client->name.' '.$client->patronymic;
            $project->responsible = $responsible->surname.' '.$responsible->name.' '.$responsible->patronymic;
            $project->startDate = $request->input('startDate');
            $project->endDate = $request->input('endDate');
            $project->address = $request->input('address');
            $project->figma = $request->input('figma');
            $project->projectUrl = $request->input('projectUrl');
            $project->contact = $request->input('contact');
            $project->comment = $request->input('comment');
            $project->save();

            $project_id = DB::table('projects')->max('id');

            $project = Project::find($project_id);


            $column = new Column();
            $column->name = 'Новые';
            $column->number = $project->columns->max('number');
            $column->save();

            $column_id = DB::table('columns')->max('id');

            $pr_column = new Project_Column();
            $pr_column->project_id = $project_id;
            $pr_column->column_id = $column_id;
            $pr_column->save();
            $pr_user = new User_Project();
            $pr_user->user_id = $user->id;
            $pr_user->project_id = $project_id;
            $pr_user->save();
            $pr_client = new Client_Project();
            $pr_client->client_id = $client->id;
            $pr_client->project_id = $project_id;
            $pr_client->save();
            $pr_staff = new Responsible_Project();
            $pr_staff->staff_id = $responsible->id;
            $pr_staff->project_id = $project_id;
            $pr_staff->save();

            return redirect()->route('projects.projects_view', ['id' => $project_id]);
        }
    }

    public function add_staff(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $staff = Staff::find($request->input('id'));
            $project = Project::find($request->input('project_id'));
            if ($project->staff->where('id','add_staff')->count() === 0){
                $project_staff = new Project_Staff();
                $project_staff->project_id = $project->id;
                $project_staff->staff_id = $staff->id;
                $project_staff->save();
                return '<tr class="cursor-pointer" onclick="window.location.href=\'/staff/info/'.$staff->id.'\'; return false">
                            <td class="py-3" width="30"><img src="" width="25" alt=""></td>
                            <td class="py-3">'.$staff->surname.'</td>
                            <td class="py-3">'.$staff->name.'</td>
                            <td class="py-3">'.$staff->patronymic.'</td>
                            <td class="py-3">'.$staff->profession.'</td>
                            <td class="py-3">Онлайн</td>
                            <td class="py-3">Задача 2</td>
                        </tr>';
            }
        }
    }


    public function add_stage(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $name = $request->input('name');
            $project = Project::find($request->input('project_id'));

            $stage = new Stage();
            $stage->name = $name;
            $stage->save();
            $stage_id = DB::table('stages')->max('id');

            $project_stage = new Project_Stage();
            $project_stage->project_id = $project->id;
            $project_stage->stage_id = $stage_id;
            $project_stage->save();

            return '<input type="radio" class="btn-check" name="stage" id="stage'.$stage_id.'"  data-value="'.$stage_id.'" data-id="'.$project->id.'" onclick="prStepFilter(this)"  autocomplete="off">
                    <label class="btn btn-outline-dark" for="stage'.$stage_id.'">'.$name.'</label>';
        }
    }

    public function add_stage_csv(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $file = $request->file('file');
            $project = Project::find($request->input('project_id'));
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    for ($c=0; $c < $num; $c++) {
                        $stage = new Stage();
                        $stage->name = $data[$c];
                        $stage->save();
                        $stage_id = DB::table('stages')->max('id');

                        $project_stage = new Project_Stage();
                        $project_stage->project_id = $project->id;
                        $project_stage->stage_id = $stage_id;
                        $project_stage->save();
                    }
                }
                fclose($handle);
            }
        }
    }

    public function add_task_csv(Request $request, $file_encodings = ['cp1251','UTF-8'], $col_delimiter = '', $row_delimiter = ""){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $file = $request->file('file');
            $project = Project::find($request->input('project_id'));
            $stage_id = $request->input('stage_id');
            if( ! file_exists($file) )
                return false;

            $cont = trim( file_get_contents( $file ) );

            $encoded_cont = mb_convert_encoding( $cont, 'UTF-8', mb_detect_encoding($cont, $file_encodings) );

            unset( $cont );

            // определим разделитель
            if( ! $row_delimiter ){
                $row_delimiter = "\r\n";
                if( false === strpos($encoded_cont, "\r\n") )
                    $row_delimiter = "\n";
            }

            $lines = explode( $row_delimiter, trim($encoded_cont) );
            $lines = array_filter( $lines );
            $lines = array_map( 'trim', $lines );

            // авто-определим разделитель из двух возможных: ';' или ','.
            // для расчета берем не больше 30 строк
            if( ! $col_delimiter ){
                $lines10 = array_slice( $lines, 0, 30 );

                // если в строке нет одного из разделителей, то значит другой точно он...
                foreach( $lines10 as $line ){
                    if( ! strpos( $line, ',') ) $col_delimiter = ';';
                    if( ! strpos( $line, ';') ) $col_delimiter = ',';

                    if( $col_delimiter ) break;
                }

                // если первый способ не дал результатов, то погружаемся в задачу и считаем кол разделителей в каждой строке.
                // где больше одинаковых количеств найденного разделителя, тот и разделитель...
                if( ! $col_delimiter ){
                    $delim_counts = array( ';'=>array(), ','=>array() );
                    foreach( $lines10 as $line ){
                        $delim_counts[','][] = substr_count( $line, ',' );
                        $delim_counts[';'][] = substr_count( $line, ';' );
                    }

                    $delim_counts = array_map( 'array_filter', $delim_counts ); // уберем нули

                    // кол-во одинаковых значений массива - это потенциальный разделитель
                    $delim_counts = array_map( 'array_count_values', $delim_counts );

                    $delim_counts = array_map( 'max', $delim_counts ); // берем только макс. значения вхождений

                    if( $delim_counts[';'] === $delim_counts[','] )
                        return array('Не удалось определить разделитель колонок.');

                    $col_delimiter = array_search( max($delim_counts), $delim_counts );
                }

            }

            $data = [];
            foreach( $lines as $key => $line ){
                $data[] = str_getcsv( $line, $col_delimiter ); // linedata
                unset( $lines[$key] );
            }

            foreach ($data as $item) {
//                foreach ($datum as $item) {
                    echo $item[3].'<br>';
                    $progress = 0;
                    if ($item[0] == 'true'){$progress = 1;}
                    $task = new Task();

                    $task->name = $item[1];
                    if ($stage_id != 0){
                        $task->stage_id = $stage_id;
                    }
                    $task->date_start = date_format(date_create($item[2]),"Y-m-d");
                    $task->start_date = date_format(date_create($item[2]),"Y-m-d H:i:s");
                    $task->date_end = date_format(date_create($item[5]),"Y-m-d");
                    $task->priority = $request->input('priority');
                    $task->status = 'Новая';
                    $task->time = str_replace(',','.',$item[4]);
                    $task->duration = str_replace(',','.',$item[3]);
                    $task->progress = $progress;
                    $task->parent = 0;
                    $task->save();
                    $task_id = DB::table('tasks')->max('id');

                    $project_task = new Project_Task();
                    $project_task->project_id = $project->id;
                    $project_task->task_id = $task_id;
                    $project_task->save();

                    if ($stage_id != 0){
                        $st_tsk = new Stage_Task();
                        $st_tsk->stage_id = $stage_id;
                        $st_tsk->task_id = $task_id;
                        $st_tsk->save();
                    }
                    if($project->columns->where('name', 'Новые')->count() > 0){
                        $column = $project->columns->where('name', 'Новые')->last();
                        $column_task = new Column_Task();
                        $column_task->column_id = $column->id;
                        $column_task->task_id = $task_id;
                        $column_task->save();
                    }else{
                        $column = new Column();
                        $column->name = 'Новые';
                        $column->number = $project->columns->max('number');
                        $column->save();

                        $column_id = DB::table('columns')->max('id');

                        $pr_column = new Project_Column();
                        $pr_column->project_id = $project->id;
                        $pr_column->column_id = $column_id;
                        $pr_column->save();

                        $column_task = new Column_Task();
                        $column_task->column_id = $column_id;
                        $column_task->task_id = $task_id;
                        $column_task->save();
                    }
//                }
            }

            return $data;
        }
    }
    public function add_step(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $name = $request->input('name');
            $stage_id = $request->input('stage_id');
            $project = Project::find($request->input('project_id'));

            $step = new Step();
            $step->name = $name;
            $step->save();
            $step_id = DB::table('steps')->max('id');

            $stage_step =new Stage_Step();
            $stage_step->stage_id = $stage_id;
            $stage_step->step_id = $step_id;
            $stage_step->save();

            $project_step = new Project_Step();
            $project_step->project_id = $project->id;
            $project_step->step_id = $step_id;
            $project_step->save();


            return view('components.project.stepTable')
                ->with('user',$user)
                ->with('project',$project);
        }
    }

    public function load_stage_left_bar(Request $request){
        $project = Project::find($request->input('id'));
        return view('components.project.load_stage_left_bar')
            ->with('project',$project);
    }

    public function step_table_content(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
//            $type = $request->input('type');
            $stage_id = $request->input('stage_id');
            $project = Project::find($request->input('project_id'));

//            if ($type == '#addStep'){
//                if ($stage_id > 0){
//                    return view('components.project.stepTable')
//                        ->with('user',$user)
//                        ->with('stage_id',$stage_id)
//                        ->with('project',$project);
//                }else{
//                    return view('components.project.stepTable')
//                        ->with('user',$user)
//                        ->with('project',$project);
//                }
//
//            }
//            elseif ($type == '#addTask'){
                return view('components.project.taskTable')
                    ->with('user',$user)
                    ->with('stage_id',$stage_id)
                    ->with('project',$project);
//            }

        }
    }

    public function step_filter(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $stage_id = $request->input('stage_id');
            $project = Project::find($request->input('project_id'));
            return view('components.project.stepTable')
                ->with('user',$user)
                ->with('stage_id',$stage_id)
                ->with('project',$project);
        }
    }

    public function load_task_step(Request $request){
        if (Auth::check()){
            $stage = Stage::find($request->input('id'));
            return view('components.project.loadTaskStep')
                ->with('stage',$stage);
        }
    }

    public function create_element(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $project = Project::find($request->input('project_id'));
            $type = $request->input('type');
            if ($type === 'column'){
                $column = new Column();
                $column->name = $request->input('name');
                $column->number = $project->columns->max('number');
                $column->save();

                $column_id = DB::table('columns')->max('id');

                $pr_column = new Project_Column();
                $pr_column->project_id = $project->id;
                $pr_column->column_id = $column_id;
                $pr_column->save();

                $column = Column::find($column_id);
                return view('components.task.singleColumn')
                    ->with('user',$user)
                    ->with('column',$column)
                    ->with('project',$project);

            }elseif($type === 'task'){
                $stageId = $request->input('stageId');
                $return = $request->input('return');
                $participants = explode(',',$request->input('participants'));

                $task = new Task();
                if ($stageId > 0) {
                    $task->stage_id = $stageId;
                }
                $task->name = $request->input('name');
                $task->date_start = $request->input('dateStart');
                $task->date_end = $request->input('dateEnd');
                $task->priority = $request->input('priority');
                $task->status = 'Новая';
                $task->time = $request->input('time');
                $task->task = $request->input('text');
                $task->save();
                $task_id = DB::table('tasks')->max('id');

                $project_task = new Project_Task();
                $project_task->project_id = $project->id;
                $project_task->task_id = $task_id;
                $project_task->save();

                if ($return === 'project'){
                    if($project->columns->where('name', 'Новые')->count() > 0){
                        $column = $project->columns->where('name', 'Новые')->last();
                        $column_task = new Column_Task();
                        $column_task->column_id = $column->id;
                        $column_task->task_id = $task_id;
                        $column_task->save();
                    }else{
                        $column = new Column();
                        $column->name = 'Новые';
                        $column->number = $project->columns->max('number');
                        $column->save();

                        $column_id = DB::table('columns')->max('id');

                        $pr_column = new Project_Column();
                        $pr_column->project_id = $project->id;
                        $pr_column->column_id = $column_id;
                        $pr_column->save();

                        $column_task = new Column_Task();
                        $column_task->column_id = $column_id;
                        $column_task->task_id = $task_id;
                        $column_task->save();
                    }

                }elseif ($return === 'task'){
                    $column_task = new Column_Task();
                    $column_task->column_id = $request->input('column');
                    $column_task->task_id = $task_id;
                    $column_task->save();
                }

                if ($stageId > 0){
                    $stage_task = new Stage_Task();
                    $stage_task->step_id = $stageId;
                    $stage_task->task_id = $task_id;
                    $stage_task->save();
                }
                if (count($participants) > 1){
                    foreach ($participants as $participant){
                        $task_participant = new Task_Participant();
                        $task_participant->task_id = $task_id;
                        $task_participant->staff_id = $participant;
                        $task_participant->save();
                    }
                }

                if ($return === 'project'){
                    return view('components.project.taskTable')
                        ->with('user',$user)
                        ->with('stage_id',$stageId)
                        ->with('project',$project);
                }elseif ($return === 'task'){
                    $task = Task::find($task_id);
                    return view('components.task.singleColumnTask')
                        ->with('user',$user)
                        ->with('task',$task)
                        ->with('project',$project);
                }
            }

        }
    }

    public function task_view(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            return view('components.project.taskView')
                ->with('user',$user)
                ->with('project',Project::find($request->input('project_id')))
                ->with('task',Task::find($request->input('id')));
        }
    }

    public function delete_pr_element(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $type = $request->input('type');
            $elemId = $request->input('elemid');
//            $project = Project::find($request->input('project_id'));

//            УДАЛЕНИЕ ЭТАПА
            if ($type == 'stage'){
                $stage = Stage::find($elemId);
                    foreach ($stage->tasks as $task) {
                        Task_Participant::query()->where('task_id',$task->id)->delete();
                        Step_Task::query()->where('task_id',$task->id)->delete();
                        Task::query()->where('id',$task->id)->delete();
                    }
                Project_Stage::query()->where('stage_id',$stage->id)->delete();
                Stage::query()->where('id',$stage->id)->delete();
            }elseif ($type == 'task'){
                Task_Participant::query()->where('task_id',$elemId)->delete();
                Stage_Task::query()->where('task_id',$elemId)->delete();
                Task::query()->where('id',$elemId)->delete();
            }elseif ($type == 'staff'){
                Project_Staff::query()->where('staff_id',$elemId)->delete();
            }elseif ($type == 'column'){
                Project_Staff::query()->where('staff_id',$elemId)->delete();
            }
        }
    }

    public function edit_project_content(Request $request){
        if (Auth::check()){
            $company = $this->company();
            return view('components.project.editProjectContent')
                ->with('project',Project::find($request->input('id')))
                ->with('company',$company);
        }
    }
    public function save_project_content(Request $request){
        if (Auth::check()){
            $company = $this->company();
            $project = Project::find($request->input('id'));
            $project->name = $request->input('name');
            $project->status = $request->input('status');
            $project->startDate = $request->input('startDate');
            $project->endDate = $request->input('endDate');
            $project->address = $request->input('address');
            $project->contact = $request->input('contact');
            $project->save();

            Responsible_Project::query()->where('project_id',$project->id)->delete();
            $resp_project = new Responsible_Project();
            $resp_project->project_id = $project->id;
            $resp_project->staff_id = $request->input('responsible');
            $resp_project->save();

            Client_Project::query()->where('project_id',$project->id)->delete();
            $client_project = new Client_Project();
            $client_project->project_id = $project->id;
            $client_project->client_id = $request->input('client');
            $client_project->save();

            return view('components.project.singleProjectContent')
                ->with('project',Project::find($request->input('id')))
                ->with('company',$company);
        }
    }

    public function edit_project_comment(Request $request){
        if (Auth::check()){
            $company = $this->company();
            return view('components.project.editProjectComment')
                ->with('project',Project::find($request->input('id')))
                ->with('company',$company);
        }
    }
    public function edit_project_link(Request $request){
        if (Auth::check()){
            $company = $this->company();
            return view('components.project.editProjectLink')
                ->with('project',Project::find($request->input('id')))
                ->with('company',$company);
        }
    }

    public function save_project_comment(Request $request){
        if (Auth::check()){
            $project = Project::find($request->input('id'));
            $project->comment = $request->input('comment');
            $project->save();

            return view('components.project.singleProjectComment')
                ->with('project',Project::find($request->input('id')));
        }
    }
    public function save_project_link(Request $request){
        if (Auth::check()){
            $project = Project::find($request->input('id'));
            $project->figma = $request->input('figma');
            $project->projectUrl = $request->input('projectUrl');
            $project->save();

            return view('components.project.singleProjectLink')
                ->with('project',Project::find($request->input('id')));
        }
    }
}
