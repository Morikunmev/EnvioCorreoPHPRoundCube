Se descargo primero un archivo aparte que te proporciona la clase de PHPMailer para poder configurar el sistema de correo:


Explicación del código por partes:
https://github.com/PHPMailer/PHPMailer
-----
Importaciones de librerias:
use PHPMailer\PHPMailer\PHPMailer;     // Clase principal para enviar emails
use PHPMailer\PHPMailer\Exception;      // Manejo de excepciones de PHPMailer
use PHPMailer\PHPMailer\SMTP;           // Clase para configuración SMTP
use Dotenv\Dotenv;                      // Para manejar variables de entorno

require 'vendor/autoload.php';           // Autocargador de Composer
require 'PHPMailer/src/Exception.php';   // Archivo de excepciones
require 'PHPMailer/src/PHPMailer.php';   // Archivo principal de PHPMailer
require 'PHPMailer/src/SMTP.php';        // Archivo de configuración SMTP

----
Explicacion del codigo paso a paso:

$mail = new PHPMailer(true); // Aca se crea el objeto y El true activa el manejo de excepciones

CONFIGURACION DEL SERVIDOR:
$mail->isSMTP(); //Usa protocolo SMTP
$mail->Host = $_ENV['SMTP_HOST']; // ese es el servidor de correo
$mail->SMTPAuth = true; //Activa la utenticacion
$mail->Username= $_ENV['SMTP_USERNAME']; // ese es el correo
$mail->Password = $_ENV['SMTP_PASSWORD'];
$mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS; //usa conexion segura
$mail->Port = $_ENV['SMTP_PORT'];//ese es el puerto SSL

CONFIGURACION DEL CORREO:
$mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']); //es la persona que envia, en el segundo parametro se le puede poner cualquier valor
$mail->addAddress('ricky201325@gmail.com'); //Es la persona a quien se le envia el correo

CONTENIDO DEL CORREO:
$mail->CharSet='UTF-8'; //esto permite caracteres especiales
$mail->isHTML(true) //Permite HTML en el correo
$mail->Subject = 'Prueba de envio desde PHP' //Es el Asunto
$mail->Body='<h1>Hola!</h1> //contenido HTML
$mail->AltBody = 'Hola!...'//este es el texto plano

$mail->send(); //intentar enviar el correo
echo 'El mensaje ha sido enviado correctamente'
----

PARA EJECUTAR EL PROGRAMA SE TIENE QUE DAR EN: PHP Server: Reload server 
