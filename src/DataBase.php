<?php

class DataBase {
    
    private static $instance;
    
    public static function getInstance () {
        
        if (!self::$instance) {
            
            try {
                self::$instance = new PDO (
                    
                    'mysql:host=db.3wa.io;port=3306;dbname=kevinlebot_CMS_articles',
                    'kevinlebot',
                    '834b8ff7f808959fbe363a1b15c177b1'
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