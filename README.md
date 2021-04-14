<h1 align="center"> Protrel </h1>
<p align="center">Aplicação para gestão interna da empresa. Mantendo o controle dos concursos, documentos e funcionários</p>

<h4 align="center"> 
	Status do Projeto: Em desenvolvimento :warning:
</h4>

## Deploy da Aplicação com Heroku: :dash:

https://protrel.herokuapp.com/

![Screenshot 2021-04-13 111925](https://user-images.githubusercontent.com/67284022/114529409-34116400-9c4a-11eb-92b7-b64ff4c4e76d.png)

### Pré-requisitos

Antes de executar o projecto, é necessário que tenha instalado em sua maquina

-   [php](https://www.php.net/) >= 7.3|8.0
-   [composer](https://getcomposer.org/)
-   [nodeJs](https://nodejs.org/en/) >= 14.16.0 (Opcional)

## Como rodar a Aplicação

1.  No terminal, clone o projecto:

```bash
    git clone https://github.com/kennedy-serafim/Protrel.git
```

2.  Entre na pasta do projecto:

```bash
    cd protrel
```

3.  #### Crie um arquivo .env na pasta raiz do projecto e copie o conteúdo que está no arquivo .env.example

4.  Instale as dependências do projecto:

```bash
    composer install
```

5.  Crie a chave na aplicação:

```bash
    php artisan key:generate
```

6.  Crie as migrations e as seeds essências para rodar a aplicação

```bash
    php artisan migrate:fresh --seed
```

7.  Execute a aplicação:

```bash
    php artisan serve
```

No navegador, acesse a url http://127.0.0.1:8000/

## Credencias do Sistema

### Administrador :see_no_evil:

-   email = administrador@protrel.com
-   password = protrel

### Usuário :see_no_evil:

-   email = usuario@protrel.com
-   password = protrel
