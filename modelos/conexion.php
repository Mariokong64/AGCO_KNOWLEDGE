<?php

class Conexion
{

    static public function conectar()
    {

        $link = new PDO(
            "mysql:host=localhost;dbname=agco_knowledge_system",
            "root",
            ""
        );

        $link->exec("set names utf8");

        return $link;
    }
}