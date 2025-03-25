<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\User;

use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;

use App\Providers\FortifyServiceProvider;

use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Validation\ValidationException;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                return redirect('/');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });


        // "route" for the login view
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // "route" for the password reset view
        Fortify::requestPasswordResetLinkView(function(){
            return view(('auth.password_reset'));
        });

        // "route" for the new password form view
        Fortify::resetPasswordView(function(){
            return view(('auth.password_new'));
        });


        Fortify::authenticateUsing(function (Request $request) {
            // Find the user by email
            $user = DB::table('users')->where('email', $request->email)->first();

            // Check if the user exists and the password is correct
            if ($user && Hash::check($request->password, $user->password)) {
                // Check if the user is blocked
                if ($user->is_blocked) {
                    throw ValidationException::withMessages([
                        'error' => ['Esta conta foi bloqueada por um administrador.'],
                    ]);
                }

                // Check if the email is verified
                if (!$user->email_verified_at) {
                    throw ValidationException::withMessages([
                        'error' => ['Por favor, verifique o seu email.'],
                    ]);
                }

                // Return user model for successful login
                return \App\Models\User::find($user->id);
            }
        });

    }

}
