<?php

function pegaValor($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function enviaEmail($de, $assunto, $mensagem, $para) {
    $headers = "From: $de\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($para, $assunto, nl2br($mensagem), $headers);
}

$de = "info@questgroup.com.br";
$para = "paulo@questgroup.com.br";
$nome = pegaValor("nome");
$interesse = pegaValor("interesse");
$telefone = pegaValor("telefone");
$mensagem = "Nome do Cliente: ".$nome."<br />";
$mensagem .= "Interessado em: ".$interesse."<br />";
$mensagem .= "Telefone para Contato: ".$telefone;
$assunto = $nome." esta interessado em ".$interesse;

if ($nome && $mensagem) {
    enviaEmail($de, $assunto, $mensagem, $para, $email_servidor);
    $pagina = "sucesso.html";
} else {
    $pagina = "erro.html";
}

header("location:$pagina");

?>