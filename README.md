

<p align="center">
  <a href="https://youtu.be/dzQy1qLAdIo">
      <img src="https://img.youtube.com/vi/dzQy1qLAdIo/maxresdefault.jpg" />
  </a>
</p>


---


# ETEC Zona Leste - Projeto website

Este é um projeto de site institucional para a ETEC Zona Leste, desenvolvido com o framework Laravel. O sistema centraliza informações sobre cursos, eventos e oportunidades, oferecendo uma interface intuitiva para a comunidade acadêmica.

## Tecnologias Utilizadas

* **Backend:** Laravel (PHP);
* **Frontend:** Blade Templates, Tailwind CSS;
* **Banco de Dados:** MySQL (via XAMPP).

## Funcionalidades Implementadas

O projeto inclui recursos voltados para a praticidade e organização da unidade.

* **Sistema de internacionalização:** Suporte a múltiplos idiomas através de arquivos de tradução;
* **Busca integrada:** Ferramenta para localização rápida de cursos, notícias e documentos;
* **Oportunidades de emprego:** Painel dedicado à divulgação de vagas de estágio e emprego para estudantes e egressos;

## Estrutura do Projeto

* `app/`: Lógica e controllers;
* `resources/views/`: Armazena as interfaces desenvolvidas;
* `lang/`: Arquivos de tradução e internacionalização;
* `routes/`: Definições de rotas do sistema;
* `public/`: Arquivos estáticos (imagens, ícones e logos).

## Instalação e Execução Local

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/victor-yttd/etecmid.git
   ```

2. **Instale as dependências:**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Configuração de Ambiente:**
   * Renomeie `.env.example` para `.env`.
   * Configure os dados do banco MySQL no arquivo `.env`.

4. **Finalização:**
   ```bash
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```
   
   O website estará em http://127.0.0.1:8000
   
---

### Sobre a Instituição
A ETEC Zona Leste, fundada em 2008 e localizada na Avenida Águia de Haia em São Paulo, é uma unidade do Centro Paula Souza reconhecida pela excelência no ensino técnico e tecnológico. Este projeto visa refletir a modernidade e o compromisso educacional da unidade.

**Desenvolvido por:** Victor Hugo. 
**Status:** Em desenvolvimento.
