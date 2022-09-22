<?php

class AuthController extends AbstractController {
    
    private static ?array $valideUserLog = [];

    public static function getValidUserLog() {

        return self::$valideUserLog;
    }

    //sanitized input data 
    private static function sanitizing ($data) {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        return $data;
        
    }
    
    //login user
    public static function login () {
        
        if (isset($_POST['username']) && isset($_POST['password'])) {
            
            if (Errors::checkErrorAuth()) {
        
                self::$valideUserLog = Errors::getErrors();
            
            }
            
            else {
                
                $username = self::sanitizing($_POST['username']);
                $password = self::sanitizing($_POST['password']);
                
                $user = Authenticator::authenticate(new User($username,$password));
                
                if ($user === false) {
                    
                    self::$valideUserLog[] = "indentifiant incorrecte";
                    return self::render('login');
    
                }
                
                else {
                    
                    header('location: /articles');
                }
            }
        }   

        self::render('login');
    }
    
    //logout user
    public static function logout () {

        Authenticator::logout();
        
        header('Location: /login');
    }
}

