<?php


namespace ZyEditor\Core;
use App\Http\Controllers\Controller;

use ZyEditor\ConfigMapper;

class FileSystem extends Controller
{

    // 获取目录列表
    public function dir_list($dir_path = '')
    {
        if(empty($dir_path)){
            $dir_path = ConfigMapper::get('public_access_dirs');
        }
        if( empty($dir_path) ){
            CommonFun::arr2Json(Jstree::format_item('该用户没有可访问文件',null,false,'folder'));
        }
        CommonFun::arr2Json(Jstree::getDir($dir_path));
    }

    // 获取文件
    public function get_file($file_path)
    {

        $file_info = File::getFileInfo($file_path);
        if( isset( $file_info['extension']) && stripos(ConfigMapper::get('unable_suffix'), $file_info['extension']) !== false ){
            echo '该文件不可编辑';
            exit;
        }
        $file_content = File::getFileContent($file_path);
        if( isset( $file_info['extension']) && stripos(ConfigMapper::get('img_suffix'), $file_info['extension']) !== false ){
            //输出图片
            $base64_img = DIRECTORY_SEPARATOR . CommonFun::base64_encode_image($file_path);
            echo '<img style="max-width: 100%;" src="'.$base64_img.'"/>';
            exit;
        }
        $file_key = File::getFileKey($file_path);
        return [
            'file_path' => $file_path,
            'file_content' => $file_content,
            'file_key' => $file_key,
            'file_info' => $file_info,
        ];
        //return view('zyeditor::file_content',compact('file_path','file_key','file_info'));
        //CommonFun::view('file_content',compact('file_path','file_content','file_key','file_info'));
    }

    // 保存文件
    public function save_file($file_path,$file_key,$file_content='')
    {
        if( File::checkFileKey($file_path,$file_key) && File::setFileContent($file_path, $file_content) ){
            $file_key = File::getFileKey($file_path);
            CommonFun::respone_json('success',compact('file_key'));
        }else{
            CommonFun::respone_json('写入文件 ['.$file_path.'] 失败,未知错误','',200);
        }
    }

    /**
     * 重命名文件
     * @param $path
     * @param $name
     */
    public function rename_node($path, $name)
    {
        if($new_path = File::renameFileOrDir($path,$name)){
            CommonFun::respone_json("重命名[$name]成功",['new_path'=>$new_path]);
        }else{
            CommonFun::respone_json("重命名[$name]失败",'',200);
        }
    }

    /**
     * 新建一个节点包括新建文件夹，新建文件
     * @param $type
     * @param $path
     * @param $name
     */
    public function create_node($type, $path, $name)
    {
        if($type == 'folder'){
            if( $new_path = File::createDir($path.'/'.$name) ){
                CommonFun::respone_json("创建目录[$name]成功",['new_path'=>$new_path]);
            }else{
                CommonFun::respone_json("创建目录[$name]失败",'',200);
            }
        }else if($type == 'file'){
            if( $new_path = File::createFile($path.'/'.$name) ){
                CommonFun::respone_json("创建文件[$name]成功",['new_path'=>$new_path]);
            }else{
                CommonFun::respone_json("创建文件[$name]失败");
            }
        }else{
            CommonFun::respone_json("类型 [$type] 无法进行创建",'',200);
        }
    }

    /**
     * 删除操作，包括目录下的所有文件或单个文件
     * @param $path
     * @param $type
     */
    public function delete_node($path, $type)
    {
        if($type == 'file'){
            if(File::deleteFile($path)){
                CommonFun::respone_json("删除文件[$path]成功");
            }else{
                CommonFun::respone_json("删除文件[$path]失败",'',300);
            }
        }else if($type == 'folder'){
            if(File::deleteDir( $path )){
                CommonFun::respone_json("删除目录[$path]成功");
            }else{
                CommonFun::respone_json("删除目录[$path]失败",'',301);
            }
        }else{
            CommonFun::respone_json("节点类型未知,无法删除",'',301);
        }
    }

    /**
     * 复制文件
     * @param $from_path
     * @param $to_path
     * @param $type
     */
    public function copy_node($from_path , $to_path , $type)
    {
        if($type == 'folder'){
            if( $new_path = File::copyDir($from_path, $to_path) ){
                CommonFun::respone_json("复制目录到[$to_path]成功");
            }else{
                CommonFun::respone_json("复制目录到[$to_path]失败",'',200);
            }
        }else if($type == 'file'){
            if( $new_path = File::copyFile($from_path, $to_path) ){
                CommonFun::respone_json("复制文件到[$to_path]成功");
            }else{
                CommonFun::respone_json("复制文件到[$to_path]失败");
            }
        }else{
            CommonFun::respone_json("类型 [$type] 无法复制",'',200);
        }
    }

    /**
     * 剪切操作
     * @param $old_path
     * @param $move_path
     */
    public function move_node($old_path, $move_path)
    {
        if($new_path = File::moveFileOrDir($old_path, $move_path)){
            CommonFun::respone_json("移动到[$move_path]成功",['new_path'=>$move_path]);
        }else{
            CommonFun::respone_json("移动到[$move_path]失败",'',200);
        }
    }

    /**
     * 文件上传
     * @param $path
     */
    public function upload_file($path)
    {
        if(!count($_FILES)){
            CommonFun::respone_json("服务器未接收到文件或文件过大",'',600);
        }
        $fail_file = [];
        foreach($_FILES as $key => $file){
            if( strpos($key,'/') !== false ){
                $new_path = $path.'/'.pathinfo($key,PATHINFO_DIRNAME);
            }else{
                $new_path = $path;
            }
            if(!File::uploadFile($new_path, $file)){
                array_push($fail_file,$key);
            }
        }
        CommonFun::respone_json("上传文件已完成",['error_list'=>$fail_file]);

    }

    // 下载文件或文件夹
    public function download_file_or_dir($path)
    {
        File::downloadFileOrDir($path);
    }

}
