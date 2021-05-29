<?php

namespace App\Http\Controllers;

use App\Models\Checkbox;
use App\Models\Checklist;
use App\Models\Column;
use App\Models\Comment;
use App\Models\File;
use App\Models\Link;
use App\Models\Project;
use App\Models\Related\Checklist_Checkbox;
use App\Models\Related\Column_Task;
use App\Models\Related\Comment_User;
use App\Models\Related\Project_Column;
use App\Models\Related\Project_Staff;
use App\Models\Related\Project_Task;
use App\Models\Related\Stage_Task;
use App\Models\Related\Task_Checklist;
use App\Models\Related\Task_Comment;
use App\Models\Related\Task_File;
use App\Models\Related\Task_Participant;
use App\Models\Staff;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index(){
        if (Auth::check()){
            $user = User::find(Auth::id());
            return view('page.task.index')
                ->with('user',$user);
        }
    }

    public function load_task(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $project = Project::find($request->input('id'));
            return view('page.task.kanbanBody')
                ->with('user',$user)
                ->with('project',$project);
        }
    }

    public function task_num(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $column_datas = json_encode($request->all('column_data'));
            $column_datas = json_decode($column_datas);

//            echo json_encode($column_datas);
            foreach ($column_datas as $column_data) {
                foreach ($column_data as $column_dat) {
                    if (isset($column_dat->tasks) ){
                        foreach ($column_dat->tasks as $task_data) {
                            $task = Task::find($task_data->id);
                            $task->number = $task_data->number;
                            $task->save();

                            $column_task = Column_Task::all()->where('task_id',$task_data->id)->last();
                            $column_task->column_id = $column_dat->id;
                            $column_task->save();
                        }
                    }

                }
            }
        }
    }

    public function save_elem(Request $request){
        if (Auth::check()){
            $id = $request->input('id');
            $type = $request->input('type');
            $value = $request->input('value');

            $task = Task::find($id);
            if ($type == 'name'){
                $task->name = $value;
            }elseif ($type == 'description'){
                $task->task = $value;
            }
            $task->save();
        }
    }

    public function add_task_staff_body(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $task_id = $request->input('id');
            $project_id = $request->input('project_id');
            $type = $request->input('type');
            $task = Task::find($task_id);
            $staff = $user->staff;
//            $task = $task->participants;
//
////            $staff->upsert($task);
////            $staff = $staff->concat($task->participants);
//            $staff->unique();
//            return $staff;
            if ($type == 'staff'){
                return view('components.task.addTaskStaffBody')
                    ->with('staffs',$staff)
                    ->with('project_id',$project_id)
                    ->with('task',$task);
            }elseif ($type == 'checklist'){
                return view('components.task.addTaskChecklistBody')
                    ->with('staffs',$staff)
                    ->with('project_id',$project_id)
                    ->with('task',$task);
            }

        }
    }
    public function add_task_staff(Request $request){
        if (Auth::check()){
            $id = $request->input('id');
            $task_id = $request->input('task_id');
            $project_id = $request->input('project_id');
            $staff = Staff::find($id);

            $task_participant = new Task_Participant();
            $task_participant->task_id = $task_id;
            $task_participant->staff_id = $staff->id;
            $task_participant->rate = $staff->rate;
            $task_participant->save();

            if (Project_Staff::all()->where('project_id',$project_id)->where('staff_id',$id)->count() == 0){
                $pr_st = new Project_Staff();
                $pr_st->project_id = $project_id;
                $pr_st->staff_id = $id;
                $pr_st->save();
            }
            $task = Task::find($task_id);
            return view('components.task.section.staffSection')
                ->with('task',$task);
        }
    }
    public function add_task_file(Request $request){
        if (Auth::check()){
            $id = $request->input('id');
            $file = $request->file('file');

            $serv_name = Str::random(5) . $file->getClientOriginalName();
            $file->move('files/file', $serv_name);

            $task = Task::find($id);

            $new_file = new File();
            $new_file->name = $file->getClientOriginalName();
            $new_file->serv_name = $serv_name;
            $new_file->save();
            $file_id = DB::table('files')->max('id');

            $task_file = new Task_File();
            $task_file->task_id = $id;
            $task_file->file_id = $file_id;
            $task_file->save();

            $file = File::find($file_id);

            return view('components.task.section.singleFile')
                ->with('file',$file);
        }
    }
    public function add_task_checklist(Request $request){
        if (Auth::check()){
            $id = $request->input('id');
            $name = $request->input('name');

            $checklist = new Checklist();
            $checklist->name = $name;
            $checklist->save();
            $checklist_id = DB::table('checklists')->max('id');

            $task_list = new Task_Checklist();
            $task_list->task_id = $id;
            $task_list->checklist_id = $checklist_id;
            $task_list->save();

            $checklist = Checklist::find($checklist_id);

            return view('components.task.section.singleChecklist')
                ->with('checklist',$checklist);
        }
    }
    public function add_task_checkbox(Request $request){
        if (Auth::check()){
            $id = $request->input('id');
            $name = $request->input('name');

            $checkbox = new Checkbox();
            $checkbox->name = $name;
            $checkbox->save();
            $checkbox_id = DB::table('checkboxes')->max('id');

            $list_box = new Checklist_Checkbox();
            $list_box->checklist_id = $id;
            $list_box->checkbox_id = $checkbox_id;
            $list_box->save();

            $checkbox = Checkbox::find($checkbox_id);
            $checklist = Checklist::find($id);

            return view('components.task.section.singleCheckbox')
                ->with('checklist',$checklist)
                ->with('checkbox',$checkbox);
        }
    }
