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
- [Segurança](#segurança)
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
- Sistema de carrinho inteligente com modal rápido
- Autenticação segura com criptografia de senhas
- Formulários com feedback em tempo real (sem redirecionamento)

---

## 📁 Estrutura do Projeto

```
FomExpress-TCC/
├── html/                          # Páginas do sistema
│   ├── home.php                   # Página inicial (com sistema de login)
│   ├── cardapio.html              # Visualização do cardápio completo
│   ├── carrinho.html              # Página de checkout
│   ├── espaco.html                # Informações sobre o espaço físico
│   ├── quemsomos.html             # Sobre a empresa
│   └── processa_trabconosco.php   # Processamento de candidaturas (AJAX)
│
├── conta/                         # Sistema de autenticação
│   ├── actions/
│   │   ├── processa_cadastro.php  # Processa novo usuário
│   │   ├── processa_login.php     # Valida credenciais
│   │   └── logout.php             # Encerra sessão
│   ├── classes/                   # Classes PHP (POO)
│   │   ├── Usuario.php            # Classe base de usuário
│   │   ├── Cliente.php            # Herda de Usuario
│   │   └── Lojista.php            # Herda de Usuario
│   ├── config/
│   │   └── conexao.php            # Configuração do banco de dados
│   ├── cadastro.php               # Formulário de cadastro
│   ├── login.php                  # Formulário de login
│   ├── index.php                  # Dashboard do usuário
│   └── criar_tabela.php           # Script auxiliar (criar tabelas)
│
├── back-end/                      # Processamento de formulários
│   ├── Reserva.php                # Processa reservas (retorna JSON)
│   ├── classes/                   # Classes PHP duplicadas (para referência)
│   └── actions/                   # Actions antigas (não utilizadas)
│
├── css/                           # Estilos da aplicação
│   ├── home.css                   # Estilo da página inicial + dropdown usuário
│   ├── cadastro.css               # Estilo do cadastro
│   ├── acessar.css                # Estilo do login
│   ├── cardapio.css               # Estilo do cardápio + modal carrinho
│   ├── espaco.css                 # Estilo da página espaço + alerts
│   └── quemsomos.css              # Estilo quem somos + alerts formulário
│
├── js/                            # Scripts JavaScript
│   ├── carrinho.js                # Lógica completa do carrinho
│   ├── reserva.js                 # AJAX para formulário de reserva
│   └── trabalhe_conosco.js        # AJAX para formulário trabalhe conosco
│
├── img/                           # Imagens do projeto
│   ├── logo/                      # Logotipos e favicon
│   ├── backgrounds/               # Imagens de fundo
│   │   ├── espacos/               # Fotos do ambiente
│   │   └── comida/                # Fotos dos pratos
│   └── cardapio/                  # Imagens dos produtos (aperitivos, massas, etc)
│
├── video/                         # Vídeos institucionais
│   └── videorestaurante.mp4       # Vídeo da página cardápio
│
├── uploads/                       # Arquivos enviados pelos usuários
│   └── curriculos/                # Currículos (criado automaticamente)
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
- **JavaScript (ES6+)** - Interatividade, validações e AJAX
- **Bootstrap 5** - Grid system e componentes (espaco.html)
- **Font Awesome 4/6** - Ícones

### Backend
- **PHP 8.x** - Lógica do servidor, autenticação e upload de arquivos
- **MySQL 8.x** - Sistema gerenciador de banco de dados

### Ferramentas de Desenvolvimento
- **Visual Studio Code** - Editor de código
- **XAMPP** - Servidor local (Apache + MySQL + PHP)
- **MySQL Workbench** - Modelagem e administração do BD
- **Git/GitHub** - Controle de versão

### Padrões e Boas Práticas
- **POO (Programação Orientada a Objetos)** - Classes Usuario, Cliente, Lojista
- **MVC (parcial)** - Separação de lógica e apresentação
- **AJAX** - Requisições assíncronas sem reload de página
- **Prepared Statements** - Proteção contra SQL Injection
- **Password Hashing** - Criptografia de senhas com `password_hash()`

---

## 💻 Requisitos do Sistema

### Requisitos Mínimos para Usuário Final
- **Processador:** Intel Pentium Dual Core ou superior
- **RAM:** 4GB (recomendado: 8GB)
- **Armazenamento:** 100MB livres
- **Sistema Operacional:** Windows 7+, macOS ou Linux
- **Navegadores:** Chrome 90+, Firefox 88+, Edge 90+ ou Opera (versões recentes)
- **Conexão:** Mínimo 1Mbps

### Para Desenvolvimento
- **XAMPP 8.0+** ou **WAMP** (Apache + MySQL + PHP)
- **MySQL 8.0+**
- **PHP 8.0+** com extensões: mysqli, json, fileinfo
- **Visual Studio Code** (ou editor similar)
- **Git 2.30+** para controle de versão

---

## ⚙️ Instalação e Configuração

### 1. Clonar o Repositório
```bash
git clone https://github.com/seu-usuario/fomexpress-tcc.git
cd fomexpress-tcc
```

### 2. Configurar o Banco de Dados

#### 2.1. Criar o Banco de Dados
Abra o **MySQL Workbench** ou **phpMyAdmin** (`http://localhost/phpmyadmin`) e execute:

```sql
CREATE DATABASE fomexpress_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

#### 2.2. Importar a Estrutura Completa
Execute o arquivo SQL:

```sql
USE fomexpress_db;
SOURCE C:/xamppx/htdocs/FomExpress-TCC/banco-de-dados/dbformexpress.sql;
```

Ou importe manualmente via phpMyAdmin:
1. Selecione o banco `fomexpress_db`
2. Clique em "Importar"
3. Escolha o arquivo `dbformexpress.sql`
4. Clique em "Executar"

#### 2.3. Verificar Tabelas Criadas
```sql
USE fomexpress_db;
SHOW TABLES;
```

**Tabelas esperadas:**
- ✅ `usuario` - Dados dos usuários cadastrados
- ✅ `lojista` - Dados dos restaurantes parceiros
- ✅ `endereco` - Endereços de entrega
- ✅ `produto` - Itens do cardápio
- ✅ `pedido` - Pedidos realizados
- ✅ `itempedido` - Itens de cada pedido
- ✅ `reserva` - Reservas de mesas
- ✅ `candidatos` - Currículos enviados (Trabalhe Conosco)

### 3. Configurar Conexão com o Banco

Edite o arquivo `conta/config/conexao.php`:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";           // ✅ Seu usuário MySQL
$password = "";               // ✅ Sua senha MySQL (deixe vazio se não tiver)
$dbname = "fomexpress_db";    // ✅ Nome do banco
$port = 3306;                 // ✅ Porta padrão

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
```

### 4. Configurar o XAMPP

1. **Copie a pasta do projeto** para:
   - Windows: `C:\xamppx\htdocs\FomExpress-TCC\`
   - Linux: `/opt/lampp/htdocs/FomExpress-TCC/`
   - macOS: `/Applications/XAMPP/htdocs/FomExpress-TCC/`

2. **Inicie os serviços** no painel do XAMPP:
   - ✅ Apache
   - ✅ MySQL

3. **Acesse o projeto**:
   ```
   http://localhost/FomExpress-TCC/html/home.php
   ```

### 5. Criar Pasta de Uploads

A pasta `uploads/curriculos/` será criada automaticamente pelo PHP, mas você pode criá-la manualmente:

```bash
mkdir -p uploads/curriculos
chmod 755 uploads/curriculos  # Linux/macOS
```

### 6. Testar a Instalação

#### Teste 1: Página Inicial
```
http://localhost/FomExpress-TCC/html/home.php
```
✅ Deve carregar a página principal

#### Teste 2: Sistema de Login
```
http://localhost/FomExpress-TCC/conta/login.php
```
✅ Deve exibir o formulário de login

#### Teste 3: Cadastro de Usuário
1. Acesse: `http://localhost/FomExpress-TCC/conta/cadastro.php`
2. Preencha os dados
3. Clique em "Cadastrar"
4. ✅ Deve redirecionar para login com mensagem de sucesso

---

## 🚀 Funcionalidades

### ✅ Implementadas (Sprint 1, 2 e 3)

#### 🔐 Sistema de Autenticação Completo
- [x] Cadastro de novos usuários com validação
- [x] Login com validação de credenciais
- [x] Criptografia de senhas (`password_hash` + `PASSWORD_DEFAULT`)
- [x] Sistema de sessões PHP (`$_SESSION`)
- [x] Logout seguro com destruição de sessão
- [x] Proteção de páginas restritas
- [x] Menu dropdown do usuário (desktop e mobile)
- [x] Exibição de nome e email do usuário logado

#### 🏠 Navegação e Interface
- [x] Página inicial (Home) totalmente responsiva
- [x] Menu hambúrguer adaptativo para mobile
- [x] Header fixo em todas as páginas
- [x] Links para redes sociais funcionais
- [x] Footer padronizado em todas as páginas
- [x] Smooth scrolling para âncoras internas

#### 🍴 Cardápio Completo
- [x] 7 categorias de produtos:
  - Aperitivos (3 itens)
  - Massas (3 itens)
  - Entradas (3 itens)
  - Saladas (3 itens)
  - Acompanhamentos (3 itens)
  - Sobremesas (3 itens)
  - Bebidas (3 itens)
- [x] Exibição de foto, nome, descrição e preço
- [x] Botões "Adicionar ao Carrinho" funcionais
- [x] Vídeo institucional de fundo

#### 🛒 Sistema de Carrinho Inteligente
- [x] **Botão flutuante** com contador de itens
- [x] **Modal rápido** de visualização do carrinho
- [x] Adicionar/Remover produtos
- [x] Aumentar/Diminuir quantidade com botões +/-
- [x] Cálculo automático do total em tempo real
- [x] Persistência com `localStorage` (dados mantidos entre sessões)
- [x] Notificações elegantes ao adicionar itens
- [x] Animações suaves (pulse, slideIn, fadeIn)
- [x] Página de checkout completa (`carrinho.html`)
- [x] Sincronização entre abas abertas

#### 📋 Formulários com AJAX (Sem Reload)
- [x] **Reserva de Mesa** (`espaco.html`)
  - Validação de campos obrigatórios
  - Validação de email
  - Mensagem de sucesso/erro na mesma página
  - Feedback visual "⏳ Enviando..."
  - Salvamento no banco (`tabela reserva`)
  
- [x] **Trabalhe Conosco** (`quemsomos.html`)
  - Upload de currículo (PDF, DOC, DOCX)
  - Validação de tipo de arquivo
  - Validação de tamanho (máx 5MB)
  - Mensagem no topo do formulário
  - Salvamento de arquivo em `uploads/curriculos/`
  - Salvamento no banco (`tabela candidatos`)

#### 📄 Páginas Informativas
- [x] **Quem Somos** - História e valores da empresa
- [x] **Nosso Espaço** - Galeria de fotos (carousel Bootstrap)
- [x] **Localização** - Mapa integrado do Google Maps
- [x] **FAQ** - Perguntas frequentes (accordion Bootstrap)

### 🔄 Próximos Passos ( - Futuras)
-  Finalização do pedido com pagamento
-  Integração com API de pagamento
-  Acompanhamento de pedidos em tempo real
-  Sistema de avaliação de produtos
-  Painel administrativo para lojistas
-  Sistema de notificações
-  Histórico de pedidos


---

## 📊 Metodologia de Desenvolvimento

O projeto utiliza a **metodologia ágil SCRUM**, com:

### 👥 Papéis da Equipe
| Papel | Responsável | Responsabilidades |
|-------|------------|-------------------|
| **Scrum Master** | Ricardo Piccelli | Facilitar processos, remover impedimentos, liderar sprints |
| **Product Owner** | Milca Salata de Almeida | Definir backlog, priorizar funcionalidades, validar entregas |
| **Desenvolvedores** | Eduardo Barbosa, Eduardo Proença, Felipe Oliveira, Lara Ornelas | Desenvolvimento, testes, documentação |

### 📅 Sprints Realizadas

| Sprint | Período | Entregas | Status |
|--------|---------|----------|--------|
| **Sprint 1** | Semanas 1-2 | Modelagem do BD, estrutura HTML/CSS básica, header/footer | ✅ Concluído |
| **Sprint 2** | Semanas 3-4 | Sistema de autenticação (cadastro/login), POO, páginas informativas | ✅ Concluído |
| **Sprint 3** | Semanas 5-6 | Cardápio completo, carrinho com modal, formulários AJAX | ✅ Concluído |
| **Sprint 4** | Semanas 7-8 | Checkout, finalização de pedidos, integração pagamento | 🔄 Em andamento |
| **Sprint 5** | Semanas 9-10 | Testes finais, ajustes, documentação, deploy | 📅 Planejado |

### 🎯 Cerimônias SCRUM Aplicadas
- **Daily Standups** - Reuniões diárias (15min) via Discord
- **Sprint Planning** - Planejamento no início de cada sprint
- **Sprint Review** - Demonstração das entregas ao final da sprint
- **Sprint Retrospective** - Análise de melhorias do processo

---

## 🗄️ Banco de Dados

### Modelo Entidade-Relacionamento (MER)

O banco possui **8 tabelas principais** com relacionamentos bem definidos:

#### Estrutura Completa

```
┌─────────────┐       ┌──────────────┐       ┌─────────────┐
│   usuario   │──────<│   endereco   │       │   lojista   │
│             │   1:N │              │       │             │
│ id (PK)     │       │ idEndereco   │       │ idLojista   │
│ nome        │       │ idUsuario FK │       │ nomeFantasi │
│ email       │       │ logradouro   │       │ cnpj        │
│ senha       │       │ numero       │       └──────┬──────┘
│ telefone    │       │ bairro       │              │
│ data_cad    │       │ cidade       │              │ 1:N
└──────┬──────┘       │ uf           │              │
       │              │ cep          │              ▼
       │ 1:N          └──────────────┘      ┌──────────────┐
       │                                    │   produto    │
       ▼                                    │              │
┌──────────────┐       ┌──────────────┐     │ idProduto PK │
│    pedido    │──────<│  itempedido  │     │ idLojista FK │
│              │   1:N │              │     │ nome         │
│ idPedido PK  │       │ idItemPed PK │     │ descricao    │
│ idUsuario FK │       │ idPedido FK  │     │ preco        │
│ idEnd FK     │       │ idProduto FK │     │ categoria    │
│ dataHora     │       │ quantidade   │     │ imagemUrl    │
│ valorTotal   │       │ precoUnit    │     └──────────────┘
│ status       │       └──────────────┘
│ formaPagto   │
└──────────────┘

┌──────────────┐       ┌──────────────┐
│   reserva    │       │  candidatos  │
│              │       │              │
│ id PK        │       │ id PK        │
│ nome         │       │ nome         │
│ email        │       │ sobrenome    │
│ qtd_pessoas  │       │ email        │
│ data_hora    │       │ celular      │
│ status       │       │ cidade       │
└──────────────┘       │ estado       │
                       │ genero       │
                       │ curriculo    │
                       │ data_envio   │
                       └──────────────┘
```

### Scripts de Criação das Tabelas

#### 1. Tabela `usuario`
```sql
CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(20),
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

#### 2. Tabela `lojista`
```sql
CREATE TABLE lojista (
  idLojista INT AUTO_INCREMENT PRIMARY KEY,
  nomeFantasia VARCHAR(100) NOT NULL,
  cnpj VARCHAR(18) NOT NULL UNIQUE,
  email VARCHAR(150) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  INDEX idx_cnpj (cnpj)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 3. Tabela `endereco`
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
  FOREIGN KEY (idUsuario) REFERENCES usuario(id) ON DELETE CASCADE,
  INDEX idx_usuario (idUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 4. Tabela `produto`
```sql
CREATE TABLE produto (
  idProduto INT AUTO_INCREMENT PRIMARY KEY,
  idLojista INT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL,
  categoria VARCHAR(50) NOT NULL,
  imagemUrl VARCHAR(255),
  FOREIGN KEY (idLojista) REFERENCES lojista(idLojista) ON DELETE CASCADE,
  INDEX idx_lojista (idLojista),
  INDEX idx_categoria (categoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 5. Tabela `pedido`
```sql
CREATE TABLE pedido (
  idPedido INT AUTO_INCREMENT PRIMARY KEY,
  idUsuario INT NOT NULL,
  idEndereco INT NOT NULL,
  dataHora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  valorTotal DECIMAL(10,2) NOT NULL,
  status VARCHAR(50) NOT NULL DEFAULT 'Pendente',
  formaPagamento VARCHAR(50) NOT NULL,
  FOREIGN KEY (idUsuario) REFERENCES usuario(id),
  FOREIGN KEY (idEndereco) REFERENCES endereco(idEndereco),
  INDEX idx_usuario (idUsuario),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 6. Tabela `itempedido`
```sql
CREATE TABLE itempedido (
  idItemPedido INT AUTO_INCREMENT PRIMARY KEY,
  idPedido INT NOT NULL,
  idProduto INT NOT NULL,
  quantidade INT NOT NULL,
  precoUnitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (idPedido) REFERENCES pedido(idPedido) ON DELETE CASCADE,
  FOREIGN KEY (idProduto) REFERENCES produto(idProduto),
  INDEX idx_pedido (idPedido)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 7. Tabela `reserva`
```sql
CREATE TABLE reserva (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  qtd_pessoas INT NOT NULL,
  data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(50) DEFAULT 'Pendente',
  INDEX idx_email (email),
  INDEX idx_data (data_hora),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 8. Tabela `candidatos`
```sql
CREATE TABLE candidatos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  sobrenome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  celular VARCHAR(20),
  cidade VARCHAR(100),
  estado VARCHAR(50),
  genero VARCHAR(20),
  curriculo VARCHAR(255),
  data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_email (email),
  INDEX idx_data (data_envio)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

---

## 🔒 Segurança

### Medidas Implementadas

#### 1. Autenticação e Senhas
✅ **Criptografia forte** - Senhas hasheadas com `password_hash(PASSWORD_DEFAULT)`  
✅ **Verificação segura** - Comparação com `password_verify()`  
✅ **Nunca armazena senhas em texto plano**

#### 2. Proteção contra SQL Injection
✅ **Prepared Statements** em todas as queries  
✅ **Binding de parâmetros** com `bind_param()`  
✅ **Validação de tipos** de dados

#### 3. Proteção contra XSS
✅ **Escape de output** com `htmlspecialchars()`  
✅ **Validação de entrada** no servidor  
✅ **Content-Type headers** corretos

#### 4. Upload de Arquivos Seguro
✅ **Validação de tipo MIME**  
✅ **Limite de tamanho** (5MB)  
✅ **Nomes únicos** (timestamp + uniqid)  
✅ **Validação de extensão** (.pdf, .doc, .docx)  
✅ **Pasta de upload protegida** (`uploads/curriculos/`)

#### 5. Controle de Sessão
✅ **Sessões PHP** com `session_start()`  
✅ **Logout seguro** - Destrói sessão completamente  
✅ **Verificação de autenticação** em páginas restritas  
✅ **Timeout automático** (configurável no php.ini)

#### 6. Validações
✅ **Validação de email** - `filter_var($email, FILTER_VALIDATE_EMAIL)`  
✅ **Campos obrigatórios** - Verificação no servidor  
✅ **Sanitização de entrada** - `trim()`, `strip_tags()`

### Configurações Recomendadas

#### php.ini (Produção)
```ini
display_errors = Off
log_errors = On
error_log = /path/to/php-error.log
session.cookie_httponly = 1
session.cookie_secure = 1  # Se usar HTTPS
session.gc_maxlifetime = 3600  # 1 hora
upload_max_filesize = 5M
post_max_size = 6M
```

---

## 🧪 Testes Realizados

### ✅ Testes de Autenticação

| Teste | Descrição | Resultado |
|-------|-----------|-----------|
| **TC001** | Cadastro com dados válidos | ✅ Aprovado |
| **TC002** | Cadastro com email duplicado | ✅ Erro exibido corretamente |
| **TC003** | Login com credenciais válidas | ✅ Aprovado |
| **TC004** | Login com senha incorreta | ✅ Erro exibido |
| **TC005** | Login com email inexistente | ✅ Erro exibido |
| **TC006** | Acesso a página protegida sem login | ✅ Redireciona para login |
| **TC007** | Logout e destruição de sessão | ✅ Aprovado |
| **TC008** | Senha criptografada no banco | ✅ Hash correto (bcrypt) |

### ✅ Testes de Carrinho

| Teste | Descrição | Resultado |
|-------|-----------|-----------|
| **TC009** | Adicionar produto ao carrinho | ✅ Aprovado |
| **TC010** | Adicionar produto duplicado | ✅ Incrementa quantidade |
| **TC011** | Remover item do carrinho | ✅ Aprovado |
| **TC012** | Alterar quantidade (aumentar) | ✅ Recalcula total |
| **TC013** | Alterar quantidade (diminuir) | ✅ Recalcula total |
| **TC014** | Zerar quantidade de item | ✅ Remove do carrinho |
| **TC015** | Persistência após fechar navegador | ✅ Dados mantidos (localStorage) |
| **TC016** | Sincronização entre abas | ✅ Atualiza em tempo real |

### ✅ Testes de Formulários AJAX

| Teste | Descrição | Resultado |
|-------|-----------|-----------|
| **TC017** | Reserva com dados válidos | ✅ Salva no BD, exibe mensagem |
| **TC018** | Reserva com email inválido | ✅ Erro de validação |
| **TC019** | Reserva sem selecionar qtd pessoas | ✅ Erro de validação |
| **TC020** | Upload de currículo PDF válido | ✅ Arquivo salvo, registro no BD |
| **TC021** | Upload de arquivo muito grande | ✅ Erro exibido (máx 5MB) |
| **TC022** | Upload de formato inválido | ✅ Erro exibido (só PDF/DOC/DOCX) |

### ✅ Testes de Responsividade

| Dispositivo | Resolução | Resultado |
|-------------|-----------|-----------|
| **Desktop** | 1920x1080

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