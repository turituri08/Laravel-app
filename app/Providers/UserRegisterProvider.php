<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Validator\UserRegisterValidator;

class UserRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 自作したバリデーションクラスの検証メソッドを追加する
        ($this->app['validator']->resolver(function(
            $translator,
            $data,
            $rules,
            $messages
        ){
            return new UserRegisterValidator(
                $translator,
                $data,
                $rules,
                $messages
            ); 
        }));
    }
}
