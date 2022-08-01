<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('roles', [RoleController::class, "index"]);
Route::post('/Auth', [AuthController::class,"index"])->name("Auth_routes");

Route::get('/Login', ["as" => "Login_routes" , function(){
    return view('pages.default',["ViewType" => 'Accounts','View' => "Login","Title" => "Login"]);
}] );
Route::get('/Deconnexion', [AuthController::class,"Logout"])->name("Logout_routes");

Route::get('/Register', [RegisterController::class,"index"] );
Route::post('/Register', [RegisterController::class, "index"] );

Route::middleware(['AuthExtApi', ])->group(function () {

    Route::get('/', function () {
        return view('pages.default');
    });
    Route::get('Menu/{pages}', [MenuController::class,"index"])->name('Menu_routes');
    Route::get('Menu/{pages}/{getApiDatas?}', [MenuController::class,"index",])->name('Menu_routes');
    Route::post('Menu/{pages}/{getApiDatas?}', [MenuController::class,"index",])->name('Menu_routes_post');

    Route::get('Rapports/{view}', ["as" => "rapports_routes",function ($view) {

        return view("pages.Rapports.$view",);
    }]);

    // la route lorque les pages son actualisées

    Route::get('/{pages}', ["as" => "navbarViews_routes",function ($pages) {

        return view("pages.default",['views' => "pages.Menu.$pages"]);
    }]);
});



