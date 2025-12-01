<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

Route::get('/api/items', function () {
    return Item::all();  // すべてのレコードを JSON で返す
});

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


Route::get('/items', function() {
    return DB::table('items')->get();
});



