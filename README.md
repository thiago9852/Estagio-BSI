# Guia do Projeto

## Introdução
Este documento fornece instruções sobre como configurar e utilizar o Symfony dentro de um ambiente Docker. Também aborda comandos essenciais para manipular pacotes com o Composer e gerenciar entidades, controladores e operações CRUD no Symfony.

---

## Sobre o Projeto
Este projeto consiste no desenvolvimento de um website para a instituição **"O Pequeno Davi"**.
Como parte da conclusão do estágio obrigatório do curso de **Sistemas de Informação**.

### 1. Protótipo
Para visualizar o protótipo do projeto, clique no link abaixo:
[**Acessar o Protótipo**](https://www.canva.com/design/DAGcMcZYoJo/FEVD8bdBu3CrNfUfKjV7pQ/edit?ui=eyJEIjp7IlAiOnsiQiI6ZmFsc2V9fX0)

#### 1.1. Equipe de desenvolvimento
- **[Thiago Dias Ferreira](https://github.com/thiago9852)**
- **[Yasmin ribeiro dos Santos](https://www.linkedin.com/in/yasminribeirodataanalyst/)**

### 1.2. Ferramentas de desenvolvimento
- **Symfony:** Framework PHP para desenvolvimento back-end.
- **Bootstrap:** Biblioteca front-end que facilita a criação de layouts responsivos e componentes visuais, proporcionando uma interface moderna e acessível.
- **Docker:** Ferramenta de contêinerização que permite configurar e gerenciar o ambiente de desenvolvimento.
- **CSS3:** Controlar o layout e o design das páginas web.

### 1.3. Guia sobre como usar atalhos rápidos do HTML com **Emmet**
Este guia apresenta comandos rápidos para usar **Emmet**, uma ferramenta de autocompletar que permite criar HTML rapidamente, acelerando o desenvolvimento e evitando a repetição de código.

1. **Uso dos Comandos**  
   Para utilizar os comandos, basta digitar o atalho e pressionar `Tab` no seu editor. O Emmet irá expandir o atalho para o código HTML correspondente.
Comandos Rápidos do Emmet

#### 1. Comandos Rápidos do Emmet

**_Estruturas Aninhadas Complexas_**
Um exemplo completo de estrutura usando Emmet:

- **`section#exemplo>div.container>div.col-12>div.row>span>small`**
Cria estrutura hierárquica completa com IDs, classes e elementos filhos.

Resultado:

```html
<section id="exemplo">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <span>
                    <small></small>
                </span>
            </div>
        </div>
    </div>
</section>
```

#### 1.1 Estruturas Simples

- **`div.text-center`**  
  Cria uma `div` com a classe `text-center`.
  ```html
  <div class="text-center"></div>
  ```

- **`div+span`**  
  Cria uma `div` seguida de um `span`.
  ```html
  <div></div><span></span>
  ```

- **`ul>li*3`**  
  Cria uma lista não ordenada (`ul`) com três itens de lista (`li`).
  ```html
  <ul>
      <li></li>
      <li></li>
      <li></li>
  </ul>
  ```

- **`table>tr*2>td*3`**  
  Cria uma tabela com duas linhas (`tr`), e cada linha contendo três células de tabela (`td`).
  ```html
  <table>
      <tr>
          <td></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
          <td></td>
          <td></td>
          <td></td>
      </tr>
  </table>
  ```

#### 1.2 Comandos para Texto e Títulos

- **`h1{Título principal}+h2{Subtítulo}`**  
  Cria um `h1` com o texto "Título principal" e um `h2` com o texto "Subtítulo".
  ```html
  <h1>Título principal</h1>
  <h2>Subtítulo</h2>
  ```

- **`div>p{Texto de exemplo}*2`**  
  Cria uma `div` com dois parágrafos (`p`), cada um com o texto "Texto de exemplo".
  ```html
  <div>
      <p>Texto de exemplo</p>
      <p>Texto de exemplo</p>
  </div>
  ```

#### 1.3 Comandos para Estruturas de Layout

- **`div#id.container`**  
  Cria uma `div` com o ID `id` e a classe `container`.
  ```html
  <div id="id" class="container"></div>
  ```

- **`button.btn.btn-primary{Enviar}`**  
  Cria um botão com as classes `btn` e `btn-primary`, e o texto "Enviar".
  ```html
  <button class="btn btn-primary">Enviar</button>
  ```

---

## 3. Como funciona o Symfony e o Docker?

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

## 4. Como iniciar e parar o Symfony e o Docker

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

## 5. Como usar o Composer

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

## 6. Como usar CRUD, Controller e Entity no Symfony

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

---
