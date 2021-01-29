<?php 
/**
 * @Copyright (C),
 * @Author poembro
 * @Date: 2017-11-08 12:37:46
 * @Description Request 请求参数类
 */
namespace Ngx;

class Log
{ 

    /**
     * 日志
     * @var array
     * @access private
     */
    private static $log = [];
    
    /**
     * @desc 添加语句执行信息
     * @access public
     * @param string $sql sql语句
     * @return void
     */
    public static function addQuery($msg, $classname)
    {
        array_push(self::$log, [$msg,  $classname]);
    }
    
    /**
     * @desc 获取语句执行信息
     * @access public
     * @return void
     */
    public static function getQuery()
    {
        return self::$log;
    }

    public static function outlog($filename)
    { 
        $logarr = static::getQuery();
        if (empty($logarr)) 
        {
            return false;
        }
        
        file_put_contents($filename, print_r($logarr, true) . "\n", FILE_APPEND);
        return true;
    }
}
 
