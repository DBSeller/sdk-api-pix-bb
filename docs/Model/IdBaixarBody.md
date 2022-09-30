# IdBaixarBody

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**numero_convenio** | **int** | Refere-se ao número de convênio de arrecadação de um Ente Público com o Banco do Brasil e possui até 6 posições numéricas. | 
**codigo_solicitacao_banco_central_brasil** | **string** | Refere-se à Chave Pix do Recebedor cadastrada no Banco do Brasil. O campo é obrigatório. Em ambiente de produção, a Chave Pix deverá estar vinculada a uma conta cujo CNPJ seja o mesmo utilizado na credencial de acesso à API. Em ambiente de homologação, use as chaves Pix criadas para usuários testes. A chave será lida pelo aplicativo do PSP do pagador para consulta ao DICT que retornará a informação e identificará o recebedor da arrecadação. | 
**cpf_devedor** | **int** | Determina o CPF do devedor, caso haja. O campo não é obrigatório, porém, se informado, o campo NomeDevedor também deverá ser preenchido. Este campo não poderá ser informado, caso o campo cnpjDevedor contenha dados. Para fins de testes, usar os CPF da seção de dados para testes do portal BB Developers. | [optional] 
**cnpj_devedor** | **int** | Determina o CNPJ do devedor, caso haja. O campo não é obrigatório, porém se informado, o campo NomeDevedor também deverá ser preenchido. Este campo não poderá ser informado, caso o campo cpfDevedor contenha dados. Para fins de testes, usar os CNPJ da seção de dados para testes do portal BB Developers. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

