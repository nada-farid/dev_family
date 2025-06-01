<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 

Route::get('volunteer/login','Volunteer\AuthController@login_form')->name('volunteer.login_form');
Route::post('volunteer/login','Volunteer\AuthController@login')->name('volunteer.login');

Route::group(['prefix' => 'volunteer', 'as' => 'volunteer.', 'namespace' => 'Volunteer', 'middleware' => ['volunteer']], function () {

    Route::get('home', 'HomeController@index')->name('home'); 

    // Volunteer Tasks
    Route::delete('volunteer-tasks/destroy', 'VolunteerTasksController@massDestroy')->name('volunteer-tasks.massDestroy');
    Route::post('volunteer-tasks/finish', 'VolunteerTasksController@finish')->name('volunteer-tasks.finish');
    Route::get('volunteer-tasks/qr/{id}', 'VolunteerTasksController@qr')->name('volunteer-tasks.qr');
    Route::get('volunteer-tasks/status/{id}/{status}', 'VolunteerTasksController@status')->name('volunteer-tasks.status');
    Route::post('volunteer-tasks/media', 'VolunteerTasksController@storeMedia')->name('volunteer-tasks.storeMedia');
    Route::post('volunteer-tasks/ckmedia', 'VolunteerTasksController@storeCKEditorImages')->name('volunteer-tasks.storeCKEditorImages');
    Route::resource('volunteer-tasks', 'VolunteerTasksController'); 

    
    Route::post('volunteers/media', 'VolunteersController@storeMedia')->name('volunteers.storeMedia');
    Route::post('volunteers/ckmedia', 'VolunteersController@storeCKEditorImages')->name('volunteers.storeCKEditorImages');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        // Change password 
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');  
    });

});
