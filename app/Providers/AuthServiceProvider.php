<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
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

        Gate::define('is_admin', function (User $user) {
            return $user->is_admin === true;
        });

        Gate::define('pic_task_access', function (User $user, Task $task) {
            $allowed_statuses = Status::whereIn('title', ['published', 'validate'])->pluck('id')->toArray();
            
            return $user -> is_admin || (in_array($task->status_id, $allowed_statuses) && $task->user_id == $user->id);

        });
    }
}
