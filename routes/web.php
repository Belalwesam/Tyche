<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\DashbaordController;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//index of the dashboard 
Route::get('/dashboard', [DashbaordController::class , 'index'])->name('dashboard.index');

//adding a new item to inventtory 
Route::get('/add-item' , [DashbaordController::class , 'showAddForm'])->name('dashboard.add');
//storing a new item to inventory 
Route::post('/add-item' , [DashbaordController::class , 'storeItem'])->name('dashboard.store');

//going to edit page for a specific product 
Route::get('/product/edit/{id}' , [DashbaordController::class , 'showEditPage'])->name('dashboard.edit');
//stroing the item after the edit (sacing changes)
Route::put('/proudct/edit/{id}' , [DashbaordController::class , 'storeChanges'])->name('dashboard.update');
//route for deleting an inventory item 
Route::delete('/product/{id}' , [DashbaordController::class , 'destroy'])->name('dashboard.destroy');

//normal users 
//route for the home page 
Route::get('/' , [UserController::class , 'index'])->name('user.index');

//route for shopping page 
Route::get('/shop' , [UserController::class , 'shopPage'])->name('user.shop');

//route for register page
Route::get('/register' , [UserController::class , 'registerPage'])->name('user.register');
//route for storing the users 
Route::post('/register' , [UserController::class , 'storeUser'])->name('user.storeUser');
//route for showing loging page 
Route::get('/my-account' , [UserController::class , 'loginPage'])->name('user.login');
//route for attempt logging in 
Route::post('/my-account/login' , [UserController::class , 'attemptLogin'])->name('user.attemptlogin');
//route for logging out the user 
Route::post('/my-account/logout' , [UserController::class , 'userLogout'])->name('user.logout');

//adding an item to the user cart 
Route::post('/item/{id}' , [UserController::class , 'addItemToCart'])->name('add-item-to-cart');
//deleting an item from the cart 
Route::delete('/item/remove/{id}' , [UserController::class , 'removeCartItem'])->name('user.removeCartItem');