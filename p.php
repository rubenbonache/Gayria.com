<?

function redim_imagen($original,$nueva,$max_ancho,$max_alto,$corte)   
{  
list($img_anchorig,$img_altorig, $tipo) = getimagesize($original);  
switch ($tipo) {  
 case 1:  
     $img_orig = imagecreatefromgif($original);  
     break;  
 case 2:  
     $img_orig = imagecreatefromjpeg($original);  
     break;  
 case 3:  
     $img_orig = imagecreatefrompng($original);  
     break;  
 case 15:  
     $img_orig = imagecreatefromwbmp($original);  
     break;  
 default:  
     die("Formato de imagen no soportado");  
  }   
 $black = @imagecolorallocate ($img_orig, 0, 0, 0);  
 $white = @imagecolorallocate ($img_orig, 255, 255, 255);  
 $font = 4;  
if ($corte>0)  
{  
  if (($img_anchorig/$img_altorig)>($max_ancho/$max_alto))   
       { $img_alto=$max_alto;   
         $img_ancho=($img_anchorig/$img_altorig)*$max_alto;   
         $escala=$img_alto/$img_altorig;  
         $posx=($img_anchorig-($max_ancho/$escala))/2;   
         $posy=0;}   
  else { $img_ancho=$max_ancho;    
         $img_alto=($img_altorig/$img_anchorig)*$max_ancho;   
         $escala=$img_alto/$img_altorig;  
         $posx=0;   
         $posy=($img_altorig-($max_alto/$escala))/2;}  
  $img_nueva=imagecreatetruecolor($max_ancho,$max_alto);  
  imagecopyresampled($img_nueva,$img_orig,0,0,$posx,$posy,$max_ancho,$max_alto,$max_ancho/$escala,$max_alto/$escala);  
}  
else  
{  
  $img_ancho=($img_anchorig/$img_altorig)*$max_alto;  
  $img_alto=$max_alto;  
  if ($img_ancho>$max_ancho)  
     { $img_ancho=$max_ancho; $img_alto=($img_altorig/$img_anchorig)*$max_ancho; }   
  $img_nueva=imagecreatetruecolor($img_ancho,$img_alto);  
  imagecopyresampled($img_nueva,$img_orig,0,0,0,0,$img_ancho,$img_alto,$img_anchorig,$img_altorig);  
}  
  //unlink($nueva);  
  imagejpeg($img_nueva, $nueva , 90);  
    
  imagedestroy ($img_nueva);  
}  


redim_imagen("http://macbook.local/~ruben/Gayria.com/upload/1345821584_d41d8cd98f00b204e9800998ecf8427e.jpg", "./upload/thumb_1345821584_d41d8cd98f00b204e9800998ecf8427e.jpg".$file_upload, 240, 180, 1);

?>