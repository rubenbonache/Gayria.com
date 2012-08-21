 <div id="contentForm"> <!-- The contact form starts from here-->
            <?php
                 $error    = ''; // error message
                 $name     = ''; // sender's name
                 $email    = ''; // sender's email address
                 $subject  = ''; // subject
                 $message  = ''; // the message itself
               	 

            if(isset($_POST['send']))
            {
                 $name     = $_POST['name'];
                 $email    = $_POST['email'];
                 $subject  = $_POST['subject'];
                 $message  = $_POST['message'];
               	 

                if(trim($name) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su nombre!</div>';
                }
            	    else if(trim($email) == '')
                {
                    $error = '<div class="errormsg">Por favor indique su direccion Email!</div>';
                }
                else if(!isEmail($email))
                {
                    $error = '<div class="errormsg">Su Email no es valido, por favor intente de nuevo!!</div>';
                }
            	    if(trim($subject) == '')
                {
                    $error = '<div class="errormsg">Indique el asunto del mensaje!</div>';
                }
            	else if(trim($message) == '')
                {
                    $error = '<div class="errormsg">Escriba su mensaje!</div>';
                }
	          	
                if($error == '')
                {
                    if(get_magic_quotes_gpc())
                    {
                        $message = stripslashes($message);
                    }

                    $to      = "truchicono@gmail.com";

                    $subject = '[Contacto desde Gayria.com] : ' . $subject;

                    $msg     = "De : $name \r\nEmail : $email \r\nAsunto : $subject \r\n\n" . "Mensaje : \r\n$message";
                    
                    $this->email->from($email, $name);
                    $this->email->to($to); 
                    $this->email->subject($subject);
                    $this->email->message($msg);  

                    $this->email->send();
            ?>

                  <!-- Message sent! (change the text below as you wish)-->
                  <div style="text-align:center;">
                    <h1>Enviado</h1>
                       <p>Gracias <b><?=$name;?></b>, le responderemos lo antes posible!</p>
                  </div>
                  <p><!--End Message Sent-->
                    
                    
                    <?php
                }
            }

            if(!isset($_POST['send']) || $error != '')
            {
            ?>
                  </p>
                  <p>Si necesita ayuda por problemas relacionados con la web, revise la siguiente página que muestra soluciones para los problemas más comunes (registro, recuperación de clave, desconexión, problemas de cookies, etc):</p>
                  <p>- <a href="faq.php">FAQ</a><br />
                    <br />
                    Información sobre normas de uso del servicio / bloqueo de cuentas:<br />
                    <br />
                    - <a href="normas.php">Normas de uso</a><br />
                    - <a href="legal">Información Legal</a><br />
                    - <a href="publocidad.php">Precios publicitarios</a><br />
                    <br />
                    <br />
                  Si desea contactar por otros motivos, puede utilizar el siguiente formulario. </p>
            <h1>
              <?=$error;?>
</h1>
            <form  method="post" name="contFrm" id="contFrm" action="">


    <label><span class="required">*</span> Nombre:</label>
            			<input name="name" type="text" class="field2" id="name" size="50" value="<?=$name;?>" />

            			<label><span class="required">*</span> Email: </label>
            			<input name="email" type="text" class="field2" id="email" size="50" value="<?=$email;?>" />

            			<label><span class="required">*</span> Asunto: </label>
            			<input name="subject" type="text" class="field2" id="subject" size="50" value="<?=$subject;?>" />

                 		<label><span class="required">*</span> Mensaje: </label>
                 		<textarea name="message" cols="50" rows="6"  id="message" class="field2"><?=$message;?></textarea>

            			<br /><br />

            			<!-- Submit Button-->
                 		<input name="send" type="submit" class="button-1" id="send" value="Enviar" />

            </form>

            <!-- E-mail verification. Do not edit -->
            <?php
            }

            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                        ,$email));
            }
            ?>
            <!-- END CONTACT FORM -->
          </div>