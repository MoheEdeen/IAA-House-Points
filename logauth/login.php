<?php
require_once 'vendor/autoload.php';


$redirectUrl = 'http://housepoints.iaa.edu.jo/home/logauth/login.php';

//Creating client request to google
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');

if(isset($_GET['code'])){
$token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);
header('Location: ../Main/core.php');


//Getting User Profile

session_start();
$gauth = new Google_Service_Oauth2($client);
$google_info = $gauth->userinfo->get();
$email = $google_info->email;
$_SESSION['email'] = $email;
$name = $google_info->name;
$_SESSION['name'] = $name;

$teachers = array("aminfarah1231@gmail.com");



if (in_array($email, $teachers)) {
    echo "You are a teacher";
}
else{
    echo "You are not a teacher";
}

echo "<br><br>";

echo "Welcome $name with email: <b>$email</b>";

}
else{
    $authUrl = $client->createAuthUrl();
    header("Location: " . $authUrl);
}

?>