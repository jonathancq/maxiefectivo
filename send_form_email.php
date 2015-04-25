<?php
  $email_to = "alvimer2708@gmail.com" . ', ';
  $email_to .= "jonathancq@gmail.com";
  $email_subject = "Maxiefectivo - Consultas en línea";

  function died($error) {
    echo "Lo sentimos, pero hay un problema con el envío. <br />";
    echo "Estos errores aparecen a continuación.<br /><br />";
    echo $error."<br /><br />";
    echo "Por favor, volver atrás y corregir estos errores.<br /><br />";
    die();
  }

  // validation expected data exists
  if(!isset($_POST['txtname']) || !isset($_POST['txtdni']) || !isset($_POST['txtphone']) || !isset($_POST['txtdetalles'])) {
    // died('Lo sentimos, pero hay un problema con el envío. Inténtelo más tarde.');
    $data['error'] = false;
    echo json_encode($data);
    return false;
  }

  $email_from = 'noreply@maxiefectivo.com.pe'; // required
  $first_name = $_POST['txtname']; // required
  $dni = $_POST['txtdni']; // required
  $phone = $_POST['txtphone']; // required
  $agencia = $_POST['agencias']; // required
  $prestamo = $_POST['prestamo']; // required
  $detail = $_POST['txtdetalles']; // required

  $error_message = "";

  switch($_POST['agencias']){
    case '0001': //Bellavista
        $email ="agencia001@maxiefectivo.com.pe, andree.padron@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "Mall Aventura Plaza Bellavista";
        break;
    case '0002': // olaya -- Centro de Lima
        $email ="agencia005@maxiefectivo.com.pe, daniel.limaco@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "Psje. Olaya 113 Cercado";
        break;
    case '0003': // SJL
        $email ="agencia009@maxiefectivo.com.pe, aracelli.zambrano@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "Av. Gran Chimú 396 SJL";
        break;
    case '0004': // VMT
        $email ="agencia014@maxiefectivo.com.pe, henry.patino@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "Av. Pachacutec 2257 VMT";
        break;
    case '0005': //Minca
        $email ="agencia010@maxiefectivo.com.pe, susan.villegas@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "Ciudad Comercial Minka";
        break;
    case '0006': //Breña
        $email ="agencia004@maxiefectivo.com.pe, fernando.llanos@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "Av. Venezuela 1265 Breña";
        break;
    case '0007': // Plaza Norte
        $email ="agencia003@maxiefectivo.com.pe, enrique.sarmiento@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "CC Plaza Norte";
        break;
    case '0008': // Real Plaza Pro
        $email ="agencia002@maxiefectivo.com.pe, liceth.espinoza@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "CC Real Plaza Pro";
        break;
    case '0009': //Huacho
        $email ="agencia015@maxiefectivo.com.pe, cesar.pacheres@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "CC Plaza del Sol Huacho";
        break;
    case '0010': // Tujillo
        $email ="agencia007@maxiefectivo.com.pe, jarumy.utrilla@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "CC Real Plaza Trujillo";
        break;
    case '0011': //Mall Trujillo
        $email ="agencia008@maxiefectivo.com.pe, luis.casas@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
        $agencia = "CC Mall Aventura Plaza Trujillo";
        break;
    default:
        $email ="social@maxiefectivo.com.pe";
        $agencia = "";
  }

  switch($_POST['prestamo']){
    case '0001':
        $prestamo = 'Préstamo oro'
        break;
    case '0002':
        $prestamo = 'Préstamo electro'
        break;
    case '0003':
        $prestamo = 'Compra de joyas de oro'
        break;
    case '0004':
        $prestamo = 'Custodia de joyas de oro'
        break;
    case '0005':
        $prestamo = 'Otras consultas'
        break;
    default:
        $prestamo = ''
  }

  // $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  // if(!preg_match($email_exp, $email_from)) {
  //   $error_message .= 'Correo electrónico no válido.<br />';
  // }

  $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp, $first_name)) {
    $error_message .= 'Nombre no válido.<br />';
  }

  if(strlen($detail) < 2) {
    $error_message .= 'Consulta no válida.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

  $email_message = "<h1>Consultas en línea</h1> \n\n";

  function clean_string($string) {
    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
    return str_replace($bad, "", $string);
  }

  $email_message .= "<strong>Nombre:</strong> " . clean_string($first_name) . "\n";
  $email_message .= "<strong>DNI:</strong> " . clean_string($dni) . "\n";
  $email_message .= "<strong>Teléfono:</strong> " . clean_string($phone) . "\n";
  $email_message .= "<strong>Agencia más cercana:</strong> " . clean_string($agencia) . "\n";
  $email_message .= "<strong>Tipo de préstamo:</strong> " . clean_string($prestamo) . "\n";
  // $email_message .= "Correo electrónico: " . clean_string($email_from) . "\n";
  $email_message .= "<strong>Consulta:</strong> " . clean_string($detail) . "\n";

  // create email headers
  $headers = 'From: ' . $email_from . "\r\n" .
  'Reply-To: ' . $email_from . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);  

  $data['error'] = true;
  echo json_encode($data);
?>