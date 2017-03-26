<?php

Route::get('/welcome', 'PrController@welcome');

Route::get('/', [
   'uses' => 'ProductController@getIndex',
   'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
   'uses' => 'ProductController@getAddToCart',
   'as' => 'product.addToCart'
]);

Route::get('/shopping-cart', [
      'uses' => 'ProductController@getCart',
      'as' => 'product.shopping-cart'
    ]);

Route::get('/sendmail', 'SendMailController@sendMail');

Route::get('/user-algolia-scout', [
   'uses' => 'UserController@listUser',
   'as' => 'user.algolia.scout'
]);

Route::get('/tags', 'APIController@tag');

Route::get('/tags/find', 'APIController@find');

Route::get('/comment', 'APIController@comment');

Route::get('/comment/search', 'APIController@autoSearch');

Route::get('/map-maker', 'APIController@map');

Route::get('/map-search-auto', 'APIController@autosearchmap');

Route::post('/language-chooser', 'APIController@changeLanguage');

Route::post('/language', [
   'before' => 'csrf',
   'as' => 'language-chooser',
   'uses' => 'APIController@changeLanguage'
]);

Route::get('importExport', 'ExcelPDFController@getIndex');

Route::post('importExcel', 'ExcelPDFController@importExcel');

Route::get('downloadExel/{type}', 'ExcelPDFController@downloadExel');

Route::get('downloadPdf', 'ExcelPDFController@downloadPDF');

//dd(get_loaded_extensions());

Route::resource('/pr', 'PrController');

Route::resource('/customer', 'CustomerController');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/check-out-stripe', [
      'uses' => 'ProductController@getStripe',
      'as' => 'getStripe',
    ]);

    Route::post('/check-out-stripe', [
      'uses' => 'ProductController@postStripe',
      'as' => 'postStripe',
    ]);

    Route::resource('/checkoutpaypal', 'PaypalController');
});


Route::get('api', 'APIController@index');

Route::get('api/get-district-list/{province_id}', 'APIController@getDistrict');

Route::get('api/get-ward-list/{district_id}', 'APIController@getWard');

Route::resource('/checkout', 'CheckoutController');

Route::group(['prefix' => 'user'], function() {
	Route::group(['middleware' => 'guest'], function() {
		Route::get('/sign-up', [
           'uses' => 'UserController@getSignup',
           'as' => 'user.signup'
		]);

		Route::post('/sign-up', [
           'uses' => 'UserController@postSignup',
           'as' => 'user.signup'
		]);

		Route::get('/sign-in', [
           'uses' => 'UserController@getSignin',
           'as' => 'user.signin'
		]);

		Route::post('/sign-in', [
           'uses' => 'UserController@postSignin',
           'as' => 'user.signin'
		]);

		Route::get('sign-up/confirm/{token}', 'UserController@confirm');

	});

	    Route::get('google/redirect', 'Auth\LoginController@redirectToProviderGoogle');
        Route::get('google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

        Route::get('facebook/redirect', 'Auth\LoginController@redirectToProviderFacebook');
        Route::get('facebook/callback', 'Auth\LoginController@handleProviderCallbackFacebook');

        Route::get('twitter/redirect', 'Auth\LoginController@redirectToProviderTwitter');
        Route::get('twitter/callback', 'Auth\LoginController@handleProviderCallbackTwitter');

	Route::group(['middleware' => 'auth'], function() {
		Route::get('/logout', [
           'uses' => 'UserController@getLogout',
           'as' => 'user.logout'
		]);

		Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
		]);
	});
});
