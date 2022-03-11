<?php

Route::group(['middleware' => 'web'], function () {
    Route::match(['get','post'],'/zyeditor/index/{a?}',"\ZyEditor\Controller\IndexController@index")
        ->middleware(\ZyEditor\ConfigMapper::get('middleware_auth') ?? '')
        ->name('zyeditor.index');
    Route::get('/zyeditor/file',"\ZyEditor\Core\FileSystem@index")->middleware(\ZyEditor\ConfigMapper::get('middleware_auth') ?? '');
});
