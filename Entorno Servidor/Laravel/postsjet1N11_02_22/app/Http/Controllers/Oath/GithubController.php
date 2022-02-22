<?php

namespace App\Http\Controllers\Oath;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    public function callback() {
        //Recuperamos el usuario de la red social
        $gitUser = Socialite::driver('github')->user();
        //Si ya existe lo logueamos, si no lo guardamos en la base de datos
        $usuario = User::where('external_provider', 'github')
        ->where('external_id', $gitUser->getId())->first();
        //Si no existe usuario lo guardo y me logueo
        if ($usuario) {
            $usuario->update([
                'github_token'=>$gitUser->token,
                'github_refresh_token'=>$gitUser->refreshToken
            ]);
        } else {
            $usuario = User::create([
                'external_provider'=>'github',
                'external_id'=>$gitUser->getId(),
                'name'=>$gitUser->getName(),
                'email'=>$gitUser->getEmail(),
                'password'=>bcrypt('password'),
                'email_verified_at'=>now(), //Solo si lo tenemos en nuestro proyecto
                'github_token'=>$gitUser->token,
                'github_refresh_token'=>$gitUser->refreshToken
            ]);
        }

        Auth::login($usuario);
        return redirect('dashboard');
    }
}
