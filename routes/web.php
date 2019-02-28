<?php

Route::get('/',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);

Route::group(['middleware'=>['authen'],'prefix'=>'admin','namespace'=>'Admin'],function(){
	//Insert ,update ,delete users
	Route::resource('/users','UsersController');
	//Import the user data
	Route::post('/user-import','UsersController@import')->name('users.import');
	//Export user data
	Route::get('/user-export','UsersController@export')->name('users.export');
	//Insert ,update ,delete designations
	Route::resource('/designations','DesignationsController');
	//Insert ,update ,delete departments
	Route::resource('/departments','DepartmentsController');
	//
	Route::get('/departments/teamlead/{id}','DepartmentsController@teamlead')->name('departments.teamlead');
	//
	Route::post('/departments/teamlead/store','DepartmentsController@teamlead_store')->name('departments.teamleadstore');
	//Update the teamlead data
	Route::post('/departments/teamlead/update','DepartmentsController@teamlead_update')->name('departments.teamleadupdate');
	//Insert ,update ,delete industrys
	Route::resource('/industrys','IndustrysController');
	//Insert ,update ,delete clients
	Route::resource('/clients','ClientsController');
	//Insert ,update ,delete task categories
	Route::resource('/taskcategories','TaskCategoriesController');
	//Insert ,update ,delete projects
	Route::resource('/projects','ProjectsController');
	//Insert ,update ,delete project categories
	Route::resource('/projectcategories','ProjectCategoriesController');
	//Show dashboard 
	Route::get('/', 'DashboardController@index')->name('home');
	//Show the colors
	Route::get('/color', 'DashboardController@color')->name('color');
	//Edit profile for user module
	Route::get('/profile','UsersController@edit_profile')->name('editprofile');
	//Update details of user module
	Route::patch('/profile/{user}','UsersController@update_profile')->name('updateprofile');
	//Upload profile of user module
	Route::post('/userprofile','UsersController@upload_profile')->name('userprofileupload');
	//Insert ,update ,delete blogs
	Route::resource('/blogs','BlogsController');
	//Show blogs for users
	Route::get('/blogs/user-blog-details/{id}','BlogsController@user_blog_details')->name('blogs.user_blog_details');
	//Get user blogs jquery
	Route::get('/blogs/users/user-blogs/','BlogsController@blogs_user')->name('blogs-user');
	//Edit blog using jquery 
	Route::get('/blogs/edit/user-blog-details/','BlogsController@edit_blog')->name('edit-blog');
	//Update blog using jquery 
	Route::post('/blogs/edit/user-blog-details/','BlogsController@update_blog')->name('update-blog');
	//Import the blog data
	Route::post('/blog-import','BlogsController@import')->name('blogs.import');
	//Export blog data
	Route::get('/blog-export','BlogsController@export')->name('blogs.export');
	//Insert ,update ,delete blog categories
	Route::resource('/blogcategories','BlogCategoriesController');
	//Insert ,update ,delete tasks
	Route::resource('/tasks','TasksController');
	//Task completed
	Route::post('/tasks/completed','TasksController@completed')->name('tasks.completed');
	//Task dropdown
	Route::get('/jquery','TasksController@dropdown')->name('dropdown');
	
	//Get task view-details
	Route::get('/jquery/{id}','TasksController@details')->name('get-task-details');
	//
	Route::get('/task-jquery/{id}','TasksController@taskdetails')->name('get-task');
	//Task logs update show 
	Route::resource('/tasks.task_logs','TaskLogsController');
	//Site setting update
	Route::resource('/site_settings','SiteSettingsController');

});
	//Show all blogs viewed by guest user
	Route::get('/blogs','Admin\BlogsController@guest_user')->name('guest_user');
	//Show detail of perticular blog viewed by guest user
	Route::get('/blogs/blog-details/{id}','Admin\BlogsController@blog_details')->name('blogs.blog_details');

Auth::routes();
