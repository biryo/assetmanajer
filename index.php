<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once("plugin/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

include "controller/controller.php";
$ctrl = new controller();
$ctrl->module($dompdf);