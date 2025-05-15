# API Simples para aula de Tópicos usando Docker Compose

Este projeto cria uma API simples com PHP e MySQL usando Docker Compose.  
Você pode **listar** e **cadastrar usuários** com o Postman **ou pela interface web** acessando no navegador.

---

## Requisitos

- Docker  
- Docker Compose  
- Postman (opcional, para testar a API diretamente)  
- Navegador (para usar a interface `index.html`)

---

## Como rodar o projeto

1. **Clone ou baixe o projeto**
2. Extraia em uma pasta no seu computador
3. Abra o terminal dentro da pasta do projeto
4. Rode o comando:

```bash
docker-compose up --build
```

Se der erro com a porta 3306, no prompt escreva:

```bash
netstat -ano | findstr :3306
```

Você verá uma linha como:

```
TCP    0.0.0.0:3306     0.0.0.0:0      LISTENING       1234
```

O número final (1234) é o PID (ID do processo).

Finalize o processo que está usando a porta com o comando:

```bash
taskkill /PID 1234 /F
```

Substitua `1234` pelo PID que você encontrou.

---

## Como acessar a interface web (formulário)

Abra seu navegador e vá para:

```
http://localhost:8000/index.html
```

Nessa tela você pode:
- Cadastrar usuários com nome e email
- Ver todos os usuários cadastrados

---

## Como testar no Postman

### Listar usuários (GET)

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

### Adicionar usuário (POST)

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

Resposta esperada:

```json
{
  "message": "Usuário inserido com sucesso"
}
```

---

## Parar tudo

No terminal onde está rodando:

```bash
CTRL + C
```

Depois, para apagar os containers:

```bash
docker-compose down
```

---