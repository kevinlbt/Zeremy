<?php

class Authenticator {
    
    public static function authenticate(User $user) {

        $db = DataBase::getInstance();

        $request = $db->prepare('SELECT * FROM user WHERE `username` = :username AND `password` = :password');
        $request->execute([
            'username' => $user->getUsername(), 
            'password' => $user->getPassword()
        ]);

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_class($user));

        $response = $request->fetch();
        
        if ($response === false)
            return false;
        
        $_SESSION['logged_as'] = $response->getUsername();
        $_SESSION['logged_userid'] = $response->getId();
        $_SESSION['logged_name'] = $response->getName();
        
        return $response;
    }
    
    public static function isLogged() {
        return !empty($_SESSION['logged_userid']);
    }
    
    public static function logout() {
         $_SESSION['logged_userid'] = null;
         $_SESSION['logged_as'] = null;
         $_SESSION['logged_name'] = null;
    }
    
}