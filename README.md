# README - Guia de Uso do Symfony com Docker

## Introdução
Este documento fornece instruções sobre como configurar e utilizar o Symfony dentro de um ambiente Docker. Também aborda comandos essenciais para manipular pacotes com o Composer e gerenciar entidades, controladores e operações CRUD no Symfony.

---

## 1. Como funciona o Symfony e o Docker?

### Symfony
Symfony é um framework PHP para desenvolvimento de aplicações web. Ele segue o padrão MVC (Model-View-Controller) e oferece ferramentas poderosas para desenvolvimento rápido, como o Symfony Console e o MakerBundle para a geração de código.

Principais componentes:
- **Controller**: Gerencia requisições HTTP e responde com páginas HTML ou dados JSON.
- **Entity**: Representa tabelas do banco de dados dentro do sistema.
- **Repository**: Responsável pela interação com o banco de dados.
- **Twig**: Motor de templates utilizado para renderização de views.

### Docker
Docker permite criar contêineres isolados para a aplicação, garantindo que todas as dependências estejam configuradas corretamente.

Arquivos importantes:
- **Dockerfile**: Define a imagem do contêiner.
- **docker-compose.yml**: Define os serviços que serão utilizados, como PHP, MySQL e Nginx.

---

## 2. Como iniciar e parar o Symfony e o Docker

### Iniciar o ambiente Docker e Symfony
1. Subir os contêineres do projeto:
   ```sh
   docker-compose up -d
   ```
2. Acessar o contêiner do PHP:
   ```sh
   docker exec -it nome_do_container_php bash
   ```
3. Iniciar o servidor Symfony dentro do contêiner:
   ```sh
   symfony serve
   ```

### Parar o ambiente
1. Parar o servidor Symfony:
   ```sh
   symfony server:stop
   ```
2. Parar os contêineres Docker:
   ```sh
   docker-compose down
   ```

---

## 3. Como usar o Composer

### Instalando pacotes com o Composer
Para adicionar pacotes ao Symfony, use o comando:
```sh
docker exec -it nome_do_container_php composer require nome_do_pacote
```
Exemplo:
```sh
docker exec -it nome_do_container_php composer require symfony/maker-bundle --dev
```

---

## 4. Como usar CRUD, Controller e Entity no Symfony

### Criar um Controller
Execute dentro do contêiner:
```sh
php bin/console make:controller NomeDoController
```
Isso criará um arquivo `NomeDoController.php` dentro da pasta `src/Controller/`.

### Criar uma Entity
```sh
php bin/console make:entity NomeDaEntity
```
Isso gerará um arquivo em `src/Entity/NomeDaEntity.php`, onde você pode definir os atributos da tabela.

### Criar o CRUD
```sh
php bin/console make:crud NomeDaEntity
```
Isso gerará um controlador e as views para gerenciar os dados da entidade.

### Atualizar o banco de dados
1. Criar a migração:
   ```sh
   php bin/console make:migration
   ```
2. Executar a migração:
   ```sh
   php bin/console doctrine:migrations:migrate
   ```

Agora sua aplicação Symfony com Docker está pronta para ser utilizada! 🚀

