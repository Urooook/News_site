<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class LoginController extends Controller
{
    public function loginVk(){
        return Socialite::driver('vkontakte')->redirect();
    }
    public function responseVk(UserRepository $userRepository){
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userRepository->getUserBySocId($user,'vk');
        
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }
    public function loginFb(){
        return Socialite::driver('facebook')->redirect();
    }
    public function responseFb(UserRepository $userRepository){
        $user = Socialite::driver('faceboo')->user();
        $userInSystem = $userRepository->getUserBySocId($user,'vk');
        
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }
}
