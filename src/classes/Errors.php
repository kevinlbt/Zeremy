<?php


class Errors {
    
    private static ?array $errors = [];
    
    public static function getErrors () {
        
        return self::$errors;
    }
    
    public static function checkErrorArticle () {
        
        self::$errors = [];
        
        if (isset($_POST) && !empty($_POST)) :
        
            if (!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{25,150}$#i", $_POST['title'])) {
                        
                self::$errors[] = 'Le titre doit comporter entre 25 et 150 caractères';
            }
            
            if (!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{11,11}$#i", $_POST['link'])) {
                        
                self::$errors[] = " l'identifiant doit comporter 11 caractères";
            }
            
            if (isset($_POST['title']) && empty($_POST['title'])) {

                self::$errors[] = 'Il te faut un titre !';
            
            }
            if (isset($_POST['link']) && empty($_POST['link'])) {
                
                self::$errors[] = 'Il te faut un identifiant pour ta vidéo !';
            }
                
            if (!isset($_POST['category'])) {
             
                self::$errors[] = 'il faut préciser au moins une categorie pour ta vidéo';
            }
            
            if (count(self::$errors) > 0){
                
                return self::$errors;
            }
        
        endif;
        
    }
    
    public static function checkErrorAuth () {
        
        self::$errors = [];
        
        if (isset($_POST) && !empty($_POST)) :
            
            if (isset($_POST['username']) && empty($_POST['username'])) {

                self::$errors[] = 'Il te faut un identifiant';
            
            }
            if (isset($_POST['password']) && empty($_POST['password'])) {
                
                self::$errors[] = 'Il te faut un mot de passe';
            }
            
            if (count(self::$errors) > 0){
                
                return self::$errors;
            }
        
        endif;
        
    }
    
    public static function checkErrorContact () {
        
        self::$errors = [];
        
        if (isset($_POST) && !empty($_POST)) :
            
            if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                
                self::$errors[] = "l'email n'est pas valide";
            }
            
            if (isset($_POST['name']) && empty($_POST['name']) || strlen($_POST['name']) < 2) {

                self::$errors[] = "Le nom n'est pas valide ou trop court";
            
            }
            if (isset($_POST['firstname']) && empty($_POST['firstname']) || strlen($_POST['firstname']) < 2) {
                
                self::$errors[] = "Le prénom n'est pas valide ou trop court";
            }
                
            if (isset($_POST['subject']) && empty($_POST['subject'])) {
                
                self::$errors[] = "Il faut préciser le sujet";
            }
            
            if (isset($_POST['message']) && empty($_POST['message']) || strlen($_POST['message']) < 2) {
                
                self::$errors[] = "Le message n'est pas valide ou trop court";
            }
            
            if (count(self::$errors) > 0){
                
                return self::$errors;
            }
            
        endif;
    }

}