	Route::get('member','AdminController.php@index_member')->name('admin.member');
		//edit
	Route::get('member-edit/{id}','AdminController.php@edit')->name('admin.member-edit');
	Route::post('member-edit/{id}','AdminController.php@edit')->name('admin.member-edit');
		//delete
	Route::get('member-delete/{id}','AdminController.php@delete')->name('admin.member-delete');