# Librería - Backend

Este es el backend del proyecto "Librería", una API RESTful desarrollada en PHP con MySQL, que permite gestionar libros (CRUD).

# Tecnologías

- PHP
- MySQL
- Docker
- Docker Compose

## Instalación local con Docker Compose

1. Clona este repositorio:

   git clone https://github.com/JaiderRomo/api-libreria.git
   cd libreria-backend

## Levanta los servicios:

docker-compose up --build

El backend estará disponible en: http://localhost:8000/api.php
La base de datos estará corriendo en el contenedor mysql, con los siguientes datos:

Usuario: root

Contraseña: root

Base de datos: biblioteca