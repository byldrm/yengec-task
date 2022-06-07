<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#Yengeç Task



Aşıdaki satırları sırayla komut satırında çalıştırın.

    git clone https://github.com/byldrm/yengec-task
    
    cd yengec-task
    
    composer update

    cp .env.example .env

    php artisan key:generate

Database bağlantısı için .env dosyasından.

    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD

satırlarını düzenleyin.


Aşıdaki satırları sırayla komut satırında çalıştırın.

    php artisan migrate

    php artisan passport:install

    php artisan serve

Postman Collections
https://www.getpostman.com/collections/7e7acee0867ca44789b1

Postman Environment (postman AuthToken ve localBaseUrl değişkenleri için bunu postmane import edin.)
    
    {
	"id": "4167dee7-c62c-48e7-8da9-e4ff525e6ee3",
	"name": "Yengeç Task",
	"values": [
		{
			"key": "AuthToken",
			"value": "",
			"type": "default",
			"enabled": true
		},
		{
			"key": "localBaseUrl",
			"value": "http://localhost:8000",
			"type": "default",
			"enabled": true
		}
	],
	"_postman_variable_scope": "environment",
	"_postman_exported_at": "2022-06-07T13:48:23.450Z",
	"_postman_exported_using": "Postman/9.20.3"
    }

    

    
