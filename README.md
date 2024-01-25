# MVC
Proyecto Laravel
1- Configurar el Dockerfile para la instalacion de Laravel \
2- Dentro de del contendor lanzar el comando: \
    - composer create-proyect laravel/laravel (Nombre del proyecto) \
3- cambiar al directorio creado con el composer y lanzar el comando: \
    - php artisan serve \
    (Para docker hay que poner: php artisan serve --host=0.0.0.0 --port=8000)