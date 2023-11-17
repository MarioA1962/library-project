<?php

class ConexionBD
{
    public static function cBD()
    {
        $bd = new PDO("mysql:host=localhost;dbname=libreria", "root", "");
        $bd->exec("set names utf8");
        return $bd;
    }
}