//
    public function checked_task_checkbox(Request $request){
        if (Auth::check()){
            $id = $request->input('id');
            $status = $request->input('status');

            $checkbox = Checkbox::find($id);
            $checkbox->status = $status;
            $checkbox->save();
        }
    }
    public function add_task_comment(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::id());
            $id = $request->input('id');
            $text = $request->input('text');
            $type = $request->input('type');

            $comment = new Comment();
            $comment->text = $text;
            $comment->type = $type;
            $comment->save();
            $comment_id = DB::table('comments')->max('id');

            $task_comment = new Task_Comment();
            $task_comment->task_id = $id;
            $task_comment->comment_id = $comment_id;
            $task_comment->save();

            $com_us = new Comment_User();
            $com_us->comment_id = $comment_id;
            $com_us->user_id = $user->id;
            $com_us->save();

            $comment = Comment::find($comment_id);
            return view('components.task.section.singleComment')
                ->with('comment',$comment);
        }
    }

    public function get(int $id){
        $project = Project::find($id);
        $tasks = $project->tasks;
        $tasks_ar = array();
        foreach ($project->stages as $stage){
            $task_ar = array();
            $task_ar['id'] = $stage->id.'000000';
            $task_ar['name'] = $stage->name;
            array_push($tasks_ar, $task_ar);
            foreach ($stage->tasks as $task){
                $task_ar = array();
                $task_ar['id'] = $task->id;
                $task_ar['name'] = $task->name;
                $task_ar['date_start'] = $task->date_start;
                $task_ar['start_date'] = $task->start_date;
                $task_ar['date_end'] = $task->date_end;
                $task_ar['duration'] = $task->duration;
                if($task->parent == 0){
                    $task_ar['parent'] = $stage->id.'000000';
                }else{
                    $task_ar['parent'] = $task->parent;
                }
                $task_ar['progress'] = $task->progress;
                array_push($tasks_ar, $task_ar);
            }
        }
        $free_task_ar = array();
        $free_task_ar['id'] = '10000000';
        $free_task_ar['name'] = 'Свободные задачи';
        array_push($tasks_ar, $free_task_ar);
        foreach ($project->tasks->where('stage_id',null) as $task){
            $ftask_ar = array();
            $ftask_ar['id'] = $task->id;
            $ftask_ar['name'] = $task->name;
            $ftask_ar['date_start'] = $task->date_start;
            $ftask_ar['start_date'] = $task->start_date;
            $ftask_ar['date_end'] = $task->date_end;
            $ftask_ar['duration'] = $task->duration;
            if($task->parent == 0){
                $ftask_ar['parent'] = '10000000';
            }else{
                $ftask_ar['parent'] = $task->parent;
            }
            $ftask_ar['progress'] = $task->progress;
            array_push($tasks_ar, $ftask_ar);
        }

        $links = Link::all();

        return response()->json([
            "data" => $tasks_ar,
            "links" => $links
        ]);
    }
    public function store(Request $request){
        $project = Project::find($request->input('project'));
        $stage_id = $request->input('stages');

        $task = new Task();

        $task->name = $request->name;
        if ($stage_id > 0){
            $task->stage_id = $request->input('stages');
        }

//        $task->text = $request->name;
//        $task->start_date = date('Y-m-d H:i:s');
        $task->start_date = date_format(date_create($request->start_date),"Y-m-d H:i:s");
//        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;

        $task->save();

        $task_id = DB::table('tasks')->max('id');

        $project_task = new Project_Task();
        $project_task->project_id = $project->id;
        $project_task->task_id = $task_id;
        $project_task->save();

        if ($stage_id > 0) {
            $stage_task = new Stage_Task();
            $stage_task->stage_id = $request->input('stages');
            $stage_task->task_id = $task_id;
            $stage_task->save();
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

        return response()->json([
            "action"=> "inserted",
            "tid" => $task->id
        ]);
    }

    public function update($id, Request $request){
        $task = Task::find($id);

        $task->name = $request->name;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;

        $task->save();

        return response()->json([
            "action"=> "updated"
        ]);
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();

        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
