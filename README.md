# Documentación
---
## Indice
1. [Contexto](#contexto)
2. [Requerimientos](#requerimientos)
    2.1. [Base de datos](#BD)
    2.2. [Desarrollo](#desarrollo)
3. [Manual de uso](#manual)
    3.1. [Instalaciones]($instalaciones)
    3.2 [Instalación app]($instalacion)

<div id="contexto">

## Contexto
En el ITM `(Instituto Tecnológico Metropolitano de Medellín)` se nos solicita en la clase electiva de PHP realizar el siguiente ejercicio.
 
<div id="requerimientos">
 
## Requerimientos

<div id="BD">
 
### Base de datos
- Crear una base de datos llamada bdMesaAyuda
Con dos tablas:
 
- Areas (idArea -autonumérico-, nombreArea -varchar, fkRmple -varchar(20))
 
- Empleados (idEmpleado -varchar (20)-, nombre -varchar-, teléfono   -varchar-  cargo -varchar-  email -varchar- fkIdArea -entero, Fkemple varchar (20))
 
 <div id="desarrollo">

### Desarrollo
- Elaborar un aplicativo web en tres capas que permita guardar, consultar, modificar y borrar Areas en un formulario html
- Que permita  guardar, consultar, modificar y borrar Empleados en otro formulario html (son dos páginas html diferentes)
 
El programa debe iniciar por un index.html que contenga los hipervínculos a los CRUD de Areas y Empleados
 
 <div id="manual">

## Manual de uso
 
Los siguiente son los pasos necesarios para ejecutar el aplicativo web de **laravel**
 
 <div id="instalaciones">

### Instalaciones
Siga los enlaces pàra llegar a sus proveedores, enso de tener problemas al instalar se aconseja buscar en [youtube](http://www.youtube.com)
 
1. [Xampp](https://www.apachefriends.org/es/index.html)
2. [Composer](https://getcomposer.org)
3. [node](https://nodejs.org/es/)
4. [Git](https://git-scm.com) `opcional`
 
**Notas:** 
- En caso de usar `git` y desea hacer un clone del repositorio instale git
- En caso de no querer instalar `xampp` debe instalar **MariaDB** o **MySQL** y **PHP** directamente de los proveedores

<div id="instalacion">

### Instalación app
 
1. Descargue el proyecto o haga el clone en caso de usar `Git`
2. Abra una consola Y ejecute el siguiente comando `composer global require laravel/installer` para tener el instalador de laravel incluido en su equipo
3. Abra el proyecto en el editor de su elección
4. Mueva la consola que ya tiene abierta a donde tiene el proyecto
    * En caso de no saber como hacerlo copie la ruta de su proyecto en el explorador de archivos y escriba en la consola `cd ruta` y presione la tecla **enter**
    * En caso de no poder moverse busque un video en [youtube](http://www.youtube.com)
 
**Nota:** En caso de no tener PHP instalado de forma global recuerde que necesita colocar su proyectos en `C://xampp/htdocs`
 
5. Ejecute el siguiente comando en su consola `composer install`
    * Instala todas las dependencias de **composer**
6. Ejecute el siguiente comando en su consola `npm i`
    * Instala todas las dependencias de **node**
7. Busque en su proyecto un archivo llamado `.env.example`, que esta en la ruta raiz asi `MesaAyuda/.env.example` y realice los siguientes cambios
    7.1. Retire el sufijo `.example` del nombre al archivo
    7.2. Abra el archivo
    7.3. Busque el campo `DB_DATABASE` y añada el valor de  `bdMesaAyuda`, debe quedar de la siguiente forma `DB_DATABASE=bdMesaAyuda`
    7.4. En caso de tener un usuario diferente a `root`, modifique el siguiente campo `DB_USERNAME=root`, reemplace el usuario `root` sin espacios y seguido del signo igual
    7.5. En caso de que su base de datos necesite contraseña modifique el siguiente campo `DB_PASSWORD= `, agregue su clave sin espacios y seguido del signo igual
8. Ejecute el siguiente comando en la consola `php artisan key:generate`
    * Esto deberia llenar el campo de `PP_KEY` ubicado en su archivo `.env`
9. Ejecute el siguiente comando en la consola `npm run dev`
    * Compilara los archivos **sass** y **js**
10. Ejecute el siguiente comando en la consola `php artisan migrate`
    * Creara todas las tablas y campos en su base de datos de forma automatica
11. Ejecute el siguiente comando en la consola `php artisan serve`
    * Abrira un servidor local en el puerto `8000`
12. Abra en su navegador la ruta `localhost` asi `http//:localhost:8000`
 
Al haber seguido todos los pasos de forma correcta debería estar viendo el aplicativo en su navegador como se ve en la siguiente imagen

![image](https://user-images.githubusercontent.com/51238797/111096502-abe65480-850d-11eb-9607-450fa53a8667.png)

