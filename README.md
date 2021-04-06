<h1 align="center"> Wimbo </h1>
<p align="center">Projecto de Vendas de Musicas</p>

<h4 align="center"> 
	Status do Projeto: Em desenvolvimento :warning:
</h4>

## Deploy da Aplicação com Heroku: :dash:

https://wimbo-mz.herokuapp.com/

![Screenshot 2021-02-27 121431 Login](https://user-images.githubusercontent.com/67284022/109384442-71699e80-78f5-11eb-80c8-7e6f0a6a808e.png)

### Pré-requisitos

Antes de executar o projecto, é necessário que tenha instalado em sua maquina

-   [php](https://www.php.net/) >= 7.3|8.0
-   [composer](https://getcomposer.org/)
-   [nodeJs](https://nodejs.org/en/) >= 14.16.0 (Opcional)

## Como rodar a Aplicação

1.  No terminal, clone o projecto:

```bash
    git clone https://github.com/andre-chirindza/wimbo.git
```

2.  Entre na pasta do projecto:

```bash
    cd wimbo
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

-   username = administrator@wimbo.com
-   email = administrator@wimbo.com
-   password = wimbo

### Músicos :see_no_evil:

-   username = musician@wimbo.com
-   email = musician@wimbo.com
-   password = wimbo

### Clientes :see_no_evil:

-   username = client@wimbo.com
-   email = client@wimbo.com
-   password = wimbo
