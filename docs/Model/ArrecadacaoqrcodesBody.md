# ArrecadacaoqrcodesBody

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**numero_convenio** | **int** | Refere-se ao número de convênio de arrecadação de um Ente Público com o Banco do Brasil e possui até 6 posições numéricas. Não confundir com código Febraban. Para fins de testes utilize o número de convênio de arrecadação do próprio ente público com o BB. | 
**indicador_codigo_barras** | **string** | Informe S (sim) caso envie um código de barras padrão Febraban no campo seguinte (codigoGuiaRecebimento) ou N (não) caso não seja informado um código de barras mas apenas um código para conciliação. | 
**codigo_guia_recebimento** | **string** | Código de Barras padrão Febraban de 44 posições (se S no indicadorCodigoBarras) ou outro identificador do cliente  (se N no indicadorCodigoBarras).  O código de barras deverá ser gerado para o Número de Convênio informado no campo “NumeroConvenio”. | 
**email_devedor** | **string** | E-mail do devedor para contato | [optional] 
**codigo_pais_telefone_devedor** | **int** | Código do País do Telefone do Devedor | [optional] 
**ddd_telefone_devedor** | **int** | DDD do telefone do devedor | [optional] 
**numero_telefone_devedor** | **string** | Numero do telefone do devedor | [optional] 
**codigo_solicitacao_banco_central_brasil** | **string** | Refere-se à Chave Pix do Recebedor cadastrada no Banco do Brasil. O campo é obrigatório. Em ambiente de produção, a Chave Pix deverá estar vinculada a uma conta cujo CNPJ seja o mesmo utilizado na credencial de acesso à API. Em ambiente de homologação, use as chaves Pix criadas para usuários testes. A chave será lida pelo aplicativo do PSP do pagador para consulta ao DICT que retornará a informação e identificará o recebedor da arrecadação. | 
**descricao_solicitacao_pagamento** | **string** | Determina um texto a ser apresentado ao pagador em formato livre limitado a 140 caracteres. | [optional] 
**valor_original_solicitacao** | **float** | Valor original do documento. O valor do QRCode deverá, obrigatoriamente, corresponder ao valor registrado no código de barras. | 
**cpf_devedor** | **string** | Determina o CPF do devedor, caso haja. O campo não é obrigatório, porém, se informado, o campo NomeDevedor também deverá ser preenchido. Este campo não poderá ser informado, caso o campo cnpjDevedor contenha dados. Para fins de testes, usar os CPF da seção de dados para testes do portal BB Developers. | [optional] 
**cnpj_devedor** | **string** | Determina o CNPJ do devedor, caso haja. O campo não é obrigatório, porém se informado, o campo NomeDevedor também deverá ser preenchido. Este campo não poderá ser informado, caso o campo cpfDevedor contenha dados. Para fins de testes, usar os CNPJ da seção de dados para testes do portal BB Developers. | [optional] 
**nome_devedor** | **string** | Determina o nome da instituição ou pessoa a quem a cobrança está endereçada. O preenchimento do campo \&quot;Nome Devedor\&quot; é obrigatório se o campo \&quot;Numero CPF Devedor\&quot; ou o campo \&quot;Numero Cadastro Nac Pessoas Juridicas Devedor\&quot; estiver preenchido | [optional] 
**quantidade_segundo_expiracao** | **int** | Duração que indica limite, com granularidade de segundos, para que o pagamento do QR Code possa ser realizado, a partir da data-hora de criação. Deve ser utilizado como espécie de data de vencimentos em segundos que deverá ser calculada da data-hora de criação até a data-hora de vencimento. Caso não informado, assume-se a duração de 86400 segundos, que corresponde a 24 horas. | [optional] 
**lista_informacao_adicional** | [**\Swagger\Client\Model\ArrecadacaoqrcodesListaInformacaoAdicional[]**](ArrecadacaoqrcodesListaInformacaoAdicional.md) | O campo \&quot;listaInformacaoAdicional\&quot;, se estiver presente, se refere a uma lista em que cada elemento deve utilizar o esquema abaixo: | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

