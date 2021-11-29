# Copservir-app
Esta es mi solución para la prueba de conocimiento
Se necesita instalar previamente php 7.4, Apache, MySQL y Composer para ejecutar los comandos requeridos

Primero se debe clonar este repositorio el cual tiene una aplicación en Laravel de versión 8.12 Y PHP 7.3^.

Luego de clonar este repositorio lo que se debe hacer es ejecutar el comando:

composer install


luego de realizar composer install, se ejecuta el comando

php artisan key:generate

posteriormente, se ejecuta el comando


php artisan migrate:refresh


finalmente, para el llenado de base de datos se ejecuta el comando 



php artisan db:seed
