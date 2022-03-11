<!DOCTYPE html>
<html>

<!-- source http://www.scnoob.com More templates http://www.scnoob.com/moban -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>zyeditor-laravel</title>

    <link rel="stylesheet" type="text/css" href="{{asset('zyeditor/lib/b-ui/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('zyeditor/lib/b-ui/fonts/line-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('zyeditor/lib/b-ui/css/main.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('zyeditor/lib/b-ui/css/responsive.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-xl-6 m-b-10 m-auto">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">文件上传</h4>
                    <strong class="alert">文件位置:[{{ $dir_path }}]</strong>
                </div>
                <div class="card-body">
                    <p class="card-description">服务器上传配置信息 <code>【post最大尺寸:<?=ini_get('post_max_size')?>】</code> <code>【上传最大文件尺寸:<?=ini_get('upload_max_filesize')?>】</code></p>
                    <div class="mb-1 mt-0">
                        <label for="file_folder" class="btn btn-secondary"><input type="file" id="file_folder" class="input_files" style="width:0;height: 0;" name='files[]' webkitdirectory>选择文件夹</label>
                        <label for="file_one" class="btn btn-secondary"><input type="file" id="file_one" name='files2[]' class="input_files" style="width:0;height: 0;" multiple />选择文件</label>
                    </div>
                    <p class="text-muted m-b-20 box-content m-t-20">
                        当前上传信息 <code>剩余上传文件数:</code><code id="now_num">0</code>
                        <button type="button" onclick="clear_files()" class="btn btn btn-inverse-danger m-l-10">清空文件列表</button>
                    </p>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>文件名称</th>
                                <th>大小<code>(MB)</code></th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody id="tbl_file_list_tbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<script type="text/javascript" src="{{ asset('zyeditor/lib/jquery/1.9.1/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('zyeditor/js/upload.js') }}"></script>
<script src="{{ asset('zyeditor/lib/b-ui/js/main.js') }}"></script>
<script type="text/javascript">
    var base_url = '{{ route('zyeditor.index') }}';
</script>
<script>
    // 待上传文件列表
    var files = [];
    // 待上传文件的服务器文件夹路径
    var new_path = '{{ $dir_path }}';
    var base_url = '{{ route('zyeditor.index') }}';

    $(function(){
        $(".input_files").change(function(){
            var file_length = this.files.length;
            for(var i=0; i<file_length ;i++){
                add_file(this.files[i]);
            }
            upload_file();
        });
    })
</script>
</body>

<!-- source http://www.scnoob.com More templates http://www.scnoob.com/moban -->
</html>
