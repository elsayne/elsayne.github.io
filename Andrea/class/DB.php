<?php
    class DB {
        static $conn = null;

        static function getConnection() {
            $servername = "localhost";
            $username = "u540034987_SleepingFool";
            $password = ',XM&T"KQ}R6eB):';
            if (self::$conn == null) {
                try {
                    $db = new PDO("mysql:host=$servername;dbname=watchlist", $username, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conn = $db;
                    echo "Connected successfully";
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
            else{
                $db = self::$conn;
            }
            return $db;
        }
    }
?>