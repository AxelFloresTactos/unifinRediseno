<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
/*********************************************************************************
 * Description:    Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/
global $timedate;

$mod_strings = [
    'LBL_GOOD_FILE' => 'A importação de arquivo foi lida com sucesso.',
    'LBL_RECORD_CONTAIN_LOCK_FIELD' => 'O registo importado está participando de um processo e não pode ser editado porque alguns campos estão bloqueados para edição pelo processo.',
    'LBL_RECORDS_SKIPPED_DUE_TO_ERROR' => 'erros encontrados. Veja a guia de erros para linhas que não foram importadas devido a erro',
    'LBL_UPDATE_SUCCESSFULLY' => 'registros atualizados com sucesso',
    'LBL_SUCCESSFULLY_IMPORTED' => 'registros criados com sucesso',
    'LBL_STEP_4_TITLE' => 'Passo {0}: importar arquivo',
    'LBL_STEP_5_TITLE' => 'Passo {0}: ver resultados de importação',
    'LBL_CUSTOM_ENCLOSURE' => 'Campos qualificados por:',
    'LBL_ERROR_UNABLE_TO_PUBLISH' => 'Não foi possível publicar. Já existe outro mapa de importação publicado com o mesmo nome.',
    'LBL_ERROR_UNABLE_TO_UNPUBLISH' => 'Não é possível desfazer a publicação de um mapa que pertence a outro usuário. Você tem um mapa de importação com o mesmo nome.',
    'LBL_ERROR_IMPORTS_NOT_SET_UP' => 'Importações não estão configuradas para este tipo de módulo',
    'LBL_IMPORT_TYPE' => 'O que deseja fazer com os dados importados?',
    'LBL_IDM_IMPORT_TYPE_CREATE' => 'Create New Records',
    'LBL_IDM_IMPORT_TYPE_UPDATE' => 'Update Existing Records',
    'LBL_IMPORT_BUTTON' => 'Apenas criar novos registros',
    'LBL_UPDATE_BUTTON' => 'Criar novos registros e atualizar registros existentes',
    'LBL_CREATE_BUTTON_HELP' => 'Use esta opção para criar novos registros. Nota: as linhas no arquivo de importação contendo valores que correspondem aos IDs dos registros existentes não serão importadas se os valores forem mapeados para o campo de ID.',
    'LBL_UPDATE_BUTTON_HELP' => 'Use esta opção para atualizar registros existentes. Será feita a correspondência dos dados no arquivo de importação com os registros existentes com base no ID do registro no arquivo de importação.',
    'LBL_NO_ID' => 'ID obrigatório',
    'LBL_PRE_CHECK_SKIPPED' => 'Pré-verificação ignorada',
    'LBL_NOLOCALE_NEEDED' => 'Não é necessária a conversão local',
    'LBL_FIELD_NAME' => 'Nome do campo',
    'LBL_VALUE' => 'Valor',
    'LBL_ROW_NUMBER' => 'Número de linha',
    'LBL_NONE' => 'Nenhum',
    'LBL_REQUIRED_VALUE' => 'Valor obrigatório ausente',
    'LBL_ERROR_SYNC_USERS' => 'Valor inválido para sincronizar com o cliente de e-mail: ',
    'LBL_ID_EXISTS_ALREADY' => 'Este ID já existe nesta tabela',
    'LBL_SYNC_KEY_EXISTS_ALREADY' => 'SYNC_KEY já existe nesta tabela',
    'LBL_ASSIGNED_USER' => 'Se o usuário não existir, use o usuário atual',
    'LBL_SHOW_HIDDEN' => 'Mostrar campos que normalmente não são importáveis',
    'LBL_UPDATE_RECORDS' => 'Atualizar registros existentes em vez de importá-los (sem desfazer)',
    'LBL_TEST' => 'Teste de importação (não salvar nem alterar dados)',
    'LBL_TRUNCATE_TABLE' => 'Esvaziar tabela antes da importação (excluir todos os registros)',
    'LBL_RELATED_ACCOUNTS' => 'Não criar contas relacionadas',
    'LBL_NO_DATECHECK' => 'Ignorar verificação das datas (opção mais rápida, mas falhará se alguma data estiver errada)',
    'LBL_NO_WORKFLOW' => 'Não executar o fluxo de trabalho durante esta importação',
    'LBL_NO_EMAILS' => 'Não enviar notificações de e-mail durante esta importação',
    'LBL_NO_PRECHECK' => 'Modo de formato nativo',
    'LBL_STRICT_CHECKS' => 'Utilizar conjunto de regras rigoroso (verificar também endereços de e-mail e números de telefone)',
    'LBL_ERROR_SELECTING_RECORD' => 'Erro ao selecionar registro:',
    'LBL_ERROR_DELETING_RECORD' => 'Erro ao excluir registro:',
    'LBL_NOT_SET_UP' => 'A importação não está configurada para este tipo de módulo',
    'LBL_ARE_YOU_SURE' => 'Tem certeza? Isso apagará todos os dados neste módulo.',
    'LBL_NO_RECORD' => 'Não há registro algum com este ID para ser atualizado',
    'LBL_NOT_SET_UP_FOR_IMPORTS' => 'A importação não está configurada para este tipo de módulo',
    'LBL_DEBUG_MODE' => 'Permitir modo de depuração',
    'LBL_ERROR_INVALID_ID' => 'O ID fornecido é longo demais para o campo (o comprimento máximo é de 36 caracteres)',
    'LBL_ERROR_INVALID_PHONE' => 'Número de telefone inválido',
    'LBL_ERROR_INVALID_NAME' => 'Cadeia de caracteres longa demais para o campo',
    'LBL_ERROR_INVALID_VARCHAR' => 'Cadeia de caracteres longa demais para o campo',
    'LBL_ERROR_INVALID_DATETIME' => 'Data e hora inválidas',
    'LBL_ERROR_INVALID_DATETIMECOMBO' => 'Data e hora inválidas',
    'LBL_ERROR_INVALID_INT' => 'Valor inteiro inválido',
    'LBL_ERROR_INVALID_NUM' => 'Valor numérico inválido',
    'LBL_ERROR_INVALID_TIME' => 'Hora inválida',
    'LBL_ERROR_INVALID_EMAIL' => 'Endereço de e-mail inválido',
    'LBL_ERROR_INVALID_BOOL' => 'Valor inválido (deve ser 1 ou 0)',
    'LBL_ERROR_INVALID_DATE' => 'Cadeia de caracteres de data inválida',
    'LBL_ERROR_INVALID_USER' => 'Nome de usuário ou ID inválido',
    'LBL_ERROR_INVALID_TEAM' => 'Nome de equipe ou ID inválido',
    'LBL_ERROR_INVALID_ACCOUNT' => 'Nome de conta ou ID inválido',
    'LBL_ERROR_INVALID_RELATE' => 'Campo relacional inválido',
    'LBL_ERROR_INVALID_CURRENCY' => 'Valor de moeda inválido',
    'LBL_ERROR_INVALID_FLOAT' => 'Número de ponto flutuante inválido',
    'LBL_ERROR_NOT_IN_ENUM' => 'O valor não está na lista suspensa. Os valores permitidos são: ',
    'LBL_ERROR_ENUM_EMPTY' => 'O valor não está na lista suspensa. A lista suspensa está vazia',
    'LBL_NOT_MULTIENUM' => 'Não é um MultiEnum',
    'LBL_IMPORT_MODULE_NO_TYPE' => 'A importação não está configurada para este tipo de módulo',
    'LBL_IMPORT_MODULE_NO_USERS' => 'AVISO: não há usuários definidos em seu sistema. Se você fizer a importação sem adicionar usuários primeiro, todos os registros pertencerão ao administrador.',
    'LBL_IMPORT_MODULE_MAP_ERROR' => 'Não foi possível publicar. Já existe outro Mapa de importação publicado com o mesmo nome.',
    'LBL_IMPORT_MODULE_MAP_ERROR2' => 'Não é possível desfazer a publicação de um mapa que pertence a outro usuário. Você possui um Mapa de importação com o mesmo nome.',
    'LBL_IMPORT_MODULE_NO_DIRECTORY' => 'O diretório ',
    'LBL_IMPORT_MODULE_NO_DIRECTORY_END' => ' não existe ou não é gravável',
    'LBL_IMPORT_MODULE_ERROR_NO_UPLOAD' => 'O arquivo não foi carregado com sucesso. É possível que a configuração &#39;upload_max_filesize&#39; em seu arquivo php.ini esteja configurada para um número menor',
    'LBL_IMPORT_MODULE_ERROR_LARGE_FILE' => 'O arquivo é grande demais. Máx.:',
    'LBL_IMPORT_MODULE_ERROR_LARGE_FILE_END' => 'Bytes. Alterar $sugar_config[&#39;upload_maxsize&#39;] em config.php',
    'LBL_MODULE_NAME' => 'Importar',
    'LBL_MODULE_NAME_SINGULAR' => 'Importar',
    'LBL_TRY_AGAIN' => 'Tente novamente',
    'LBL_START_OVER' => 'Começar novamente',
    'LBL_ERROR' => 'Erro:',
    'LBL_IMPORT_ERROR_MAX_REC_LIMIT_REACHED' => 'O arquivo de importação contém {0} linhas. O número ideal de linhas é {1}. Um número maior de linhas pode retardar o processo de importação. Clique em OK para continuar importando. Clique em Cancelar para revisar e carregar o arquivo de importação novamente.',
    'ERR_IMPORT_SYSTEM_ADMININSTRATOR' => 'Você não pode importar um usuário administrador do sistema',
    'ERR_REPORT_LOOP' => 'O sistema detectou um loop de relatórios. Um usuário não pode passar informação, nem qualquer de seus gerentes que reportam a eles.',
    'ERR_MULTIPLE' => 'Múltiplas colunas foram definidas com o mesmo nome de campo.',
    'ERR_MISSING_REQUIRED_FIELDS' => 'Campos obrigatórios ausentes:',
    'ERR_MISSING_MAP_NAME' => 'Nome de mapeamento personalizado ausente',
    'ERR_USERS_IMPORT_DISABLED_TO_IDM_MODE' => 'A importação de usuários está desativada para o modo IDM.',
    'ERR_SELECT_FULL_NAME' => 'Não é possível selecionar Nome completo quando Primeiro nome e Sobrenome estão selecionados.',
    'ERR_SELECT_FILE' => 'Selecione um arquivo para ser carregado.',
    'LBL_SELECT_FILE' => 'Selecione um arquivo:',
    'LBL_CUSTOM' => 'Personalizar',
    'LBL_CUSTOM_CSV' => 'Arquivo personalizado delimitado por vírgula',
    'LBL_CSV' => 'um arquivo em meu computador',
    'LBL_EXTERNAL_SOURCE' => 'uma aplicação externa ou serviço',
    'LBL_TAB' => 'Arquivo delimitado por tabulação',
    'LBL_CUSTOM_DELIMITED' => 'Arquivo delimitado personalizado',
    'LBL_CUSTOM_DELIMITER' => 'Campos delimitados por:',
    'LBL_FILE_OPTIONS' => 'Opções de arquivo',
    'LBL_CUSTOM_TAB' => 'Arquivo personalizado delimitado por tabulação',
    'LBL_DONT_MAP' => '-- Não mapeie este campo --',
    'LBL_STEP_MODULE' => 'Para qual módulo deseja importar estes dados?',
    'LBL_STEP_1_TITLE' => 'Passo 1: selecionar fonte de dados',
    'LBL_CONFIRM_TITLE' => 'Passo {0}: confirmar propriedades do arquivo de importação',
    'LBL_CONFIRM_EXT_TITLE' => 'Step {0}: confirmar propriedades de fonte externa',
    'LBL_WHAT_IS' => 'Localização dos meus dados:',
    'LBL_MICROSOFT_OUTLOOK' => 'Microsoft Outlook',
    'LBL_MICROSOFT_OUTLOOK_HELP' => 'Os mapeamentos personalizados para Microsoft Outlook dependem da importação de arquivos delimitados por vírgula (.csv). Se o seu arquivo de importação for delimitado por tabulação, os mapeamentos não serão aplicados como esperado.',
    'LBL_ACT' => 'Act!',
    'LBL_SALESFORCE' => 'Salesforce.com',
    'LBL_MY_SAVED' => 'Para usar suas configurações de importação salvas, selecione uma opção abaixo:',
    'LBL_PUBLISH' => 'Publicar',
    'LBL_DELETE' => 'Excluir',
    'LBL_PUBLISHED_SOURCES' => 'Para usar configurações de importação predefinidas, selecione uma opção abaixo:',
    'LBL_UNPUBLISH' => 'Desfazer publicação',
    'LBL_NEXT' => 'Próximo &gt;',
    'LBL_BACK' => '&lt; Voltar',
    'LBL_STEP_2_TITLE' => 'Passo {0}: carregar arquivo de importação',
    'LBL_HAS_HEADER' => 'Linha de cabeçalho:',
    'LBL_NUM_1' => '1.',
    'LBL_NUM_2' => '2.',
    'LBL_NUM_3' => '3.',
    'LBL_NUM_4' => '4.',
    'LBL_NUM_5' => '5.',
    'LBL_NUM_6' => '6.',
    'LBL_NUM_7' => '7.',
    'LBL_NUM_8' => '8.',
    'LBL_NUM_9' => '9.',
    'LBL_NUM_10' => '10.',
    'LBL_NUM_11' => '11.',
    'LBL_NUM_12' => '12.',
    'LBL_NOTES' => 'Notas:',
    'LBL_NOW_CHOOSE' => 'Agora escolha o arquivo a ser importado:',
    'LBL_IMPORT_OUTLOOK_TITLE' => 'O Microsoft Outlook 98 e o 2000 podem exportar dados no formato de <b>valores separados por vírgula</b> (.csv), o qual pode ser usado para importar dados para o sistema. Para exportar seus dados a partir do Outlook, siga estes passos:',
    'LBL_OUTLOOK_NUM_1' => 'Iniciar o <b>Outlook</b>',
    'LBL_OUTLOOK_NUM_2' => 'Selecione o menu <b>Arquivo</b> e, em seguida, a opção <b>Importar e exportar...</b>',
    'LBL_OUTLOOK_NUM_3' => 'Escolha <b>Exportar para um arquivo</b> e clique em Avançar',
    'LBL_OUTLOOK_NUM_4' => 'Escolha <b>Valores Separados por Vírgulas (Windows)</b> e clique em <b>Avançar</b>.<br>  Nota: talvez seja necessário instalar o componente de exportação',
    'LBL_OUTLOOK_NUM_5' => 'Selecione a pasta <b>Contatos</b> e clique em <b>Avançar</b>. Você pode selecionar diferentes pastas de contatos se seus contatos estiverem armazenados em múltiplas pastas',
    'LBL_OUTLOOK_NUM_6' => 'Escolha um nome de arquivo e clique em <b>Avançar</b>',
    'LBL_OUTLOOK_NUM_7' => 'Clique em <b>Concluir</b>',
    'LBL_IMPORT_SF_TITLE' => 'A Salesforce.com pode exportar dados no formato <b>valores separados por vírgula</b>, o qual pode ser utilizado para importar dados para o sistema. Para exportar seus dados a partir da Salesforce.com, siga estes passos:',
    'LBL_SF_NUM_1' => 'Abra seu navegador, acesse http://www.salesforce.com/br e faça logon com seu e-mail e sua senha',
    'LBL_SF_NUM_2' => 'Clique na guia <b>Relatórios</b> do menu superior',
    'LBL_SF_NUM_3' => '<b>Para exportar contas:</b> Clique no link <b>Contas ativas</b><br><b>Para exportar contatos:</b> Clique no link <b>Listas de endereçamento</b>',
    'LBL_SF_NUM_4' => 'No <b>Passo 1: selecionar o tipo de relatório</b>, selecione <b>Relatórios por tabulação</b> e clique em <b>Avançar</b>',
    'LBL_SF_NUM_5' => 'No <b>Passo 2: selecionar colunas do relatório</b>, escolha as colunas que deseja exportar e clique em <b>Avançar</b>',
    'LBL_SF_NUM_6' => 'No <b>Passo 3: selecionar a informação a ser resumida</b>, clique em <b>Avançar</b>',
    'LBL_SF_NUM_7' => 'No <b>Passo 4: ordenar as colunas do relatório</b>, clique em <b>Avançar</b>',
    'LBL_SF_NUM_8' => 'No <b>Passo 5: selecionar os critérios de geração de relatórios</b>, em <b>Data de início</b>, escolha uma data antiga o bastante para incluir todas as suas contas. Você também pode exportar um subconjunto das contas usando um critério mais avançado. Quando estiver pronto, clique em <b>Executar relatório</b>',
    'LBL_SF_NUM_9' => 'O relatório será gerado, e a página exibirá <b>Status da geração de relatório: completo.</b> Agora clique em <b>Exportar para Excel</b>',
    'LBL_SF_NUM_10' => 'Em <b>Exportar relatório:</b>, para <b>Formato de arquivo de exportação:</b>, escolha <b>Delimitado por vírgula .csv</b>. Clique em <b>Exportar</b>.',
    'LBL_SF_NUM_11' => 'Um diálogo em pop-up abrirá para que você salve o arquivo exportado em seu computador.',
    'LBL_IMPORT_ACT_TITLE' => 'Act! pode exportar dados no formato de <b>valores separados por vírgula</b>, o qual pode ser usado para importar dados para o sistema. Para exportar seus dados a partir do Act!, siga estes passos:',
    'LBL_ACT_NUM_1' => 'Inicie o <b>ACT!</b>',
    'LBL_ACT_NUM_2' => 'Selecione o menu <b>Arquivo</b>, a opção <b>Trocar dados</b> e, depois, a opção <b>Exportar...</b>',
    'LBL_ACT_NUM_3' => 'Selecione o tipo de arquivo <b>Texto delimitado por</b>',
    'LBL_ACT_NUM_4' => 'Escolha o nome de arquivo e o local para os dados exportados e clique em <b>Avançar</b>',
    'LBL_ACT_NUM_5' => 'Selecione <b>Apenas registros de contatos</b>',
    'LBL_ACT_NUM_6' => 'Clique no botão <b>Opções...</b>',
    'LBL_ACT_NUM_7' => 'Selecione <b>Vírgula</b> como o caractere separador de campo',
    'LBL_ACT_NUM_8' => 'Marque a caixa de seleção <b>Sim, exportar nomes de campo</b> e clique em <b>OK</b>',
    'LBL_ACT_NUM_9' => 'Clique em <b>Avançar</b>',
    'LBL_ACT_NUM_10' => 'Selecione <b>Todos os registros</b> e clique em <b>Concluir</b>',
    'LBL_IMPORT_CUSTOM_TITLE' => 'Muitos aplicativos permitem exportar dados em um <b>arquivo de texto delimitado por vírgula (.csv)</b> usando estes passos:',
    'LBL_CUSTOM_NUM_1' => 'Inicie o aplicativo e abra o arquivo de dados',
    'LBL_CUSTOM_NUM_2' => 'Selecione a opção <b>Salvar como...</b> ou <b>Exportar...</b>',
    'LBL_CUSTOM_NUM_3' => 'Grave o arquivo no formato <b>CSV</b> (ou <b>valores separados por vírgula</b>)',
    'LBL_IMPORT_TAB_TITLE' => 'A maioria dos aplicativos permite exportar dados no formato de <b>arquivo de texto delimitado por tabulação (.tsv ou .tab)</b> usando estes passos:',
    'LBL_TAB_NUM_1' => 'Inicie o aplicativo e abra o arquivo de dados',
    'LBL_TAB_NUM_2' => 'Selecione a opção <b>Salvar como...</b> ou <b>Exportar...</b>',
    'LBL_TAB_NUM_3' => 'Salve o arquivo no formato <b>TSV</b> (ou <b>valores separados por tabulação</b>)',
    'LBL_STEP_3_TITLE' => 'Passo {0}: confirmar mapeamentos de campos',
    'LBL_STEP_DUP_TITLE' => 'Passo {0}: verificar se há itens duplicados',
    'LBL_SELECT_FIELDS_TO_MAP' => 'Na lista abaixo, selecione os campos do arquivo de importação que deverão ser importados em cada campo do sistema. Quando terminar, clique em <b>Avançar</b>:',
    'LBL_DATABASE_FIELD' => 'Campo Módulo',
    'LBL_HEADER_ROW' => 'Linha do cabeçalho',
    'LBL_HEADER_ROW_OPTION_HELP' => 'Selecione esta opção se a linha superior do arquivo de importação for uma linha de cabeçalho contendo rótulos de campo.',
    'LBL_ROW' => 'Linha',
    'LBL_SAVE_AS_CUSTOM' => 'Salvar como mapeamento personalizado:',
    'LBL_SAVE_AS_CUSTOM_NAME' => 'Nome do mapeamento personalizado:',
    'LBL_CONTACTS_NOTE_1' => 'O Sobrenome ou o Nome completo deve ser mapeado.',
    'LBL_CONTACTS_NOTE_2' => 'Se o Nome completo tiver sido mapeado, o Primeiro nome e o Sobrenome serão ignorados.',
    'LBL_CONTACTS_NOTE_3' => 'Se o Nome completo tiver sido mapeado, os dados deste campo serão divididos em Primeiro nome e Sobrenome quando inseridos no banco de dados.',
    'LBL_CONTACTS_NOTE_4' => 'Os campos Endereço 2 e Endereço 3 serão concatenados com o campo Endereço principal quando inseridos no banco de dados.',
    'LBL_ACCOUNTS_NOTE_1' => 'Os campos Endereço 2 e Endereço 3 serão concatenados com o campo Endereço principal quando inseridos no banco de dados.',
    'LBL_REQUIRED_NOTE' => 'Campo(s) obrigatório(s):',
    'LBL_IMPORT_NOW' => 'Importar agora',
    'LBL_' => '',
    'LBL_CANNOT_OPEN' => 'Não é possível abrir o arquivo importado para leitura',
    'LBL_NOT_SAME_NUMBER' => 'Não há o mesmo número de campos por linha em seu arquivo',
    'LBL_NO_LINES' => 'Nenhuma linha foi detectada no arquivo de importação. Certifique-se de que não há linhas vazias no arquivo e tente novamente.',
    'LBL_FILE_ALREADY_BEEN_OR' => 'O arquivo de importação já foi processado ou não existe',
    'LBL_SUCCESS' => 'Sucesso:',
    'LBL_FAILURE' => 'Falha na importação:',
    'LBL_SUCCESSFULLY' => 'Importação bem-sucedida',
    'LBL_LAST_IMPORT_UNDONE' => 'A importação foi desfeita.',
    'LBL_NO_IMPORT_TO_UNDO' => 'Não havia importação alguma para desfazer.',
    'LBL_FAIL' => 'Falha:',
    'LBL_RECORDS_SKIPPED' => 'Registros ignorados porque havia um ou mais registros obrigatórios ausentes neles',
    'LBL_IDS_EXISTED_OR_LONGER' => 'Registros ignorados porque seus IDs já existem ou são maiores que 36 caracteres',
    'LBL_RESULTS' => 'Resultados',
    'LBL_CREATED_TAB' => 'Registros criados',
    'LBL_DUPLICATE_TAB' => 'Duplicados',
    'LBL_ERROR_TAB' => 'Erros',
    'LBL_IMPORT_MORE' => 'Importar novamente',
    'LBL_FINISHED' => 'Concluído',
    'LBL_UNDO_LAST_IMPORT' => 'Desfazer importação',
    'LBL_LAST_IMPORTED' => 'Criado',
    'ERR_MULTIPLE_PARENTS' => 'Você pode ter apenas um ID precedente definido',
    'LBL_DUPLICATES' => 'Itens duplicados encontrados',
    'LNK_DUPLICATE_LIST' => 'Fazer download da lista de itens duplicados',
    'LNK_ERROR_LIST' => 'Fazer download da lista de erros',
    'LNK_RECORDS_SKIPPED_DUE_TO_ERROR' => 'Fazer download dos registros que não foram importados',
    'LBL_UNIQUE_INDEX' => 'Escolha o índice para a comparação de itens duplicados',
    'LBL_VERIFY_DUPS' => 'Para verificar registros existentes com dados correspondentes no arquivo de importação, selecione os campos a serem verificados.',
    'LBL_INDEX_USED' => 'Campos a serem verificados:',
    'LBL_INDEX_NOT_USED' => 'Campos disponíveis:',
    'LBL_IMPORT_MODULE_ERROR_NO_MOVE' => 'O arquivo não foi carregado com sucesso. Verifique as permissões de arquivo no diretório cache de instalação do Sugar.',
    'LBL_IMPORT_FIELDDEF_ID' => 'Número de ID exclusivo',
    'LBL_IMPORT_FIELDDEF_RELATE' => 'Nome ou ID',
    'LBL_IMPORT_FIELDDEF_PHONE' => 'Número de telefone',
    'LBL_IMPORT_FIELDDEF_TEAM_LIST' => 'Nome ou ID de equipe',
    'LBL_IMPORT_FIELDDEF_NAME' => 'Qualquer texto',
    'LBL_IMPORT_FIELDDEF_VARCHAR' => 'Qualquer texto',
    'LBL_IMPORT_FIELDDEF_TEXT' => 'Qualquer texto',
    'LBL_IMPORT_FIELDDEF_TIME' => 'Hora',
    'LBL_IMPORT_FIELDDEF_DATE' => 'Data',
    'LBL_IMPORT_FIELDDEF_DATETIME' => 'Data e Hora',
    'LBL_IMPORT_FIELDDEF_ASSIGNED_USER_NAME' => 'Nome ou ID de usuário',
    'LBL_IMPORT_FIELDDEF_BOOL' => '&#39;0&#39; ou &#39;1&#39;',
    'LBL_IMPORT_FIELDDEF_ENUM' => 'Lista',
    'LBL_IMPORT_FIELDDEF_EMAIL' => 'Endereço de e-mail',
    'LBL_IMPORT_FIELDDEF_INT' => 'Numérico (não decimal)',
    'LBL_IMPORT_FIELDDEF_DOUBLE' => 'Numérico (não decimal)',
    'LBL_IMPORT_FIELDDEF_NUM' => 'Numérico (não decimal)',
    'LBL_IMPORT_FIELDDEF_CURRENCY' => 'Numérico (decimal permitido)',
    'LBL_IMPORT_FIELDDEF_FLOAT' => 'Numérico (decimal permitido)',
    'LBL_DATE_FORMAT' => 'Formato da data:',
    'LBL_TIME_FORMAT' => 'Formato da hora:',
    'LBL_TIMEZONE' => 'Fuso horário:',
    'LBL_ADD_ROW' => 'Adicionar campo',
    'LBL_REMOVE_ROW' => 'Remover campo',
    'LBL_DEFAULT_VALUE' => 'Valor padrão',
    'LBL_SHOW_ADVANCED_OPTIONS' => 'Mostrar propriedades do arquivo de importação',
    'LBL_HIDE_ADVANCED_OPTIONS' => 'Ocultar propriedades do arquivo de importação',
    'LBL_SHOW_NOTES' => 'Ver Notas',
    'LBL_HIDE_NOTES' => 'Ocultar notas',
    'LBL_SHOW_PREVIEW_COLUMNS' => 'Mostrar pré-visualização de colunas',
    'LBL_HIDE_PREVIEW_COLUMNS' => 'Ocultar pré-visualização de colunas',
    'LBL_DUPLICATE_CHECK_OPERATOR' => 'Verifique se há duplicatas usando o operador:',
    'LBL_SAVE_MAPPING_AS' => 'Para salvar os arquivos de importação, forneça um nome para as configurações salvas:',
    'LBL_OPTION_ENCLOSURE_QUOTE' => 'Aspas simples (&#39;)',
    'LBL_OPTION_ENCLOSURE_DOUBLEQUOTE' => 'Aspas duplas (")',
    'LBL_OPTION_ENCLOSURE_NONE' => 'Nenhum',
    'LBL_OPTION_ENCLOSURE_OTHER' => 'Outro:',
    'LBL_IMPORT_COMPLETE' => 'Importação Completa',
    'LBL_IMPORT_COMPLETED' => 'Importação concluída',
    'LBL_IMPORT_ERROR' => 'Ocorreram erros na importação',
    'LBL_IMPORT_RECORDS' => 'Importando registros',
    'LBL_IMPORT_RECORDS_OF' => 'de',
    'LBL_IMPORT_RECORDS_TO' => 'para',
    'LBL_CURRENCY' => 'Moeda:',
    'LBL_SYSTEM_SIG_DIGITS' => 'Dígitos Notáveis do Sistema',
    'LBL_NUMBER_GROUPING_SEP' => 'Separador de milhar:',
    'LBL_DECIMAL_SEP' => 'Símbolo decimal:',
    'LBL_LOCALE_DEFAULT_NAME_FORMAT' => 'Formato de Exibição do Nome',
    'LBL_LOCALE_EXAMPLE_NAME_FORMAT' => 'Exemplo',
    'LBL_LOCALE_NAME_FORMAT_DESC' => '<i>"s" Saudação, "f" Primeiro nome, "l" Sobrenome</i>',
    'LBL_CHARSET' => 'Codificação do nome:',
    'LBL_MY_SAVED_HELP' => 'Use esta opção para aplicar as configurações pré-definidas de importação, incluindo propriedades de importação, mapeamentos e as configurações de verificação duplicadas, para esta importação. <br><br>Clique em <b>Excluir</b> para excluir um mapeamento para todos os usuários.',
    'LBL_MY_SAVED_ADMIN_HELP' => 'Use esta opção para aplicar as configurações pré-definidas de importação, incluindo propriedades de importação, mapeamentos e as configurações de verificação duplicadas, para esta importação.<br><br>Clique em <b>Publicar</b> para tornar o mapeamento disponível para outros usuários.<br>Clique em <b>Desfazer publicação</b> para tornar o mapeamento indisponível para outros usuários.<br>Clique em <b>Excluir</b> para excluir um mapeamento para todos os usuários.',
    'LBL_MY_PUBLISHED_HELP' => 'Use esta opção para aplicar as configurações pré-definidas de importação, incluindo propriedades de importação, mapeamentos e as configurações de verificação duplicadas, para esta importação.',
    'LBL_ENCLOSURE_HELP' => '<p>O <b>caractere qualificador</b> é utilizado para encerrar o conteúdo de campo destinado, incluindo quaisquer caracteres que são utilizados como delimitadores.<br><br>Exemplo: se o delimitador é uma vírgula (,) e o qualificador é uma aspa ("),<br><b>"Cupertino, Califórnia"</b> é importado para um campo no aplicativo e aparece como <b>Cupertino, Califórnia</b>.<br>Se não há caracteres qualificadores ou se um caractere diferente é o qualificador,<br><b>"Cupertino, Califórnia"</b> é importado para dois campos adjacentes como <b>"Cupertino</b> e <b>Califórnia"</b>.<br><br>Nota: o arquivo de importação pode não conter caractere qualificador algum.<br>O caractere qualificador padrão para arquivos delimitados por vírgula e por tabulação criados no Excel é uma aspa.</p>',
    'LBL_DELIMITER_COMMA_HELP' => 'Use esta opção para selecionar e carregar um arquivo de planilha de dados com os dados que você deseja importar. Exemplo: arquivo .csv delimitado por vírgula ou arquivo de exportação do Microsoft Outlook.',
    'LBL_DELIMITER_TAB_HELP' => 'Selecione esta opção se o caractere que separa os campos no arquivo de importação é uma <b>tabulação</b> e a extensão do arquivo é .txt.',
    'LBL_DELIMITER_CUSTOM_HELP' => 'Selecione esta opção se o caractere que separa os campos no arquivo de importação não é uma vírgula nem uma tabulação, e digite o caractere no campo adjacente.',
    'LBL_DATABASE_FIELD_HELP' => 'Esta coluna exibe todos os campos no módulo. Selecione um campo a ser mapeado para os dados nas linhas do arquivo de importação.',
    'LBL_HEADER_ROW_HELP' => 'Esta coluna mostra os rótulos na linha de cabeçalho do arquivo de importação.',
    'LBL_DEFAULT_VALUE_HELP' => 'Indique um valor a ser usado para o campo no registro criado ou atualizado se o campo no arquivo de importação não contiver dados.',
    'LBL_ROW_HELP' => 'Essa coluna exibe os dados na primeira linha que não pertence ao cabeçalho do arquivo de importação. Se os rótulos de linha de cabeçalho estiverem aparecendo nessa coluna, clique em Voltar para especificar a linha de cabeçalho em Propriedades do arquivo de importação.',
    'LBL_SAVE_MAPPING_HELP' => 'Informe um nome para salvar as configurações de importação, incluindo os mapeamentos de campo e índices usados para a verificação de itens duplicados. As configurações de importação salvas podem ser usadas em importações futuras.',
    'LBL_IMPORT_FILE_SETTINGS_HELP' => 'Durante o carregamento de seu arquivo de importação, algumas propriedades do arquivo podem ter sido automaticamente excluídas. Veja e gerencie essas propriedades conforme<br> necessário. Nota: as configurações fornecidas aqui pertencem a esta importação<br> e não substituirão suas Configurações de usuário gerais.',
    'LBL_VERIFY_DUPLCATES_HELP' => 'Para localizar registros existentes no sistema que possam ser considerados itens duplicados dos registros a serem importados, realize uma verificação de itens duplicados para os dados correspondentes. Os campos arrastados para a coluna "Verificar dados" serão usados para a verificação de itens duplicados. As linhas em seu arquivo de importação contendo os dados correspondentes serão listadas na página seguinte, e você poderá selecionar quais linhas devem ser importadas',
    'LBL_IMPORT_STARTED' => 'Início da importação:',
    'LBL_IMPORT_FILE_SETTINGS' => 'Configurações do arquivo de importação',
    'LBL_IDM_RECORD_CANNOT_BE_CREATED' => 'Registro não adicionado. Os novos usuários precisam ser adicionados nas Configurações do SugarCloud',
    'LBL_RECORD_CANNOT_BE_UPDATED' => 'O registro não pôde ser atualizado devido a um problema de permissões',
    'LBL_DELETE_MAP_CONFIRMATION' => 'Tem certeza de que deseja excluir este conjunto salvo de configurações de importação?',
    'LBL_THIRD_PARTY_CSV_SOURCES' => 'Se o arquivo de importação de dados tiver sido exportado a partir de uma das seguintes fontes, selecione qual.',
    'LBL_THIRD_PARTY_CSV_SOURCES_HELP' => 'Selecione a fonte para aplicar automaticamente os mapeamentos personalizados a fim de simplificar o processo de mapeamento (próxima etapa).',
    'LBL_EXTERNAL_SOURCE_HELP' => 'Use esta opção para importar os dados diretamente a partir de um aplicativo ou serviço externo, como o Gmail.',
    'LBL_EXAMPLE_FILE' => 'Fazer download do modelo do arquivo de importação',
    'LBL_CONFIRM_IMPORT' => 'Você selecionou a opção para atualizar os registros durante o processo de importação. As atualizações feitas em registros existentes não podem ser desfeitas. No entanto, os registros criados durante o processo de importação podem ser desfeitos (excluídos), se desejado. Clique em Cancelar para selecionar a opção para apenas criar novos registros, ou clique em OK para continuar.',
    'LBL_IDM_CONFIRM_IMPORT' => 'Updates made to existing records during the import process cannot be undone. Click Cancel to create new records, or click OK to continue.',
    'LBL_CONFIRM_MAP_OVERRIDE' => 'Aviso: você já selecionou um mapeamento personalizado para esta importação, deseja continuar?',
    'LBL_EXTERNAL_FIELD' => 'Campo externo',
    'LBL_SAMPLE_URL_HELP' => 'Faça download de um arquivo de importação de amostra contendo uma linha de cabeçalho dos campos do módulo. O arquivo pode ser usado como um modelo para criar um arquivo de importação contendo os dados que você deseja importar.',
    'LBL_AUTO_DETECT_ERROR' => 'O campo delimitador e o qualificador no arquivo de importação não puderam ser detectados. Verifique as configurações nas propriedades do arquivo de importação.',
    'LBL_MIME_TYPE_ERROR_1' => 'O arquivo selecionado não parece conter uma lista delimitada. Verifique o tipo de arquivo. Recomendamos arquivos delimitados por vírgula (.csv).',
    'LBL_MIME_TYPE_ERROR_2' => 'Para prosseguir com a importação do arquivo selecionado, clique em OK. Para carregar um novo arquivo, clique em Tentar novamente',
    'LBL_FIELD_DELIMETED_HELP' => 'O delimitador de campo especifica o caractere usado para separar as colunas de campo.',
    'LBL_FILE_UPLOAD_WIDGET_HELP' => 'Selecione um arquivo contendo dados que são separados por um delimitador, como um arquivo delimitado por vírgula ou por tabulação. Recomendamos arquivos do tipo .csv.',
    'LBL_EXTERNAL_ERROR_NO_SOURCE' => 'Não foi possível recuperar o adaptador de fonte, tente novamente mais tarde.',
    'LBL_EXTERNAL_ERROR_FEED_CORRUPTED' => 'Não foi possível recuperar a alimentação externa, tente novamente mais tarde.',
    'LBL_ERROR_IMPORT_CACHE_NOT_WRITABLE' => 'O diretório de cache de importação não é gravável.',
    'LBL_ADD_FIELD_HELP' => 'Use esta opção para adicionar um valor a um campo em todos os registros criados e/ou atualizados. Selecione o campo e insira ou selecione um valor para esse campo na coluna Valor padrão.',
    'LBL_MISSING_HEADER_ROW' => 'Nenhuma linha de cabeçalho encontrada',
    'LBL_CANCEL' => 'Cancelar',
    'LBL_SELECT_DS_INSTRUCTION' => 'Pronto para iniciar a importação? Selecione a fonte dos dados que deseja importar.',
    'LBL_SELECT_UPLOAD_INSTRUCTION' => 'Selecione o arquivo em seu computador que contém os dados que você deseja importar, ou faça o download do modelo para obter uma vantagem na criação do arquivo de importação.',
    'LBL_SELECT_IDM_CREATE_INSTRUCTION' => 'Para criar novos registros, acesse as <a href="{0}" target="_blank">Configurações do SugarCloud</a>.',
    'LBL_SELECT_IDM_UPLOAD_INSTRUCTION' => 'Para atualizar registros existentes, selecione um arquivo no seu computador que tenha os dados que deseja importar.',
    'LBL_SELECT_PROPERTY_INSTRUCTION' => 'Assim é como as primeiras linhas do arquivo de importação aparecem com as propriedades do arquivo detectado. Se uma linha de cabeçalho tiver sido detectada, ela será exibida na linha superior da tabela. Veja as propriedades do arquivo de importação para fazer alterações às propriedades detectadas e para definir propriedades adicionais. A atualização das definições atualizará os dados que aparecem na tabela.',
    'LBL_SELECT_MAPPING_INSTRUCTION' => 'A tabela abaixo contém todos os campos no módulo que podem ser mapeado para os dados no arquivo de importação. Se o arquivo contiver uma linha de cabeçalho, significa que as colunas no arquivo foram mapeadas para os campos correspondentes. Se os dados importados contiverem datas, o ano deverá estar no formato aaaa. Verifique os mapeamentos para ter certeza de que são o que você esperava, e faça alterações se necessário. Para ajudar você a verificar os mapeamentos, a Linha 1 mostra os dados no arquivo. Certifique-se de mapear para todos os campos obrigatórios (marcados com um asterisco).',
    'LBL_IDM_SELECT_MAPPING_INSTRUCTION' => 'The table below contains all of the editable fields in the module that can be mapped to the data in the import file. If the file contains a header row, the columns in the file have been mapped to matching fields. If the import data contain dates, the year must be in YYYY format. Check the mappings to make sure that they are what you expect, and make changes, as necessary. To help you check the mappings, Row 1 displays the data in the file. Be sure to map to all of the required fields (noted by an asterisk).',
    'LBL_IDM_SELECT_MAPPING_FIELDS_INSTRUCTION' => '<a href="{0}" target="_blank">Fields</a> that are only editable in SugarIdentity via the SugarCloud Settings console will not be available to map.',
    'LBL_SELECT_DUPLICATE_INSTRUCTION' => 'Para evitar a criação de registros duplicados, selecione qual dos campos mapeados você deseja usar para executar uma verificação de dados duplicados enquanto os dados são importados. Os valores de registros existentes nos campos selecionados serão comparados com os dados no arquivo de importação. Se forem encontrados dados correspondentes, as linhas no arquivo de importação contendo os dados serão exibidas juntamente com os resultados de importação (página seguinte). Depois disso, você será capaz de selecionar quais dessas linhas devem continuar sendo importadas.',
    'LBL_EXT_SOURCE_SIGN_IN' => 'Entrar',
    'LBL_EXT_SOURCE_SIGN_OUT' => 'Sair',
    'LBL_DUP_HELP' => 'Estas são as linhas do arquivo de importação que não foram importados porque contêm dados que coincidem com os valores nos registros existentes com base na verificação de itens duplicados. Os dados correspondentes são realçados. Para importar essas linhas novamente, faça o download da lista, faça alterações e clique em <b>Importar novamente</b>.',
    'LBL_DESELECT' => 'desfazer seleção',
    'LBL_SUMMARY' => 'Resumo',
    'LBL_OK' => 'OK',
    'LBL_ERROR_HELP' => 'Estas são as linhas do arquivo de importação que não foram importadas devido a erros. Para importar essas linhas novamente, faça o download da lista, faça alterações e clique em <b>Importar novamente</b>',
    'LBL_EXTERNAL_MAP_HELP' => 'A tabela abaixo contém os campos da fonte externa e os campos do módulo para o qual eles são mapeados. Verifique os mapeamentos para ter certeza de que são o que você esperava, e faça alterações se necessário. Certifique-se de mapear para todos os campos obrigatórios (indicados por um asterisco).',
    'LBL_EXTERNAL_MAP_NOTE' => 'Será feita a tentativa de importação para contatos de todos os grupos de Contatos do Google.',
    'LBL_EXTERNAL_MAP_NOTE_SUB' => 'Por padrão, os Nomes de usuário dos usuários recém-criados serão os Nomes completos do Contato Google. Os Nomes de usuário podem ser alterados depois de os registros de usuário serem criados.',
    'LBL_EXTERNAL_MAP_SUB_HELP' => 'Clique em <b>Importar agora</b> para iniciar a importação. Serão criados registros apenas para as entradas que incluem sobrenomes. Não serão criados registros para dados identificados como duplicados com base em nomes e/ou endereços de e-mail que coincidem com registros existentes.',
    'LBL_EXTERNAL_FIELD_TOOLTIP' => 'Esta coluna exibe os campos da fonte externa contendo dados que serão usados ​​para criar novos registros.',
    'LBL_EXTERNAL_DEFAULT_TOOPLTIP' => 'Indique um valor a ser usado para o campo no registro criado se o campo da fonte externa não contiver dados.',
    'LBL_EXTERNAL_ASSIGNED_TOOLTIP' => 'Para atribuir os novos registros a um usuário que não seja você, use a coluna Valor padrão para selecionar o usuário.',
    'LBL_EXTERNAL_TEAM_TOOLTIP' => 'Para atribuir os novos registros a equipes que não sejam sua equipe padrão, use a coluna Valor padrão para selecionar as equipes.',
    'LBL_SIGN_IN_HELP' => 'Para habilitar este serviço, acesse a aba Contas externas a partir de sua página de configurações do usuário.',
    'LBL_NO_EMAIL_DEFS_IN_MODULE' => "Tentando lidar com endereços de e-mail em um Bean que não oferece suporte a eles.",
];
