<?php 
    require_once(__DIR__ . '/vendor/autoload.php');
    use \Mailjet\Resources;
    define('API_USER', 'edd198b5e0d67b501ef6532f7127cb27');
    define('API_LOGIN', 'bd143a79fb84d79513c2f40747b16ac2');
    $mj = new \Mailjet\Client(API_USER, API_LOGIN,true,['version' => 'v3.1']);


    if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])){
        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "embiteye01@gmail.com",
                'Name' => "ebizview"
                ],
                'To' => [
                [
                    'Email' => "embiteye01@gmail.com",
                    'Name' => "ebizview"
                ]
                ],
                'Subject' => "Demande de renseignement sur ebizview",
                'TextPart' => "$email, $message", 
               
            ]
            ]
        ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
            echo "Email envoyé avec succès !";
        }
        else{
            echo "Email non valide";
        }

    } else {
        header('Location: index.php');
        die();
    }