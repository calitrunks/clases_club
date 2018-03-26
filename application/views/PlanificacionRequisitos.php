     
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
                  <h4>Planificacion Requisitos por Clase</h4>
                </div>
                <div class="card-body"> 
                  <div class="col-lg-3">
                    <select onchange="CargaRequisitos()" class="form-control" name="unidades" id="unidades">
                      
                    </select>
                  </div>                                                                                 <br>       
                  <div class="table-responsive">
                    <table id="tbl_requisitos" class="table">
                      <thead>
                        <tr>
                          <th>Requisito</th>
                          <th>Fecha</th>
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

      //Cargando Unidades
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/CargarUnidades",            
            success: function(obj){
                  var cadena = '';                                  
                  $.each(obj.unidades, function (ind, elem) {
                    cadena = cadena + '<option value="'+elem.id_unidad+'">'+elem.nombre_largo+'</option>'
                  });                     
                  $('#unidades').append(cadena);                  
            }
       }); 

      // //Cargando Requisito
      //  $.ajax({
      //       type: "POST",
      //       url: "<?= base_url()?>index.php/Welcome/ListaRequisitos",            
      //       success: function(obj1){
      //             var cadena = '';                
      //             $('#tbl_requisitos tbody').empty();
      //             $.each(obj1.lista, function (ind, elem) {
      //               cadena = cadena + '<tr>';
      //               cadena = cadena + '<td><span class="badge badge-warning">'+elem.fecha+'</span></td>';
      //               cadena = cadena + '<td>'+elem.descripcion+'</td>';
      //               if(elem.es_especialidad==1){
      //                 cadena = cadena + '<td><button onclick="Modal_detalle_registro(\''+elem.id_encabezado+'\',\''+elem.fecha+'\',\''+elem.descripcion+'\',1,'+elem.id_requisito+')" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button></td>';  
      //               }else{
      //                   cadena = cadena + '<td><button onclick="Modal_detalle_registro(\''+elem.id_encabezado+'\',\''+elem.fecha+'\',\''+elem.descripcion+'\',0,'+elem.id_requisito+')" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button></td>';  
      //               }
                    
      //               cadena = cadena + '/<tr>';
      //             });                     
      //             $('#tbl_requisitos').append(cadena);                  
      //       }
      //  }); 
        
      
    
  });

   function CargaRequisitos(){

     var ParamObjSend={
                 'id_unidad' :$('#unidades').val(),   
     }

      $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/CargaRequisitos",        
            data: ParamObjSend,    
            success: function(obj){
                 var cadena = '';                
                  $('#tbl_requisitos tbody').empty();
                  $.each(obj.requisitos, function (ind, elem) {
                    cadena = cadena + '<tr>';
                    cadena = cadena + '<td>'+elem.descripcion+'</td>';                    
                    cadena = cadena + '<td></td>';                    
                    cadena = cadena + '/<tr>';
                  });                     
                  $('#tbl_requisitos').append(cadena);                                
            }
       }); 
   }

  
</script>