## Tabla de Contenidos :card_index:

* [Descripción del proyecto](#gestor-de-reconocimientos-médicos-(grm))
* [Construido con](#construido-con)
* [Instalación](#instalacion)
* [Autor](#autor)
* [Versión](#version)

# Gestor de Reconocimientos Médicos (GRM) :hospital:

_La aplicación consiste en un sistema de gestión de citas médicas para un centro que realiza reconocimientos para empresas._

## Construido con 🛠️

_El proyecto ha sido creado con:_

* [PHP](https://www.php.net/) - PHP (acrónimo recursivo de PHP: Hypertext Preprocessor) es un lenguaje de código abierto muy popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML.
* [Laravel](https://laravel.com/) - Laravel es un framework de código abierto para desarrollar aplicaciones y servicios web con PHP 5 y PHP 7.
* [Laravel-Blade](https://laravel.com/docs/5.8/blade) - Blade es el motor de plantillas simple pero potente provisto con Laravel.
* [Laravel-Eloquent](https://laravel.com/docs/5.8/eloquent) - El ORM Eloquent incluido con Laravel proporciona una implementación de ActiveRecord hermosa y simple para trabajar con su base de datos.

## Instalación :floppy_disk:

_Para ejecutar el proyecto necesitas seguir los siguientes pasos:_

Abrimos la línea de comandos y llegamos a la ruta donde vamos a clonar la aplicación.
```
$ cd ../mvc-laravel
$ git clone https://github.com/Beaves83/mvc-laravel.git
$ composer install
```
Crear una base de datos llamada mvc-laravel. Modificamos el fichero .env para añadir el nombre de la base de datos, nombre de usuario y contraseña. Volvemos a la línea de comandos.
```
$ php artisan migrate --seed
```
Este último paso tardará unos minutos porque vamos a generar datos de prueba.


## Autor :man:

* **Bibiano Ruiz** - *Creador del proyecto.* - [beaves83](https://github.com/Beaves83/)

## Versión 0.2 :computer:

_El proyecto no está completo, aun no tengo terminada la primera versión._
