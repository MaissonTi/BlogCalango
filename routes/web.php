<?php


Auth::routes();
//------------------------------ GROUP MIDDLEWARE ------------------------------
Route::group(['middleware' => ['auth']], function () {

    //Route para compoenents -------------
    Route::resource('/comp', 'Components\ComponentsController');

   
    Route::get('/', 'HomeController@index')->name('home');

 //------------------------------ GROUP CADASTRO ------------------------------   
    Route::group( ['prefix' => 'cadastro'], function () {
   
        //Route Cliente -------------
        Route::resource('/cliente', 'ClienteController');

        $this->resource('/roles', 'RoleController');
        $this->resource('/users','UserController'); //---sugestão,acho mais bonito assim..
        //Route Portaria ------------
        Route::resource('/evento','EventoController');

    });


});
