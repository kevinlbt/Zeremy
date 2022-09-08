<?php

class Authenticator {
    
    //retrieve the user with username and check if exist and if password is true
    public static function authenticate(User $user) {

        $db = DataBase::getInstance();

        $request = $db->prepare('SELECT * FROM user WHERE `username` = :username ;');
        $request->execute([
            'username' => $user->getUsername(), 
        ]);

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_class($user));

        $response = $request->fetch();
        
        if ($response === false)
            return false;
            
        if (!password_verify($user->getPassword(), $response->getPassword())) 
            return false;
        
        
        $_SESSION['logged_as'] = $response->getUsername();
        $_SESSION['logged_userid'] = $response->getId();
        $_SESSION['logged_name'] = $response->getName();
        
        return $response;
    }
    
    //if user is connect
    public static function isLogged() {
        return !empty($_SESSION['logged_userid']);
    }
    
    //logout user
    public static function logout() {
         $_SESSION['logged_userid'] = null;
         $_SESSION['logged_as'] = null;
         $_SESSION['logged_name'] = null;
    }
    
}