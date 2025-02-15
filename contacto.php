<?php
/**
 * Simple formulario de contacto con PHP
 *
 * @author parzibyte
 * @see https://parzibyte.me/blog
 */

if (empty($_POST["name"])) {
    exit("Falta el nombre");
}

if (empty($_POST["email"])) {
    exit("Falta el correo");
}

if (empty($_POST["subject"])) {
    exit("Falta el número");
}

if (empty($_POST["message"])) {
    exit("Falta el mensaje");
}

$nombre = $_POST["name"];
$correo = $_POST["email"];
$numero = $_POST["subject"];
$mensaje = $_POST["subject"];

$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
if (!$correo) {
    echo "Correo inválido. Intenta con otro correo.";
    exit;
}

$asunto = "Nuevo mensaje de sitio web";

$datos = "De: $nombre\nCorreo: $correo\Contacto: $numero\nMensaje: $mensaje";
$mensaje = "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\n$datos";
$destinatario = "franzjensen03@gmail.com"; # aquí la persona que recibirá los mensajes
$encabezados = "Sender: 7190223872@untrm.edu.pe\r\n"; # El remitente, debe ser un correo de tu dominio de servidor
$encabezados .= "From: $nombre <" . $correo . ">\r\n";
$encabezados .= "Reply-To: $nombre <$correo>\r\n";
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados);
if ($resultado) {
    echo "<h1>Mensaje enviado, ¡Gracias por contactarme!</h1>";
    echo "<p>Tu mensaje se ha enviado correctamente.</p><h2>Importante</h2><p>Revisa tu bandeja de SPAM, en ocasiones mis respuestas quedan ahí. </p>";
} else {
    echo "Tu mensaje no se ha enviado. Intenta de nuevo.";
}