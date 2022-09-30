<?php
require_once(__DIR__ . '/vendor/autoload.php');


/*********************************************************************************************
 * Definindo as configurações para o consumo do serviço rest do bb 
 * 
 * ******************************************************************************************/
$config = Swagger\Client\Configuration::getDefaultConfiguration();
$config->setAmbienteBB("T"); // em ambiente T usamos gw-dev-app-key nas requisições, em ambiente P, usamos gw-app-key.

$config->setHost("https://api.sandbox.bb.com.br/pix-bb/v1"); // HOST BB HMG 1
//$config->setHost("https://api.hm.bb.com.br/pix-bb/v1"); // HOST BB HMG 2
//$config->setHost("https://api.bb.com.br/pix-bb/v1"); // HOST BB PRODUÇÃO

$config->setUrlAutenticacaoOauth2("https://oauth.sandbox.bb.com.br/oauth/token"); //URL OAUTH BB 
//$config->setUrlAutenticacaoOauth2("https://oauth.hm.bb.com.br/oauth/token");  //URL OAUTH BB 
//$config->setUrlAutenticacaoOauth2("https://oauth.hm.bb.com.br/oauth/token");  //URL OAUTH BB PRD

//developer_application_key
$config->setChaveAplicacaoBB("d27b077907ffab60136de17dc0050656b911a5bb");
//client_id
$config->setUsername("eyJpZCI6IjJmYWRkNTYtY2QwMi00ODNhLTgiLCJjb2RpZ29QdWJsaWNhZG9yIjowLCJjb2RpZ29Tb2Z0d2FyZSI6MjIyODgsInNlcXVlbmNpYWxJbnN0YWxhY2FvIjoxfQ");
//client_secret
$config->setPassword("eyJpZCI6IjdhNjM3NTMtYjA3ZC00ODEyLWE4IiwiY29kaWdvUHVibGljYWRvciI6MCwiY29kaWdvU29mdHdhcmUiOjIyMjg4LCJzZXF1ZW5jaWFsSW5zdGFsYWNhbyI6MSwic2VxdWVuY2lhbENyZWRlbmNpYWwiOjEsImFtYmllbnRlIjoiaG9tb2xvZ2FjYW8iLCJpYXQiOjE2MzE3MzQ4MjM2MzF9");


/*********************************************************************************************
 * Obtendo access token e utilizando no configurador
 * 
 * ******************************************************************************************/
$oauth2Api = new Swagger\Client\Api\Oauth2Api(
    new GuzzleHttp\Client(),
    $config
    );

try {
    $token = $oauth2Api->gerarAccessToken();
    print("Token oauth2 obtido:" . $token);
    $config->setAccessToken($token);
    print("Configurador atualizado.");
} catch (Exception $e) {
    echo 'ERRO->', $e->getMessage(), PHP_EOL;
}

 
/*********************************************************************************************
 * Efetuando chamada a API usando o token
 *
 * ******************************************************************************************/

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    new GuzzleHttp\Client(),
    $config
);


$body = new \Swagger\Client\Model\ArrecadacaoqrcodesBody(); // \Swagger\Client\Model\ArrecadacaoqrcodesBody | 

try {
    $body['numero_convenio']=62191;
    $body['indicador_codigo_barras'] = "S";
    $body['codigo_guia_recebimento'] = "83660000000199800053846101173758000000000000";
    $body['email_devedor'] = "contribuinte.silva@provedor.com.br";
    $body['codigo_pais_telefone_devedor'] = 55;
    $body['ddd_telefone_devedor'] = 61;
    $body['numero_telefone_devedor'] = "999731240";
    $body['codigo_solicitacao_banco_central_brasil'] = "88a33759-78b0-43b7-8c60-e5e3e7cb55fe";
    $body['descricao_solicitacao_pagamento'] = "Arrecadação Pix";
    $body['valor_original_solicitacao'] = 18.98;
    $body['cpf_devedor'] = "19917885250";
    $body['cnpj_devedor'] = null;
    $body['nome_devedor'] = "Contribuinte da Silva";
    $body['quantidade_segundo_expiracao'] = 3600;
    $body['lista_informacao_adicional'] = null;
	$result = $apiInstance->criaBoletoBancarioId($body, $config->getAccessToken(), $config->getChaveAplicacaoBB());
    print($result->getBody());
	print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->criaBoletoBancarioId: ', $e->getMessage(), PHP_EOL;
}

?>

