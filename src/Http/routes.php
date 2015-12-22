<?php

Route::get('folder', 'FolderController@index');
Route::get('api/files', 'FolderController@files');
Route::get('api/dirs', 'FolderController@dirs');
