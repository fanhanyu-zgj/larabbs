<?php

namespace App\Providers;

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
		 \App\Models\Topic::class => \App\Policies\TopicPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 修改策略的自动发现逻辑
        Gate::guessPolicyNamesUsing(function($modeClass){
            // 动态返回模型对应的策略名称, 如： // 'App\model\User'=>'App\Policies\UserPolicy',
            return 'App\Policies\\'.class_basename($modeClass).'Policy';
        });
    }
}
