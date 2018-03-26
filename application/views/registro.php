     
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
           
          </header>

       <div class="row">
            <div class="col-lg-6">
              <button onclick="NuevoAventurero()" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Aventurero</button>
              <br><br>
              <div class="card">                
                <div class="card-header d-flex align-items-center">
                  <h4>Registro de Clase</h4>
                </div>
                <div class="card-body">                  
                  <form>
                    <div class="form-group">
                      <label><strong>Fecha:</strong></label>
                      <span id="fecha_requisito">---</span>
                    </div>
                    <div class="form-group">       
                      <label><strong>Requisito:</strong></label>
                      <span id="descripcion_requisito"></span>                     
                    </div>        

                  </form>
                  <br>
                  <label><strong>Listado de Aventureros:</strong></label>                                    
                  <div class="table-responsive">
                    <table id="tbl_aventureros" class="table table-responsive">
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
            </div>
      </div> 
      </section>
      <input id="id_encabezado" type="hidden" value="">       
      <input id="id_especialidad" type="hidden" value="">   
      <input id="es_especialidad" type="hidden" value="">   
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
    <!--MODAL AGREGAR AVENTURERO-->
    <div class="modal" tabindex="-1" role="dialog" id="NuevoAventurero">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuevo Aventurero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">                      
                      <input id="Nombre_Aventurero" type="text" placeholder="Ingrese el nombre" class="form-control">
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="GuardaAventurero()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
    <!--/MODAL AGREGAR AVENTURERO-->
    <!--MODAL REQUISITOS ESPECIALIDAD-->
    <div class="modal" tabindex="-1" role="dialog" id="ModalEspecialidad">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Avance de la Especialidad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <!--Requisitos-->
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Requisitos
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" 
                data-parent="#accordion">
                  <div class="card-body">
                     <table id="tbl_requisitos_especialidad" class="table table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Descripcion</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                  </table>    
                  </div>
                </div>
              </div>
              <!--Aventureros-->
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-warning" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fa fa-child" aria-hidden="true"></i> Aventureros
                    </button>
                  </h5>
                </div>

                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" 
                data-parent="#accordion">
                  <div class="card-body">
                     <table id="tbl_aventureros_especialidad" class="table table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                  </table>    
                  </div>
                </div>
              </div>
             
          </div>
          <div class="modal-footer">
            <button type="button" onclick="RegistraRequisitoEspecialidad()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
    <!--/MODAL REQUISITOS ESPECIALIDAD-->
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
            url: "<?= base_url()?>index.php/Welcome/TraeRequiito",            
            success: function(obj1){
                 $('#fecha_requisito').text(obj1.requisito.fecha);                 
                 $('#id_encabezado').val(obj1.requisito.id_encabezado);                 
                 if(obj1.requisito.es_especialidad==1){//Si es especialidad crea tabla dinamica
                    btn = '<button type="button" onclick="ModalEspecialidad('+obj1.requisito.id_requisito+')" class="btn btn-info btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Requisitos</button>';
                    $('#descripcion_requisito').html(obj1.requisito.descripcion+btn);
                    $('#id_especialidad').val(obj1.requisito.id_requisito);        
                    $('#es_especialidad').val(1);                 
                 }else{
                    $('#descripcion_requisito').html(obj1.requisito.descripcion); 
                 }
                 ListaAventurerosRegistro(obj1.requisito.id_encabezado, obj1.requisito.id_requisito);                 
            }
       }); 
        
      
    
  });

  //Aqui las funciones de por ejemplo marcar completado o no
  //Cargando Lista Aventureros de la unidad    
  
  function ListaAventurerosRegistro(id_encabezado, id_especialidad){
      var ParamObjSend={
                 'id_encabezado' :id_encabezado,   
      }
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
                   cadena = cadena + '<td>'+elem.nombre.toUpperCase();+'</td>';     
                   //Segun si esta cumplido o nulo muestra  botones o label
                   if(elem.cumplido==1){                     
                        cadena = cadena + '<td id="id_acciones_requisito_'+elem.id_aventurero+'"><span class="badge badge-success">Cumplido</span></button></td>';
                                             
                   }else{
                      if($('#es_especialidad').val()==1){
                        btn_drop = '<button onclick="ModalAvanceAventurero('+elem.id_aventurero+', '+id_especialidad+')" type="button" class="btn btn-default" ><i class="fa fa-calendar-check-o" aria-hidden="true"></i> % Avance </button> <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</button><div class="dropdown-menu"><button class="dropdown-item" onclick="MarcaStatusRequisitoAventurero(\'1\',\''+elem.id_aventurero+'\')" >Cumplido</button></div>';
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
  }

  function MarcaStatusRequisitoAventurero(flag_cumplido,id_aventurero){

    var ParamObjSend={
                 'cumplido' :flag_cumplido,   
                 'id_aventurero' :id_aventurero, 
                 'id_encabezado' :$('#id_encabezado').val(),   
    }

    $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/MarcaStatus",   
            data: ParamObjSend,         
            success: function(obj){
              if(flag_cumplido==1){
                
                 $('#id_acciones_requisito_'+id_aventurero).html('<span class="badge badge-success">Cumplido</span>');
              } 
              else{
                 $('#id_acciones_requisito_'+id_aventurero).html('<span class="badge badge-danger">Pendiente</span>');
              } 
            }
    }); 
  }

  function NuevoAventurero(){
    $('#NuevoAventurero').modal('show');
  }

  function ModalEspecialidad(id_especialidad){
    $('.collapse').collapse();
    var ParamObjSend={
                 'id_especialidad' :id_especialidad,                    
    }
//id="list-1" name="list-1" class="form-control-custom"
    $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/TraeRequisitosEspecialidad",   
            data: ParamObjSend,         
            success: function(obj){
               $('#tbl_requisitos_especialidad tbody').empty();
               var cadena = '';
               //Requisitos
               $.each(obj.requisitos, function (ind, elem) { 
                 cadena =  cadena + '<tr>';
                 if(elem.hecho==1){
                  cadena =  cadena + '<td><input checked disabled id="chk_especialidad" name="chk_especialidad" data-id="'+elem.id_requisito_especialidad+'" type="checkbox"></td>';
                 cadena =  cadena + '<td><span class="badge badge-success">'+elem.descripcion+'</span> <span class="badge badge-info">'+elem.fecha_hecho+'</span></td>';
                 }else{
                  cadena =  cadena + '<td><input id="chk_especialidad" name="chk_especialidad" data-id="'+elem.id_requisito_especialidad+'" type="checkbox"></td>';
                 cadena =  cadena + '<td>'+elem.descripcion+'</td>';
                 }                 
                 cadena =  cadena + '</tr>';
               });   
               $('#tbl_requisitos_especialidad').append(cadena);
               //Aventureros
               $('#tbl_aventureros_especialidad tbody').empty();
                cadena = ''
                $.each(obj.aventureros, function (ind, elem) { 
                 cadena =  cadena + '<tr>';
                 cadena =  cadena + '<td><input id="chk_aventurero" name="chk_aventurero" data-id="'+elem.id_aventurero+'" type="checkbox"></td>';
                 cadena =  cadena + '<td>'+elem.nombre.toUpperCase()+'</td>';
                 cadena =  cadena + '</tr>';
               });   
               $('#tbl_aventureros_especialidad').append(cadena);
               $('#ModalEspecialidad').modal('show'); 
            }
    });     
    
  }

  function ModalAvanceAventurero(id_aventurero, id_especialidad){
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
                    cadena = cadena + '<td id="tdr_'+elem.id_requisito_especialidad+'"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</button><div class="dropdown-menu"><button class="dropdown-item" onclick="MarcaStatusRequisitoEspecialidadAventurero('+id_aventurero+','+elem.id_requisito_especialidad+')" >Cumplido</button></td>';  
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

  function GuardaAventurero(){
    var ParamObjSend={
                 'nombre' :$('#Nombre_Aventurero').val(),                    
    }

    $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/GuardaAventurero",   
            data: ParamObjSend,         
            success: function(obj){
                ListaAventurerosRegistro($('#id_encabezado').val());
                $('#NuevoAventurero').modal('hide');
            }
    });     
  }

  function MarcaStatusRequisitoEspecialidadAventurero(id_aventurero, id_requisito_especialidad){
     var ParamObjSend={
                 'id_encabezado' :$('#id_encabezado').val(), 
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

  function RegistraRequisitoEspecialidad(){
    var id_requisito_especialidad=0;
    var id_aventurero=0;
    $("#chk_especialidad:checked").each(function() {
        id_requisito_especialidad = $(this).data('id');
        $("#chk_aventurero:checked").each(function() {     
              id_aventurero = $(this).data('id');
              //Para cada especialidad y aventurero escribo registro de avance
              var ParamObjSend={
                           'id_requisito_especialidad' :id_requisito_especialidad,                    
                           'id_aventurero' :id_aventurero,   
                           'id_encabezado' : $('#id_encabezado').val(),                               
              }

              $.ajax({
                      type: "POST",
                      url: "<?= base_url()?>index.php/Welcome/MarcaStatusRequisitoEspecialidad",   
                      data: ParamObjSend,         
                      success: function(obj){
                          if(obj.success==true){
                             $('#ModalEspecialidad').modal('hide'); 
                          }
                      }//fin succes
              });//Fin ajax     

        }); //fin each aventurero 
    });//fin each especialidades
    $('#ModalEspecialidad').modal('hide'); 
  }
</script>