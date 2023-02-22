<?php
use App\Http\Controllers;
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

Route::group(['middleware' => 'AdminLogCheck'], function() {


	Route::get('/','HomeController@index');
	// Visitor Route
	Route::get('visitor','VisitorController@visitors');

	// Sliders Route 
	Route::get('sliders','SlidersController@index')->name('sliders');
	Route::get('slider/create','SlidersController@create')->name('sliders_create');
	Route::post('slider/create','SlidersController@store')->name('sliders_create.confirm');
	Route::get('slider/show/{id}','SlidersController@show')->name('sliders.show');
	Route::get('slider/edit/{id}','SlidersController@edit')->name('sliders.edit');
	Route::post('slider/update','SlidersController@update')->name('sliders.update');
	Route::post('slider/delete','SlidersController@delete')->name('sliders.delete');
	Route::post('slider/activeStatus/{slider}','SlidersController@activeStatus')->name('sliders.activeStatus');

	// About Route passing ID
	Route::get('abouts','AboutController@index');
	Route::get('about/create','AboutController@create')->name('about.create');
	Route::post('about/create','AboutController@store')->name('about.create_confirm');
	Route::post('about/edit/{id}','AboutController@edit')->name('about.edit');
	Route::post('about/update/{id}','AboutController@update')->name('about.update');
	Route::post('about/delete/{id}','AboutController@delete')->name('about.delete');
	// Services Route passing ID
	Route::get('services','ServicesController@index')->name('services');
	Route::get('service/create','ServicesController@create')->name('service.create');
	Route::post('service/create','ServicesController@store')->name('service.create_confirm');
	Route::post('service/edit/{id}','ServicesController@edit')->name('service.edit');
	Route::post('service/update/{id}','ServicesController@update')->name('service.update');
	Route::post('service/delete/{id}','ServicesController@delete')->name('service.delete');
	Route::post('service/activeStatus/{service}','ServicesController@activeStatus')->name('service.activeStatus');
	// Features Route passing ID
	Route::get('features','FeaturesController@index')->name('features');
	Route::get('feature/create','FeaturesController@create')->name('feature.create');
	Route::post('feature/create','FeaturesController@store')->name('feature.create_confirm');
	Route::get('feature/show/{id}','FeaturesController@show')->name('feature.show');
	Route::post('feature/edit/{id}','FeaturesController@edit')->name('feature.edit');
	Route::post('feature/update/{id}','FeaturesController@update')->name('feature.update');
	Route::post('feature/delete/{id}','FeaturesController@delete')->name('feature.delete');
	Route::post('feature/activeStatus/{feature}','FeaturesController@activeStatus')->name('feature.activeStatus');
	// Portfolio Route without pass ID
	Route::get('portfolios','PortfolioController@index')->name('portfolios');
	Route::get('portfolio/create','PortfolioController@create')->name('portfolio.create');
	Route::post('portfolio/create','PortfolioController@store')->name('portfolio.create_confirm');
	Route::post('portfolio/show','PortfolioController@show')->name('portfolio.show');
	Route::post('portfolio/edit/','PortfolioController@edit')->name('portfolio.edit');
	Route::post('portfolio/update/','PortfolioController@update')->name('portfolio.update');
	Route::post('portfolio/delete/','PortfolioController@delete')->name('portfolio.delete');
	Route::post('portfolio/activeStatus/','PortfolioController@activeStatus')->name('portfolio.activeStatus');
	// Pricing Route passing ID
	Route::get('pricings','PricingController@index')->name('pricings');
	Route::get('pricing/create','PricingController@create')->name('pricing.create');
	Route::post('pricing/create','PricingController@store')->name('pricing.create_confirm');
	Route::post('pricing/show/{id}','PricingController@show')->name('pricing.show');
	Route::post('pricing/edit/{id}','PricingController@edit')->name('pricing.edit');
	Route::post('pricing/update/{id}','PricingController@update')->name('pricing.update');
	Route::post('pricing/delete/{id}','PricingController@delete')->name('pricing.delete');
	Route::post('pricing/activeStatus/','PricingController@activeStatus')->name('pricing.activeStatus');
	// Team Route passing ID
	Route::get('teams','TeamController@index')->name('teams');
	Route::get('team/create','TeamController@create')->name('team.create');
	Route::post('team/create','TeamController@store')->name('team.create_confirm');
	Route::post('team/edit/{id}','TeamController@edit')->name('team.edit');
	Route::post('team/update/{id}','TeamController@update')->name('team.update');
	Route::post('team/delete/{id}','TeamController@delete')->name('team.delete');
	Route::post('team/activeStatus/{id}','TeamController@activeStatus')->name('team.activeStatus');
	// Testimonial Route passing ID
	Route::get('testimonials','TestimonialController@index')->name('testimonials');
	Route::get('testimonial/create','TestimonialController@create')->name('testimonial.create');
	Route::post('testimonial/create','TestimonialController@store')->name('testimonial.create_confirm');
	Route::post('testimonial/edit/{id}','TestimonialController@edit')->name('testimonial.edit');
	Route::post('testimonial/update/{id}','TestimonialController@update')->name('testimonial.update');
	Route::post('testimonial/delete/{id}','TestimonialController@delete')->name('testimonial.delete');
	Route::post('testimonial/activeStatus/{id}','TestimonialController@activeStatus')->name('testimonial.activeStatus');

	// Blog Route passing ID
	Route::get('blogs','BlogController@index')->name('blogs');
	Route::get('blog/create','BlogController@create')->name('blog.create');
	Route::post('blog/create','BlogController@store')->name('blog.create_confirm');
	Route::post('blog/edit/{id}','BlogController@edit')->name('blog.edit');
	Route::post('blog/update/{id}','BlogController@update')->name('blog.update');
	Route::post('blog/delete/{id}','BlogController@delete')->name('blog.delete');
	Route::post('blog/activeStatus/{id}','BlogController@activeStatus')->name('blog.activeStatus');

	// Contact Route
	Route::get('contacts','ContactController@index')->name('contacts');
	Route::get('contact/create','ContactController@create')->name('contact.create');
	Route::post('contact/create','ContactController@store')->name('contact.create_confirm');
	Route::post('contact/edit/{id}','ContactController@edit')->name('contact.edit');
	Route::post('contact/update/{id}','ContactController@update')->name('contact.update');
	Route::post('contact/delete/{id}','ContactController@delete')->name('contact.delete');
	// Message Route 
	Route::get('message','MessageController@index')->name('messages');
	Route::post('message/show/{id}','MessageController@show')->name('message.show');
	Route::post('message/delete/{id}','MessageController@delete')->name('message.delete');
	Route::post('message/status/{id}','MessageController@status')->name('message.status');


});

// Login Route 
Route::get('login','loginController@login')->name('login');
Route::post('onLogin','loginController@onLogin')->name('onLogin');
Route::get('Logout','loginController@logOut')->name('logOut');