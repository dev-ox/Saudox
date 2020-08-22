# Saudóx
### Sistema referente a uma clínica de saúde
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

### Links:
- Quadro do trello: [link](https://trello.com/b/JBiMYFBe/desenvolvimento)

**Algumas explicações:**
- Está sendo utilizaodo o *Laravel/UI* versão 1.2.0, pois é versão mais atualizada e compatível com o laravel 6. [link](https://github.com/laravel/ui/releases)
``` bash
composer require laravel/ui "^1.2"
```
