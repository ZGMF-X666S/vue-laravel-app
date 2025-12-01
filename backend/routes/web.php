<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/test', function () {
    return response()->json(['status' => 'ok']);
});


Route::get('/{any}', function () {
    return file_get_contents(public_path('index.html'));
})->where('any', '.*');


Route::get('/web-test', function () {
    $response = Http::get('http://localhost:8080/api/test');
    return $response->body(); // {"status":"ok"} が返るはず
});