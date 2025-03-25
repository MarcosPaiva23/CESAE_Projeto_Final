<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add view composer to share user days with all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();

                // Get the user's days
                $daysRecord = DB::table('dias_viagem')
                    ->where('user_id', $userId)
                    ->first();

                // Convert to array of selected days
                $userDays = [];
                if ($daysRecord) {
                    if ($daysRecord->segunda) $userDays[] = 1;
                    if ($daysRecord->terca) $userDays[] = 2;
                    if ($daysRecord->quarta) $userDays[] = 3;
                    if ($daysRecord->quinta) $userDays[] = 4;
                    if ($daysRecord->sexta) $userDays[] = 5;
                }

                $view->with('userDays', $userDays);
            }
        });
    }
}
