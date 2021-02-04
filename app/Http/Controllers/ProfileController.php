<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;
class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $errors= [];
        if($request->isMethod('post')){
            $this->validate($request,$this->validateRules(),[],$this->attrNames());
       
            if(Hash::check($request->post('password'), $user->password)){
                $user->fill([
                    'name'=>$request->post('name'),
                    'password'=>Hash::make($request->post('newPassword')),
                    'email'=>$request->post('email')
                ]);
                $user->save();
                return redirect()->route('updateProfile')->with('success','Данные изменены!');
            }else{
                $errors['password'][]='Неверно введен текущий пароль';
                return redirect()->route('updateProfile')->withErrors($errors);
            }
        
        }
        
        return view('profile',[
            'user'=>$user
        ]);
    }

    protected function validateRules(){
        return [
            'name'=>'required|max:20|string',
            'email'=>'required|email|unique:users,email,'.Auth::id(),
            'password'=>'required',
            'newPassword'=>'required|min:4'
        ];
    }

    protected function attrNames(){
        return [
            'newPassword'=> 'Новый пароль'
        ];
    }
}
