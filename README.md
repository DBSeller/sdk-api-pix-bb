# PIXBBApi - Montreal
API para gerenciar os serviços referentes ao PIX (Sistema de Pagamentos Instantâneos) no BB.

- API version: 1.8
- Mais informações sobre a API do Banco do Brasil Arrecadação Integrada ao PIX V1, acesse https://developers.bb.com.br

## Requerimentos

PHP >=5.5 

## Instalação e Uso
### Composer

Para instalar via composer, adicione o repositório abaixo, assim como a dependencia:

```
{
  "repositories": [
    {
     "type": "vcs",
	  "url": "git@github.com:tiagoskabrazil/pixbbrestclient-php.git"
    }
  ],
  "require": {
    "montreal/pixbbapi": "dev-dev-pixbbrestclient-php",
  }
}
```

Depois disto, execute `composer install`

### Instalação Manual

Faça o download dos arquivos e inclua o `autoload.php` onde deseja utilizar

```php
    require_once('/path/para/pixbbapi/vendor/autoload.php');
```

## Tests

Para rodar os testes

```
composer install
./vendor/bin/phpunit
```

## Exemplo de utilização - Geração de QRCode

Siga as orientações do processo de instalação e então execute o seguinte:

```php

/*******************************************************************************************************
 * Definindo as configurações para o consumo da API Arrecadação Integrada ao PIX do BB.
 * Aqui definimos a URL para autenticação oauth2, a URL de chamada para a API ( temos teste, hmg e prd)
 * e as credenciais da aplicação, que são obtidas em app.developers.bb.com.br
 * *****************************************************************************************************/
 
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
 * ******************************************************************************************/
$oauth2Api = new Swagger\Client\Api\Oauth2Api(new GuzzleHttp\Client(),$config);

try {
    $token = $oauth2Api->gerarAccessToken();
    $config->setAccessToken($token);
} catch (Exception $e) {
    echo 'ERRO->', $e->getMessage(), PHP_EOL;
}

 
/*********************************************************************************************
 * Efetuando chamada a API de geração de QRCode usando o token obtido
 * ******************************************************************************************/

$apiInstance = new Swagger\Client\Api\QrCodesApi(new GuzzleHttp\Client(),$config);
$body = new \Swagger\Client\Model\ArrecadacaoqrcodesBody(); 

try {

$body['numero_convenio']=62191;
$body['indicador_codigo_barras'] = "S";
$body['codigo_guia_recebimento'] = "83660000000199800053846101172358000000000000";
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

} catch (Exception $e) {
  echo 'Erro na chamada QrCodesApi->criaBoletoBancarioId: ', $e->getMessage(), PHP_EOL;
}


?>

OBS: $body também pode ser passado no formato JSON, conforme exemplo abaixo:

  {
    "numeroConvenio": 62191,
    "indicadorCodigoBarras": "S",
    "codigoGuiaRecebimento": "83660000000199800009846101173758000000000000",
    "emailDevedor": "contribuinte.silva@provedor.com.br",
    "codigoPaisTelefoneDevedor": 55,
    "dddTelefoneDevedor": 61,
    "numeroTelefoneDevedor": "999731240",
    "codigoSolicitacaoBancoCentralBrasil": "88a33759-78b0-43b7-8c60-e5e3e7cb55fe",
    "descricaoSolicitacaoPagamento": "Arrecadação Pix",
    "valorOriginalSolicitacao": 19.98,
    "cpfDevedor": "19917885250",
    "nomeDevedor": "Contribuinte da Silva",
    "quantidadeSegundoExpiracao": 3600,
    "listaInformacaoAdicional": [
      {
        "codigoInformacaoAdicional": "IPTU",
        "textoInformacaoAdicional": "COTA ÚNICA 2021"
      }
    ]
  }

```

## Exemplo de retorno do BB

