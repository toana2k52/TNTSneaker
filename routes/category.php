
	Route::get('category','CategoryController@index')->name('admin.category');
	Route::get('category-del/{id}','CategoryController@del')->name('admin.category-del');
	Route::get('category-add','CategoryController@add')->name('admin.category-add');
	Route::post('category-add','CategoryController@post_add')->name('admin.category-add');
	Route::get('category-edit/{id}','CategoryController@edit')->name('admin.category-edit');
	Route::post('category-edit/{id}','CategoryController@edit')->name('admin.category-edit');
