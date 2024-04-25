# Sistema de Automação de Importação de Dados

Este é um sistema desenvolvido em PHP que automatiza o processo de importação de dados de uma planilha Excel para um banco de dados SQL. Ele pode ser útil em diversas situações, como migração de dados, atualização de registros em massa, entre outros.

## Funcionalidades

- Importa dados de uma planilha Excel para um banco de dados SQL.
- Suporta diferentes tipos de planilhas Excel (`.xls`, `.xlsx`, etc.).
- Facilita a automatização de tarefas repetitivas de importação de dados.
- Possui tratamento de erros e exceções para garantir a robustez do sistema.

## Pré-requisitos

Antes de executar este sistema, certifique-se de ter o seguinte instalado em seu ambiente:

- PHP (versão 7.x recomendada)
- Servidor Apache ou outro servidor web compatível com PHP
- MySQL ou outro sistema de gerenciamento de banco de dados compatível com PHP
- Composer (para instalar as dependências do projeto)

## Instalação

1. Clone este repositório em seu ambiente de desenvolvimento:

    ```bash
    git clone https://github.com/ivannatech/excel_data.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd excel_data
    ```

3. Execute o Composer para instalar as dependências do projeto:

    ```bash
    composer install
    ```

4. Configure o arquivo `conexao.php` com as informações de conexão com o seu banco de dados. Caso essas informações não estejam disponíveis, é possível continuar com a instalação do banco de dados e da tabela necessários para armazenar os dados importados da planilha Excel, seguindo as etapas abaixo.

5. Execute o SQL a seguir em seu servidor para criar o banco de dados e a tabela necessários para armazenar os dados importados da planilha Excel:

    ```sql
    -- Criação do banco de dados
    CREATE DATABASE excel_data_db;

    -- Seleção do banco de dados
    USE excel_data_db;

    -- Criação da tabela para armazenar os dados dos funcionários
    CREATE TABLE Funcionarios (
        ID INT PRIMARY KEY,
        Nome VARCHAR(100),
        Email VARCHAR(50),
        Cargo VARCHAR(50)
    );

    -- Inserção de um registro de exemplo na tabela Funcionarios
    INSERT INTO Funcionarios (ID, Nome, Email, Cargo) VALUES
    (1, 'João da Silva', 'joao@example.com', 'Gerente');
    ```

6. Após a configuração do banco de dados, o sistema estará pronto para uso.

## Uso

Para utilizar o sistema, siga estas etapas:

1. Coloque a planilha Excel que deseja importar na pasta `planilhas`.
2. Execute o script `importar_dados.php` no terminal ou prompt de comando:

    ```bash
    php importar_dados.php
    ```

3. Aguarde até que o processo de importação seja concluído. Você verá uma mensagem indicando se a importação foi bem-sucedida ou se houve algum erro.

## Solução de Problemas

### Erros Durante a Instalação

#### Erro: Composer não encontra o arquivo composer.json

- **Descrição**: O Composer não consegue encontrar o arquivo `composer.json` no diretório do projeto.
- **Solução**: Certifique-se de estar no diretório correto do projeto ao executar o Composer. Se o projeto ainda não tiver um arquivo `composer.json`, você precisará criá-lo. Execute `composer init` para iniciar a criação do arquivo `composer.json`.

#### Erro: Dependências não podem ser resolvidas durante a instalação do Composer

- **Descrição**: O Composer não consegue resolver as dependências durante a instalação e exibe uma mensagem indicando que "As suas exigências não puderam ser resolvidas para um conjunto de pacotes instaláveis."
- **Solução**: Certifique-se de que todas as extensões necessárias do PHP estejam habilitadas em seu ambiente. Consulte a documentação do Composer para mais informações sobre como resolver problemas de dependências.

### Erros Durante a Execução

#### Erro: Classe "IOFactory" não encontrada

- **Descrição**: O PHP não consegue encontrar a classe `IOFactory`, geralmente usada para manipular arquivos Excel.
- **Solução**: Certifique-se de que a biblioteca PHPExcel/PhpSpreadsheet esteja instalada e corretamente configurada em seu projeto. Você pode instalar a biblioteca usando o Composer executando o comando `composer require phpoffice/phpspreadsheet`. Se você não estiver usando o Composer, baixe manualmente a biblioteca e inclua-a em seu projeto. Certifique-se de incluir o autoload fornecido pela biblioteca para que as classes sejam carregadas corretamente.

#### Erro: Dependência ext-gd não encontrada durante a instalação do Composer

- **Descrição**: Durante a instalação do Composer, você recebe um aviso de que a extensão `gd` do PHP não foi encontrada.
- **Solução**: Se a extensão `gd` do PHP for necessária para sua aplicação, você precisará habilitá-la em seu ambiente. No XAMPP, isso pode ser feito descomentando a linha `extension=gd` no arquivo `php.ini` e reiniciando o servidor Apache. Se você não puder ou não quiser habilitar a extensão `gd`, pode temporariamente ignorar essa exigência durante a instalação das dependências usando a opção `--ignore-platform-req=ext-gd` ao executar o Composer.

#### Erro: Falha ao abrir o arquivo autoload.php

- **Descrição**: O script PHP não consegue encontrar o arquivo `vendor/autoload.php`.
- **Solução**: Execute `composer install` para instalar as dependências do projeto e gerar o arquivo `autoload.php`. Certifique-se de que o Composer foi executado com sucesso e que o diretório `vendor` foi criado no diretório do projeto.

#### Erro: Erro Fatal ao Executar o Script PHP

- **Descrição**: Um erro fatal ocorre durante a execução do script PHP, resultando em uma mensagem como "Fatal error: Call to a member function bind_param() on bool".
- **Solução**: Verifique a consulta SQL em busca de erros de sintaxe ou lógica. Certifique-se de que a conexão com o banco de dados foi estabelecida corretamente e de que todos os parâmetros necessários foram passados corretamente para a consulta preparada.

Se você encontrar algum outro erro que não esteja listado aqui, sinta-se à vontade para nos informar abrindo uma issue em nosso repositório no GitHub.

## Contribuição

Se você quiser contribuir com este projeto, siga estas etapas:

1. Faça um fork do repositório e clone-o em seu ambiente de desenvolvimento:

    ```bash
    git clone https://github.com/ivannatech/excel_data.git
    ```

2. Crie uma branch para a sua contribuição:

    ```bash
    git checkout -b minha-contribuicao
    ```

3. Faça suas alterações e adições no código.

4. Commit suas mudanças:

    ```bash
    git commit -am 'Adicionando minha contribuição'
    ```

5. Push para a branch:

    ```bash
    git push origin minha-contribuicao
    ```

6. Crie um pull request para revisão.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).

