<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
            return view('page.profile.index')
                ->with('user',$user)
                ->with('company',$company);
        }
    }
}
