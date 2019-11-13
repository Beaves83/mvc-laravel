## Tabla de Contenidos :card_index:

* [Descripción del proyecto](#gestor-de-reconocimientos-médicos-(grm))
* [Construido con](#construido-con)
* [Instalación](#instalacion)
* [Autor](#autor)
* [Versión](#version)

# Gestor de Reconocimientos Médicos (GRM) :hospital:

_La aplicación consiste en un sistema de gestión de citas médicas para un centro que realiza reconocimientos para empresas._

El sitema cuenta con tres perfiles disponibles, con los cuales accederemos a distintas opciones que nos ofrede el GRM. Los tres roles
que tenemos serán **Secretario**, **Médico** y **Administrador**.  

**Secreatario** - Tendrá acceso a todos los listados. Puede crear clientes y citas. Puede modificar citas siempre y cuando no se haya realizado ninguna consulta en esa cita. Cuenta con el acceso al historico de clientes y citas. 

**Médico** - Tendrá acceso a todos los listados. Puedes actualziar el número de consultas realizadas en una cita.  

**Administrador** - Tendrá acceso a todos los listados. Puede crear clientes, citas y usuarios. Puede modificar citas siempre y cuando no se haya realizado ninguna consulta en esa cita. Cuenta con el acceso al historico de clientes y citas.


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

_NOTA: Si ya he descargado el proyecto anteriormente, tendría que refactorizar todo y hacer una nueva población de la BBDD para que todo nos funcione bien con el siguiente comando:_
```
php artisan migrate:refresh --seed
```
Por defecto se crearán tres usuarios con los cuales podemos realizar las pruebas, un usuario para cada rol distintos.

**Usuario:** admin@email.es  
**Contraseña:** admin@email.es  
**Rol:** Administrador  

**Usuario:** secretario@email.es  
**Contraseña:** secretario@email.es  
**Rol:** Secretario  

**Usuario:** medico@email.es  
**Contraseña:** medico@email.es  
**Rol:** Médico  


## Autor :man:

* **Bibiano Ruiz** - *Creador del proyecto.* - [beaves83](https://github.com/Beaves83/)

## Versión 0.5 :computer:

_El proyecto no está completo, aun no tengo terminada la primera versión._
