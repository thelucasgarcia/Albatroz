<?php

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

/*
|--------------------------------------------------------------------------
| WebSite
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Site', 'as' => 'site.'], function() {

	Route::get('/', 'HomeController@index')->name('home.index');

	Route::group(['prefix' => 'destinations'], function() {
		Route::get('/', 'DestinationController@index')->name('destination.index');
	    Route::get('{country}','DestinationController@country')->name('destination.country');
		Route::get('{country}/{city}','DestinationController@city')->name('destination.city');

	});

	Route::get('school/{school}','SchoolController@show')->name('school.show');
	Route::get('schools', 'SchoolController@index')->name('school.index');

	Route::group(['prefix' => 'blog'], function() {
	    Route::get('/', 'BlogController@index')->name('blog.index');
		Route::post('comments/{post}', 'BlogController@addComment')->name('blog.comment.add');
		Route::get('{post}-{slug}', 'BlogController@show')->name('blog.post.show');
		Route::get('category/{category}','BlogController@category')->name('blog.category.show');
		Route::get('tag/{tag}','BlogController@tag')->name('blog.tag.show');
		Route::get('search','BlogController@search')->name('blog.search');
	});
	


	Route::get('contact', 'ContactController@index')->name('contact.index');
	
	
});

/*
|--------------------------------------------------------------------------
| Painel Administrador
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin'], function() {
	Auth::routes();
});

Route::group(['prefix' => 'admin','middleware' => 'auth','namespace' => 'Admin', 'as' => 'admin.'], function() {

	Route::get('/', 'HomeController@index')->name('home.index');

	Route::resource('city', 'CityController');
	Route::resource('country', 'CountryController');
	Route::resource('school', 'SchoolController');
	Route::resource('school/gallery', 'SchoolGalleryController',['parameters' => ['gallery' => 'school'],'as' => 'school']);
	Route::get('school/faq/{school}', 'SchoolFaqController@show')->name('school.faq.show');
	Route::post('school/faq/{school}', 'SchoolFaqController@store')->name('school.faq.store');
	Route::delete('school/faq/{faq}', 'SchoolFaqController@destroy')->name('school.faq.destroy');

	Route::get('school/get-cities/{country}', 'SchoolController@getCities')->name('get.cities');


	Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
	    Route::resource('post', 'BlogPostController');
	    Route::resource('post/gallery', 'BlogGalleryController',['parameters' => ['gallery' => 'post'],'as' => 'post']);
	    
	    Route::resource('category','BlogCategoryController');
	    Route::resource('tag','BlogTagController');


	    Route::get('post/ajax/getFormNewCategory','BlogPostController@getFormNewCategory')->name('ajax.getFormNewCategory');
	    Route::get('post/ajax/getFormNewTag','BlogPostController@getFormNewTag')->name('ajax.getFormNewTag');
	});
	

	
});


