<?php

use App\Models\Hotel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // if (!Cache::get('test')) Cache::forever('test',  DB::table('hotels')->orderBy('id')->cursorPaginate());
    $page = request('page') ?: 1;
    if (!Cache::tags(['hotels'])->get("test")) Cache::tags(['hotels'])->forever("test", Hotel::orderBy('id')->get());
    $data['tes'] = Cache::tags(['hotels'])->get("test");
    // return Cache::get('test');
    // $data['tes'] = Hotel::orderBy('id')->cursorPaginate();
    // $data['tes'] = DB::select("SELECT * FROM hotels");
    return view('welcome', $data);
    // return Hotel::all();
});
