## Documentación
---
## Contexto
En el ITM `(Instituto Tecnológico Metropolitano de Medellín)` se nos solicita en la clase electiva de PHP realizar el siguiente ejercicio.
 
 
## Requerimientos
 
### Base de datos
- Crear una base de datos llamada bdMesaAyuda
Con dos tablas:
 
- Areas (idArea -autonumérico-, nombreArea -varchar, fkRmple -varchar(20))
 
- Empleados (idEmpleado -varchar (20)-, nombre -varchar-, teléfono   -varchar-  cargo -varchar-  email -varchar- fkIdArea -entero, Fkemple varchar (20))
 
### Desarrollo
- Elaborar un aplicativo web en tres capas que permita guardar, consultar, modificar y borrar Areas en un formulario html
- Que permita  guardar, consultar, modificar y borrar Empleados en otro formulario html (son dos páginas html diferentes)
 
El programa debe iniciar por un index.html que contenga los hipervínculos a los CRUD de Areas y Empleados
 
## Manual de uso
 
Los siguiente son los pasos necesarios para ejecutar el aplicativo web de **laravel**
 
### Instalaciones
Siga los enlaces pàra llegar a sus proveedores, enso de tener problemas al instalar se aconseja buscar en youtube
 
1. [Xampp](https://www.apachefriends.org/es/index.html)
2. [Composer](https://getcomposer.org)
3. [node](https://nodejs.org/es/)
4. [Git](https://git-scm.com) `opcional`
 
**Notas:** 
- En caso de usar `git` y desea hacer un clone del repositorio instale git
- En caso de no querer instalar `xampp` debe instalar **MariaDB** o **MySQL** y **PHP** directamente de los proveedores
 
### Instalación
 
1. Descargue el proyecto o haga el clone en caso de usar `Git`
2. Abra una consola Y ejecute el siguiente comando `composer global require laravel/installer` para tener el instalador de laravel incluido en su equipo
3. Abra el proyecto en el editor de su elección
4. Mueva la consola que ya tiene abierta a donde tiene el proyecto
 
**Nota:** En caso de no tener PHP instalado de forma global recuerde que necesita colocar su proyectos en `C://xampp/htdocs`
 
5. Ejecute el siguiente comando en su consola `composer install`
6. Ejecute el siguiente comando en su consola `npm i`
7. Busque en su proyecto un archivo llamado `.env.example`, que esta en la ruta raiz asi `MesaAyuda/.env.example` y realice los siguientes cambios
    7.1. Retire el sufijo `.example` del nombre al archivo
    7.2. Abra el archivo
    7.3. Busque el campo `DB_DATABASE` y añada el valor de  `bdMesaAyuda`, debe quedar de la siguiente forma `DB_DATABASE=bdMesaAyuda`
    7.4. En caso de tener un usuario diferente a `root`, modifique el siguiente campo `DB_USERNAME=root`, reemplace el usuario `root` sin espacios y seguido del signo igual
    7.5. En caso de que su base de datos necesite contraseña modifique el siguiente campo `DB_PASSWORD= `, agregue su clave sin espacios y seguido del signo igual
8. Ejecute el siguiente comando en la consola `php artisan key:generate`
9. Ejecute el siguiente comando en la consola `npm run dev`
10. Ejecute el siguiente comando en la consola `php artisan serve`
11. Abra en su navegador la ruta `localhost` asi `http//:localhost:8000`
 
Al haber seguido todos los pasos de forma correcta debería estar viendo el aplicativo en su navegador así

