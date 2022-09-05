<?php

require_once './vendor/autoload.php';

use Twilio\TwiML\MessagingResponse;

$resposta = new MessagingResponse();

$remetente = $_REQUEST['ProfileName'];
$texto = $_REQUEST['Body'];

if(in_array($texto, ["1", "1.", "1-", "1 ", "1- "])){
	$resposta->message("Por favor verifique sua conexão de internet e faça um diagnostico de rede caso a conexão de internet ainda não foi estabelecida
	Funcionou?");
} else if(in_array($texto, ["2", "2.", "2-", "2 ", "2- "])) {
	$resposta->message("Por favor verifique se o seu equipamento está conectado corretamente.
	Funcionou?");
} else if($texto) {
	$resposta->message("Olá, $remetente. Somos do Suporte da UERN, em que podemos ajudar?
	*Informe um dos tópicos abaixo:*
	
	1- Internet
	2- Equipamentos
	3- Configurações gerais
	4- Outros");
}

if(!file_exists(str_replace(' ', '_', $remetente))){
	$arquivo = fopen('chamados/'.str_replace(' ', '_', $remetente).'.txt', 'w+');
	fwrite($arquivo, '\tCHAMADO DE '.strtoupper($remetente));
	fwrite($arquivo, $texto);
	fclose($arquivo);
}



echo $resposta;
