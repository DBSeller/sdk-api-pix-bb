# InlineResponse2001

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**codigo_guia_recebimento** | **string** | Código de Barras  ou Outro identificador do cliente informado no momento da criação da solicitação de pagamento. | 
**email_devedor** | **string** | E-mail do devedor para contato. | 
**codigo_pais_telefone_devedor** | **int** | Código do País do Telefone do devedor. | 
**ddd_telefone_devedor** | **int** | DDD do telefone do devedor. | 
**numero_telefone_devedor** | **int** | Número do telefone do devedor. | 
**timestamp_criacao_solicitacao** | **string** | Timestamp que indica o momento em que foi criada a cobrança. Respeita o formato definido na RFC 3339. | 
**quantidade_segundo_expiracao** | **int** | Duração que indica limite, com granularidade de segundos, para que o pagamento do QR Code possa ser realizado, a partir da data-hora de criação. Deve ser utilizado como espécie de data de vencimentos em segundos que deverá ser calculada da data-hora de criação até a data-hora de vencimento. Caso não informado, assume-se a duração de 86400 segundos, que corresponde a 24 horas. | 
**estado_solicitacao** | **string** | Texto descritivo do Estado Solicitacao. | 
**numero_versao_solicitacao_pagamento** | **int** | O tipo do campo \&quot;Numero Versao Solicitacao Pagamento\&quot; é um número. Sempre começa em zero. Sempre varia em acréscimos de 1.  O campo \&quot;Numero Versao Solicitacao Pagamento\&quot; adiciona rastreabilidade ao payload. Uma vez que se recomenda que o payload assinado seja armazenado pelo PSP do pagador em seus registros, fica facilitada a comunicação entre PSPs acerca de qual payload especificamente está se tratando, no contexto de resolução de possíveis problemas. | 
**link_qr_code** | **string** | O campo Link URL representa uma URL que será utilizada para recuperação dos dados que fazem parte do pagamento.   O formato dessa URL, bem como os demais detalhes sobre segurança relacionados ao QR Code,está detalhadono Manual de Segurança do SFN. | 
**qr_code** | **string** | Texto para geração da imagem do QrCode Dinâmico. | 
**cpf_devedor** | **int** | Determina o CPF do devedor. | 
**cnpj_devedor** | **int** | Determina o CNPJ do devedor. Não é permitido que o campo \&quot;Numero CPF Devedor\&quot; e campo \&quot;Numero Cadastro Nac Pessoas Juridicas Devedor\&quot; estejam preenchidos ao mesmo tempo. Se o campo  \&quot;Numero Cadastro Nac Pessoas Juridicas Devedor\&quot; está preenchido, então o campo \&quot;Numero CPF Devedor\&quot; não pode estar preenchido, e vice-versa. Se o campo \&quot;Nome Devedor\&quot; está preenchido, então deve existir ou um campo \&quot;Numero CPF Devedor\&quot; ou um campo  \&quot;Numero Cadastro Nac Pessoas Juridicas Devedor\&quot; preenchido. | 
**nome_devedor** | **string** | Determina o nome da instituição ou pessoa a quem a cobrança está endereçada. O preenchimento do campo \&quot;Nome Devedor\&quot; é obrigatório se o campo \&quot;Numero CPF Devedor\&quot; ou o campo \&quot;Numero Cadastro Nac Pessoas Juridicas Devedor\&quot; estiver preenchido. | 
**valor_original_solicitacao** | **float** | Valor original do documento. | 
**codigo_solicitacao_banco_central_brasil** | **string** | Chave DICT do Recebedor cadastrada no Banco Central - O campo \&quot;Codigo Solicitação Banco Central\&quot;, obrigatório, determina a chave Pix registrada no DICT que será utilizada para a cobrança. Essa chave será lida pelo aplicativo do PSP do pagador para consulta ao DICT, que retornará a informação que identificará o recebedor da cobrança. | 
**descricao_solicitacao_pagamento** | **string** | Determina um texto a ser apresentado ao pagador para que ele possa digitar uma informação correlata, em formato livre, a ser enviada ao recebedor. Esse texto40 será preenchido, na pacs.008, pelo PSP do pagador, no campo RemittanceInformation &lt;RmtInf&gt;. O tamanho do campo &lt;RmtInf&gt; na pacs.008 está limitado a 140 caracteres. | 
**lista_informacao_adicional** | [**\Swagger\Client\Model\InlineResponse2001ListaInformacaoAdicional**](InlineResponse2001ListaInformacaoAdicional.md) |  | 
**codigo_identificador_pagamento** | **string** | EndToEndIdentification que transita na PACS002, PACS004 e PACS008. | 
**valor_pagamento** | **float** | Valor do pagamento (pix). | 
**timestamp_pagamento** | **string** | Horário em que o Pix foi processado no PSP. | 
**cpf_pagador** | **int** | CPF do usuário pagador. | 
**cnpj_pagador** | **int** | CNPJ do usuário pagador. | 
**nome_cliente_pagador** | **string** | Nome do usuário pagador. | 
**texto_informativo_pagador** | **string** | Informação livre do pagador &lt;&#x3D; 140 characters. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

