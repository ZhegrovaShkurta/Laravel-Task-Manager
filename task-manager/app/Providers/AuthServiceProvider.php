<?php

namespace App\Providers;

use App\Models\Task;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Politikat e aplikacionit.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Lidhja e modelit Task me TaskPolicy
        Task::class => TaskPolicy::class,
    ];

    /**
     * Regjistrimi i çdo shërbimi autentifikimi / autorizimi.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Opsionale: Mund të shtoni edhe `Gates` të personalizuar për autorizim specifik
        Gate::define('update-task', function ($user, $task) {
            return $user->id === $task->user_id;
        });

        Gate::define('delete-task', function ($user, $task) {
            return $user->id === $task->user_id;
        });
    }
}
