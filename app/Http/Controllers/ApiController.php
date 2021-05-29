<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function projects(Request $request){
        $key = $request->input('key');
        if (User::all()->where('api_key',$key)->count() > 0){
            $user = User::all()->where('api_key',$key)->first();
            $projects = array();
            foreach ($user->projects as $project) {
                $project_arr = array();
                $project_arr['id'] = $project->id;
                $project_arr['name'] = $project->name;
                $project_arr['client'] = array();
                foreach ($project->clients as $client) {
                    $client_ar = array();
                    $client_ar['id'] = $client->id;
                    $client_ar['name'] = $client->surname.' '.$client->name.' '.$client->patronymic;
                    array_push($project_arr['client'],$client_ar);
                }
                $project_arr['responsible'] = array();
                foreach ($project->responsibless as $responsible) {
                    $responsible_ar = array();
                    $responsible_ar['id'] = $responsible->id;
                    $responsible_ar['name'] = $responsible->surname.' '.$responsible->name.' '.$responsible->patronymic;
                    array_push($project_arr['responsible'],$responsible_ar);
                }
                $project_arr['startDate'] = $project->startDate;
                $project_arr['endDate'] = $project->endDate;
                $project_arr['address'] = $project->address;
                $project_arr['figma'] = $project->figma;
                $project_arr['projectUrl'] = $project->projectUrl;
                $project_arr['contact'] = $project->contact;
                $project_arr['comment'] = $project->comment;
                $project_arr['status'] = $project->status;
                $project_arr['photo'] = $project->photo;
                $project_arr['created_at'] = $project->created_at;
                $project_arr['updated_at'] = $project->updated_at;
                array_push($projects,$project_arr);
            }
            return response()->json([
                "status" => true,
                "projects" => $projects
            ]);
        }
    }
    public function stages(Request $request){
        $key = $request->input('key');
        if (User::all()->where('api_key',$key)->count() > 0){
            $user = User::all()->where('api_key',$key)->first();
            $project_id = $request->input('project');
            if ($user->projects->where('id',$project_id)->count() > 0){
                return response()->json([
                    "status" => true,
                    "stages" => $user->projects->where('id',$project_id)->first()->stages->makeHidden(['pivot'])
                ]);
            }
        }
    }
    public function tasks(Request $request){
        $key = $request->input('key');
        if (User::all()->where('api_key',$key)->count() > 0){
            $user = User::all()->where('api_key',$key)->first();
            $project_id = $request->input('project');
            $tasks = array();
            if ($user->projects->where('id',$project_id)->count() > 0){
                $project = $user->projects->where('id',$project_id)->first();
                foreach ($project->tasks as $task) {
                    $task_arr = array();
                    $task_arr['id'] = $task->id;
                    $task_arr['project_id'] = $project->id;
                    $task_arr['stage_id'] = $task->stage_id;
                    $task_arr['name'] = $task->name;
                    $task_arr['date_start'] = $task->date_start;
                    $task_arr['date_end'] = $task->date_end;
                    $task_arr['status'] = $task->status;
                    $task_arr['time'] = $task->time;
                    $task_arr['task'] = $task->task;
                    $task_arr['duration'] = $task->duration;
                    $task_arr['progress'] = $task->progress;
                    $task_arr['created_at'] = $task->created_at;
                    $task_arr['updated_at'] = $task->updated_at;
                    array_push($tasks, $task_arr);
                }
                return response()->json([
                    "status" => true,
                    "tasks" => $tasks
                ]);

            }
        }
    }
    public function tasks_all(Request $request){
        $key = $request->input('key');
        if (User::all()->where('api_key',$key)->count() > 0){
            $user = User::all()->where('api_key',$key)->first();
            $tasks = array();
            foreach ($user->projects as $project) {
                foreach ($project->tasks as $task) {
                    $task_arr = array();
                    $task_arr['id'] = $task->id;
                    $task_arr['project_id'] = $project->id;
                    $task_arr['stage_id'] = $task->stage_id;
                    $task_arr['name'] = $task->name;
                    $task_arr['date_start'] = $task->date_start;
                    $task_arr['date_end'] = $task->date_end;
                    $task_arr['status'] = $task->status;
                    $task_arr['time'] = $task->time;
                    $task_arr['task'] = $task->task;
                    $task_arr['duration'] = $task->duration;
                    $task_arr['progress'] = $task->progress;
                    $task_arr['created_at'] = $task->created_at;
                    $task_arr['updated_at'] = $task->updated_at;
                    array_push($tasks, $task_arr);
                }
            }
            return response()->json([
                "status" => true,
                "tasks" => $tasks
            ]);
        }
    }
    public function stage_tasks(Request $request){
        $key = $request->input('key');
        if (User::all()->where('api_key',$key)->count() > 0){
            $user = User::all()->where('api_key',$key)->first();
            $project_id = $request->input('project');
            if ($user->projects->where('id',$project_id)->count() > 0){
                $stage_id = $request->input('stage');
                if ($user->projects->where('id',$project_id)->first()->stages->where('id',$stage_id)->count() > 0){
                    return response()->json([
                        "status" => true,
                        "tasks" => $user->projects->where('id',$project_id)->first()->stages->where('id',$stage_id)->first()->tasks->makeHidden(['pivot','parent','start_date','stage_id','number'])
                    ]);
                }
            }
        }
    }

    public function staff(Request $request){
        $key = $request->input('key');
        if (User::all()->where('api_key',$key)->count() > 0) {
            $user = User::all()->where('api_key', $key)->first();
            return response()->json([
                "status" => true,
                "staff" => $user->staff->makeHidden(['email_verified_at','type','password','profession','remember_token','webwork_id','access_dashboard','access_project','access_task','access_template','access_staff','access_client','access_report','access_finance','api_key','pivot','photo'])
            ]);
        }
    }
}
