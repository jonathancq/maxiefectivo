<?php

header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');

class MY_Controller extends CI_Controller {
	
    function __construct() {
        parent::__construct();				
        $this->data = array();
    }
}
