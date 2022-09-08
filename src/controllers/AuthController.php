<?php

class AuthController extends AbstractController {
    
    private static ?string $valideUserLog = null;

    public static function getValidUserLog() {

        return self::$valideUserLog;
    }

    //login user
    public static function login () {
        
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            
            $user = Authenticator::authenticate(new User($_POST['username'],$_POST['password']));
            
            if ($user === false) {
                
                self::$valideUserLog = "indentifiant incorrecte";
                return self::render('login');

            }
            
            header('location: /Zeremy-website/articles');
        }   

        self::render('login');
    }
    
    //logout user
    public static function logout () {

        Authenticator::logout();
        
        header('Location: /Zeremy-website/login');
    }
}

