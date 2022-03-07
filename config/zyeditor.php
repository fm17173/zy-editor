<?php
return [

    // 公共访问文件夹
    'public_access_dirs' => [],

    // 文件相关
    // 不可编辑文件类型 后缀名列表
    'unable_suffix' => 'pdf xls xlsx crt pem cer ppt pptx doc docx zip gz tar rar fla jar apk mp3 mp4 rmvb',
    // 用于显示图片的类型 后缀名列表
    'img_suffix' => 'jpg png jpeg gif bmp ico',
    /*
    |--------------------------------------------------------------------------
    | 中间件
    |--------------------------------------------------------------------------
    |
    | 【一般设置】登录认证，权限等，多个中间件请写在数组里面和laravel中间件使用方法一致
    |
    */
    'middleware_auth' => [], #权限中间件
];
