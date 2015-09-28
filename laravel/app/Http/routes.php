<?php

/*Route::get('/', 'PagesController@index');
Route::controllers([
	'accounts' => 'AccountsController'
]);
Route::get("/accounts/{id}/edit/", "AccountsController@edit");
Route::get('/about/', 'PagesController@about');
Route::resource("/documents/", "DocumentsController");*/

Route::post("/accounts/{id}/edit", "AccountsController@edit");
Route::get("/accounts/", "AccountsController@index");

Route::get("/contacts/", "ContactsController@index");
Route::post("/contacts/{id}/edit", "ContactsController@edit");
Route::post("/contacts/csv_import", "ContactsController@csv_import");
Route::get("/contacts/csv_import_check_process", "ContactsController@csv_import_check_process");
Route::get("/contacts/stop_process", "ContactsController@stop_process");


Route::post("/project/{id}/edit", "ProjectController@edit");
Route::get("/project/", "ProjectController@index");

Route::post("/products/{id}/edit", "ProductsController@edit");
Route::get("/products/", "ProductsController@index");

Route::post("/leads/{id}/edit", "LeadsController@edit");
Route::get("/leads/", "LeadsController@index");

Route::post("/documents/{id}/edit", "DocumentsController@edit");
Route::get("/documents/", "DocumentsController@index");
Route::get("/documents/{id}/get_fileLocationType", "DocumentsController@get_fileLocationType");

Route::get("/error/", "ErrorController@index");