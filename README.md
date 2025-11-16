# 📚 Documentação do Projeto FomExpress

## 📋 Índice
- [Sobre o Projeto](#sobre-o-projeto)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Requisitos do Sistema](#requisitos-do-sistema)
- [Instalação e Configuração](#instalação-e-configuração)
- [Funcionalidades](#funcionalidades)
- [Metodologia de Desenvolvimento](#metodologia-de-desenvolvimento)
- [Banco de Dados](#banco-de-dados)
- [Equipe](#equipe)

---

## 🍽️ Sobre o Projeto

**FomExpress** é uma plataforma digital de delivery focada na **culinária brasileira**, desenvolvida como Trabalho de Conclusão de Curso (TCC) do Curso Técnico em Desenvolvimento de Sistemas – modalidade EaD.

### 🎯 Objetivos
- Oferecer uma experiência de usuário intuitiva e agradável
- Valorizar a gastronomia brasileira e a economia local
- Conectar estabelecimentos locais e pequenos produtores ao consumidor final
- Proporcionar conveniência com qualidade para quem tem pressa

### 🌟 Diferenciais
- Foco em culinária brasileira autêntica
- Suporte a pequenos produtores e restaurantes locais
- Interface responsiva e moderna
- Sistema de carrinho inteligente
- Autenticação segura com criptografia de senhas

---

## 📁 Estrutura do Projeto

```
FomExpress/
├── html/                          # Páginas do sistema
│   ├── home.php                   # Página inicial
│   ├── cardapio.html              # Visualização do cardápio
│   ├── carrinho.html              # Gerenciamento do carrinho
│   ├── espaco.html                # Informações sobre o espaço
│   ├── quemsomos.html             # Sobre a empresa
│   └── processa_trabconosco.php   # Processamento de candidaturas
│
├── conta/                         # Sistema de autenticação
│   ├── actions/
│   │   ├── processa_cadastro.php  # Processa novo usuário
│   │   ├── processa_login.php     # Valida credenciais
│   │   └── logout.php             # Encerra sessão
│   ├── classes/
│   │   ├── Usuario.php            # Classe base de usuário
│   │   ├── Cliente.php            # Herda de Usuario
│   │   └── Lojista.php            # Herda de Usuario
│   ├── config/
│   │   └── conexao.php            # Configuração do banco
│   ├── cadastro.php               # Formulário de cadastro
│   ├── login.php                  # Formulário de login
│   └── index.php                  # Dashboard do usuário
│
├── css/                           # Estilos da aplicação
│   ├── home.css                   # Estilo da página inicial
│   ├── cadastro.css               # Estilo do cadastro
│   ├── acessar.css                # Estilo do login
│   ├── cardapio.css               # Estilo do cardápio
│   ├── espaco.css                 # Estilo da página espaço
│   └── quemsomos.css              # Estilo quem somos
│
├── js/                            # Scripts JavaScript
│   └── carrinho.js                # Lógica do carrinho de compras
│
├── img/                           # Imagens do projeto
│   ├── logo/                      # Logotipos
│   ├── backgrounds/               # Imagens de fundo
│   │   ├── espacos/               # Fotos do ambiente
│   │   └── comida/                # Fotos dos pratos
│   └── cardapio/                  # Imagens dos produtos
│
├── video/                         # Vídeos institucionais
│   └── videorestaurante.mp4
│
├── banco-de-dados/                # Scripts SQL
│   └── dbformexpress.sql          # Estrutura completa do BD
│
└── docs/                          # Documentação
    ├── README.md                  # Este arquivo
    └── template_agenda7_Grupo-4_FomExpress.pdf  # TCC completo
```

---

## 🛠️ Tecnologias Utilizadas

### Frontend
- **HTML5** - Estruturação das páginas
- **CSS3** - Estilização e responsividade
- **JavaScript** - Interatividade e validações
- **Font Awesome** - Ícones

### Backend
- **PHP 8.x** - Lógica do servidor e autenticação
- **MySQL 8.x** - Sistema gerenciador de banco de dados

### Ferramentas de Desenvolvimento
- **Visual Studio Code** - Editor de código
- **XAMPP** - Servidor local (Apache + MySQL)
- **MySQL Workbench** - Modelagem e administração do BD
- **Git/GitHub** - Controle de versão

---

## 💻 Requisitos do Sistema

### Requisitos Mínimos
- **Processador:** Intel Pentium Dual Core ou superior
- **RAM:** 4GB (recomendado: 8GB)
- **Armazenamento:** 100GB livres (SSD)
- **Sistema Operacional:** Windows 7+, macOS ou Linux
- **Navegadores:** Chrome, Firefox, Edge ou Opera (versões recentes)
- **Conexão:** Acesso à internet

### Para Desenvolvimento
- **XAMPP** ou **WAMP** (Apache + MySQL + PHP)
- **MySQL 8.0+**
- **PHP 8.0+**
- **Visual Studio Code** (ou editor similar)
- **Git** para controle de versão

---

## ⚙️ Instalação e Configuração

### 1. Clonar o Repositório
```bash
git clone https://github.com/seu-usuario/fomexpress.git
cd fomexpress
```

### 2. Configurar o Banco de Dados

#### 2.1. Criar o Banco de Dados
1. Abra o **MySQL Workbench** ou **phpMyAdmin**
2. Crie o banco de dados:
```sql
CREATE DATABASE fomexpress_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

#### 2.2. Importar a Estrutura
Execute o arquivo SQL:
```sql
SOURCE banco-de-dados/dbformexpress.sql;
```

Ou importe manualmente via phpMyAdmin.

#### 2.3. Verificar Tabelas Criadas
```sql
USE fomexpress_db;
SHOW TABLES;
```

Você deverá ver:
- `usuario`
- `lojista`
- `endereco`
- `produto`
- `pedido`
- `itempedido`
- `reserva`
- `candidatos`

### 3. Configurar Conexão com o Banco

Edite o arquivo `conta/config/conexao.php`:

```php
<?php
$servername = "localhost";
$username = "root";           // Seu usuário MySQL
$password = "";               // Sua senha MySQL (deixe vazio se não tiver)
$dbname = "fomexpress_db";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
```

### 4. Configurar o XAMPP

1. **Copie a pasta do projeto** para `C:\xampp\htdocs\` (Windows) ou `/opt/lampp/htdocs/` (Linux)
2. **Inicie o Apache e MySQL** no painel do XAMPP
3. Acesse: `http://localhost/fomexpress/html/home.php`

### 5. Testar a Instalação

Teste a conexão acessando:
```
http://localhost/fomexpress/conta/login.php
```

---

## 🚀 Funcionalidades

### ✅ Implementadas (Sprint 1 e 2)

#### 🔐 Sistema de Autenticação
- [x] Cadastro de novos usuários
- [x] Login com validação de credenciais
- [x] Criptografia de senhas (password_hash)
- [x] Sistema de sessões PHP
- [x] Logout seguro
- [x] Proteção de páginas restritas

#### 🏠 Navegação
- [x] Página inicial (Home) responsiva
- [x] Menu de navegação adaptativo
- [x] Menu dropdown do usuário
- [x] Links para redes sociais

#### 🍴 Cardápio
- [x] Visualização de produtos por categoria:
  - Aperitivos
  - Massas
  - Entradas
  - Saladas
  - Acompanhamentos
  - Sobremesas
  - Bebidas
- [x] Exibição de fotos, descrições e preços
- [x] Botão "Adicionar ao Carrinho"

#### 🛒 Carrinho de Compras
- [x] Adicionar produtos ao carrinho
- [x] Remover itens do carrinho
- [x] Alterar quantidade de produtos
- [x] Cálculo automático do total
- [x] Persistência com localStorage
- [x] Modal rápido de visualização
- [x] Contador flutuante de itens
- [x] Notificações elegantes

#### 📄 Páginas Informativas
- [x] Quem Somos
- [x] Trabalhe Conosco (formulário)
- [x] Nosso Espaço (galeria e mapa)
- [x] FAQ (Perguntas Frequentes)

### 🔄 Em Desenvolvimento (Sprint 3 - Futuras)

- [ ] Finalização do pedido com pagamento
- [ ] Integração com API de pagamento
- [ ] Acompanhamento de pedidos em tempo real
- [ ] Sistema de avaliação de produtos
- [ ] Painel administrativo para lojistas
- [ ] Sistema de notificações
- [ ] Histórico de pedidos
- [ ] Cupons de desconto

---

## 📊 Metodologia de Desenvolvimento

O projeto utiliza a **metodologia ágil SCRUM**, com:

### 👥 Papéis da Equipe
- **Scrum Master:** Ricardo Piccelli
- **Product Owner:** Milca Salata de Almeida
- **Desenvolvedores:**
  - Eduardo Barbosa da Silva
  - Eduardo Ferreira Proença
  - Felipe de Oliveira
  - Lara Ornelas de Souza

### 📅 Sprints Planejadas

| Sprint | Período | Entregas Principais |
|--------|---------|---------------------|
| Sprint 1 | Semanas 1-2 | Modelagem do BD, estrutura HTML/CSS |
| Sprint 2 | Semanas 3-4 | Sistema de autenticação, páginas informativas |
| Sprint 3 | Semanas 5-6 | Cardápio e carrinho de compras |
| Sprint 4 | Semanas 7-8 | Checkout e finalização de pedidos |
| Sprint 5 | Semanas 9-10 | Testes, ajustes finais e documentação |

---

## 🗄️ Banco de Dados

### Modelo Entidade-Relacionamento

O banco de dados possui **6 tabelas principais**:

#### 1. **usuario**
```sql
CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(20),
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### 2. **lojista**
```sql
CREATE TABLE lojista (
  idLojista INT AUTO_INCREMENT PRIMARY KEY,
  nomeFantasia VARCHAR(100) NOT NULL,
  cnpj VARCHAR(18) NOT NULL UNIQUE,
  email VARCHAR(150) NOT NULL,
  senha VARCHAR(255) NOT NULL
);
```

#### 3. **endereco**
```sql
CREATE TABLE endereco (
  idEndereco INT AUTO_INCREMENT PRIMARY KEY,
  idUsuario INT NOT NULL,
  logradouro VARCHAR(200) NOT NULL,
  numero VARCHAR(10) NOT NULL,
  bairro VARCHAR(100) NOT NULL,
  cidade VARCHAR(100) NOT NULL,
  uf CHAR(2) NOT NULL,
  cep VARCHAR(9) NOT NULL,
  FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);
```

#### 4. **produto**
```sql
CREATE TABLE produto (
  idProduto INT AUTO_INCREMENT PRIMARY KEY,
  idLojista INT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL,
  categoria VARCHAR(50) NOT NULL,
  imagemUrl VARCHAR(255),
  FOREIGN KEY (idLojista) REFERENCES lojista(idLojista)
);
```

#### 5. **pedido**
```sql
CREATE TABLE pedido (
  idPedido INT AUTO_INCREMENT PRIMARY KEY,
  idUsuario INT NOT NULL,
  idEndereco INT NOT NULL,
  dataHora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  valorTotal DECIMAL(10,2) NOT NULL,
  status VARCHAR(50) NOT NULL,
  formaPagamento VARCHAR(50) NOT NULL,
  FOREIGN KEY (idUsuario) REFERENCES usuario(id),
  FOREIGN KEY (idEndereco) REFERENCES endereco(idEndereco)
);
```

#### 6. **itempedido**
```sql
CREATE TABLE itempedido (
  idItemPedido INT AUTO_INCREMENT PRIMARY KEY,
  idPedido INT NOT NULL,
  idProduto INT NOT NULL,
  quantidade INT NOT NULL,
  precoUnitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (idPedido) REFERENCES pedido(idPedido),
  FOREIGN KEY (idProduto) REFERENCES produto(idProduto)
);
```

---

## 🔒 Segurança

### Medidas Implementadas
- ✅ Senhas criptografadas com `password_hash()` (PHP)
- ✅ Validação de entrada no servidor (PHP)
- ✅ Proteção contra SQL Injection (prepared statements)
- ✅ Sistema de sessões para controle de acesso
- ✅ Verificação de autenticação em páginas restritas
- ✅ Logout seguro com destruição de sessão

---

## 🧪 Testes Realizados

### ✅ Testes de Autenticação
- [x] Cadastro de novo usuário com sucesso
- [x] Validação de campos obrigatórios
- [x] Login com credenciais válidas
- [x] Rejeição de login com senha incorreta
- [x] Proteção de páginas sem autenticação
- [x] Logout e destruição de sessão

### ✅ Testes de Carrinho
- [x] Adicionar produto ao carrinho
- [x] Alterar quantidade de itens
- [x] Remover item do carrinho
- [x] Cálculo correto do total
- [x] Persistência após recarregar página

---

## 📱 Responsividade

O sistema é **totalmente responsivo**, adaptando-se a:
- 📱 Smartphones (320px+)
- 📱 Tablets (768px+)
- 💻 Notebooks (1024px+)
- 🖥️ Desktops (1920px+)

---

## 🎨 Identidade Visual

### Paleta de Cores
- **Verde Principal:** `#046f6f` - Representa frescor e natureza
- **Verde Escuro:** `#034c4c` - Usado em hovers
- **Laranja:** `#ff9100` - Botões de ação (adicionar ao carrinho)
- **Cinza Escuro:** `#4D4C4C` - Textos
- **Branco:** `#ffffff` - Fundo principal

### Tipografia
- **Fonte Principal:** Montserrat (Google Fonts)
- **Pesos:** 400 (regular), 600 (semibold), 700 (bold)

---

## 📞 Contato e Suporte

### Redes Sociais
- **Facebook:** [FomExpress no Facebook](https://www.facebook.com/profile.php?id=61583397555803)
- **Instagram:** [@restaurante.fomexpress](https://www.instagram.com/restaurante.fomexpress)
- **WhatsApp:** [+55 81 99660-4155](https://wa.me/5581996604155)

### Equipe de Desenvolvimento
Para questões técnicas ou sugestões, entre em contato com a equipe através do repositório GitHub.

---

## 📝 Licença

Este projeto foi desenvolvido como **Trabalho de Conclusão de Curso** para o Curso Técnico em Desenvolvimento de Sistemas – ETEC, modalidade EaD, 2025.

---

## 🙏 Agradecimentos

- **Profª Tatiana Carla** - Orientação do projeto
- **ETEC/SEAD/CGTEC** - Instituição de ensino
- **Família e amigos** - Apoio durante o desenvolvimento

---

## 🚀 Próximos Passos

1. Implementar sistema de pagamento
2. Adicionar rastreamento de pedidos em tempo real
3. Desenvolver painel administrativo para lojistas
4. Criar aplicativo mobile (React Native/Flutter)
5. Integrar com serviços de entrega (Correios, Loggi, etc.)
6. Implementar sistema de cupons e promoções
7. Adicionar chat de suporte ao cliente

---

**Desenvolvido com ❤️ pela equipe FomExpress**

*Qualidade para quem tem pressa!* 🍽️

---

**Versão:** 1.0.0  
**Última atualização:** Novembro 2025