<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersInfoController;
use App\Http\Controllers\Admin\WorkerInfoController;
use App\Http\Controllers\Admin\ServiceController;
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
    return view('dashboard.admin.login');
});
Route::view('/login/admin', 'dashboard.admin.login')->name('login.admin');


Route::prefix('admin')->name('admin.')->group(function(){
   Route::middleware(['guest:admin'])->group(function(){
       Route::view('/login', 'dashboard.admin.login')->name('login');
       Route::view('/register', 'dashboard.admin.register')->name('register');
       Route::post('/dologin',[AdminController::class,'doLogin'])->name('dologin');
       Route::post('/create',[AdminController::class,'create'])->name('create');

   });

   Route::middleware(['auth:admin'])->group(function(){

    
    Route::post('/logout',[AdminController::class,'logout'])->name('logout');

    //Admin Profile
    Route::get('/profile', [AdminController::class, 'ProfileUpdate'])->name('profile.update');
    Route::post('/profile/update', [AdminController::class, 'UpdateProfile'])->name('update.admin.profile');

    //Change Admin password
    Route::get('/password', [AdminController::class, 'ChangePass'])->name('change.password');
    Route::post('/password/update', [AdminController::class, 'UpdatePass'])->name('password.update');

    //Users Informations Page
    Route::get('/user/info', [UsersInfoController::class, 'UsersInfo'])->name('users.information');
    Route::get('/add/user', [UsersInfoController::class, 'NewUser'])->name('add.user');
    Route::post('/store/user', [UsersInfoController::class, 'StoreUser'])->name('store.user');
    Route::get('/edit/user/{id}', [UsersInfoController::class, 'EditUser'])->name('edit.user');
    Route::post('/update/user/{id}', [UsersInfoController::class, 'UpdateUser'])->name('update.user');
    Route::get('/user/delete/{id}', [UsersInfoController::class, 'DeleteUser']);
    Route::get('/show/user/{id}', [UsersInfoController::class, 'UserShow']);



    //Statstic Page
    Route::get('/home/statstic', [AdminController::class, 'Index'])->name('index');


    //Worker Informations Page
    Route::get('/worker/info', [WorkerInfoController::class, 'WorkersInfo'])->name('workers.information');
    Route::get('/add/worker', [WorkerInfoController::class, 'NewWorker'])->name('add.worker');
    Route::post('/store/worker', [WorkerInfoController::class, 'StoreWorker'])->name('store.worker');
    Route::get('/edit/worker/{id}', [WorkerInfoController::class, 'EditWorker'])->name('edit.worker');
    Route::post('/update/worker/{id}', [WorkerInfoController::class, 'UpdateWorker'])->name('update.worker');
    Route::get('/worker/delete/{id}', [WorkerInfoController::class, 'DeleteWorker']);
    Route::get('/show/worker/{id}', [WorkerInfoController::class, 'ShowWorker']);



     //Service Informations Page
     Route::get('/service/info', [ServiceController::class, 'ServicesInfo'])->name('services.information');
     Route::get('/add/service', [ServiceController::class, 'NewService'])->name('add.service');
     Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
     Route::get('/edit/service/{id}', [ServiceController::class, 'EditService'])->name('edit.service');
     Route::post('/update/service/{id}', [ServiceController::class, 'UpdateService'])->name('update.service');
     Route::get('/service/delete/{id}', [ServiceController::class, 'DeleteService']);


     //User's Services
     Route::get('/user/service', [ServiceController::class, 'UserService'])->name('user.service');
     Route::get('/user/service/delete/{id}', [ServiceController::class, 'DeleteUserService']);
     Route::get('/show/user/service/{id}', [ServiceController::class, 'UserServiceShow']);



});


});


