<div align="center">
  <h1>🛠️Tecnologías Utilizadas🛠️</h1>
  <img src="https://github.com/user-attachments/assets/d090135d-f698-4042-9f46-2027fb66fa7f" alt="composer" width="350" />
  <img src="https://github.com/user-attachments/assets/f5c84a27-a20b-4f57-a058-d78ad7ec668d" alt="PHPLOGO" width="350" />
  <img src="https://github.com/user-attachments/assets/3a8a52a1-9463-4719-8bef-cd202baf9fd4"  alt="apache" width="350" />
  <img src="https://github.com/user-attachments/assets/570aab5d-b9dd-4855-a815-6387239a4845" alt="apache" width="350" />


****************************************************************************************************************************
  <h2>Instrucciones para el funcionamiento del programa</h2>

</div>

🤖Recursos necesarios🤖

- Composer 8.0 o superior
- PHP en el equipo
- Xamp corriendo con Apache y MySQL
- Base de datos creada y conectada

   [Descargar archivo SQL](tienda.sql)


***************************************************************************************************************************
  
✅Pasos✅

 1- Una vez descargada la carpeta completa del proyecto, abrirla con nuestro editor de código **Visual Studio Code**
 2- Abrir una terminal en VS Code con las teclas "Shift + ñ" 
 3- Ingresar los comandos:
   *  composer -v
   *  php -v}
     
(Para verificar los recursos en el equipo)

   * composer install

(Para instalarle archivos si en dado caso se corrompen durante la descarga)

4- Por ultimo para correr el proyecto, con el siguiente comando:

  * php -S localhost:8080 -t public

🌟Y ya tendriamos listo en la ruta **localhost:8080** corriendo nuestro proyecto🌟

*****************************************************************************************************************************

<h2>Nota</h2>

Si nuestra página aparece sin los datos correspondientes revisar en los componentes, el archivo **.env** ya que este es el encargado de tener conectada con los respectivos puertos el proyecto

<h3>Ejemplo</h3>

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=tienda

DB_USERNAME=root

DB_PASSWORD=

**Cambiar los puertos según establecidos por su PhpMyAdmin**



