
https://www.wikicine.shop/


# 🎬 WikicineRep

Aplicación web dinámica sobre cine desarrollada como proyecto full-stack con PHP y MySQL.

## 📌 Descripción

WikicineRep es una plataforma web donde los usuarios pueden consultar información sobre películas organizadas por género.  

La página principal muestra las películas en formato visual tipo “pastillas”, que incluyen:

- Póster
- Título
- Director
- Puntuación media

Cada película dispone además de una página individual generada dinámicamente con información ampliada:

- Sinopsis
- Director
- Actores
- Guionistas
- Géneros
- Puntuación media

---

## 👤 Sistema de usuarios

La aplicación cuenta con dos tipos de sesión:

### 🔹 Usuario no registrado
- Puede navegar y consultar las películas.

### 🔹 Usuario registrado
- Puede puntuar películas.
- Puede añadir nuevas películas mediante formulario.
- Las películas añadidas se integran automáticamente:
  - En la página principal (según su género).
  - Con su propia página dinámica individual.

El sistema gestiona sesiones mediante autenticación en PHP.

---

## 🛠 Tecnologías utilizadas

- **HTML5**
- **CSS3**
- **JavaScript**
- **PHP**
- **MySQL (SQL)**
- **Bootstrap**
- **SweetAlert2**

---

## 🧠 Funcionalidades técnicas destacadas

- Generación dinámica de contenido desde base de datos.
- Sistema de autenticación con gestión de sesiones.
- Relación entre usuarios y puntuaciones.
- CRUD de películas (creación e inserción en base de datos).
- Organización por géneros cinematográficos.
- Uso de componentes visuales con Bootstrap.
- Interacciones mejoradas con SweetAlert2.

---

## 🚀 Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/luisdawgit/wikicineRep.git
