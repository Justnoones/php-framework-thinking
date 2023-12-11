<?php
namespace core;
class App
{
    protected static $datas = [];
    public static function bind ($key, $value) {
        self::$datas[$key] = $value;
    }

    public static function get ($key) {
        return self::$datas[$key];
    }
}