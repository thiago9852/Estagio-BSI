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
1. Construir os contêineres (caso ainda não tenha sido feito ou haja modificações na configuração):
   ```sh
   docker-compose build
   ```
2. Subir os contêineres do projeto:
   ```sh
   docker-compose up -d
   ```
3. Iniciar o Symfony (caso não esteja usando o container docker):
   ```sh
   symfony server:start
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
composer require nome_do_pacote
```
Exemplo:
```sh
composer require symfony/maker-bundle --dev
```

---

## 4. Como usar CRUD, Controller e Entity no Symfony

### Criar um Controller
Execute dentro do contêiner:
```sh
php bin/console make:controller NomeDoController
```
Isso criará um arquivo `NomeDoController.php` dentro da pasta `src/Controller/`. e também gera uma pasta de templates em `templates/nome_do_controller/` com um arquivo _index.html.twig_. 

### Criar uma Entity
```sh
php bin/console make:entity NomeDaEntity
```
Isso gerará um arquivo em `src/Entity/NomeDaEntity.php`, onde você pode definir os atributos da tabela.

#### Execute o comando para editar a entidade existente:
```sh
php bin/console make:entity NomeDaEntity
```
Ele perguntará quais novos atributos deseja adicionar.

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
2. Executar a migração (se estiver usando Docker, adicione `php` antes do comando):
   ```sh
   php php bin/console doctrine:migrations:migrate
   ```
3. Caso você queira atualizar automaticamente a estrutura do banco de dados sem gerar uma migração manualmente (o que não é recomendado para produção), pode usar:
   ```sh
   php bin/console doctrine:schema:update --force
   ```
Agora sua aplicação Symfony com Docker está pronta para ser utilizada! 🚀

