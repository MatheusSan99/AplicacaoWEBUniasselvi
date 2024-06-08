# AplicacaoWEBUniasselvi

Este repositório contém o projeto para o Seminário Interdisciplinar.

## Instalação

Para instalar o projeto, siga os seguintes passos:

1. Clone o repositório usando o comando: `git clone https://github.com/MatheusSan99/AplicacaoWEBUniasselvi.git`
2. Execute o comando no terminal `composer install e composer update`
3. Certifique-se de ter o PHP e o MySQL instalados. (Xdebug é opcional)

## Executando o Servidor

Para iniciar o servidor, execute o seguinte comando no terminal: `php -S localhost:8000 -t public`

## Acessando a Aplicação

Uma vez que o servidor esteja em execução, você pode acessar a aplicação em seu navegador usando a seguinte URL: [http://localhost:8000](http://localhost:8000)

## Guia de Uso

1. Página de Listagem de Notícias:

    - Exibe uma lista de notícias com título, imagem e um breve resumo.
    - Usuários podem clicar em uma notícia para ver os detalhes completos.

2. Criação de Notícias:

    - Usuários autenticados podem criar novas notícias.
    - O formulário de criação inclui campos para título, imagem, conteúdo e categoria da notícia.

3. Edição de Notícias:

    - Usuários autenticados podem editar notícias existentes.
    - O formulário de edição permite atualizar o título, imagem, conteúdo e categoria da notícia.

4. Remoção de Notícias:

    - Usuários autenticados podem remover notícias.

5. Autenticação de Usuário:

    - Formulário de login para usuários autenticados.
    - Opção para logout.

Navegação na Aplicação:

- Página Inicial: Exibe uma lista de notícias recentes.
- Nova Notícia: Acesso ao formulário para criar uma nova notícia.
- Editar Notícia: Acesso ao formulário para editar uma notícia existente.
- Remover Notícia: Opção para remover uma notícia.
- Login: Formulário de login para autenticação do usuário.
- Logout: Opção para sair da sessão.

Diagrama de Casos de Uso:

O diagrama de casos de uso descreve as interações entre os usuários e o sistema:

```plaintext
                  +--------------------+
                  |   Usuário Anônimo  |
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |  Listar Notícias   |
                  +--------------------+
                             |
                             v
                  +----------+---------+
                  |   Ver Detalhes     |
                  +--------------------+

                  +--------------------+
                  | Usuário Autenticado|
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |   Criar Notícia    |
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |   Editar Notícia   |
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |  Remover Notícia   |
                  +--------------------+
                             |
                             v
                  +----------+---------+
                  |   Logout           |
                  +--------------------+
```

## Documentacao Seminario

https://trilhaaprendizagem.uniasselvi.com.br/ADS102_seminario_interdisciplinar_implementacao/

