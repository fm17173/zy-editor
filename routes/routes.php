<?php

Route::group(['middleware' => 'web'], function () {
    Route::match(['get','post'],'/zyeditor/index/{a?}/{dir_path?}',"\ZyEditor\Controller\IndexController@index")
        ->middleware(\ZyEditor\ConfigMapper::get('middleware_auth') ?? '')
        ->where('dir_path','(.*)')
        ->name('zyeditor.index');
    Route::get('/zyeditor/file',"\ZyEditor\Core\FileSystem@index");
});
