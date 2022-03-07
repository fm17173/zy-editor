<?php
namespace ZyEditor;
/**
 * @author zysmile
 * @desc 在线编辑器 配置器
 * url: http://www.zysmile.com
 * Class ConfigMapper
 * @package ZyEditor
 * @date 2022-3-3
 */
class ConfigMapper
{
    private static $_instance = null;
    private $public_access_dirs;
    private $middleware_auth;
    private $unable_suffix;
    private $img_suffix;
    public function __construct()
    {

    }

    public static function instance()
    {
        if (self::$_instance === null) {
            self::$_instance = (new self())->applyCommonConfig();
        }

        return self::$_instance;
    }

    private function applyCommonConfig(){
        $config = app('config');
        $this->public_access_dirs = $config->get('zyeditor.public_access_dirs');
        $this->middleware_auth = $config->get('zyeditor.middleware_auth');
        $this->unable_suffix = $config->get('zyeditor.unable_suffix');
        $this->img_suffix = $config->get('zyeditor.img_suffix');
        return $this;
    }

    public static function get($property)
    {
        return self::instance()->{$property};
    }

    public static function set($property, $value)
    {
        self::instance()->{$property} = $value;
    }

}
