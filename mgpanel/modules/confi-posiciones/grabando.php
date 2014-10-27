<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

// SQL PARA REGISTRO DE DATOS

$insertSQL = sprintf("INSERT INTO sis_plantilla_posiciones(id_pos, cod_pos, des_pos, status) VALUES ( %s, %s, %s, %s)", 
							  GetSQLValueString($_POST['id_pos'], "int"),
						  	  GetSQLValueString($_POST['cod_pos'], "text"),
						  	  GetSQLValueString($_POST['des_pos'], "text"),
							  GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

