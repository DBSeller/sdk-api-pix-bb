# Swagger\Client\QrCodesApi

Todas URLs são relativas a *https://api.sandbox.bb.com.br/pix-bb/v1*
Em produção, as URL são relativas a https://api.bb.com.br/pix-bb/v1

Method | HTTP request | Description
------------- | ------------- | -------------
[**alteraQrCodeArrecadacao**](QrCodesApi.md#alteraqrcodearrecadacao) | **PUT** /arrecadacao-qrcodes/{id} | Gerenciar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
[**baixarQRCode**](QrCodesApi.md#baixarqrcode) | **POST** /arrecadacao-qrcodes/{id}/baixar | Baixar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
[**consultaQrCodeArrecadacao**](QrCodesApi.md#consultaqrcodearrecadacao) | **GET** /arrecadacao-qrcodes/{id} | Gerenciar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
[**consultaQrCodeGuiaRecolhimento**](QrCodesApi.md#consultaqrcodeguiarecolhimento) | **GET** /arrecadacao-qrcodes | Consultar QRCode de Pagamento Instantâneo por Guia de Recebimento
[**criaBoletoBancarioId**](QrCodesApi.md#criaboletobancarioid) | **POST** /arrecadacao-qrcodes | Gerar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação
[**pagamentosQRCodeArrecadacao**](QrCodesApi.md#pagamentosqrcodearrecadacao) | **GET** /arrecadacao-qrcodes/pagamentos/{id} | Consulta um pagamento vinculado ao QRCode Registrado de uma Guia de Arrecadação

# **alteraQrCodeArrecadacao**
> \Swagger\Client\Model\InlineResponse201 alteraQrCodeArrecadacao($body, $authorization, $gw_app_key, $id)

Gerenciar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação

Altera um QR Code de pagamento instantâneo (PIX) de uma guia de arrecadação (com ou sem código de barras).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2-ClientCredentials
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ArrecadacaoqrcodesIdBody(); // \Swagger\Client\Model\ArrecadacaoqrcodesIdBody | 
$authorization = "authorization_example"; // string | É um \"token\" de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN]
$gw_app_key = "gw_app_key_example"; // string | É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo.
$id = "id_example"; // string | Identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.  Na pacs.008, é referenciado como TransactionIdentification <txId> ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.  Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado.

try {
    $result = $apiInstance->alteraQrCodeArrecadacao($body, $authorization, $gw_app_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->alteraQrCodeArrecadacao: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ArrecadacaoqrcodesIdBody**](../Model/ArrecadacaoqrcodesIdBody.md)|  |
 **authorization** | **string**| É um \&quot;token\&quot; de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN] |
 **gw_app_key** | **string**| É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo. |
 **id** | **string**| Identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.  Na pacs.008, é referenciado como TransactionIdentification &lt;txId&gt; ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.  Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado. |

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[OAuth2-ClientCredentials](../../README.md#OAuth2-ClientCredentials)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **baixarQRCode**
> \Swagger\Client\Model\InlineResponse2002 baixarQRCode($body, $authorization, $gw_app_key, $id)

Baixar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação

Dar baixa em um QR Code de pagamento instantâneo (PIX) de uma guia de arrecadação (com ou sem código de barras).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2-ClientCredentials
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\IdBaixarBody(); // \Swagger\Client\Model\IdBaixarBody | 
$authorization = "authorization_example"; // string | É um \"token\" de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN]
$gw_app_key = "gw_app_key_example"; // string | É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo.
$id = "id_example"; // string | Identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.Na pacs.008, é referenciado como TransactionIdentification <txId> ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado.

try {
    $result = $apiInstance->baixarQRCode($body, $authorization, $gw_app_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->baixarQRCode: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\IdBaixarBody**](../Model/IdBaixarBody.md)|  |
 **authorization** | **string**| É um \&quot;token\&quot; de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN] |
 **gw_app_key** | **string**| É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo. |
 **id** | **string**| Identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.Na pacs.008, é referenciado como TransactionIdentification &lt;txId&gt; ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado. |

### Return type

[**\Swagger\Client\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

[OAuth2-ClientCredentials](../../README.md#OAuth2-ClientCredentials)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **consultaQrCodeArrecadacao**
> \Swagger\Client\Model\InlineResponse2001 consultaQrCodeArrecadacao($id, $authorization, $gw_app_key, $numero_convenio)

Gerenciar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação

Consulta um QR Code de pagamento instantâneo (PIX) de uma guia de arrecadação (com ou sem código de barras).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2-ClientCredentials
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | Identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.  Na pacs.008, é referenciado como TransactionIdentification <txId> ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.  Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado.
$authorization = "authorization_example"; // string | É um \"token\" de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN]
$gw_app_key = "gw_app_key_example"; // string | É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo.
$numero_convenio = 56; // int | Número do convenio registrado no Banco do Brasil.

try {
    $result = $apiInstance->consultaQrCodeArrecadacao($id, $authorization, $gw_app_key, $numero_convenio);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->consultaQrCodeArrecadacao: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.  Na pacs.008, é referenciado como TransactionIdentification &lt;txId&gt; ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.  Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado. |
 **authorization** | **string**| É um \&quot;token\&quot; de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN] |
 **gw_app_key** | **string**| É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo. |
 **numero_convenio** | **int**| Número do convenio registrado no Banco do Brasil. |

### Return type

[**\Swagger\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

[OAuth2-ClientCredentials](../../README.md#OAuth2-ClientCredentials)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **consultaQrCodeGuiaRecolhimento**
> \Swagger\Client\Model\InlineResponse200 consultaQrCodeGuiaRecolhimento($authorization, $gw_app_key, $numero_convenio, $codigo_guia_recebimento)

Consultar QRCode de Pagamento Instantâneo por Guia de Recebimento

Consulta um QR Code de pagamentos instantâneos (PIX) por guia de recebimento (com ou sem código de barras).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2-ClientCredentials
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$authorization = "authorization_example"; // string | É um \"token\" de acesso fornecido pelo OAuth 2.0.Ex: Bearer [ACCESS_TOKEN]
$gw_app_key = "gw_app_key_example"; // string | É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo.
$numero_convenio = 56; // int | Número do convenio registrado no Banco do Brasil.
$codigo_guia_recebimento = "codigo_guia_recebimento_example"; // string | Código de Barras  ou outro identificador do cliente informado no momento da criação da solicitação de pagamento.

try {
    $result = $apiInstance->consultaQrCodeGuiaRecolhimento($authorization, $gw_app_key, $numero_convenio, $codigo_guia_recebimento);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->consultaQrCodeGuiaRecolhimento: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| É um \&quot;token\&quot; de acesso fornecido pelo OAuth 2.0.Ex: Bearer [ACCESS_TOKEN] |
 **gw_app_key** | **string**| É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo. |
 **numero_convenio** | **int**| Número do convenio registrado no Banco do Brasil. |
 **codigo_guia_recebimento** | **string**| Código de Barras  ou outro identificador do cliente informado no momento da criação da solicitação de pagamento. |

### Return type

[**\Swagger\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

[OAuth2-ClientCredentials](../../README.md#OAuth2-ClientCredentials)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **criaBoletoBancarioId**
> \Swagger\Client\Model\InlineResponse201 criaBoletoBancarioId($body, $authorization, $gw_app_key)

Gerar QRCode de Pagamento Instantâneo de uma Guia de Arrecadação

Gera um QR Code de pagamento instantâneo (PIX) para uma guia de arrecadação (com ou sem código de barras).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2-ClientCredentials
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ArrecadacaoqrcodesBody(); // \Swagger\Client\Model\ArrecadacaoqrcodesBody | 
$authorization = "authorization_example"; // string | É um \"token\" de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN]
$gw_app_key = "gw_app_key_example"; // string | É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo.

try {
    $result = $apiInstance->criaBoletoBancarioId($body, $authorization, $gw_app_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->criaBoletoBancarioId: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ArrecadacaoqrcodesBody**](../Model/ArrecadacaoqrcodesBody.md)|  |
 **authorization** | **string**| É um \&quot;token\&quot; de acesso fornecido pelo OAuth 2.0. Ex: Bearer [ACCESS_TOKEN] |
 **gw_app_key** | **string**| É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo. |

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[OAuth2-ClientCredentials](../../README.md#OAuth2-ClientCredentials)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **pagamentosQRCodeArrecadacao**
> \Swagger\Client\Model\InlineResponse2003 pagamentosQRCodeArrecadacao($id, $authorization, $gw_app_key)

Consulta um pagamento vinculado ao QRCode Registrado de uma Guia de Arrecadação

A partir do código de pagamento, consulta dados do registro de Pagamento PIX QRCode de uma Guia de Arrecadação

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2-ClientCredentials
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\QrCodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | EndToEndIdentification que transita na PACS002, PACS004 e PACS008
$authorization = "authorization_example"; // string | É um \"token\" de acesso fornecido pelo OAuth 2.0.Ex: Bearer [ACCESS_TOKEN]
$gw_app_key = "gw_app_key_example"; // string | É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo.

try {
    $result = $apiInstance->pagamentosQRCodeArrecadacao($id, $authorization, $gw_app_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QrCodesApi->pagamentosQRCodeArrecadacao: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| EndToEndIdentification que transita na PACS002, PACS004 e PACS008 |
 **authorization** | **string**| É um \&quot;token\&quot; de acesso fornecido pelo OAuth 2.0.Ex: Bearer [ACCESS_TOKEN] |
 **gw_app_key** | **string**| É a chave de acesso do aplicativo do desenvolvedor obtida no Portal do Desenvolvedor. Essa chave será usada para identificação do aplicativo. |

### Return type

[**\Swagger\Client\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

[OAuth2-ClientCredentials](../../README.md#OAuth2-ClientCredentials)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