```
{
  "timestampCriacaoSolicitacao": "2021-11-11T14:34:31.24-03:00",
  "estadoSolicitacao": "ATIVA",
  "codigoConciliacaoSolicitante": "ogyevSKPZSj770FYgbf1Ub1GavxgOpvPKy9",
  "numeroVersaoSolicitacaoPagamento": "0",
  "linkQrCode": "qrcodepix-h.bb.com.br/pix/v2/38472887-c0e5-41db-b1c6-20cc3e6086e5",
  "qrCode": "00020101021226870014br.gov.bcb.pix2565qrcodepix-h.bb.com.br/pix/v2/38472887-c0e5-41db-b1c6-20cc3e6086e55204000053039865802BR5925SECRETARIA DA RECEITA FED6008BRASILIA62070503***63043C35"
}

```



## Exemplo de utilização - Consulta QRCode gerado


```php

/*******************************************************************************************************
 * Definindo as configurações para o consumo da API Arrecadação Integrada ao PIX do BB.
 * Aqui definimos a URL para autenticação oauth2, a URL de chamada para a API ( temos teste, hmg e prd)
 * e as credenciais da aplicação, que são obtidas em app.developers.bb.com.br
 * *****************************************************************************************************/
 
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
 * ******************************************************************************************/
$oauth2Api = new Swagger\Client\Api\Oauth2Api(new GuzzleHttp\Client(),$config);

try {
    $token = $oauth2Api->gerarAccessToken();
    $config->setAccessToken($token);
} catch (Exception $e) {
    echo 'ERRO->', $e->getMessage(), PHP_EOL;
}

 
/*********************************************************************************************
 * Efetuando chamada a API de consulta de QRCode usando o token obtido
 * ******************************************************************************************/

$apiInstance = new Swagger\Client\Api\QrCodesApi(new GuzzleHttp\Client(),$config);

try {

$numeroConvenio = 12345;
$codigoGuiaRecebimento = "54321";

$result = $apiInstance->consultaQrCodeGuiaRecolhimento($config->getAccessToken(), $config->getChaveAplicacaoBB(), $numeroConvenio, $codigoGuiaRecebimento);

} catch (Exception $e) {
  echo 'Erro na chamada QrCodesApi->consultaQrCodeGuiaRecolhimento: ', $e->getMessage(), PHP_EOL;
}


?>
```

## Exemplo de retorno do BB

```
Swagger\Client\Model\InlineResponse200 Object
(
    [container:protected] => Array
        (
            [codigo_conciliacao_solicitante] => FzzeRbS7JEfSyYdCRvV6L0WDiLxgx7Obhqk
            [email_devedor] => contribuinte.silva@provedor.com.br
            [codigo_pais_telefone_devedor] => 55
            [ddd_telefone_devedor] => 61
            [numero_telefone_devedor] => 999731240
            [timestamp_criacao_solicitacao] => 2021-05-10T17:15:48.53-03:00
            [quantidade_segundo_expiracao] => 1728000
            [estado_solicitacao] => CONCLUIDA
            [numero_versao_solicitacao_pagamento] => 3
            [link_qr_code] => qrcodepix-h.bb.com.br/pix/v2/b6063404-fc6d-4dad-a416-0e153a9f8621
            [qr_code] => 00020101021226870014br.gov.bcb.pix2565qrcodepix-h.bb.com.br/pix/v2/b6063404-fc6d-4dad-a416-0e153a9f86215204000053039865802BR5925SECRETARIA DA RECEITA FED6008BRASILIA62070503***630491D1
            [cpf_devedor] => -1556951230
            [cnpj_devedor] => 0
            [nome_devedor] => Contribuinte da Silva
            [valor_original_solicitacao] => 19.98
            [codigo_solicitacao_banco_central_brasil] => 88a33759-78b0-43b7-8c60-e5e3e7cb55fe
            [descricao_solicitacao_pagamento] => Arrecadação Pix
            [lista_informacao_adicional] => Array
                (
                    [0] => Swagger\Client\Model\InlineResponse200ListaInformacaoAdicional Object
                        (
                            [container:protected] => Array
                                (
                                    [codigo_informacao_adicional] => IPTU
                                    [texto_informacao_adicional] => COTA ÚNICA 2021 teste 2
                                )

                        )

                )

            [codigo_identificador_pagamento] => E0000000020210520172412581438073
            [valor_pagamento] => 19.98
            [timestamp_pagamento] => 2021-05-20T14:24:27.00-03:00
            [cpf_pagador] => 0
            [cnpj_pagador] => 425010
            [nome_cliente_pagador] => PADARIA LEMES PESSOA
            [texto_informativo_pagador] => 
        )

```


