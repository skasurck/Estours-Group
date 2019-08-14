<?php
$response_recaptcha = $_POST['g-recaptcha-response'];
if (isset($response_recaptcha) && $response_recaptcha) {
    $secret = '6LcfmLAUAAAAAADZiDPpw1mwUNOj4P0Ko6VxJZwf';
    $ip = $_SERVER['REMOTE_ADDR'];
    $validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
    var_dump($validation_server);
    //llamando a los campos
    $Nombre = $_POST["nombre"];
    $Email = $_POST["mail"];
    $Telefono = $_POST["telefono"];
    $FechadeSalida = $_POST["FechaSalida"];
    $FechadeRegreso = $_POST["FechaRegreso"];
    $LugardeSalida = $_POST["lugarSalida"];
    $LugardeDestino = $_POST["lugarDestino"];
    $NumeroPasajeros = $_POST["NPasajeros"];
    $VisitarLugares = $_POST["VisitarLugares"];
    $Lugares = $_POST["Lugares"];

//datos para el correo

    $destinatario = "contacto@renta-de-camionetas-estours.com";
    $asunto = "Contacto desde la pagina renta-de-camionetas-estours.com";

    $carta = "Nombre: $Nombre \n ";
    $carta .= "Correo: $Email \n ";
    $carta .= "Telefono: $Telefono \n ";
    $carta .= "Fecha de salida : $FechadeSalida \n";
    $carta .= "Fecha de Regreso: $FechadeRegreso \n";
    $carta .= "Lugar de salida: $LugardeSalida \n";
    $carta .= "Lugar de Destino: $LugardeDestino \n";
    $carta .= "Numero de pasajeros: $NumeroPasajeros \n";
    $carta .= "¿Visita lugares?: $VisitarLugares \n";
    $carta .= "Que lugares: $Lugares \n";

//enviando mensaje
    mail($destinatario, $asunto, $carta);

    
    echo '<script>
alert("Su mensaje se ha enviado con exito");
window.location="http://www.renta-de-camionetas-estours.com";
</script>';
} else {
    header('Location:');
    echo '<script>
alert("Su mensaje no se ha eviado revise que todos los campos esten completos");
window.location="http://www.renta-de-camionetas-estours.com";
</script>';
}

?>