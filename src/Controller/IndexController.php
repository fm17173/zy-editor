<?php


namespace ZyEditor\Controller;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZyEditor\ConfigMapper;
use ZyEditor\Core\App;
use ZyEditor\Core\CommonFun;
use ZyEditor\Facades\FileSystem;

class IndexController extends Controller
{
    public function index(Request $request)
    {
       // Autoloader::register();
       define('BASE_DIR', dirname(__DIR__) );
       // App::run();
        $action = $request->a;
        if ($request->isMethod('get')) {
            switch ($action) {
                case 'get_file':
                    $route_file_path = $request->file_path;
                    $info = FileSystem::get_file($route_file_path);
                    $file_path = $info['file_path'];
                    $file_content = $info['file_content'];
                    $file_key = $info['file_key'];
                    $file_info = $info['file_info'];
                    return view('zyeditor::file_content',compact('file_path','file_content','file_key','file_info'));
                    break;
                case 'show_upload_file':
                    $dir_path = $request->dir_path;
                    return view('zyeditor::upload_file',compact('dir_path'));
                    break;
                case 'download_file_or_dir':
                    $dir_path = $request->dir_path;
                    FileSystem::$action($dir_path);
                    break;
            }

            return view('zyeditor::index');
        } else {
            $info = reflecParams($action);
            $controller = $info['controller'];
            $act_params = $info['params'];
            call_user_func_array(array($controller, $action), $act_params);

        }

    }
}
