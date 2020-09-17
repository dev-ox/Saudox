# Saudox
### Sistema referente a uma clínica de saúde
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/a942144fb30c4366922b69d63e6cf743)](https://app.codacy.com/gh/dev-ox/Saudox?utm_source=github.com&utm_medium=referral&utm_content=dev-ox/Saudox&utm_campaign=Badge_Grade_Dashboard)
<br/>
![Laravel](https://github.com/dev-ox/Saudox/workflows/Laravel/badge.svg)
---



### Clone do repositório:
Ao dar clone no repositório, é necessário executar seguinte comando; para atualizar o o seu projeto.

```bash
composer update
```

### Popular banco de dados:
```bash
composer dump-autoload
php artisan migrate:fresh
php artisan db:seed
```
ou
```bash
composer dump-autoload
php artisan migrate:fresh --seed
```
_Para ambos os casos, se suas tabelas já estejam atualizadas e limpas, não
precisa usar a tag fresh no comando de migrate._

### Configurando o Banco de Dados
__Primeiro configura-se o .env, com o nome do usuário do banco, o nome do banco e a senha__

```
CREATE DATABASE saudox;
CREATE USER 'saudox'@'localhost' IDENTIFIED BY 'saudox';
GRANT ALL PRIVILEGES ON saudox.* TO 'saudox'@'localhost';
FLUSH PRIVILEGES;
quit
```

### Links:
- Quadro do trello: [link](https://trello.com/b/JBiMYFBe/desenvolvimento)

**Algumas explicações:**
- Está sendo utilizaodo o *Laravel/UI* versão 1.2.0, pois é versão mais atualizada e compatível com o laravel 6. [link](https://github.com/laravel/ui/releases)
``` bash
composer require laravel/ui "^1.2"
```
