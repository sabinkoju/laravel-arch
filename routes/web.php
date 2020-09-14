<?php

Auth::routes();
Route::get('/', function () {
    return Redirect::to('/home');
});
//Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::prefix('roles')->group(function () {
        Route::resource('/menu', 'Roles\MenuController');
        Route::get('/menu/menuControllerChangeStatus/{id}', 'Roles\MenuController@changeStatus');
        Route::resource('/group', 'Roles\UserGroupController');
        Route::get('/roleAccessIndex', 'Roles\RoleAccessController@index');
        Route::get('roleChangeAccess/{allowId}/{id}', 'Roles\RoleAccessController@changeAccess');
    });

    Route::resource('/user', 'UserController');
    Route::get('/user/status/{id}', 'UserController@status');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('profile/profilePic', 'UserController@profilePic');
    Route::post('/profile/password', 'UserController@password');

    Route::prefix('configurations')->group(function () {
        Route::resource('/designation', 'Configurations\DesignationController');
        Route::resource('/department', 'Configurations\DepartmentController');
        Route::resource('/fiscalYear', 'Configurations\FiscalYearController');
        Route::get('/fiscalYear/status/{id}', 'Configurations\FiscalYearController@status');
        Route::resource('/country', 'Configurations\CountryController');
        Route::get('/country/status/{id}', 'Configurations\CountryController@status');
        Route::resource('/pradesh', 'Configurations\PradeshController');
        Route::resource('/muniType', 'Configurations\MuniTypeController');
        Route::resource('/district', 'Configurations\DistrictController');
        Route::resource('/municipality', 'Configurations\MunicipalityController');
        Route::resource('/officeType', 'Configurations\OfficeTypeController');

        Route::resource('/office', 'Configurations\OfficeController');
        Route::get('/office/status/{id}', 'Configurations\OfficeController@status');
    });

    Route::prefix('logs')->group(function () {
        Route::get('/loginLogs', 'LogController@loginLogs');
        Route::get('/failLoginLogs', 'LogController@failLogin');
    });

    Route::resource('feedback', 'FeedbackController');

    // MyController Backend
    Route::prefix('mytasks')->group(function () {
        Route::resource('/news', 'Backend\NewsController');
        Route::get('/news/status/{id}', 'Backend\NewsController@status');


        Route::resource('/posts', 'Backend\PostController');
        Route::get('/posts/status/{id}', 'Backend\PostController@status');

        Route::resource('/events', 'Backend\EventController');
        Route::get('/events/status/{id}', 'Backend\EventController@status');

        Route::resource('/pages', 'Backend\PageController');
        Route::get('/pages/status/{id}', 'Backend\PageController@status');

        Route::resource('/notice', 'Backend\NoticeController');
        Route::get('/notice/status/{id}', 'Backend\NoticeController@status');

        Route::resource('/navbarMenu', 'Backend\NavbarMenuController');
        Route::get('/navbarMenu/status/{id}', 'Backend\NavbarMenuController@status');

        // Route::get('/home', 'Backend\NavbarMenuTypeController@navView')->name('navView');
        Route::resource('/navbarMenuType', 'Backend\NavbarMenuTypeController');
        Route::resource('/gallery', 'Backend\GalleryController');
        // Route::get('gallery/delete/{id}', 'GalleryController@destroy');
        Route::resource('/galleryImage', 'Backend\GalleryImageController');
        Route::get('/galleryImage/status/{id}', 'Backend\GalleryImageController@status');
    });
});

// MyController Frontend
Route::get('/home', 'Frontend\NavbarMenuTypeController@navView')->name('navView');
Route::get('/home/news', 'Frontend\NewsController@frontNewsView')->name('frontNewsView');
Route::get('/home/post', 'Frontend\PostController@postView')->name('postView');
Route::get('/{slug}', 'Frontend\NavbarMenuController@index')->name('navbarView');
Route::get('/page/{slug}', 'Frontend\PageController@index')->name('pageView');
