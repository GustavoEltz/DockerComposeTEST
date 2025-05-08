# API Simples com PHP + MySQL via Docker Compose

## 📦 Requisitos

- Docker
- Docker Compose

## 🚀 Subindo o ambiente

```bash
docker-compose up --build
```

- A aplicação estará acessível em: `http://localhost:8000`
- O banco de dados MySQL será iniciado com uma tabela `users` já populada.

## 🔎 Como consumir a API

Via navegador ou Postman:

```
GET http://localhost:8000
```

Retorna lista de usuários em JSON.

## 📁 Estrutura

- `app/`: Código PHP
- `db/`: Script inicial do banco
- `docker-compose.yml`: Orquestração dos containers