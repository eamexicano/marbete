Marbete
========

Simple way to work with the content - copywriting - of HTML documents processed with PHP.
The content is kept in an array inside a file - lib/tags.php -.
To show the content use the array with the keys - indexes - where it is kept. 

Array Structure
---------------

The "main" array - where the content is kept - will hold arrays.
   
$arreglo_principal = array();   
   
Each "secondary" array represents a document section or a new document.   

"encabezado" => array(); 

The content of this array will be key / value pairs.   
The key will be used to find the content - value - and be able to display it.   

"titulo" => "Título"


Integration:

$arreglo_principal = array(   
  "encabezado" => array(   
      "titulo" => "Titulo"   
  )    
);   



Example
-------   

&lt;?php   
   
$tag = array(   
   
	"document" => array(   
		"title" => "Marbete <=> Tag",   
		"header" => "<h1>Marbete <=> Tag</h1>",   
		"footer" => "<p><a href='//www.eamexicano.com' target='_blank'>eamexicano</a></p>"   
	),   
	"page" => array(   
		"copy" => "<p>Las etiquetas de la interfaz gráfica y de algunos mensajes de la aplicación están almacenadas en el archivo: <em>lib/tags.php</em><br>Puedes editar el archivo directamente o puedes modificar el contenido de las traducciones desde este documento.<br>Puedes utilizar etiquetas HTML para dar formato al contenido.<br>Si utilizas atributos para las etiquetas utiliza comillas simples - apóstrofes - para que se interprete correctamente.<br>Una vez enviado el formulario vuelve a recargar la página para que se visualice el contenido actualizado.<br></p>",   
		"actualizar_etiqueta" => "Actualizar Etiquetas"   
	),
  
  "general" => array(   
    "especifico" => "Contenido específico", 
    "title" => "Otra clave title pero como está dentro de otro arreglo no existe conflicto."
  )   
     
)   
?&gt;   
   
Displaying content
----------------------------

&lt;?php require_once "lib/tags.php"; ?&gt;   
&lt;!--   
   
   HTML Markup / PHP Code or anything you want, you can call the content later.
   
--&gt;   
&lt;?php echo $tag['general']['especifico']; ?&gt;   
   
   
   
Tested in   
----------
  PHP 5.5.27   
  PHP 5.5.9   