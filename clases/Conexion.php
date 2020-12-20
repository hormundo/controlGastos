<?php
    class Conexion {
        private static $conn = null;

        public function __construct() {}

        public static function conexion()
        {
            if (!defined('USER')) {
                define('USER', 'arman');
            }
            if (!defined('PASSWORD')) {
                define('PASSWORD', '123456');
            }
            if (!defined('HOST')) {
                define('HOST', 'localhost:3307');
            }
            if (!defined('DATABASE')) {
                define('DATABASE', 'controlGastos');
            }

            try {
                self::$conn = new PDO('mysql:host=' .HOST. ';dbname=' .DATABASE, USER, PASSWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);   
                self::createTableGatos();
                self::createTableIngresos();
                return self::$conn;

            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        private static function createTableGatos() {
            try 
            {
                $query="CREATE TABLE IF NOT EXISTS gastos
                    (
                        `codigo_g` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `concept` varchar(50) NOT NULL,
                        `category` varchar(20) NOT NULL,
                        `day` int(2) NOT NULL,
                        `month` varchar(15) NOT NULL,
                        `year` int(4) NOT NULL,
                        `value` decimal(5,2) UNSIGNED DEFAULT NULL
                    )";
                self::$conn->exec($query);
            } 
            catch(PDOException $e)
            {
                echo "Error al crear la tabla Productos" . $e->getMessage();
            }
        }

        private static function createTableIngresos() {
            try 
            {
                $query="CREATE TABLE IF NOT EXISTS ingresos
                    (
                        `codigo_i` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `concept` varchar(50) NOT NULL,
                        `month` varchar(15) NOT NULL,
                        `year` int(4) NOT NULL,
                        `value` decimal(5,2) UNSIGNED DEFAULT NULL
                    )";
                self::$conn->exec($query);
            } 
            catch(PDOException $e)
            {
                echo "Error al crear la tabla Productos" . $e->getMessage();
            }
        }
    }
?>