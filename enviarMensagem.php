<?php

require_once './vendor/autoload.php';

use Twilio\Rest\Client;

$dotenv = new Dotenv\Dotenv(__DIR__);

$dotenv->load();

// Sid da sua conta e token de autenticação do twilio.com/console
$sid = getenv("TWILIO_ACCOUNT_SID");
$token = getenv("TWILIO_AUTH_TOKEN");

$twilio = new Client($sid, $token);

$codes = ["chocolate", "baunilha", "morango", "mint-chocolate-chip", "cookies-n-cream"];

$message = $twilio->messages->create("whatsapp:".getenv("MY_WHATSAPP_NUMBER2"), [
		"body" => "Seu código de sorvete é ".$codes[rand(0,4)],
		"from" => "whatsapp:".getenv("TWILIO_WHATSAPP_NUMBER")
	]
);

echo($message->sid);
