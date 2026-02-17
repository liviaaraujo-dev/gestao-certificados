# 🎓 Gestão de Certificados

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red)]()
[![PHP](https://img.shields.io/badge/PHP-8.x-blue)]()
[![Docker](https://img.shields.io/badge/Docker-Containerized-2496ED)]()
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange)]()
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-UI-38B2AC)]()
[![Larastan](https://img.shields.io/badge/Larastan-Static%20Analysis-green)]()

Sistema web para **gestão de certificados digitais**, com funcionalidades de geração, listagem, visualização (preview) e download de certificados em PDF.

A aplicação foi desenvolvida com Laravel e totalmente containerizada com Docker, garantindo fácil instalação e padronização do ambiente de desenvolvimento.

---

## 📸 Visão Geral

---

## 🚀 Tecnologias Utilizadas

* **Laravel** (Framework PHP)
* **PHP 8+**
* **MySQL**
* **Docker & Docker Compose**
* **Tailwind CSS**
* **Larastan (PHPStan para Laravel)**

---

## ✨ Funcionalidades

* 🎓 Geração de certificados
* 👁️ Preview do certificado antes do download
* 📄 Exportação em PDF
* 📋 Listagem de certificados
* 🔍 Análise estática de código com Larastan
* 🐳 Ambiente totalmente configurado com Docker
* 🎨 Interface moderna com Tailwind CSS

---

## 📦 Requisitos

Antes de iniciar, você precisa ter instalado:

* Docker
* Docker Compose
* Git

> Não é necessário instalar PHP, Composer ou MySQL localmente, pois tudo roda via Docker.

---

## 🐳 Como Rodar o Projeto (Ambiente 100% Docker)

### 1️⃣ Clonar o repositório

```bash
git clone https://github.com/SEU-USUARIO/gestao-certificados.git
cd gestao-certificados
```

---

### 2️⃣ Configurar variáveis de ambiente

Copie o arquivo de exemplo:

```bash
cp .env.example .env
```

Se necessário, ajuste as variáveis do banco (já preparadas para Docker):

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=certificados
DB_USERNAME=root
DB_PASSWORD=root
```

---

### 3️⃣ Subir os containers

```bash
docker-compose up -d --build
```

Isso irá iniciar:

* App Laravel (PHP)
* MySQL
* Node (build frontend)
* Outros serviços definidos no docker-compose

---

### 4️⃣ Instalar dependências do backend

```bash
docker-compose exec app composer install
```

---

### 5️⃣ Gerar a chave da aplicação

```bash
docker-compose exec app php artisan key:generate
```

---

### 6️⃣ Rodar as migrations

```bash
docker-compose exec app php artisan migrate
```

---

### 7️⃣ Instalar e compilar o frontend (Tailwind)

```bash
docker-compose exec app npm install
docker-compose exec app npm run build
```

---

### 8️⃣ Acessar a aplicação

Abra no navegador:

```
http://localhost:8000
```

*(ou a porta configurada no docker-compose)*

---

## 🔍 Análise Estática com Larastan

Este projeto utiliza Larastan para garantir qualidade e segurança do código.

### Rodar análise estática

```bash
docker-compose exec app ./vendor/bin/phpstan analyse
```

Ou via Composer (se configurado):

```bash
docker-compose exec app composer analyse
```

### Rodar com nível mais rigoroso

```bash
docker-compose exec app ./vendor/bin/phpstan analyse --level=max
```

---

## 🛠️ Comandos Úteis

### Acessar o container da aplicação

```bash
docker-compose exec app bash
```

### Parar os containers

```bash
docker-compose down
```

### Rebuild completo

```bash
docker-compose up -d --build
```

### Limpar cache do Laravel

```bash
docker-compose exec app php artisan optimize:clear
```

---

## 🔐 Segurança e Boas Práticas

* Ambiente isolado com Docker
* Configuração por variáveis de ambiente (.env)
* Análise estática com Larastan
* Padrão MVC do Laravel
* Versionamento do banco com migrations
* Código organizado e escalável

---

## 👩‍💻 Autora

**Livia Araujo**
Analista e Desenvolvedora de Sistemas


---
