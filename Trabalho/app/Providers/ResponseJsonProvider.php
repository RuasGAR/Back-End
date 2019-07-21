<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseJsonProvider extends ServiceProvider
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
        Response::macro('success', function($data){
            return response()->json([
                'data'=> $data
            ]);
                
        });

        Response::macro('error',function($message,$status=422,$additonal_info=[]){
            return response()->json([
                'data' => [
                'message' => $message,
                'info' => $additonal_info,
                ]
            ], $status);
        });


    }
}
