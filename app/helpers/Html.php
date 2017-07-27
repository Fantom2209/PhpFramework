<?php
namespace app\helpers;

class Html
{

    public static function ActionLink($controller = 'home', $action = 'index'){

    }

    public static function ActionPath($controller = 'home', $action = 'index', $param = array()){
        $url = '/' . $controller . '/' . $action . '/';
        foreach($param as $key => $item){
            if(!is_int($key)){
                $url .= $key . ':';
            }
            $url .= $item . '/';
        }
        return $url;
    }

}