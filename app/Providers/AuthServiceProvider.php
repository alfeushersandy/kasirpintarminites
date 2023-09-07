<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Reimbursement;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('add-karyawan', function(User $user){
            return $user->jabatan == 'Direktur' ? Response::allow() : Response::denyWithStatus(403);
        });

        Gate::define('approve-reject-direktur', function(User $user){
            return $user->jabatan == 'Direktur';
        });

        Gate::define('approve-reject-finance', function(User $user){
            return $user->jabatan == 'Finance';
        });

        Gate::define('edit-rembers', function(User $user, Reimbursement $rembers){
            return $user->id === $rembers->user_id || $user->jabatan === 'Direktur';
        });
        
    }
}
