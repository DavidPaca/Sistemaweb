<?php
require_once('fpdf/fpdf.php');

//echo 'HOLA';

class PDF extends FPDF{
    function Header(){
      $this -> Image('images/logo_municipio.png', 10 , 5 , 30); 
      $this -> Ln(5);
      $this -> SetFont('Arial', 'B', 15 ); 
      $this -> Cell(30);  
      $this -> Cell(120, 10, utf8_decode('LISTA DE NIÑOS INSCRITOS'), 0, 0, 'C');  
      $this -> Ln(10);  
    }

    function Footer(){
      $this -> SetY(-15);  
      $this -> SetFont('Arial', 'I', 8);
      $this -> SetX(95);  // -35 pie de pagina lado derecho
      $this -> AliasNbPages();
      $this -> Write(5, utf8_decode('Página'). $this->PageNo().'/{nb}');  
    }
}




?>