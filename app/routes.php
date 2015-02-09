<?php
/*Event::listen('illuminate.query', function($sql, $bindings, $time){


    // To get the full sql query with bindings inserted
    $sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
    $full_sql = vsprintf($sql, $bindings);
   echo $full_sql.'<br>
   ';
});*/


Route::get('/',array('as'=>'home','uses'=>'HomeController@index')) ;
Route::get('courses/{id}-{slug?}/{parent_cat_id?}',array('as'=>'courses','uses'=>'CoursesController@index')) ;
Route::get('courses/detail/{id}-{slug?}',array('as'=>'courses.detail','uses'=>'CoursesController@detail')) ;
Route::get('college/{id?}-{slug?}',array('as'=>'college','uses'=>'CollegeController@index')) ;
Route::get('collegeabroad/{id?}-{slug?}',array('as'=>'collegeabroad','uses'=>'CollegeAbroadController@index')) ;

Route::get('abroad/courses/{country}/{id?}/{slug?}/{parent_cat_id?}',array('as'=>'courses.abroad','uses'=>'CoursesAbroadController@index')) ;
Route::get('abroad/course-detail/{country}/{id}-{slug?}',array('as'=>'courses.abroad.detail','uses'=>'CoursesAbroadController@detail')) ;

Route::get('articles/{id}',array('as'=>'article','uses'=>'ArticleController@articles')) ;
Route::get('article_details/{id}',array('as'=>'article.detail','uses'=>'ArticleController@articleDetails')) ;
Route::get('profile',array('as'=>'profile','uses'=>'UserController@profile')) ;
Route::get('logout',array('as'=>'logout','uses'=>'LoginController@logout')) ;
Route::get('register',array('as'=>'register','uses'=>'LoginController@register')) ;
Route::post('creatingaccount',array('before'=>'csrf','as'=>'signingUp','uses'=>'LoginController@signingUp')) ;
Route::get('login',array('as'=>'login','uses'=>'LoginController@index')) ;
Route::get('forgetpassword',array('as'=>'forgetpassword','uses'=>'LoginController@forgetpassword')) ;
Route::post('signin',array('as'=>'signin','uses'=>'LoginController@signin')) ;
Route::post('signup',array('as'=>'signup','uses'=>'LoginController@signup')) ;
Route::get('fblogin/{auth?}',array('as'=>'fblogin','uses'=>'LoginController@facebookLogin')) ;
Route::get('glogin/{auth?}',array('as'=>'glogin','uses'=>'LoginController@googleLogin')) ;
//Route::get('/authLogin',array('as'=>'authLogin','uses'=>'GoogleLoginController@login')) ;
Route::get('passwordrecovery/{token?}',array('as'=>'passwordrecovery','uses'=>'LoginController@passwordrecovery')) ;
Route::post('resetPassword',array('as'=>'resetPassword','uses'=>'LoginController@resetpassword')) ;
