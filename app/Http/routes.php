<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Auth::loginUsingId(1);

Route::post('/form',function(){
    $token = Request::get('stripeToken');

    Auth::user()->subscription('Normal')->create($token);
    return 'Done';
});
Route::get('/registerform',function(){
   return view('auth.registerSubscription');
});
Route::get('/message',function(){
    $data =[
    'title'=>'Welcome to CleBeaInc.com',
     'content'=>'Thanks for signup to our platform follow the link to finished subscription!'];

     \Mail::send('emails.contact',$data, function($message){
            $message->to('mbutuhescarter@gmail.com','Lenon Brown')
                     ->subject('Thanks dude!');
     });
});
/**
 * Home Route
 */
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
/**
	 * Authentication  routes
	 */
	Route::get('auth/register',['as'=>'auth.register.view','uses'=>'Auth\AuthController@register']);
	Route::post('auth/register',['as'=>'auth.register','uses'=>'Auth\AuthController@create']);
	Route::get('auth/logout','Auth\AuthController@logout');
	Route::get('auth/login',['as'=>'auth.login.view','uses'=>'Auth\AuthController@getLogin']);
	Route::post('auth/login',['as'=>'auth.login','uses'=>'Auth\AuthController@postLogin']);
	/**
	 * Product 
	 */
	Route::resource('products', 'ProductController');
    Route::get('products/download/{id}', ['uses' => 'ProductController@download']);

	/**
	 * About and contact pages routes
	 */
    Route::resource('about', 'AboutController',['only'=>['index']]);
    Route::get('contact',['as'=>'contact','uses'=>'ContactController@create']);
    Route::post('contact',['as'=>'contact_store','uses'=>'ContactController@store']);

    /**
     * Admin Product Catalog
     */
    Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'], function(){
    	Route::get('/', 'IndexController@index');
	    //Route::resource('products', 'IndexController');
	    Route::resource('orders', 'OrderController');
	    Route::resource('products','ProductController');
    });

	/**
	 * Membership routes
	 */
	Route::get('plans', [
		'as' => 'plans', 'uses' => 'SubscriptionsController@index'
	]);
	Route::get('plans/subscribe/{planId}', [
	    'as' => 'plans.subscribe', 'uses' => 'SubscriptionsController@subscribe'
	]);
	Route::post('plans/Upgrade', [
	    'as' => 'plans.Upgrade', 'uses' => 'SubscriptionsController@swapPlans'
	]);
	Route::post('plans/coupon', [
	    'as' => 'plans.coupon', 'uses' => 'SubscriptionsController@applyCoupon'
	]);
	Route::post('plans/swap', [
	    'as' => 'plans.swap', 'uses' => 'SubscriptionsController@swapPlans'
	]);
	Route::post('plans/cancel', [
	    'as' => 'plans.cancel', 'uses' => 'SubscriptionsController@cancelPlan'
	]);
	Route::get('invoices', [
	    'as' => 'invoices', 'uses' => 'SubscriptionsController@invoices'
	]);
	Route::get('invoices/download/{id}', [
	    'uses' => 'SubscriptionsController@downloadInvoice'
	]);

	Route::post('checkout', [
	    'uses' => 'CheckoutController@index'
	]);
	Route::get('checkout/thankyou', [
	    'as' => 'checkout.thankyou', 'uses' => 'CheckoutController@thankyou'
	]);
