# Configuración de PHPMailer para Envío de Correos

## Instalación
Primero, descarga la clase PHPMailer desde el repositorio oficial:
[PHPMailer en GitHub](https://github.com/PHPMailer/PHPMailer)

## Explicación paso a paso

### 1. Importación de librerías
```php
// Clases principales
use PHPMailer\PHPMailer\PHPMailer;     // Clase principal para enviar emails
use PHPMailer\PHPMailer\Exception;      // Manejo de excepciones de PHPMailer
use PHPMailer\PHPMailer\SMTP;           // Clase para configuración SMTP
use Dotenv\Dotenv;                      // Para manejar variables de entorno

// Archivos requeridos
require 'vendor/autoload.php';           // Autocargador de Composer
require 'PHPMailer/src/Exception.php';   // Archivo de excepciones
require 'PHPMailer/src/PHPMailer.php';   // Archivo principal de PHPMailer
require 'PHPMailer/src/SMTP.php';        // Archivo de configuración SMTP

2. Crear objeto PHPMailer con manejo de excepciones
$mail = new PHPMailer(true);

3. Configuración del Servidor SMTP
$mail->isSMTP();                            // Usar protocolo SMTP
$mail->Host = $_ENV['SMTP_HOST'];           // Servidor de correo
$mail->SMTPAuth = true;                     // Activar autenticación
$mail->Username = $_ENV['SMTP_USERNAME'];    // Correo emisor
$mail->Password = $_ENV['SMTP_PASSWORD'];    // Contraseña
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Conexión segura
$mail->Port = $_ENV['SMTP_PORT'];           // Puerto SSL

4. configuracion del correo
// Configurar remitente
$mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);

// Configurar destinatario
$mail->addAddress('ricky201325@gmail.com');

5. contenido del correo
$mail->CharSet = 'UTF-8';                   // Permitir caracteres especiales
$mail->isHTML(true);                        // Habilitar HTML en el correo
$mail->Subject = 'Prueba de envío desde PHP'; // Asunto
$mail->Body = '<h1>Hola!</h1>';            // Contenido HTML
$mail->AltBody = 'Hola!...';               // Texto plano alternativo

6. Envio del correo
$mail->send();                              // Enviar el correo
echo 'El mensaje ha sido enviado correctamente';

PARA PODER EJECUTAR EL PROGRAMA SE TIENE QUE DAR A: PHP Server: Reload server
