<?php
//cadena de conexion
$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    //code...
    //instancia creada que recibe parametros , y el array me cambia los valores de codificacion por defecto --elimina caracteres extraños
    $pdo = new PDO($servidor,USUARIO, PASSWORD,
        //DENTRO DE ESTE ARRAY HACE 
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //Nos muestra si se conecto o no a la base de datos
    echo "<script>alert ('Conectado...)</script>";
} catch (PDOExeption $e) {
    //throw $th;
    //si hay un error de conexion pues imprime medinte una ventana emergente 
    echo "<script>alert ('Error...)</script>";
}

?>