# Projeto theBestGames

theBestGames é um projeto para gerenciar jogos, contendo segurança com niveis de acesso.

## Detalhes
| Tecnologia |
|---|
| Laravel 10 REST API
| ReactJS

## Resumo das Funcionalidaedes
- Gerenciar Jogos
- Cadastro de Usuário
- Login de Usuário

## Como executar?
**Importante:** É necessário ter o composer e o NodeJs instalado.

- Abra o terminal na pasta front-end e rode o seguinte comando: 
``` npm install ```
- Após isso execute o comando para rodar a aplicação: 
``` npm start ```
- Abra o terminal na pasta gameApi e rode o seguinte comando: 
``` composer install ```
- Após isso execute o comando para rodar a aplicação:
``` php artisan serve ```

## Usuário Adminstrador
Faça o login com o usuário administrador para ter acesso a todas as funcionalidades. 

- Email: admin@gmail.com
- Senha: 12345678

## Documentação da API

#### Gerenciamento de Jogos

```http 
  POST /api/game
  GET /api/game
  PUT /api/game/{id}
  DELETE /api/game/{id}
```

#### Json Exemplo
```http
{
	"name": "The Last of Us",
	"description": "informações sobre o jogo com no minimo 20 linhas"
}
```

#### Cadastro de Usuário

```http 
  POST /api/register
```

#### Json Exemplo
```http
{
    "name": "Robson",
    "email": "Robson@gmail.com",
    "password": "12345678",
    "password_confirmation": "12345678"
}
```

#### Login de Usuário

```http 
  POST /api/login
```

#### Json Exemplo
```http
{
    "email": "robson@gmail.com",
    "password": "12345678"
}
```