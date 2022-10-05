<?php

/**
 * Geração de AcessToken via OAuth2 - BB Developers
 *
 */
namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

class Oauth2Api
{

    /**
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     *
     * @var Configuration
     */
    protected $config;

    /**
     *
     * @param ClientInterface $client
     * @param Configuration $config
     * @param HeaderSelector $selector
     */
    public function __construct(ClientInterface $client = null, Configuration $config = null)
    {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
    }

    /**
     *
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**Obtém um Acces token oauth para uso nas requisições da Api Pix do BB
     * 
     * @return string Accestoken 
     */
    public function gerarAccessToken()
    {
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $response = null;
        $token = "";

        $headerParams['Authorization'] = "Basic " . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        $headerParams['Content-Type'] = "application/x-www-form-urlencoded";
        $headerParams['User-Agent'] = $this->config->getUserAgent();
        $formParams['grant_type'] = "client_credentials";
        $formParams['scope'] = $this->config->getEscopoPermissoesOauth2();
        $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        $request = new Request('POST', $this->config->getUrlAutenticacaoOauth2(), $headerParams, $httpBody);

        $options = $this->createHttpClientOption();
        try {
            $response = $this->client->send($request, $options);
            if ($response->getBody()) {
                $bodyJson = json_decode($response->getBody());
                $token = $bodyJson->{'access_token'};
            }
        } catch (Exception $e) {
            echo 'ERRO->', $e->getMessage(), PHP_EOL;
        }

        return $token;
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (! $options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
