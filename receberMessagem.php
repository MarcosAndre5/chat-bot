<?php

require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;

$resposta = new MessagingResponse();

$remetente = $_REQUEST['ProfileName'];
$texto = $_REQUEST['Body'];

$numeroAleatorio = rand(1, 5);

if(!in_array($texto, [1, 2, 3, 4, 5]))
	$resposta->message("Olá, $remetente! Estou pensando em um número entre 1 e 5 - tente adivinhar!");
else if($texto == $numeroAleatorio)
	$resposta->message("Sim, $remetente! Você adivinhou!");
else
	$resposta->message("Não $remetente, na verdade foi $numeroAleatorio - Escolha um novo número para jogar novamente!");

echo $resposta;
