<?php

class Conexao {

    private static $instance;

    private function __construct() {
        //
    }

    public static function getInstance(): PDO {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=inside", "root", "lljag8v4");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            }
        }
        return self::$instance;
    }

}

?>
