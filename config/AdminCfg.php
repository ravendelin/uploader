<?php

/**
 * MysticUploader project
 * User: pavel7mikhaylov@gmail.com
 * Date: 2/13/2024
 * Time: 11:00
 */
namespace config;

class AdminCfg
{

    static protected $data = [];


    public static function addItem($newItem, $value)
    {
        $config = self::getConfig();
       
        if (!isset($config[$newItem])) {
            $config[$newItem] = $value;
            self::saveFile($config);
        }
    }

    public static function editItem($item, $newValue)
    {
        $config = self::getConfig();
        $config[$item] = $newValue;
        self::saveFile($config);
    }

    public static function getItem($item)
    {
        $config = self::getConfig();
        return $config[$item];
    }

    public static function getConfig()
    {
        if (file_exists('config/data.php')) {
            $config = [];
            // подключаем файл настроек с массивом $config
            include 'config/data.php';

            self::$data = $config;


        }
        return self::$data;
    }

    public static function saveConfig()
    {
        self::getConfig();
        if (empty(self::data || $_SESSION['admin'] === 1)) {
            if (self::saveFile(self::getArrayFromPost())) {
                echo 'saved';
            } else {
                echo 'error';
            }

        } 

    }

    private static function getArrayFromPost()
    {
            $post = input_filter_array(INPUT_POST, FILTER_FLAG_STRIP_LOW,FILTER_SANITIZE_STRING);
        if (isset($post['base']) && isset($post['loginbase']) && isset($post['passbase']) && isset($post['pwd'])) {
            $base = self::filterVars($post['base']);
            $loginbase = self::filterVars($post['loginbase']);
            $passbase = self::filterVars($post['passbase']);
            $pwd = password_hash($post['pwd'], PASSWORD_DEFAULT);
            $array = ['base' => $base, 'loginbase' => $loginbase, 'passbase' => $passbase, 'pwd' => $pwd];
            return $array;
        }
        return [];
    }

    private static function filterVars($var)
    {
        return filter_var($var, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    }

    private static function saveFile($massiv)
    {

        $text = '';
        foreach ($massiv as $key => $value) {

            $text .= '\'' . $key . '\' => \'' . $value . '\',';
        }

        $attach = '<?php $config = [' . $text . '];';
        if (file_put_contents('./config/data.php', $attach)) {
            return true;
        } else {
            return false;
        }


    }

}