## Documentação dos API Endpoints

Urls relativas a *https://api.sandbox.bb.com.br/pix-bb/v1* ( Ambiente de testes default do nosso cliente. Caso tenha sido selecionada outro ambiente, as urls serão relativas a ele.)

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*QrCodesApi* | [**alteraQrCodeArrecadacao**](docs/Api/QrCodesApi.md#alteraqrcodearrecadacao) | **PUT** /arrecadacao-qrcodes/{id} | Gerenciar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
*QrCodesApi* | [**baixarQRCode**](docs/Api/QrCodesApi.md#baixarqrcode) | **POST** /arrecadacao-qrcodes/{id}/baixar | Baixar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
*QrCodesApi* | [**consultaQrCodeArrecadacao**](docs/Api/QrCodesApi.md#consultaqrcodearrecadacao) | **GET** /arrecadacao-qrcodes/{id} | Gerenciar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
*QrCodesApi* | [**consultaQrCodeGuiaRecolhimento**](docs/Api/QrCodesApi.md#consultaqrcodeguiarecolhimento) | **GET** /arrecadacao-qrcodes | Consultar QRCode de Pagamento Instantâneo por Guia de Recebimento
*QrCodesApi* | [**criaBoletoBancarioId**](docs/Api/QrCodesApi.md#criaboletobancarioid) | **POST** /arrecadacao-qrcodes | Gerar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
*QrCodesApi* | [**pagamentosQRCodeArrecadacao**](docs/Api/QrCodesApi.md#pagamentosqrcodearrecadacao) | **GET** /arrecadacao-qrcodes/pagamentos/{id} | Consulta um pagamento vinculado ao QRCode Registrado de uma Guia de Arrecadação

## Documentação dos Models

 - [ArrecadacaoqrcodesBody](docs/Model/ArrecadacaoqrcodesBody.md)
 - [ArrecadacaoqrcodesIdBody](docs/Model/ArrecadacaoqrcodesIdBody.md)
 - [ArrecadacaoqrcodesListaInformacaoAdicional](docs/Model/ArrecadacaoqrcodesListaInformacaoAdicional.md)
 - [ArrecadacaoqrcodesidListaInformacaoAdicional](docs/Model/ArrecadacaoqrcodesidListaInformacaoAdicional.md)
 - [Erro](docs/Model/Erro.md)
 - [ErroErros](docs/Model/ErroErros.md)
 - [ErroOAuthNaoAutorizado](docs/Model/ErroOAuthNaoAutorizado.md)
 - [ErroOAuthNaoAutorizadoAttributes](docs/Model/ErroOAuthNaoAutorizadoAttributes.md)
 - [IdBaixarBody](docs/Model/IdBaixarBody.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse2001ListaInformacaoAdicional](docs/Model/InlineResponse2001ListaInformacaoAdicional.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse200ListaInformacaoAdicional](docs/Model/InlineResponse200ListaInformacaoAdicional.md)
 - [InlineResponse201](docs/Model/InlineResponse201.md)

## OAuth2-ClientCredentials

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: 
- **Scopes**: 
 - **pix.arrecadacao-requisicao**: Permite a geração de um QrCode de pagamento instantâneo (PIX) a partir dos dados de uma guia de arrecadação (com ou sem código de barras)
 - **pix.arrecadacao-info**: Permite a consulta de um QrCode de pagamento instantâneo (PIX) a partir dos dados de uma guia de arrecadação (com ou sem código de barras)


## Author
tiago.nogueira@montreal.com.br


