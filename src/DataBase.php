<?php

class DataBase {
    
    private static $instance;
    
    public static function getInstance () {
        
        if (!self::$instance) {
            
            try {
                self::$instance = new PDO (
                    
                    'mysql:host=127.0.0.1;dbname=cms_articles',
                    'root',
                    ''
                );
                
            }catch (Exception $err){
                
                var_dump($err);
            }
        }
        
        return self::$instance;
        
    }

    public static function closeInstance () {

        self::$instance = null;
    }
    
}