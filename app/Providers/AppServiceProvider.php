<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Department;
use App\Models\FLModel;
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
            return Department::where('name', $value)
                ->where('is_deleted', 0)
                ->doesntExist();
        });

        Validator::replacer('unique_department_name', function ($message, $attribute, $rule, $parameters) {
            return "The department you entered already exist.";
        });



        Validator::extend('unique_site_name', function ($attribute, $value, $parameters, $validator) {
            return Site::where('name', $value)
                ->where('is_deleted', 0)
                ->doesntExist();
        });

        Validator::replacer('unique_site_name', function ($message, $attribute, $rule, $parameters) {
            return "The site you entered already exist.";
        });



        Validator::extend('unique_brand_name', function ($attribute, $value, $parameters, $validator) {
            return Brand::where('name', $value)
                ->where('is_deleted', 0)
                ->doesntExist();
        });

        Validator::replacer('unique_brand_name', function ($message, $attribute, $rule, $parameters) {
            return "The brand you entered already exist.";
        });



        Validator::extend('unique_model_name', function ($attribute, $value, $parameters, $validator) {
            $name = $parameters[0];
            $brand = $parameters[1];
            return FLModel::where('name', $name)
                ->where('brand_id', $brand)
                ->where('is_deleted', 0)
                ->doesntExist();
        });

        Validator::replacer('unique_model_name', function ($message, $attribute, $rule, $parameters) {
            return "The model you entered already exist.";
        });
    }
}
