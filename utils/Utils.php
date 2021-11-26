<?php

class Utils
{

    public static function obtenerToken()
    {
        $headers  = apache_request_headers();
        $tokenAux = @$headers['Authorization'];
        return $tokenAux;
    }

    public static function obtenerTokenNg()
    {
        $headers  = self::get_nginx_headers();
        $tokenAux = @$headers['authorization'];
        return $tokenAux;
    }

    public static function get_nginx_headers($function_name = 'getallheaders')
    {

        $all_headers = [];

        if (function_exists($function_name)) {

            $all_headers = $function_name();
        } else {

            foreach ($_SERVER as $name => $value) {

                if (substr($name, 0, 5) == 'HTTP_') {

                    $name = substr($name, 5);
                    $name = str_replace('_', ' ', $name);
                    $name = strtolower($name);
                    $name = ucwords($name);
                    $name = str_replace(' ', '-', $name);

                    $all_headers[$name] = $value;
                } elseif ($function_name == 'apache_request_headers') {

                    $all_headers[$name] = $value;
                }
            }
        }
        return $all_headers;
    }

}