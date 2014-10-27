<?php

mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT * FROM sis_plantilla_posiciones";
$modulo = mysql_query($query_modulo, $sistemai) or die(mysql_error());
$row_modulo = mysql_fetch_assoc($modulo);
$totalRows_modulo = mysql_num_rows($modulo);

?>
<?php /* FUNCION PREGUNTAR ANTES */ ?>         
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
        <script type="text/javascript">
          
          $(document).ready(function() {
            
            
            $('.ask-plain').click(function(e) {
              
              e.preventDefault();
              thisHref  = $(this).attr('href');
              
              if(confirm('Are you sure')) {
                window.location = thisHref;
              }
              
            });
            
            $('.ask-custom').jConfirmAction({question : "Quieres Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
            $('.ask').jConfirmAction();
          });
          
        </script>
 <?php /* FUNCION PREGUNTAR ANTES */ ?> 

<?php if ($totalRows_modulo>0){ ?>     

<div class="box">
   <div class="box-header">
    <h3 class="box-title">GESTOR DE POSICIONES</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nueva-posicion" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nueva Posición</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
  <table id="example1" class="table table-bordered table-striped">


    <thead>
    <tr >
    <th><b>Id</b></th>
    <th><b>Cod Posición</b></th>
    <th><b>Descripción</b></th>
    <th><b>Status</b></th>
    <th><b>Opciones</b></th>
    </tr>
    </thead>

<?php do { ?>
          <tr class="odd">
          <td  height="26" align="center" ><?php echo $row_modulo['id_pos']; ?></td>
          <td align="center" ><?php echo $row_modulo['cod_pos']; ?></td>  
          <td align="center" ><?php echo $row_modulo['des_pos']; ?></td>
              <td  align="center" >
                <?php //CAMBIAR EL STATUS ?>
              <form action="#"  id="cstatus" method="GET" enctype="multipart/form-data" >
          <?php if ($row_modulo['status']==0){ ?><a href="javascript:cargar('#divtest', 'modules/confi-posiciones/cambiando-status.php?status=<?php echo $row_modulo['status'];?>&id=<?php echo $row_modulo['id_pos'];?>')"><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span></a><?php }  ?>
          <?php if ($row_modulo['status']==1){ ?><a href="javascript:cargar('#divtest', 'modules/confi-posiciones/cambiando-status.php?status=<?php echo $row_modulo['status'];?>&id=<?php echo $row_modulo['id_pos'];?>')"><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span></a><?php }  ?>
          <input type="hidden" name="status" id="status" value="<?php echo $row_modulo['status'];?>">
          <input type="hidden" name="id" id="id" value="<?php echo $row_modulo['id_pos'];?>">
                       
              </form>
         <?php //FIN DE CAMBIAR EL STATUS ?>

            
              </td>
                <td  align="center" ><a href="index.php?mod=modificar-posicion&id=<?php echo $row_modulo['id_pos'];?>"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/confi-posiciones/eliminar.php?id=<?php echo $row_modulo['id_pos'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td>
        
        
              </tr>
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
            </table>
            
           </div><!-- /.box-body -->
         </div><!-- /.box -->
            <?php } ?>
            <?php if (($totalRows_modulo==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nueva-posicion" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Agregar Posición</span></a></small>                                   
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
        <p style="font-size:19px;">"No Hay Posiciones Registradas!"</p>            
            </center>
            <?php } ?>
            <br />
            <br />
        <br />
           <br />
            <br />
        <br />
           <br />
            <br />
        <br />
</center> 
<!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        
                 <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    
                });

            });
        </script>