# WayniTest

## Configuración teniendo en cuenta que tanto composer como laravel ya estan corriendo en terminal.

1- Creamos proyecto (Importante respetar nombre)

    composer create-project --prefer-dist laravel/laravel WayniPrueba
  
2 - Habilitar server  

    cd WayniPrueba

    php artisan serve
 
3 - Importante respetar url servidor ( Ya se encuentran configurados en las credenciales de login )  

    localhost:8000
    127.0.0.1:8000
    
4 - Reemplazar los directorios resources/ y routes/ por los del repositorio.

## Conclusión

Simple captura de contactos conectando con OAuth de Google recibiendo como respuesta (Nombre , E-mail, Teléfono). 
