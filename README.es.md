Marbete
========

Manera simple para trabajar con el contenido - copywriting / redacción - de documentos HTML procesados con PHP.    
El contenido se almacena en un arreglo dentro de un archivo - lib/tags.php -.
Para visualizar el contenido utiliza el arreglo con las claves - índices - donde está almacenado.   

Estructura del arreglo
-----------------------

El arreglo "principal" - donde se almacena el contenido - va a contener arreglos.    
   
$arreglo_principal = array();   

Cada arreglo "secundario" representa una sección de un documento o un documento. 

"encabezado" => array(); 

El contenido de este arreglo van a ser pares de clave valor.    
La clave se va a utilizar para identificar el contenido - valor - y así poder visualizarlo.   

"titulo" => "Título"


Integrado:

$arreglo_principal = array(   
  "encabezado" => array(   
      "titulo" => "Titulo"   
  )    
);   



Ejemplo
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
   
Visualización del contenido
----------------------------

&lt;?php require_once "lib/tags.php"; ?&gt;   
&lt;!--   
   
   Marcado HTML / Código en PHP o lo que quieras para que más adelante llames el contenido.
   
--&gt;   
&lt;?php echo $tag['general']['especifico']; ?&gt;   

APP
----

Está carpeta es una aplicación para actualizar el archivo que tiene el arreglo con el contenido para que, una vez que definas el contenido manualmente,  alguien más (o tú) lo pueda editar desde un navegador web.   
   
Dentro de la carpeta app está un archivo index.php. En este archivo se va a visualizar el contenido del archivo lib/tags.php   
   
Al enviar el formulario se vuelve a generar el archivo con el contenido actualizado.


   
Probado en   
----------
  PHP 5.5.27   
  PHP 5.5.9   