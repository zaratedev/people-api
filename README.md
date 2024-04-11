# People API

Api rest para el registro de datos generales de personas como
Nombre, primer apellido, segundo nombre, telefono, email, codigo postal y estado.

## Requisitos

- PHP 8.1
- MySQL

## Configuracion

Editar archivo .env con la informacion de la base de datos

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=dbusername
DB_PASSWORD=dbpassword

```

## Ejecutar servidor local

Ejecutar el siguiente comando para levantar el servidor

```
php artisan serve
```

Este comando levantara la API en la siguiente URL

http://127.0.0.1:8000

## Endpoints

### Crear persona

```
curl --location 'http://127.0.0.1:8000/api/peoples' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "Jonathan",
    "first_name": "Zarate",
    "last_name": "Hernandez",
    "email": "zaratedev@gmail.com",
    "phone": "5555555555",
    "postal_code": "11820",
    "state": "Ciudad de Mexico"
}'
```

### Listado de personas

```
curl --location 'http://127.0.0.1:8000/api/peoples' \
--header 'Accept: application/json'
```

### Eliminar persona

curl --location --request DELETE 'http://127.0.0.1:8000/api/peoples/1' \
--header 'Accept: application/json'

## Soporte

zaratedev@gmail.com

