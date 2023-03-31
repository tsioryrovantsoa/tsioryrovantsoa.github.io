<?php

$array = array("name" => "", "email" => "", "message" => "", "nameError" => "", "emailError" => "", "messageError" => "", "isSuccess" => false);
$emailTo = "tsioryrovantsoa@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array["name"] = test_input($_POST["name"]);
    $array["email"] = test_input($_POST["email"]);
    $array["message"] = test_input($_POST["message"]);
    $array["isSuccess"] = true;
    $emailText = "";

    if (empty($array["name"])) {
        $array["nameError"] = "<i class='bi bi-exclamation-triangle-fill'></i> Veuillez saisir votre nom.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Nom : {$array['name']}\n";
    }

    if (!isEmail($array["email"])) {
        $array["emailError"] = "<i class='bi bi-exclamation-triangle-fill'></i> Veuillez saisir un e-mail valide.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "E-mail: {$array['email']}\n";
    }

    if (empty($array["message"])) {
        $array["messageError"] = "<i class='bi bi-exclamation-triangle-fill'></i> Veuillez saisir votre message.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Message: {$array['message']}\n";
    }

    if ($array["isSuccess"]) {
        $headers = "From: hello@tsioryrakotoarimalala.com\r\n";
        $headers .= "Reply-To: {$array['email']}\r\n";
        $headers .= "Return-Path: {$array['email']}\r\n";
        //$headers = "From: hello <hello@tsioryrakotoarimalala.com>\r\nReply-To: {$array['email']}";
        mail($emailTo, "Hello - Message de votre site", $emailText, $headers);
    }

    echo json_encode($array);
}

function isEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
