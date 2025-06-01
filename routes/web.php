<?php
Route::get('volunteer/qr/{id}', 'Frontend\HomeController@volunteer_qr')->name('volunteer_qr');

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/vision', 'HomeController@vision')->name('vision');
    Route::get('/values', 'HomeController@values')->name('values');
    Route::get('/swat', 'HomeController@swat')->name('swat');
    Route::get('/benciaries', 'HomeController@benciaries')->name('benciaries');
    Route::get('/stackholders', 'HomeController@stakeholder')->name('stackholders');
    Route::get('/ben-trip', 'HomeController@benTrip')->name('ben-trip');
    Route::get('/supports', 'HomeController@supports')->name('supports');
    Route::get('/news', 'NewsController@news')->name('news');
    Route::get('/new/{id}', 'NewsController@new')->name('new');
    Route::get('/gallery', 'NewsController@galleries')->name('gallery');
    Route::get('/videos', 'NewsController@videos')->name('videos');
    Route::get('/projects', 'ProjectController@projects')->name('projects');
    Route::get('/project/{project}', 'ProjectController@project')->name('project');
    Route::get('/membership', 'MemberShipController@membership')->name('membership');
    Route::post('/membership/store', 'MemberShipController@store')->name('membership.store');
    Route::get('contact-us', 'ContactUsController@contact')->name('contact');
    Route::post('contact-us/store', 'ContactUsController@store')->name('contact.store');
    Route::get('hawkma/{category}', 'HomeController@hawkma')->name('hawkma');
    Route::get('reports/{type}', 'HomeController@reports')->name('reports');
    Route::get('volunteer', 'VolunteerController@show')->name('volunteer');
    Route::get('volunteer-guide', 'VolunteerController@volunteerGuide')->name('guides');
    Route::post('volunteer/store', 'VolunteerController@store')->name('volunteer.store');
    Route::post('volunteers/media', 'VolunteerController@storeMedia')->name('volunteers.storeMedia');

});
