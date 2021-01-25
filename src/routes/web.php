<?php




Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/paytabs_payment', 'PaytabsController@index')->name('Paytabs.index');
    Route::post('/paytabs_response', 'PaytabsController@response')->name('Paytabs.result');
});
