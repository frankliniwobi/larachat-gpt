<h1 align="center">
        Lara Chat GPT
</h1>

------
**Lara Chat GPT** is a project that help developers to be more efficient by assessing AI on the command line without needing to leave their code base.

## Get Started

> **Requires [PHP 8.1+](https://php.net/releases/)**

First, clone this repo:

```bash
git clone https://github.com/frankliniwobi/larachat-gpt.git
```

Next, install dependencies via composer :

```bash
composer install 
```

Next, build assets via npm :

```bash
npm install && npm run build
```

Next, copy the env.example file to a .env file :

```bash
cp .env.example .env
```

Next, set your OpenAI key and Organization key :

```env
OPENAI_API_KEY=sk-...
OPENAI_ORGANIZATION=org-...
```

Finally, generate application key:

```bash
php artisan key:generate
```

## Configuration

### OpenAI API Key and Organization

Specify your OpenAI API Key and organization. This will be
used to authenticate with the OpenAI API - you can find your API key
and organization on your OpenAI dashboard, at https://openai.com. Log into
your OpenAI account and get the keys.

```env
OPENAI_API_KEY=
OPENAI_ORGANIZATION=
```
---

Lara Chat GPT is  **free for use**.
