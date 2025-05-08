# API Simples para aula de Tópicos usando Docker Compose

Este projeto cria uma API simples com PHP e MySQL usando Docker Compose. Você pode **listar** e **cadastrar usuários** com o Postman.

---

## Requisitos

- Docker
- Docker Compose
- Postman (para testar a API)

---

## Como rodar o projeto

1. **Clone ou baixe o projeto**
2. Extraia em uma pasta no seu computador
3. Abra o terminal dentro da pasta do projeto
4. Rode o comando:

```bash
docker-compose up --build
```

Se der erro com a porta 3306, no prompt escreva "netstat -ano | findstr :3306" 
Você verá uma linha como:

  TCP    0.0.0.0:3306     0.0.0.0:0      LISTENING       1234
O número final (1234) é o PID (ID do processo)..

E finalize o processo que está usando a porta com o comando:

"taskkill /PID 1234 /F"

Substitua 1234 pelo PID que você encontrou.


---

## Como testar no Postman

## Listar usuários (GET)

- Método: `GET`
- URL: `http://localhost:8000`

Você verá algo como:

```
[
  {
    "id": 1,
    "name": "Postman da silva",
    "email": "postzinhodorola@example.com"
  }
]
```

---

## Adicionar usuário (POST)

- Método: `POST`
- URL: `http://localhost:8000`
- Body: `raw` > `JSON`  
- Exemplo de corpo:

```
{
  "name": "Melancia Pereira",
  "email": "melanciaBOA@example.com"
}
```

Resposta:

```json
{
  "message": "Usuário inserido com sucesso"
}
```

---

## parar tudo

No terminal onde está rodando:

```bash
CTRL + C
```

Depois para apagar os containers:

```bash
docker-compose down
```

---
