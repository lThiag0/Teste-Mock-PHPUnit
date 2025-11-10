# 🧪 Trabalho Avaliativo — Testes com PHPUnit

## 📘 Tema
Desenvolver um código utilizando **PHPUnit**, incluindo:

- ✅ Testes simples de unidade  
- ✅ Uso de **mock**  
- ✅ Testes que envolvam salvar informações no banco de dados  

---

## 🚀 Tecnologias Utilizadas
- **PHP 8.4**
- **PHPUnit 12.4**
- **SQLite** 
- **Composer** 

---

## 📂 Estrutura do Projeto

```
Trabalho avaliativo lins/
│
├── app/
│   ├── Models/
│   │   └── User.php
│   ├── Repositories/
│   │   └── UserRepository.php
│   └── Services/
│       └── UserService.php
│
├── tests/
│   ├── database/
│   │   └── UserRepositoryTest.php
│   └── unit/
│       └── UserServiceTest.php
│
├── phpunit.xml
├── composer.json
└── README.md
```

---

## ⚙️ Instalação

1. Clone o repositório ou copie os arquivos:
   ```bash
   git clone <url-do-repositorio>
   cd "Trabalho avaliativo lins"
   ```

2. Instale as dependências:
   ```bash
   composer install
   ```

3. Verifique se o PHPUnit está disponível:
   ```bash
   vendor\bin\phpunit --version
   ```

---

## 🧩 Descrição das Classes

### 🧠 `UserService`
- Responsável pelas **regras de negócio** do usuário.
- Faz validações antes de salvar (nome e e-mail obrigatórios, formato válido).
- Lança exceções (`InvalidArgumentException`) quando há erro.
- Usa **injeção de dependência** para chamar o repositório.

### 💾 `UserRepository`
- Responsável pela **persistência dos dados** (salvar e listar usuários).
- Usa **PDO e SQLite** para simular operações de banco.
- Testado diretamente com dados reais.

### 👤 `User`
- Representa o modelo de usuário com nome e e-mail.

---

## 🧪 Testes Implementados

### 🔹 `UserRepositoryTest`
- Teste **simples de unidade**.
- Verifica se o usuário é salvo e listado corretamente no banco SQLite.

### 🔹 `UserServiceTest`
- Teste com **mock**: simula o repositório e verifica se o método `save()` é chamado.
- Teste de **validação**: garante que e-mails inválidos geram exceções.

---

## 🧰 Executando os Testes

Rode o comando:
```bash
vendor\bin\phpunit --testdox
```

Exemplo de saída esperada:

```
PHPUnit 12.4.2 by Sebastian Bergmann and contributors.

User Repository
 ✔ Salvar e listar usuario

User Service
 ✔ Deve lancar erro com email invalido
 ✔ Deve chamar metodo save do repositorio

OK, but there were issues!
Tests: 3, Assertions: 9, PHPUnit Deprecations: 1.
```

> ⚠️ O aviso de *Deprecation* é interno do PHPUnit 12 e não afeta o funcionamento do código.

---

## 🎓 Conclusão
O projeto demonstra com sucesso o uso do **PHPUnit** para:
- Testar regras de negócio e persistência;
- Utilizar **mocks** para isolar dependências;
- Garantir a qualidade do código com testes automatizados.

✅ **Todos os testes passaram com sucesso.**

---

**Autor:** Thiago, Rian, Carlos, Gabriel  
**Curso:** Análise e Desenvolvimento de Sistemas  
**Data de Entrega:** 10 de novembro de 2025  
**Instituição:** Uninassau
