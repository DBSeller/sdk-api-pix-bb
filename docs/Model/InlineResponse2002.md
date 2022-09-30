# InlineResponse2002

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | \&quot;O campo \&quot;Código Conciliação Solicitação\&quot; determina o identificador da transação. O objetivo desse campo é ser um elemento que possibilite ao PSP do recebedor apresentar ao usuário recebedor a funcionalidade de conciliação de pagamentos.  Na pacs.008, é referenciado como TransactionIdentification &lt;txId&gt; ou idConciliacaoRecebedor. O preenchimento do campo txid é limitado a 35 caracteres na pacs.008.  Em termos de fluxo de funcionamento, o txid é lido pelo aplicativo do PSP do pagador e, depois de confirmado o pagamento, é enviado para o SPI via pacs.008. Uma pacs.008 também é enviada ao PSP do recebedor, contendo, além de todas as informações usuais do pagamento, o txid. Ao perceber um recebimento dotado de txid, o PSP do recebedor está apto a se comunicar com o usuário recebedor, informando que um pagamento específico foi liquidado.\&quot; | 
**estado_solicitacao** | **string** | Texto descritivo do estado solicitação. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

