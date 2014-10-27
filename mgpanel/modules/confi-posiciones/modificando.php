<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

$updateSQL = sprintf("UPDATE sis_plantilla_posiciones SET cod_pos=%s, des_pos=%s WHERE id_pos=%s",  
							 
					GetSQLValueString($_POST['cod_pos'], "text"),
					GetSQLValueString($_POST['des_pos'], "text"),
                    GetSQLValueString($_POST['id_pos'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());

$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
