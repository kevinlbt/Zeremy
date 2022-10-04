<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class WebsiteController extends AbstractController {

    private static ?array $errors = [];

    public static function getErrors () {
        
        return self::$errors;
    }
    
    private static function sanitizing ($data) {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        return $data;
        
    }

    //realisation page display all articles when is publish
    public static function publishedArticles () {
        
        $category = Category::displayCategory();

        self::renderBis('portfolio', $category);
    }
    
    //home page
    public static function home () {
        
        self::renderBis('home');
    }
    
    //contact page with php mailer
    public static function contact () {
        
        self::$errors = [];
        $success = null;

        if (Errors::checkErrorContact()) {
        
            self::$errors = Errors::checkErrorContact();
        }
        
        else {
        
            if (isset($_POST)) {
                if (isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['firstname']) && !empty($_POST['firstname'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['subject']) && !empty($_POST['subject']) 
                && isset($_POST['message']) && !empty($_POST['message'])) {
            
                    $name = self::sanitizing($_POST['name']);
                    $firstname = self::sanitizing($_POST['firstname']);
                    $email = self::sanitizing($_POST['email']);
                    $subject = self::sanitizing($_POST['subject']);
                    $message = self::sanitizing($_POST['message']);
                    
                    $mail = new PHPMailer(true);
                    
                    try { // php mailer
        
                        $mail->isSMTP(); 
                        $mail->Host = 'smtp.gmail.com';  
                        $mail->SMTPAuth = true;                               
                        $mail->Username = 'jp.postprod@gmail.com';                 
                        $mail->Password = 'eovtwhgibnmvnscl';                          
                        $mail->SMTPSecure = 'tls';                            
                        $mail->Port = 587;                                    
            
                        $mail->setFrom($email, $name, $firstname); // from who is the mail
                        $mail->addReplyTo($email, $name, $firstname); // reply option
                        $mail->addAddress('jp.postprod@gmail.com', 'Jeremy Pettre'); //box mail where the message is receive
            
            
                        $mail->isHTML(true); 
                        $mail->Subject = $subject; 
                        $mail->Body = "Message de ". $name . " " . $firstname . "<br>" . $message; 
                        $mail->AltBody = $message; 
                        $mail->SMTPDebug = 0; 
            
                        if ($mail->send()) {
                            $success = "Mail envoyé ! Merci pour votre interêt";
                        } else {
                            $success = "Echec dans l'envoi du mail";
                        }
                        
                    }
                    
                    catch (Exception $e) {
                        $erreur = $e;
                    }
                        
                }
        
            }
        }

        self::renderBis('contact', $success);
        
    }

    // about page
    public static function About () {

        self::renderBis('about');
    }

    public static function mentionslegales () {
        
        self::renderBis('mentionslegales');
    }
}
