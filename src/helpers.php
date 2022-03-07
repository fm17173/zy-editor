<?php
function reflecParams($action) {
    $controller = new \ZyEditor\Core\FileSystem();
    if(!method_exists($controller,$action)){
        throw new \Exception("not found function:{$action} in FileSystem");
    }
    $method = new \ReflectionMethod('ZyEditor\Core\FileSystem', $action);
    $method_parames = $method->getParameters();
    $act_params = [];
    foreach($method_parames as $key => $param) {
        $param_name = $param->name;

        if( !empty(\ZyEditor\Core\CommonFun::params($param_name)) ){
            $act_params[$param_name] = \ZyEditor\Core\CommonFun::params($param_name);
        }else{
            break;
        }
    }
    return ['params'=>$act_params,'controller'=>$controller];
}
