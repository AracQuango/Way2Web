<?php

namespace Way2Web\Providers;

use Way2Web\Modules\News\Models\Article;
use Way2Web\Modules\News\Policies\ArticlePolicy;
use Way2Web\Modules\News\Policies\CategoryPolicy;
use Way2Web\Modules\News\Models\Category;
use Way2Web\Modules\Radio\Models\Show;
use Way2Web\Modules\Radio\Policies\ShowPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
