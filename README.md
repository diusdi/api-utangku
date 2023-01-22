## Installation

- Pull/download melalui github
- Ekstrak pada folder yang diinginkan
- Pada terminal pada vs code/git bash pada folder tersebut ketikan:


```bash
  composer install
  cp .env.copy .env
  php artisan key:generate
```
- Jika nama file pada folder  adalah .env.example, maka ganti nama .env.copy pada langkah diatas

## Persiapan database

- command untuk melakukan seeder
```bash
  php artisan migrate:fresh --seed
```

## Login sebagai admin

email : admin@utangku.com
password : qweasdzx