# Pokémon - Banco de Dados - DCC060

## PROFESSOR: Victor Ströele De Andrade Menezes

### Alunos: Gleydson Candido Mussel, Ricardo Ervilha Silva, Yan Messias De Azevedo Fonseca

```bash
$ git clone https://github.com/ricardo-ervilha/DCC060_Pokemon.git
 
$ cd .\DCC060_Pokemon\pokemon\

$ cp .env.example .env

$ composer install

$ php artisan key:generate

$ npm install

$ npm run build

$ php artisan serve # start do servidor php

$ npm run dev # start do servidor do node
```

<p>Programas:</p>
<ol>
    <li>Instalar o XAMPP: https://www.apachefriends.org/pt_br/download.html. Versão do php: 8.0.30;</li>
    <li>Instalar o Postgres na versão mais recente (17).</li>
    <li>Instalar o Gerenciador de Pacotes (COMPOSER): https://getcomposer.org/download/;</li>
    <li>Instalar o Node.js: https://nodejs.org/en/download/package-manager.</li>
    <li>Reiniciar o dispositivo.</li>
</ol>

<p>Comandos úteis do laravel:</p>
<ul>
    <li>Migrar o banco de dados: php artisan migrate</li>
    <li>Rodar a seed: php artisan db:seed</li>
    <li>Gerar chave: php artisan key:generate</li>
    <li>Remigrar o banco: php artisan migrate:fresh</li>
    <li>Limpar cache: php artisan optimize:clear</li>
    <li>Startar o server: php artisan serve</li>
</ul>

<p>Comandos úteis do composer:</p>
<ul>
    <li>composer install</li>
    <li>composer update</li>
</ul>

<p>Comandos úteis do Node:</p>
<ul>
    <li>npm install</li>
    <li>npm run build</li>
    <li>npm run dev</li>
</ul>

Documentação do Laravel: https://laravel.com/docs/11.x.
