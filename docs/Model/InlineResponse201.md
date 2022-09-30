# InlineResponse201

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**timestamp_criacao_solicitacao** | **string** | Timestamp que indica o momento em que foi criada a cobrança. Respeita o formato definido na RFC 3339 | 
**estado_solicitacao** | **string** | Texto descritivo do Estado Solicitacao | 
**codigo_conciliacao_solicitante** | **string** | O campo \&quot;\&quot;Codigo Conciliacao Solicitacao\&quot;\&quot; determina o identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.  Na pacs.008, é referenciado como TransactionIdentification &lt;txId&gt; ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.  Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado | 
**numero_versao_solicitacao_pagamento** | **int** | O tipo do campo \&quot;\&quot;Numero Versao Solicitacao Pagamento\&quot;\&quot; é um número. Sempre começa em zero. Sempre varia em acréscimos de 1.  O campo \&quot;\&quot;Numero Versao Solicitacao Pagamento\&quot;\&quot; adiciona rastreabilidade ao payload. Uma vez que se recomenda que o payload assinado seja armazenado pelo PSP do pagador em seus registros, fica facilitada a comunicação entre PSPs acerca de qual payload especificamente está se tratando, no contexto de resolução de possíveis problemas | 
**link_qr_code** | **string** | O campo Link URL representa uma URL que será utilizada para recuperação dos dados que fazem parte do pagamento.   O formato dessa URL, bem como os demais detalhes sobre segurança relacionados ao QR Code,está detalhadono Manual de Segurança do SFN | 
**qr_code** | **string** | Texto para geração da imagem do QrCode Dinâmico | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

