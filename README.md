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
mongo:
1- apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
2- yes '' | pecl install mongodb
3- composer require mongodb/laravel-mongodb --ignore-platform-reqs
4- afegir a .env -> MONGO_DSN=mongodb://root:admin@mongodb:27017/
5- cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
6- echo extension="mongodb.so" >> /usr/local/etc/php/php.ini

MONGO_DB_CONNECTION=mongodb
MONGO_DB_HOST=mongodb
MONGO_DB_PORT=27017
MONGO_DB_DATABASE=househostpro
MONGO_DB_USERNAME=root
MONGO_DB_PASSWORD=admin

Dara fallo si no se tiene la variables en mongo(pedir a Miquel)
redsys:
REDSYS_KEY=sq7HjrUOBfKmC576ILgskD5srU870gJ7
REDSYS_URL_OK="http://localhost:8100/redsys/ok"
REDSYS_URL_KO="http://localhost:8100/redsys/ko"
REDSYS_URL_NOTIFICATION="http://localhost:8100/redsys/notification"
REDSYS_MERCHANT_CODE=999008881

mailgun: composer require mailgun/mailgun-php symfony/http-client nyholm/psr7
pdf: composer require barryvdh/laravel-dompdf
