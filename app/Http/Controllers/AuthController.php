<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Google_Client;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function redirectToProvider($provider)
    {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function handleProviderCallback($provider, Request $request)
    {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }
        try {
            // dd($request, request('redirect_client'), Socialite::driver($provider));
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }

        $userCreated = User::firstOrCreate(
            [
                'email' => $user->getEmail()
            ],
            [
                'email_verified_at' => now(),
                'name' => $user->getName(),
            ]
        );
        $userCreated->providers()->updateOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ],
            [
                'avatar' => $user->getAvatar()
            ]
        );
        $token = $userCreated->createToken('token-name')->plainTextToken;

        // return response()->json($userCreated, 200, ['Access-Token' => $token]);
        return redirect()->to(config('auth.redirect_after_login'), 302, ['Access-Token' => $token])
            ->with('message', json_encode([
                'user' => $userCreated,
            ]));
    }

    /**
     * @param $provider
     * @return JsonResponse
     */
    protected function validateProvider($provider)
    {
        if (!in_array($provider, ['facebook', 'github', 'google'])) {
            return response()->json(['error' => 'Please login using facebook, github or google'], 422);
        }
    }

    public function googleLogin()
    {
        // return response()->json(['credential' => request('credential')]);
        $client = new Google_Client(['client_id' => config('services.google.client_id')]);
        $user = $client->verifyIdToken(request('credential'));
        // $user = Socialite::driver('google')->stateless()->userFromToken(request('credential'));
        // dd($user);
        $userCreated = User::firstOrCreate(
            [
                'email' => $user['email']
            ],
            [
                'email_verified_at' => now(),
                'name' => $user['name'],
            ]
        );
        $userCreated->providers()->updateOrCreate(
            [
                'provider' => 'google',
                'provider_id' => 'google',
            ],
            [
                'avatar' => $user['picture']
            ]
        );
        $userCreated = User::with('providers')->find($userCreated->id);
        $token = $userCreated->createToken('token-name')->plainTextToken;

        return response()->json($userCreated, 200, ['Access-Token' => $token]);
    }
}