# Copservir-app
Esta es mi solución para la prueba de conocimiento
Se necesita instalar previamente php 7.4, Apache, MySQL y Composer para ejecutar los comandos requeridos

Primero se debe clonar este repositorio el cual tiene una aplicación en Laravel de versión 8.12 Y PHP 7.3^.

Luego de clonar este repositorio lo que se debe hacer es ejecutar el comando:

composer install

luego de haber instalado las librerías tenemos que crear el archivo .env basado en archivo llamado .env-example, del cual tenemos que poner el nombre de la base de datos MYSQL, su host, usuario y contraseña. En mi caso, lo ejecuto local en una máquina Windows 10 con WAMP server por lo cual solo debo poner la base de datos llamada "laravel" y dejar host como localhost, y usuario root y contraseña en blanco, ya que así se configura WAMP Server.


luego de realizar composer install, se ejecuta el comando


composer require barryvdh/laravel-dompdf

Luego este comando,

php artisan key:generate

posteriormente, se ejecuta el comando


php artisan migrate:refresh


finalmente, para el llenado de base de datos se ejecuta el comando 



php artisan db:seed

## Esquema de base de datos

![alt text](https://raw.githubusercontent.com/armando555/Copservir-app/develop/EsquemaDB.png)
