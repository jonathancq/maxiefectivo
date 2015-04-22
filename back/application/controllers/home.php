<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index(){
      $this->tmp_master->render("home");
    }

    public function we(){
      $this->tmp_master->render("we");
    }

    public function services(){
      $this->tmp_master->render("services");
    }
    public function agencies(){
      $this->tmp_master->render("agencies");
    }
    public function news(){
        $this->tmp_master->render("news");
    }
    public function validate(){
     if ($this->input->is_ajax_request()) {
        $this->form_validation->set_rules('name', 'Nombres', 'required|trim');
        $this->form_validation->set_rules('dni', 'DNI', 'required|trim');
        $this->form_validation->set_rules('phone', 'Telefono', 'required|trim');
        $this->form_validation->set_rules('agencias', 'Agencias', 'required|trim');
        $this->form_validation->set_rules('prestamo', 'Prestamos', 'required|trim');
        $this->form_validation->set_rules('detalles', 'Detalles', 'required|trim');
        $this->form_validation->set_message('required','Campo requerido %s');


        if ($this->form_validation->run($this)== false){

            $cadena  = explode("</p>", validation_errors());
            $cadena2 = implode("<p>", $cadena);
            $cadena3 = explode("<p>", $cadena2);
            array_pop($cadena3);
            array_shift($cadena3);
            $data['message'] = $cadena3[0];
            $data['print'] = false;
        }else{
            switch($this->input->post('agencias')){
                case '0001': //Bellavista
                    $email ="agencia001@maxiefectivo.com.pe, andree.padron@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0002': // olaya -- Centro de Lima
                    $email ="agencia005@maxiefectivo.com.pe, daniel.limaco@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0003': // SJL
                    $email ="agencia009@maxiefectivo.com.pe, aracelli.zambrano@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0004': // VMT
                    $email ="agencia014@maxiefectivo.com.pe, henry.patino@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0005': //Minca
                    $email ="agencia010@maxiefectivo.com.pe, susan.villegas@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0006': //Breña
                    $email ="agencia004@maxiefectivo.com.pe, fernando.llanos@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0007': // Plaza Norte
                    $email ="agencia003@maxiefectivo.com.pe, enrique.sarmiento@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0008': // Real Plaza Pro
                    $email ="agencia002@maxiefectivo.com.pe, liceth.espinoza@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0009': //Huacho
                    $email ="agencia015@maxiefectivo.com.pe, cesar.pacheres@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0010': // Tujillo
                    $email ="agencia007@maxiefectivo.com.pe, jarumy.utrilla@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
                case '0011': //Mall Trujillo
                    $email ="agencia008@maxiefectivo.com.pe, luis.casas@maxiefectivo.com.pe, social@maxiefectivo.com.pe";
                    break;
            }

            $content_html = "<h1>Consultas en línea</h1>";
            $content_html .= "<strong>Nombre:</strong> &nbsp;".$this->input->post('name')."<br><br>";
            $content_html .= "<strong>DNI:</strong> &nbsp;".$this->input->post('dni')."<br><br>";
            $content_html .= "<strong>Teléfono:</strong> &nbsp;".$this->input->post('phone')."<br><br>";
            $content_html .= "<strong>Agencia más cercana:</strong> &nbsp;".$this->input->post('agencias')."<br><br>";
            $content_html .= "<strong>Tipo de préstamo:</strong> &nbsp;".$this->input->post('prestamo')."<br><br>";
            $content_html .= "<strong>Consulta:</strong> &nbsp;".$this->input->post('detalles')."<br><br>";
            enviarMail('noreply@maxiefectivo.com.pe', $email, $bcc='', '[Maxiefectivo] Consultas en línea', $content_html, 'Maxiefectivo');
            // enviarMail('noreply@maxiefectivo.com.pe', 'alvimer2708@gmail.com', $bcc='', '[Maxiefectivo] Consultas en línea', $content_html, 'Maxiefectivo');

            $data['message'] = "Gracias por escribirnos";
            $data['print'] = true;
        }
        echo json_encode($data);
       exit();
     }
    }

}
