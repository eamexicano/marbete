  <?php
  
      /*
        Si se quiere trabajar con caracteres Unicode
      */
        mb_internal_encoding('UTF-8');
        mb_http_output('UTF-8');
        mb_http_input('UTF-8');
        mb_language('uni');
        mb_regex_encoding('UTF-8');
        ob_start('mb_output_handler');
        /*
          Si se quiere trabajar con caracteres Unicode
        */
  
  
    if (isset($_POST['actualizar'])) {
      
        unset($_POST['actualizar']);

        $data = $_POST;
      
        $content = "<?php\n\n";
        $content .= "\$tag = array(\n\n";

        foreach ($data as $key => $value) {
          $content .= "\t\"$key\" => array(\n";
          foreach ($value as $k => $v) {        
            $content .=  "\t\t\"$k\" => \"$v\",\n";
          }
          $fix = rtrim($content, ",\n");
          $content = $fix . "\n";
          $content .= "\t),\n\n";
        }

        $fix = rtrim($content, ",\n\n");
        $content = $fix . "\n\n";
        $content .= ")";
        $content .= "\n?>";
  
        $archivo = fopen("lib/tags.php", 'w') or die('No se pudo crear el archivo lib/tags.php');
        fwrite($archivo, $content);
        fclose($archivo);
        
        
    } 

    require_once 'lib/tags.php';

?>
<!DOCTYPE html>
<html lang='es-MX'>
	<head>
    <meta charset='utf-8'>
    <meta name=viewport content="width=device-width, initial-scale=1">    
    <title><?php echo $tag['document']['title']; ?></title>
    <style>
        html {
          width: 100%;
          height: 100%;
          background: white;
          font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
          line-height: 1.44;
          color: #151515;
        }
    
        body {
          margin: 0 auto;
          width: 640px;        
          padding: 16px;
        }
    
        label {
          display: block;
          margin: 8px 0;
          font-weight: bold;
        }
    
        textarea {
          display: block;
          width: 100%;
          border-radius: 2px;
          border: 1px solid #c0c0c0;
          font-size: 16px;
          padding: 8px 0;
        }
    
        .existente {
          display: block;
          margin: 8px 0;
          color: #454545;      
        }
    
        footer {
          text-align: right;
        }
    
        input[type='submit'] {
          display: block;
          margin: 32px auto;
          padding: 8px 16px;
          font-size: 16px;
          border-radius: 2px;
          background: #f2f2f2;
          border: 1px solid #c0c0c0;
        }
    </style>
	</head>
	<body>
		<header class='header'>      
      <?php echo $tag['document']['header']; ?>
		</header>

		<main class='content'>
      <div class='container'>            
        <?php echo $tag['page']['copy']; ?>

<hr>

<form action='index.php' method='post' onsubmit='return validar();' >
  <?php
    
  foreach ($tag as $key => $value) {
    echo "<h2>" . $key . "</h2>";
    foreach ($value as $k => $v) {
      echo "<label>" . $k . "</label>" ;
      echo "<div class='existente'>" . htmlentities(stripslashes($v)) . "</div>";
      echo "<textarea name='" . $key . "[" . $k . "]'>" . htmlentities(stripslashes($v)) . "</textarea>";
    }
  }
    
  ?>
	<input type='submit' value='<?php echo $tag["page"]["actualizar_etiqueta"]; ?>' name='actualizar' />
</form>

<script>
    function validar() {
      return confirm("<?php echo $tag['javascript']['confirm']; ?>");
    }
  
</script>
	 
      </div>
      </main>

			<footer class='footer'>
				<p>
          <br>
          <?php echo $tag['document']['footer']; ?>
          <br>
				</p>
			</footer>
	</body>
</html>

