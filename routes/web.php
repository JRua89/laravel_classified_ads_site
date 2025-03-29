<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AreaContoller;
use App\Http\Controllers\Listing\ListingController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Listing\ListingViewedContoller;
use App\Http\Controllers\Listing\ListingContactContoller;
use App\Http\Controllers\Listing\ListingFavouriteController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/user/area/{area}', [AreaContoller::class, 'store'])->name('user.area.store');


//group
Route::group(['prefix' => '/{area}'], function () {
    /**
     * Category
     */
    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');

        Route::group(['prefix' => '/{category}'], function () {

            Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
        });
    });


    /**
     * Listings
     */

    Route::group(['prefix'  => '/listing', 'namespace' => 'Listing'], function() {

        Route::get('/favourites', [ListingFavouriteController::class, 'index'])->name('listings.favourites.index');
        Route::post('/{listing}/favourites', [ListingFavouriteController::class, 'store'])->name('listings.favourites.store');
        Route::delete('/{listing}/favourites', [ListingFavouriteController::class, 'destroy'])->name('listings.favourites.destroy');

        Route::get('/viewed', [ListingViewedContoller::class, 'index'])->name('listings.viewed.index');

        Route::post('/{listing}/contact', [ListingContactContoller::class, 'store'])->name('listings.contact.store');

        Route::group(['middleware' => 'auth'], function(){
            Route::get('/create', [ListingController::class, 'create'])->name('listings.create');
            Route::post('/', [ListingController::class, 'store'])->name('listings.store');

        });

    }); 

    Route::get('/{listing}', [ListingController::class, 'show'])->name('listings.show');
});
