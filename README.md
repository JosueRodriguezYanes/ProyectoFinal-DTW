<div align="center">
  <h1>🚀 ProyectoFinal-DTW135</h1>
</div>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

## 📋 Tabla de Contenidos
- [Configuración Inicial](#-configuración-inicial)
- [Requisitos Previos](#-requisitos-previos)
- [Instalación](#-instalación)
- [Apartados](#-Apartados)
- [Integrantes](#-Integrantes)

## 🛠 Configuración Inicial

Para ejecutar este proyecto localmente, sigue estos pasos cuidadosamente.

### ⚡ Requisitos Previos

- PHP >= 8.0
- Composer
- MySQL
- Una base de datos MySQL creada para el proyecto

### 📥 Instalación

1. **Clonar el repositorio**
   ```bash
   git clone [url-del-repositorio]
   cd ProyectoFinal-DTW
   ```

2. **Configurar el archivo .env**
   - Localiza el archivo `.env` en la raíz del proyecto
   - Busca la siguiente línea:
     ```env
     DB_PASSWORD=
     ```
   - Reemplaza el valor con tu contraseña de MySQL:
     ```env
     DB_PASSWORD=tu_contraseña
     ```

   > ⚠️ **Importante**: Asegúrate de que la base de datos esté creada y coincida con las especificaciones del proyecto.

3. **Instalar dependencias**
   ```bash
   composer install
   ```

4. **Generar clave de aplicación**
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

   ```bash
   php artisan migrate:fresh --seed
   ```

## 🔴 Apartados

### Apartado Login

En este apartado se deben de ingresar las credenciales necesarias para poder acceder a la página.

Credenciales:

Usuario: admin
Contraseña: 1234

### Apartado "Rol y Permisos"

En este apartado se pueden agregar usuarios, junto a los roles y permisos que cada uno de ellos pueden tener.

### Apartado "Usuario"

En este apartado se pueden agregar nuevos usuarios, visualizar y editar sus datos.

### Apartado "Mascotas"

En este apartado podemos agregar las mascotas que visiten la veterinaria, entre los datos que se piden están: Nombre de la mascota, especie, raza, edad, nombre del dueño y si está vacunado o no. De igual manera cuando se agrega la mascota se pueden realizar las siguientes acciones: ver los datos completos de la mascota, editar los datos de la mascota y eliminar los datos de la mascota.

### Apartado "Api Map"

En este apartado se puede ver la ubicación de la veterinaria en un mapa interactivo el cual se puede arrastrar, hacer zoom y deshacer zoom.

## 👥 Integrantes

| Nombre | Carnet |
|--------|---------|
| Alejandra Michelle Mejía Rivas | MR22035 |
| Josué Daniel Rodriguez Yanes | RY22001 |
| Ivan Eduardo Lopez Tobar | LT22009 |
| Christopher Alexis Velasquez Aguilar | VA22020 |
| Kelvin Antonio Velásquez Vásquez | VV22015 |
