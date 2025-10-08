# 📒 Agenda – CRUD em PHP com armazenamento em JSON

Este projeto é uma **Agenda de Contatos** desenvolvida em **PHP puro**, com o objetivo de praticar conceitos fundamentais de **manipulação de dados**, **persistência em arquivos**, **boas práticas de organização** e **estruturação de código**.

Inicialmente, a aplicação armazenava os dados **em memória (usando `$_SESSION`)**, mas foi evoluída para utilizar **um arquivo JSON** como base de dados, permitindo que os dados fiquem **persistentes mesmo após o encerramento da execução**.

---

## 🚀 Objetivo do projeto

O foco deste projeto é demonstrar um **CRUD (Create, Read, Update, Delete)** completo sem o uso de banco de dados, apenas com **PHP e JSON**, reforçando:

- Leitura e escrita de arquivos (`file_get_contents`, `file_put_contents`);
- Conversão entre JSON e array PHP (`json_encode`, `json_decode`);
- Manipulação de dados e validação de entradas;
- Organização de código em **classes e pastas**;
- Integração entre front-end básico (HTML + CSS) e PHP.

---

## 🧠 Conceito geral

A aplicação simula uma **agenda de contatos**, onde o usuário pode:

- ➕ Adicionar um novo contato  
- ✏️ Editar um contato existente  
- ❌ Deletar um contato  
- 👀 Visualizar todos os contatos em uma tabela estilizada  

Os dados são gravados no arquivo `assets/agenda.json`, que atua como uma mini “base de dados”.

---

## 🗂️ Estrutura do Projeto

```bash
Agenda/
│
├── index.php             # Página principal (lista os contatos)
│
├── src/
│   ├── classes/
│   │   └── Contato.php        # Classe principal que gerencia os contatos
│   │
│   ├── actions/
│   │   ├── add.php            # Adiciona novo contato
│   │   ├── editar.php         # Edita contato existente
│   │   └── deletar.php        # Exclui contato
│   │
│   ├── assets/
│   │   ├── agenda.json        # Arquivo JSON onde os contatos são salvos
│   │   └── style.css          # Folha de estilo para o layout da aplicação
│   │
│   └── config.php             # Configurações gerais do projeto
│
├── composer.json              # Arquivo do Composer (autoload)
└── README.md                  # Este arquivo
```

## ⚙️ Como executar o projeto localmente

### 🧩 Requisitos

- PHP 8 ou superior  
- Servidor local como **WAMP**, **XAMPP**, ou **Laragon**  
- Navegador web

### 🪜 Passo a passo

1. **Clone o repositório**

   ```bash
   git clone https://github.com/LeonardoMartell/Agenda.git

2. **Abra o projeto na pasta do seu servidor local**

- Exemplo de caminho no WAMP:

```url
C:\wamp64\www\php-projetos\Agenda
```

3. **Acesse pelo navegador**

```url
http://localhost/php-projetos/Agenda/
```

4. **Use os formulários para adicionar, editar ou excluir contatos.**

---

## 💾 Estrutura do arquivo JSON

Os dados são armazenados no arquivo `assets/agenda.json` neste formato:

```json
[
  {
    "id": 1,
    "nome": "John",
    "telefone": "12345678912"
  },
  {
    "id": 2,
    "nome": "Doe",
    "telefone": "78945612378"
  }
]
```

Cada item é um objeto (contato) contendo `id`, `nome` e `telefone`.
As operações do CRUD manipulam esse array e regravam o arquivo a cada alteração.

---

## 🧰 Principais funções da classe Contato

```table
Método	                              |  Função
--------------------------------------|-----------------------------------------------
mostrarContatos()                     |  Lê o arquivo JSON e retorna todos os contatos
adicionarContato($nome, $telefone)    |  Cria um novo contato com ID incremental
editarContato($id, $nome, $telefone)  |  Atualiza o contato existente
deletarContato($id)                   |  Remove o contato do JSON
```

---

## 🧮 Validações implementadas

- O nome e o telefone são obrigatórios.

- O telefone deve conter apenas números e ter exatamente 12 dígitos.

- Caso os dados sejam inválidos, uma mensagem de erro é exibida ao usuário.

- Essas validações são feitas apenas com PHP, sem uso de JavaScript.

---

## 🧑‍💻 Evolução do projeto

```table
Versão	|  Descrição
--------|--------------------------------------------------------------
v1.0	|  CRUD funcional com dados armazenados em memória ($_SESSION)
v2.0	|  Persistência dos dados via arquivo JSON (file_get_contents / file_put_contents)
```

---

## 📦 Tecnologias utilizadas

- PHP 8+

- JSON (persistência de dados)

- HTML5 / CSS3

- Composer (autoload)

- WAMP/XAMPP para ambiente local

---

## 👤 Autor

Leonardo Alves

- 💼 Desenvolvedor em formação | Focado em PHP, Node.js e React
- 📧 Contato: [leonardoalvesaraujo@hotmail.com]
- 🌐 GitHub: [https://github.com/LeonardoMartell]

---

## 📝 Licença

Este projeto é de código aberto e pode ser usado livremente para fins de aprendizado e portfólio.
Sinta-se à vontade para clonar, estudar e aprimorar o código!
