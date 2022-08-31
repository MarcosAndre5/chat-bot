<?php

require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;

$resposta = new MessagingResponse();

$remetente = $_REQUEST['ProfileName'];
$texto = $_REQUEST['Body'];

if($texto == "1" || $texto == "1." || $texto == "1-" || $texto == "1 " || $texto == "1- "){
	$resposta->message("Por favor verifique sua conexão de internet e faça um diagnostico de rede caso a conexão de internet ainda não foi estabelecida
	Funcionou?");
}else if($texto == "2" || $texto == "2." || $texto == "2-" || $texto == "2 " || $texto == "2- "){
	$resposta->message("Por favor verifique se o seu equipamento está conectado corretamente.
	Funcionou?");
}else if($texto){
	$resposta->message("Olá, $remetente. Somos do Suporte da UERN, em que podemos ajudar?
	*Informe um dos tópicos abaixo:*
	
	1- Internet
	2- Equipamentos
	3- Configurações gerais
	4- Outros");
}
/*
$numeroAleatorio = rand(1, 5);

if(!in_array($texto, [1, 2, 3, 4, 5]))
	$resposta->message("Olá, $remetente! Estou pensando em um número entre 1 e 5 - tente adivinhar!");
else if($texto == $numeroAleatorio)
	$resposta->message("Sim, $remetente! Você adivinhou!");
else
	$resposta->message("Não $remetente, na verdade foi $numeroAleatorio - Escolha um novo número para jogar novamente!");
*/
echo $resposta;
