<?php
namespace ZyEditor\Facades;
use Illuminate\Support\Facades\Facade;

class FileSystem extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sys';
    }
}
