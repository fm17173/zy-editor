<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="margin:0px auto 0 40px;border-radius:0px; padding:0px;">
@include('zyeditor::file_content_code')
<script type="text/javascript">
	// 关闭这个窗口
	function closeThisWindow(){
		var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
		parent.layer.close(index); //再执行关闭
	}
</script>

</body>
</html>
