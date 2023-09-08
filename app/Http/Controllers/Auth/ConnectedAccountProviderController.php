<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\ConnectedAccount;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as UserProvider;

class ConnectedAccountProviderController extends Controller
{
    /**
     * Redirect the user to the authentication provider page.
     * 
     * @param $provider String
     * @return mixed
     */
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle the returned user fields from the authentication provider. 
     *
     * @param $provider string
     * @throws \Exception
     * @throws \Throwable     
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(string $provider)
    {
        /** @var \Laravel\Socialite\Contracts\User $providerUser */
        $providerUser = Socialite::driver($provider)->user();

        /** @var \App\Models\User $user */
        $user = User::firstOrNew([
            'email' => $providerUser->getEmail()
        ]);

        if (!$user->exists) {
            // return a view
        }

        /** @var \App\Models\ConnectedAccount $connectedAccount */
        $connectedAccount = ConnectedAccount::firstOrNew([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $provider
        ]);

        $connectedAccount->user()->associate($user);
        $connectedAccount->save();

        // sign in
    }
}