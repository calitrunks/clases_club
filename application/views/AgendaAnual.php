     
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
           
          </header>

       <div class="row">
            <div class="col-lg-12">             
              <br><br>
              <div class="card">                
                <div class="card-header d-flex align-items-center">
                  <h4>Agenda Anual</h4>
                </div>
                <div class="card-body">                                                                                         
                  <div class="table-responsive">
                    <table id="tbl_requisitos" class="table">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Requisito</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      </div> 
      </section>
      <input id="id_encabezado" type="hidden" value="">
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!--MODAL DETALLE REGISTRO-->
    <div class="modal" tabindex="-1" role="dialog" id="Modal_detalle_registro">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">DETALLE DEL REGISTRO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label><strong>Fecha:</strong></label>
                      <span id="fecha_requisito"></span>
                    </div>
                    <div class="form-group">       
                      <label><strong>Requisito:</strong></label>
                      <span id="descripcion_requisito"></span>
                    </div>                    
                  </form>
                  <br>
            <div class="form-group" id="detalle_registro">                      
                <div class="table-responsive">
                    <table id="tbl_aventureros" class="table">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>    
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            
          </div>
        </div>
      </div>
    </div>
    <!--/MODAL DETALLE REGISTRO-->
    <!--MODAL % AVANCE AVENTURERO-->
    <div class="modal" tabindex="-1" role="dialog" id="ModalAvanceAventurero">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">% de Avance Aventurero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table id="tbl_avance_especialidad" class="table table-responsive">
                      <thead>
                        <tr>                          
                          <th>Descripcion</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
            </table>    
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    <!--MODAL % AVANCE AVENTURERO-->
    <!-- Javascript files-->
    <script src="<?=base_url();?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>public/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?=base_url();?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>public/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?=base_url();?>public/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?=base_url();?>public/vendor/chart.js/Chart.min.js"></script>
    <script src="<?=base_url();?>public/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?=base_url();?>public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="<?=base_url();?>public/js/front.js"></script>
  </body>
</html>

<script>
   $(document).ready(function($) {

      //Cargando Requisito
       $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/ListaRequisitos",            
            success: function(obj1){
                  var cadena = '';                
                  $('#tbl_requisitos tbody').empty();
                  $.each(obj1.lista, function (ind, elem) {
                    cadena = cadena + '<tr>';
                    cadena = cadena + '<td><span class="badge badge-warning">'+elem.fecha+'</span></td>';
                    cadena = cadena + '<td>'+elem.descripcion+'</td>';
                    if(elem.es_especialidad==1){
                      cadena = cadena + '<td><button onclick="Modal_detalle_registro(\''+elem.id_encabezado+'\',\''+elem.fecha+'\',\''+elem.descripcion+'\',1,'+elem.id_requisito+')" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button></td>';  
                    }else{
                        cadena = cadena + '<td><button onclick="Modal_detalle_registro(\''+elem.id_encabezado+'\',\''+elem.fecha+'\',\''+elem.descripcion+'\',0,'+elem.id_requisito+')" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button></td>';  
                    }
                    
                    cadena = cadena + '/<tr>';
                  });                     
                  $('#tbl_requisitos').append(cadena);                  
            }
       }); 
        
      
    
  });

   function Modal_detalle_registro(id_encabezado, fecha, descripcion, es_especialidad, id_especialidad) {
      var ParamObjSend={
                 'id_encabezado' :id_encabezado,   
      }         
      $('#fecha_requisito').html(fecha);
      $('#descripcion_requisito').html(descripcion);

      $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/ListaAventurerosRegistro",   
            data: ParamObjSend,         
            success: function(obj2){
                 var cadena='';
                 var btn_drop = ''
                 $('#tbl_aventureros tbody').empty();
                 $.each(obj2.aventureros, function (ind, elem) {
                   cadena = cadena + '<tr>';
                   cadena = cadena + '<td>'+elem.nombre.toUpperCase()+'</td>';     
                   //Segun si esta cumplido o nulo muestra  botones o label
                   if(elem.cumplido==1){                     
                        cadena = cadena + '<td id="id_acciones_requisito_'+elem.id_aventurero+'"><span class="badge badge-success">Cumplido</span></button></td>';
                                             
                   }else{

                    if(es_especialidad==1){
                       btn_drop = '<button onclick="ModalAvanceAventurero('+elem.id_aventurero+', '+id_especialidad+','+id_encabezado+')" type="button" class="btn btn-default" ><i class="fa fa-calendar-check-o" aria-hidden="true"></i> % Avance </button> <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</button><div class="dropdown-menu"><button class="dropdown-item" onclick="MarcaStatusRequisitoAventurero(\'1\',\''+elem.id_aventurero+'\')" >Cumplido</button></div>'; 
                    }else{
                      btn_drop = '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</button><div class="dropdown-menu"><button class="dropdown-item" onclick="MarcaStatusRequisitoAventurero(\'1\',\''+elem.id_aventurero+'\')" >Cumplido</button></div>';
                    }
                                            
                      //Pongo el Boton en el TD
                      cadena = cadena + '<td id="id_acciones_requisito_'+elem.id_aventurero+'">'+btn_drop+'</button></td>';
                               //<button onclick="MarcaStatusRequisitoAventurero(\'1\',\''+elem.id_aventurero+'\')">Cumplido</button>

                   }            
                 cadena = cadena + '/<tr>';    
                 });                                
                 $('#tbl_aventureros').append(cadena);
            }
      }); 

      $('#Modal_detalle_registro').modal('show');       
   }

   function ModalAvanceAventurero(id_aventurero, id_especialidad, id_encabezado){
     var ParamObjSend={
                 'id_especialidad' :id_especialidad,                    
                 'id_aventurero' :id_aventurero,                    
    }

    $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/DetalleRequisitosEspecialidadAventurero",   
            data: ParamObjSend,         
            success: function(obj){
               $('#tbl_avance_especialidad tbody').empty();
               var cadena = '';
               //Requisitos               
               $.each(obj.requisitos, function (ind, elem) { 
                  cadena = cadena + '<tr>';
                  if(elem.fecha_cumplido==null){
                    cadena = cadena + '<td>'+elem.descripcion+'</td>';
                    cadena = cadena + '<td id="tdr_'+elem.id_requisito_especialidad+'"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</button><div class="dropdown-menu"><button class="dropdown-item" onclick="MarcaStatusRequisitoEspecialidadAventurero('+id_aventurero+','+elem.id_requisito_especialidad+','+id_encabezado+')" >Cumplido</button></td>';  
                  }else{
                    cadena = cadena + '<td><span class="badge badge-success">'+elem.descripcion+'</span></td>';
                    cadena = cadena + '<td><span class="badge badge-info">'+elem.fecha_cumplido+'</span></td>';
                  }                  
                  cadena = cadena + '</tr>';
               });   
               $('#tbl_avance_especialidad').append(cadena);               
               $('#ModalAvanceAventurero').modal('show'); 
            }
    });     
  }

  function MarcaStatusRequisitoEspecialidadAventurero(id_aventurero, id_requisito_especialidad, id_encabezado){
     var ParamObjSend={
                 'id_encabezado' :id_encabezado, 
                 'id_aventurero' :id_aventurero,                                     
                 'id_requisito_especialidad' :id_requisito_especialidad,                                     
    }
    $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/MarcaStatusRequisitoEspecialidadAventurero",   
            data: ParamObjSend,         
            success: function(obj){
              if(obj.success==true){
                $('#tdr_'+id_requisito_especialidad).html('<span class="badge badge-success">Cumplido</span>');
              }
            }
    });     
  }
</script>