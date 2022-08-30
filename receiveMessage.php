<?php

require_once './vendor/autoload.php';
//use Twilio\Twiml;
use Twilio\TwiML\MessagingResponse;
//$response = new Twiml;
$response = new MessagingResponse();

$guess = $_REQUEST['Body'];

$pick = rand(1, 5);

if (!in_array($guess, [1, 2, 3, 4, 5]))
    $response->message("Olá! Estou pensando em um número entre 1 e 5 - tente adivinhar!");
else if ($guess == $pick)
    $response->message("Sim! Você adivinhou!");
else
    $response->message("Não, na verdade foi $pick - Escolha um novo número para jogar novamente!");

print $response;
