# MVC
Proyecto Laravel
1- Configurar el Dockerfile para la instalacion de Laravel \
2- Dentro de del contendor lanzar el comando: \
    - composer create-proyect laravel/laravel (Nombre del proyecto) \
3- cambiar al directorio creado con el composer y lanzar el comando: \
    - php artisan serve \
4- crear archivo .env copiando lo de .env.example
5- para iniciar las dependencias de laravel-> composer install
6- si da fallo la carpeta cache de bootstrap que no se crea ir a drive,descargarla y ponerla
7- en caso de que no funcione -> php artisan config:cache &&  php artisan config:clear &&  composer dump-autoload -o

Para comprimir js i scss ->npm run build
Para poder ver la aplicaiocn -> php artisan serve --host=0.0.0.0 --port=8000(luego cambiar 0.0.0.0 por localhost)
mongo: composer require mongodb/laravel-mongodb --ignore-platform-reqs
mailgun: composer require mailgun/mailgun-php symfony/http-client nyholm/psr7
pdf: composer require barryvdh/laravel-dompdf
