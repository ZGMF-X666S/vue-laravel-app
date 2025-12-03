<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Http\Controllers\UserController;

Route::post('/users', [UserController::class, 'store']);

Route::get('/api/items', function () {
    return Item::all();  // すべてのレコードを JSON で返す
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/api/test', function () {
//     return response()->json(['status' => 'ok']);
// });



// Route::get('/web-test', function () {
//     $response = Http::get('http://localhost:8080/api/test');
//     return $response->body(); // {"status":"ok"} が返るはず
// });


Route::get('/items', [ItemController::class, 'index']);

Route::get('/{any}', function () {
    return file_get_contents(public_path('index.html'));
})->where('any', '.*');







