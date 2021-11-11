<?php
use Firebase\JWT\JWT;

require_once 'vendor/autoload.php';
require_once 'config/secrets.php';

class Auth
{
    //const $secret_key = ;
    private static $encrypt = ['HS256'];
    private static $aud     = null;

    public static function SignIn($data)
    {
        $time = time();

        $token = [
            'exp' => $time + (120 * 60 * 10),
            'aud' => self::Aud(),
            'data' => $data,
        ];

        return JWT::encode($token, constant('SECRET_JWT'));
    }

    public static function Check($token)
    {
        if (empty($token)) {
            throw new Exception("Invalid token supplied.");
        }

        $decode = JWT::decode(
            $token,
            constant('SECRET_JWT'),
            self::$encrypt
        );

        if ($decode->aud !== self::Aud()) {
            throw new Exception("Invalid user logged in.");
        }
    }

    public static function GetData($token)
    {
        return JWT::decode(
            $token,
            constant('SECRET_JWT'),
            self::$encrypt
        )->data;
    }

    private static function Aud()
    {
        $aud = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud);
    }
}