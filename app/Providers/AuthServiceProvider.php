<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contact management
        Gate::define('contact_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Contact companies
        Gate::define('contact_company_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contacts
        Gate::define('contact_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time management
        Gate::define('time_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Time work types
        Gate::define('time_work_type_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time projects
        Gate::define('time_project_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time entries
        Gate::define('time_entry_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time reports
        Gate::define('time_report_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Expense management
        Gate::define('expense_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Expense category
        Gate::define('expense_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Income category
        Gate::define('income_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Income
        Gate::define('income_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Expense
        Gate::define('expense_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Monthly report
        Gate::define('monthly_report_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Faq management
        Gate::define('faq_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Faq categories
        Gate::define('faq_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Faq questions
        Gate::define('faq_question_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
  // Auth gates for:  series
        Gate::define('series_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('series_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('series_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('series_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('series_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
		
		// Auth gates for:  contest
        Gate::define('contest_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contest_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contest_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contest_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contest_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
		
		// Auth gates for:  matches
        Gate::define('matches_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('matches_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('matches_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('matches_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('matches_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
