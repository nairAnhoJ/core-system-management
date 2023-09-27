<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Site;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Validator::extend('unique_department_name', function ($attribute, $value, $parameters, $validator) {
            // Check if the id_number is unique among users where is_deleted is 0
            return Department::where('name', $value)
                ->where('is_deleted', 0)
                ->doesntExist();
        });

        Validator::replacer('unique_department_name', function ($message, $attribute, $rule, $parameters) {
            return "The department you entered already exist."; // Customize this message as per your needs
        });



        Validator::extend('unique_site_name', function ($attribute, $value, $parameters, $validator) {
            // Check if the id_number is unique among users where is_deleted is 0
            return Site::where('name', $value)
                ->where('is_deleted', 0)
                ->doesntExist();
        });

        Validator::replacer('unique_site_name', function ($message, $attribute, $rule, $parameters) {
            return "The site you entered already exist."; // Customize this message as per your needs
        });
    }
}
