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

    //display all articles when is publish
    public static function publishedArticles () {
        
        $category = Category::displayCategory();

        self::renderBis('portfolio', $category);
    }
    
    public static function home () {
        
        self::renderBis('home');
    }
    
    public static function contact () {
        
        self::$errors = [];
        
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
                    
                    try {
        
                        $mail->isSMTP(); //Pour preciser que c'est du SMTP
                        $mail->Host = 'smtp.gmail.com';  // Le serveur smtp de google
                        $mail->SMTPAuth = true;                               // On active l'authentification
                        $mail->Username = 'kevin.lebot@gmail.com';                 // SMTP username
                        $mail->Password = 'rjphirgwxcbukiml';                           // Le mot de passe que vous avez récupéré
                        $mail->SMTPSecure = 'tls';                            // Parameter de sécurité mis sur TLS
                        $mail->Port = 587;                                    // Le port donne par google pour son SMTP
            
                        $mail->setFrom($email, $name, $firstname); // De qui est l' email
                        $mail->addReplyTo($email, $name, $firstname); // Option pour avoir le reply
                        $mail->addAddress('kevin.lebot@hotmail.fr', 'kevin lebot'); //La boite mail où vous voulez recevoir les mails
            
            
                        $mail->isHTML(true); //Met le mail au format HTML
                        $mail->Subject = $subject; // On parametre l'objet
                        $mail->Body = $message; // Le message pour les boites html
                        $mail->AltBody = $message; //Le message pour les boites non html
                        $mail->SMTPDebug = 0; //On désactive les logs de debug
            
                        if ($mail->send()) {
                            return $success = "Mail envoyé ! Merci pour votre interêt";
                        } else {
                            return $success = "Echec dans l'envoi du mail";
                        }
                        
                    }
                    
                    catch (Exception $e) {
                        $erreur = $e;
                    }
                        
                }
        
            }
        }
        
        self::renderBis('contact');
        
    }
}
