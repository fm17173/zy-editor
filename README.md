本项目简介：该项目是是laravel 版本下的在线代码编辑器，实现在浏览器中对服务器代码进行在线编辑和查看。支持 自定义中间件，配置文件，支持laravel 5.5 - laraavel8  版本

# Zyeditor-laravel 扩展包  基于laravel 最新8x版本开发


# 界面
![编辑目录及文件](http://www.zysmile.com/home/images/zyeditor.png "laravel在线代码编辑器扩展包")
# 编辑器快捷键
```php
查询错误 : Alt-E
查询报错详情 : Alt-Shift-E
全选内容 : Ctrl-A
转到行 : Ctrl-L
折叠 : Alt-L|Ctrl-F1
打开 : Alt-Shift-L|Ctrl-Shift-F1
块折叠 : F2
折叠块 : Alt-F2
折叠其他 : Alt-0
打开全部 : Alt-Shift-0
查询下一个 : Ctrl-K
查询上一个 : Ctrl-Shift-K
选择或查询下一个 : Alt-K
选择或查询上一个 : Alt-Shift-K
查找 : Ctrl-F
重写 : Insert
开始选择 : Ctrl-Shift-Home
取消选择 : Ctrl-Home
选择上 : Shift-Up
父标签 : Up
选择结束 : Ctrl-Shift-End
定位末行 : Ctrl-End
选择下 : Shift-Down
向下 : Down
选择字左边 : Ctrl-Shift-Left
转到字左边 : Ctrl-Left
选中左边内容 : Alt-Shift-Left
光标到左边 : Alt-Left|Home
向左选择 : Shift-Left
向左 : Left
选择字右边 : Ctrl-Shift-Right
转到字右边 : Ctrl-Right
选中右边内容 : Alt-Shift-Right
光标到右边 : Alt-Right|End
向右选择 : Shift-Right
向右 : Right
向下选中代码块 : Shift-Pagedown
转到下一个代码块 : Pagedown
向上选中代码块 : Shift-Pageup
转到上一个代码块 : Pageup
向上滚动 : Ctrl-Up
向下滚动 : Ctrl-Down
向左选中行内容 : Shift-Home
取消向左选中行内容 : Shift-End
光标定位多条 : Ctrl-Alt-E
补充选中 : Ctrl-Shift-E
跳转到匹配 : Ctrl-\|Ctrl-P
选择匹配 : Ctrl-Shift-\|Ctrl-Shift-P
扩展匹配 : Ctrl-Shift-M
删除行 : Ctrl-D
复制粘贴当前行 : Ctrl-Shift-D
行排序 : Ctrl-Alt-S
注释行 : Ctrl-/
块包围注释 : Ctrl-Shift-/
向上修改数字 : Ctrl-Shift-Up
向下修改数字 : Ctrl-Shift-Down
替换 : Ctrl-H
撤销 : Ctrl-Z
返回 : Ctrl-Shift-Z|Ctrl-Y
向上添加行 : Alt-Shift-Up
上移动线 : Alt-Up
向下添加行 : Alt-Shift-Down
下移动线 : Alt-Down
删除 : Delete
退格键 : Shift-Backspace|Backspace
剪切或删除 : Shift-Delete
移至行开始 : Alt-Backspace
删除行至结束 : Alt-Delete
删除行开始 : Ctrl-Shift-Backspace
删除行内容至末尾 : Ctrl-Shift-Delete
删除字左 : Ctrl-Backspace
删除字右 : Ctrl-Delete
向左缩进 : Shift-Tab
向右缩进 : Tab
向左块缩进 : Ctrl-[
向左右缩进 : Ctrl-]
相邻位置转换 : Alt-Shift-X
转大写 : Ctrl-U
转小写 : Ctrl-Shift-U
选中行 : Ctrl-Shift-L
打开命令面板 : F1
上面添加光标 : Ctrl-Alt-Up
下面添加光标 : Ctrl-Alt-Down
在上面添加光标 : Ctrl-Alt-Shift-Up
在下面添加光标 : Ctrl-Alt-Shift-Down
选择前 : Ctrl-Alt-Left
选择后 : Ctrl-Alt-Right
选择下一步之前 : Ctrl-Alt-Shift-Left
选择下一步之后 : Ctrl-Alt-Shift-Right
分割选区切换为行 : Ctrl-Alt-L
格式化 : Ctrl-Alt-A
查询全部 : Ctrl-Alt-K
保存 : Ctrl-S
关闭 : Ctrl-W
退出 : Esc
到下一行 : Shift-Return
当前选中全部 : Alt-J
设置菜单 : Ctrl-Q
快捷键使用 : Ctrl-Alt-H
```
# 代码自动补全
# 功能
- 基于Jstree的文件及文件夹查看、添加、删除、移动、复制操作

- 文件内容在线查看和编辑

- 文件及文件夹上传

  

# 目录

	zyeditor-laravel/
		├── src       // 应用文件
			├── Controller // 业务处理
			├── Core       // 核心文件
			├── Facades    // 门面
	
			├── Cache      // 缓存文件
		├── routes     
			|--- routes.php  // 路由文件
		├── config    
			|--- zyeditor.php  //配置文件
		├── public       // 前端静态资源文件
		├── views   // 前端视图文件

# 使用
php 版本要求 >= 7.0.0
-  步骤1：使用   composer require zysmile/zyeditor-laravel  安装本插件包

- 步骤2：发布配置文件：php artisan zyeditor:publish

 可选-- 低于laravel 5.5 版本需要添加服务提供者 在 config/app.php  添加
 ZyEditor\ZyEditorServiceProvider::class

- 可选项--配置中间件，本扩展包支持自定义中间件，可以结合权限使用 具体使用查看配置文件说明！

- 访问路由：http:/域名/zyeditor/index
  
# 注意
1. 该项目只是用于学习、开发及测试阶段。安全性，效率等问题还有待提高。
2. 使用功能详细的配置项功能可以在 laravel 框架根目录 config/zyeditor.php  中查看配置

# 
更多开源组件、项目请走传送门

个人博客地址：http://www.zysmile.com


# 感谢
感谢 [jQuery](https://github.com/jquery/jquery) 、[ace](https://github.com/ajaxorg/ace) 、 [jstree](https://github.com/vakata/jstree) 、 [layer](https://github.com/sentsin/layer) 、[H-ui 前端框架](http://www.h-ui.net/) 、[adminer](https://github.com/vrana/adminer)
