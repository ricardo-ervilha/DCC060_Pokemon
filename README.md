## Pokémon - Banco de Dados - DCC060

### Professor: VICTOR STROELE DE ANDRADE MENEZES

### Alunos: GLEYDSON CANDIDO MUSSEL, RICARDO ERVILHA SILVA, YAN MESSIAS DE AZEVEDO FONSECA


```
git clone https://github.com/ricardo-ervilha/DCC060_Pokemon.git

cd DCC060_Pokemon

cp .env.example .env #criar cópia do .env
```

Build das imagens & iniciar os serviços:

```
docker-compose build
docker-compose up -d
```

Rodar depois:

```
docker exec laravel-11 php artisan migrate #migrar as tabelas do banco
```

Para acessar o phpmyadmin:

<ul>
    <li>Acessar a rota: localhost:8081</li>
    <li>Usuário: user</li>
    <li>Senha: test</li>
</ul>

Para acessar o projeto: localhost:8003

##### Repositório das imagens: https://github.com/sujanshresthanet/laravel-11-docker

##### Resolução do erro para "docker-compose down": https://stackoverflow.com/questions/42842277/docker-compose-down-default-network-error

##### Instalação do Docker: https://docs.docker.com/engine/install/ubuntu/