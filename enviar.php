<?php

function pegaValor($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function enviaEmail($de, $assunto, $mensagem, $para, $email_servidor) {
    $headers = "From: $email_servidor\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($para, $assunto, nl2br($mensagem), $headers);
}

$de = "gerencia@questgroup.com.br";
$email_servidor = "gerencia@questgroup.com.br";
$para = "ti@questgroup.com.br";
$nome = pegaValor("nome");
$interesse = pegaValor("interesse");
$telefone = pegaValor("telefone");
$mensagem = "Nome do Cliente: ".$nome."<br />";
$mensagem .= "Interessado em: ".$interesse;
$mensagem .= "Telefone para Contato: ".$telefone;
$assunto = $nome." est&aacute; interessado em ".$interesse;

if ($nome && $mensagem) {
    enviaEmail($de, $assunto, $mensagem, $para, $email_servidor);
    $pagina = "sucesso.html";
} else {
    $pagina = "erro.html";
}

header("location:$pagina");

?>