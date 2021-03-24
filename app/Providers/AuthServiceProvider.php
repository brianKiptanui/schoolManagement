<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        // define a admin user role
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
            });

        // define a teacher user role
        Gate::define('isTeacher', function($user) {
            return $user->role == 'teacher';
        });

        // define a student role
        Gate::define('isStudent', function($user) {
            return $user->role == 'student';
        });

        // Roles based authorization
        Gate::before(
            function ($user, $ability) {
                if ($user->role === 'admin') {
                    return true;
                }
            }
        );
        Gate::before(
            function ($user, $ability) {
                if ($user->role === 'teacher') {
                    return true;
                }
            }
        );
        Gate::before(
            function ($user, $ability) {
                if ($user->role === 'student') {
                    return true;
                }
            }
        );

        foreach (self::$permissions as $action=> $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->role, $roles)) {
                        return true;
                    }
                }
            );
        }

    }

    public static $permissions = [
        'show-student' => ['admin', 'teacher', 'student'],
        'store-student' => ['admin', 'teacher', 'student'],
        'update-student' => ['admin', 'teacher', 'student'],
        'destroy-student' => ['admin'],
        'show-teacher' => ['admin', 'teacher', 'student'],
        'store-teacher' => ['admin', 'teacher'],
        'update-tacher' => ['admin', 'teacher'],
        'destroy-teacher' => ['admin'],
        'show-attendance' => ['admin', 'teacher', 'student'],
        'store-attendance' => ['admin', 'teacher'],
        'store-subject' => ['admin', 'teacher'],
        'show-subject' => ['admin', 'teacher', 'student'],
        'update-subject' => ['admin', 'teacher'],
        'store-lesson' => ['admin', 'teacher'],
        'destroy-subject' => ['admin', 'teacher'],
        'store-lesson' => ['admin', 'teacher'],
        'show-lesson' => ['admin', 'teacher', 'student'],
        'update-lesson' => ['admin', 'teacher'],
        'destroy-lesson' => ['admin', 'teacher'],
    ];
}
