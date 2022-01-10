<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

});


Route::post('payment/status', 'SiteController@paymentCallback');