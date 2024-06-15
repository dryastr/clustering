<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once FCPATH . 'vendor/tecnickcom/tcpdf/tcpdf.php';

class MY_Tcpdf extends TCPDF
{
    public function __construct()
    {
        parent::__construct();
    }
}
