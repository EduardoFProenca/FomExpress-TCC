# Documentação do Projeto FomExpress

Este documento detalha a estrutura organizada do projeto FomExpress, facilitando sua compreensão e uso, especialmente para implantação em ambientes como o XAMPP.

## 1. Estrutura do Projeto

O projeto foi reorganizado para seguir uma estrutura de pastas mais lógica e padronizada, o que melhora a manutenção e a escalabilidade. A nova estrutura é a seguinte:

```
FomExpress/
├── index.html
├── cardapio.html
├── espaco.html
├── quemsomos.html
├── menuresponsivo-teste(2).html
├── resultado.html
├── css/
│   ├── cardapio2.css
│   ├── espaco.css
│   ├── homevegas.css
│   ├── menuresponsivo-teste(2).css
│   └── quemsomos.css
├── js/
├── img/
├── video/
└── docs/
    └── FomExpress_declaracao_de_visao_do_projeto.docx
    └── DOCUMENTACAO.md
```

### Detalhamento das Pastas:

*   **`FomExpress/`**: É a pasta raiz do projeto. Todos os arquivos HTML principais estão aqui.
*   **`css/`**: Contém todos os arquivos de estilo CSS do projeto.
*   **`js/`**: Esta pasta está vazia, mas é reservada para futuros arquivos JavaScript.
*   **`img/`**: Esta pasta está vazia. **É aqui que você deve colocar todas as imagens utilizadas no projeto.** Certifique-se de que os nomes dos arquivos de imagem nos HTMLs correspondam aos nomes dos arquivos que você colocar nesta pasta.
*   **`video/`**: Esta pasta está vazia. **É aqui que você deve colocar os arquivos de vídeo (ex: `videorestaurante.mp4`).**
*   **`docs/`**: Contém a documentação do projeto, incluindo este arquivo e a declaração de visão do projeto.

## 2. Guia de Uso com XAMPP

Para visualizar e testar o projeto localmente usando o XAMPP, siga os passos abaixo:

1.  **Instale o XAMPP**: Se ainda não tiver, baixe e instale o XAMPP a partir do site oficial [Apache Friends](https://www.apachefriends.org/index.html).
2.  **Inicie o Apache**: Abra o painel de controle do XAMPP e inicie o módulo `Apache`.
3.  **Copie o Projeto**: Navegue até a pasta de instalação do XAMPP (geralmente `C:\xampp` no Windows, `/Applications/XAMPP/xamppfiles/` no macOS ou `/opt/lampp/` no Linux). Dentro dela, localize a pasta `htdocs`.
4.  **Cole a Pasta `FomExpress`**: Copie a pasta `FomExpress` (que contém todos os arquivos e subpastas organizados) para dentro da pasta `htdocs`.
5.  **Acesse no Navegador**: Abra seu navegador web e digite `http://localhost/FomExpress/` na barra de endereços. A página `index.html` (antiga `homevegas.html`) será carregada automaticamente.

