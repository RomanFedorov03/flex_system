<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
            $company = $this->company();
            return view('page.report.index')
                ->with('user',$user)
                ->with('company',$company);
        }
    }

    public function report_costsStages(Request $request){
        if (Auth::check()){
            $project = Project::find($request->input('id'));
            return view('components.report.tables/costs_stages')
                ->with('project',$project);
        }
    }
}
