<?php

class AuthController extends AbstractController {
    
    private static ?string $valideUserLog = null;

    public static function getValideUserLog() {

        return self::$valideUserLog;
    }

    public static function login () {
        
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            
            $user = Authenticator::authenticate(new User($_POST['username'], $_POST['password']));

            if ($user === false) {
                
                self::$valideUserLog = "indentifiant incorrecte";
                return self::render('login');

            }
            
            header('location: /articles');
        }   

        self::render('login');
    }
    
    public static function logout () {

        Authenticator::logout();
        
        header('Location: ./login');
    }
}
