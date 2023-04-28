<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    public function handleProviderCallback(Request $request)
    {
        try {
            $provider = "google";
            try {
                $user_google = Socialite::driver($provider)->user();
            } catch (InvalidStateException $e) {
                $user_google = Socialite::driver($provider)->stateless()->user();
            }
            $user           = User::where('email', $user_google->getEmail())->first();


            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb

            if ($user != null) {
                auth()->login($user, true);
            } else {
                $user = User::Create([
                    'email'             => $user_google->getEmail(),
                    'name'              => $user_google->getName(),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);
                $user->assignRole("guest");


                auth()->login($user, true);
            }
            if ($user->hasRole("relawan")) {
                return redirect("/admin/pemilihs");
            }
            return redirect("/");
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('login');
        }
    }
}
