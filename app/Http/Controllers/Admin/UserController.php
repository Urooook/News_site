<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::query()->where('id','!=',Auth::id())->get();
        return view('admin.users',['users'=>$users]);
    }
    public function toggleAdmin(User $user){
        if($user->id !=Auth::id()){
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect()->route('admin.updateUser')->with('success','Права изменены'); 
        }else{
            return redirect()->route('admin.updateUser')->with('success','Нельзя снять админа с себя'); 
        }
        
    }
}
