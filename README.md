# Microservicio Sesión de Entrenamiento.

Microservicio encargado de la gesitón de las sesiones de entrenamiento de la aplicación SINPLAFUT de la materia **Desarrollo de Aplicaciones Basadas en Microservicios**.

## Información.

El microservicio está desarrollado en Laravel 8 con el paquete de Sail para un despliegue en un contenedor Docker.

## Pasos para correr la aplicación.

Se necesita tener instalado Docker.

1. Instalar Dependencias de Composer desde un proyecto clonado (Estar dentro de la carpeta del proyecto)
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
    ```
2. (Opcional) Crear un alias para el paquete Laravel Sail y montar la aplicación.
    ```
    alias sail="bash vendor/bin/sail"
    ```
3. Si hiciste el anterior paso, podrás montar la aplicación en Docker de la siguiente forma.
    ```
    sail up -d | sail up
    ```
    Si no hiciste el paso anterior, todos los comandos lo harás de la siguiente manera: ./vendor/bin/sail up | ./vendor/bin/sail up -d
4. Para mayor información entrar a:
    <href ="https://laravel.com/docs/8.x/installation"> Documentación de Laravel 8</href>

### OTRAS COSAS

* Para ver las rutas disponibles y probar el microservicio utiliza:
    ```
    sail artisan route:list
    ```