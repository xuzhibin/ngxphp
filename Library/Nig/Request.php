<?php 
/**
 * @Copyright (C),
 * @Author poembro
 * @Date: 2017-11-08 12:37:46
 * @Description Request 请求参数类
 */
namespace Nig;

class Request
{
    private $_conf;
    private static $_instance;
 
    private function __construct()
    {
        $this->_conf = $_REQUEST;
    }
 
    public static function getInstance()
    {
        if (! self::$_instance)
        {
            self::$_instance = new self();
        }
    
        return self::$_instance;
    }
    
    public function get($key = NULL)
    {
        return $key ? $this->_conf[$key] : $this->_conf;
    }
    
    public function set($key, $val = NULL) 
    {
        if (is_array($key))
        {
            foreach ($key as $k => $v)
            {
                $this->set($k, $v);
            }
            return ;
        }

        if ($val === NULL) return ; 
        
        return $this->_conf[$key] = $val;
    }
}
 
