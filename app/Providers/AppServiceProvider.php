<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Response::macro('success', function ($data = null, $message = 'Success', $status = 200) {
            return response()->json([
                'status'  => 'success',
                'message' => $message,
                'data'    => $data,
            ], $status);
        });

        Response::macro('error', function ($message = 'Error', $errors = [], $status = 400) {
            return response()->json([
                'status'  => 'error',
                'message' => $message,
                'errors'  => $errors,
            ], $status);
        });
    }
}
