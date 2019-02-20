<?php

Route::get('/',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);

Route::group(['middleware'=>['authen'],'prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::resource('/users','UsersController');
	Route::resource('/designations','DesignationsController');
	Route::resource('/departments','DepartmentsController');
	Route::resource('/industrys','IndustrysController');
	Route::resource('/clients','ClientsController');
	Route::resource('/taskcategories','TaskCategoriesController');
	Route::resource('/projects','ProjectsController');
	Route::resource('/projectcategories','ProjectCategoriesController');
	Route::get('/', 'DashboardController@index')->name('home');
	Route::get('/profile','UsersController@edit_profile')->name('editprofile');
	Route::patch('/profile/{user}','UsersController@update_profile')->name('updateprofile');
	Route::post('/userprofile','UsersController@upload_profile')->name('userprofileupload');
	Route::resource('/blogs','BlogsController');
	Route::get('/blogs/user-blog-details/{id}','BlogsController@user_blog_details')->name('blogs.user_blog_details');
	Route::resource('/blogcategories','BlogCategoriesController');
	Route::resource('/tasks','TasksController');


});
	Route::get('/blogs','Admin\BlogsController@guest_user')->name('guest_user');
	Route::get('/blogs/blog-details/{id}','Admin\BlogsController@blog_details')->name('blogs.blog_details');

Auth::routes();