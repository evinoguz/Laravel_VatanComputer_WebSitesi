<?php

use function foo\func;

Auth::routes();
Route::post('login', 'Auth\LoginController@login');
Route::get('/exit', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('log_out');

Route::get('/', 'Front\homeController@index')->name('main');

Route::group(['prefix' => 'front'], function () {
Route::get('/blank', 'Front\homeController@blank')->name('Front.blank');
Route::get('/menustore/{id}', 'Front\homeController@menustore')->name('Front.menustore');
Route::get('/substore/{id}', 'Front\homeController@substore')->name('Front.substore');
Route::get('/profile', 'Front\homeController@profile')->name('Front.profile');
Route::get('/test/mail', function () {
    $user = \App\User::find(1);
    return new App\Mail\UserRegisterMail($user);
});
});

Route::group(['prefix' => 'favorite'], function () {
    Route::get('/favorite','Front\favoriteController@favorite')->name('Front.favorite');
    Route::get('/favorite_post/{id}','Front\favoriteController@favorite_post')->name('Front.favorite_post');
    Route::get('/favorite_remove/{id}','Front\favoriteController@favorite_remove')->name('Front.favorite.remove');

});

Route::group(['prefix' => 'sepet'], function () {
    Route::get('/product_see/{id}', 'Front\sepetController@product_see')->name('Front.product.see');
    Route::get('/sepet', 'Front\sepetController@sepet')->name('Front.sepet');
    Route::get('/sepet_post/{id}', 'Front\sepetController@sepet_post')->name('Front.sepet_post');
    Route::get('/sepet_product_remove/{id}', 'Front\sepetController@sepet_product_remove')->name('Front.sepet.product_remove');
    Route::get('/remove', 'Front\sepetController@remove')->name('Front.sepet.remove');
});
Route::group(['prefix' => 'payment'], function () {
    Route::get('/payment', 'Front\paymentController@payment')->name('Front.payment');
    Route::get('/checkout', 'Front\paymentController@checkout')->name('Front.checkout');

});



Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('CMS.home');
    })->name('CMS.home');

    Route::group(['prefix' => 'menu'], function () {
        Route::get('/menu_index', 'CMS\menusController@index')->name('CMS.menu.list');
        Route::get('/create', 'CMS\menusController@create')->name('CMS.menu.create');
        Route::post('/create_post', 'CMS\menusController@create_post')->name('CMS.menu.create_post');
        Route::get('/createsub', 'CMS\menusController@createsub')->name('CMS.menu.createsub');
        Route::post('/createsub_post', 'CMS\menusController@createsub_post')->name('CMS.menu.createsub_post');
        Route::get('/edit/{id}', 'CMS\menusController@edit')->name('CMS.menu.edit');
        Route::post('/edit_post/{id}', 'CMS\menusController@edit_post')->name('CMS.menu.edit_post');
        Route::get('/editsub/{id}', 'CMS\menusController@editsub')->name('CMS.menu.editsub');
        Route::post('/editsub_post/{id}', 'CMS\menusController@editsub_post')->name('CMS.menu.editsub_post');
        Route::get('/remove/{id}', 'CMS\menusController@remove')->name('CMS.menu.remove');
        Route::get('/removesub/{id}', 'CMS\menusController@removesub')->name('CMS.menu.removesub');

    });

    Route::group(['prefix' => 'urun'], function () {
        Route::get('/product_index', 'CMS\productsController@index')->name('CMS.urun.list');
        Route::get('/ajax_menu','CMS\productsController@ajax_menu')->name('CMS.urun.ajax_menu');
        Route::get('/ajax_submenu/{id}','CMS\productsController@ajax_submenu')->name('CMS.urun.ajax_submenu');
        Route::get('/create', 'CMS\productsController@create')->name('CMS.urun.create');
        Route::post('/create_post', 'CMS\productsController@create_post')->name('CMS.urun.create_post');
        Route::get('/edit/{id}', 'CMS\productsController@edit')->name('CMS.urun.edit');
        Route::post('/edit_post/{id}', 'CMS\productsController@edit_post')->name('CMS.urun.edit_post');
        Route::get('/remove/{id}', 'CMS\productsController@remove')->name('CMS.urun.remove');
    });


    Route::group(['prefix'=>'user'],function(){
        Route::get('/register','Auth\registersController@create')->name('Auth.register');
        Route::post('/register_post','Auth\registersController@create_post')->name('Auth.register_post');

    });


});








