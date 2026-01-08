# 🥊 Inside CRM - Gestão para Academia de Muay Thai

O **Inside CRM** é um sistema desenvolvido como um MVP (Minimum Viable Product) para automatizar a gestão de alunos e o controle administrativo de uma academia de artes marciais. O foco do projeto foi criar uma estrutura sólida e escalável para o gerenciamento de pagamentos, graduações e dados cadastrais.

---

## 📸 Interface do Sistema

![Preview do Dashboard Inside](images/logo_inside.png)
*Exemplo da identidade visual e estrutura do dashboard administrativo.*

---

## 🚀 Tecnologias e Padrões de Projeto

Para garantir a integridade dos dados e a performance da aplicação, foram aplicados conceitos avançados de desenvolvimento:

* **PHP 8+**: Lógica de backend e processamento de dados.
* **MySQL & PDO**: Persistência de dados utilizando *PHP Data Objects* para prevenir SQL Injection.
* **Singleton Pattern**: Implementação na classe `Conexao.php` para garantir que apenas uma instância da conexão com o banco de dados seja criada, otimizando o uso de memória.
* **Arquitetura Organizada**: Divisão de responsabilidades entre as pastas `modelo`, `controle` e `servico` (inspirado no padrão MVC).
* **CSS Customizado**: Interface desenvolvida com foco em usabilidade para o ambiente de academia.

---

## ✨ Funcionalidades do MVP

* **🔑 Autenticação**: Sistema de login seguro para administradores.
* **📊 Dashboard**: Painel central para visualização rápida do status da academia.
* **👥 Controle de Alunos**: Módulo preparado para o cadastro e consulta de membros.
* **💳 Gestão Financeira**: Controle básico de pagamentos e mensalidades.
* **🥋 Graduações**: Acompanhamento do nível técnico (grau) dos alunos de Muay Thai.

---

## 📂 Estrutura do Repositório

* `/controle`: Lógica de controle e processamento das requisições.
* `/modelo`: Definição das entidades de dados.
* `/servico`: Camada de serviços e utilitários.
* `/banco_dados`: Scripts SQL para criação da estrutura das tabelas.
* `/images`: Assets e fotos do sistema (incluindo logo e fotos de perfil).

---

## 🛠️ Como rodar o projeto

1. **Requisitos**: Servidor Apache e MySQL (como o XAMPP ou Laragon).
2. **Banco de Dados**: Importe o arquivo SQL localizado na pasta `/banco_dados`.
3. **Configuração**: Verifique as credenciais no arquivo `controle/Conexao.php`:
   ```php
   self::$instance = new PDO("mysql:host=localhost;dbname=inside", "root", "ifsp");
