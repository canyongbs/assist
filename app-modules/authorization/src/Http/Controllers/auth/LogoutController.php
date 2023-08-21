<?php

namespace Assist\Authorization\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Assist\Authorization\Http\Responses\Auth\SocialiteLogoutResponse;
use Filament\Http\Controllers\Auth\LogoutController as FilamentLogoutController;

class LogoutController extends FilamentLogoutController
{
    public function __invoke(): LogoutResponse
    {
        if (session()->missing('auth_via')) {
            return parent::__invoke();
        }

        $socialiteProvider = session('auth_via');

        Auth::guard()->logout();
        session()->flush();

        return app(SocialiteLogoutResponse::class, [
            'provider' => $socialiteProvider,
        ]);
    }
}
