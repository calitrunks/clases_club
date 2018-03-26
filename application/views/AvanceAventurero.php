     
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
           
          </header>
       <div class="row">
            <div class="col-lg-12">             
              <span class="badge badge-danger"> Menos de 50% de Avance</span>
              <span class="badge badge-warning"> Mas de 50% y menos de 85% de Avance</span>
              <span class="badge badge-primary"> 85% de Avance o Mas</span>
              <br><br>
              <div class="card">                
                <div class="card-header d-flex align-items-center">
                  <h4>Avance de Clase Progresiva por Aventurero</h4>
                </div>
                <div class="card-body">                                                                                         
                  <div class="table-responsive">
                    <table id="tbl_avance" class="table">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Req.Cumplidos</th>                                                    
                          <th>% de Avance</th>                          
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
    <div class="modal" tabindex="-1" role="dialog" id="modal_detalle">
      <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">DETALLE DE REQUISITOS DE - <span style="color: #140FD9;" id="nom_aventurero"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">                  
            <div class="form-group" id="detalle_registro">                                  
                <div class="table-responsive">
                    <table id="tbl_requisitos" class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Requisito</th>
                          <th>Estado</th>
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
       $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/GetDetalleCumplimiento",            
            success: function(obj1){
                  var cadena = '';                
                  var pendientes = 0;        
                  var porc = 0;          
                  var etiqueta = '';
                  
                  $('#tbl_avance tbody').empty();
                  $.each(obj1.lista, function (ind, elem) {
                    cadena = cadena + '<tr>';
                    cadena = cadena + '<td>'+elem.nombre.toUpperCase()+'</td>';

                    //Cantidad de Requisitos
                    etiqueta = '';
                    if(elem.cantidad<8){
                      etiqueta = 'badge badge-danger';
                    }else if(elem.cantidad>=8 && elem.cantidad>=14){
                      etiqueta = 'badge badge-warning';
                    }else{
                      etiqueta = 'badge badge-primary';
                    }  

                    cadena = cadena + '<td><span class="'+etiqueta+'">'+elem.cantidad+' de '+obj1.requisitos_clase.req_clase+'</span></td>';                                          
                    //%Cumplimiento
                    etiqueta = '';
                    porc = elem.cantidad * 100 / obj1.requisitos_clase.req_clase;
                    if(porc<50 ){
                      etiqueta = 'badge badge-danger';
                    }else if(porc>=50 && porc>=85){
                      etiqueta = 'badge badge-warning';
                    }else{
                      etiqueta = 'badge badge-primary';
                    }  
                    cadena = cadena + '<td><span class="'+etiqueta+'">'+String(porc).substring(0,3)+'%</span></td>';
                    cadena = cadena + '<td><button onclick="modal_requisitos('+elem.id_aventurero+',\''+elem.nombre+'\')" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button></td>';
                    cadena = cadena + '/<tr>';
                  });                     
                  $('#tbl_avance').append(cadena);                  
            }
       }); 
        
      
    
  });

  function modal_requisitos(id_aventurero,nombre){
     var ParamObjSend={
                 'id_aventurero' :id_aventurero,   
     }
     $('#nom_aventurero').html(nombre.toUpperCase());
     $.ajax({
            type: "POST",
            url: "<?= base_url()?>index.php/Welcome/DetalleRequisitoAventurero",            
            data:ParamObjSend,
            success: function(obj1){
                  var cadena = '';                
                  var c = 0;
                  $('#tbl_requisitos tbody').empty();
                  $.each(obj1.requisitos, function (ind, elem) {
                    c++;
                    cadena = cadena + '<tr>';     
                    cadena = cadena + '<td>'+c+'</td>';
                    cadena = cadena + '<td>'+elem.descripcion+'</td>';
                    if(elem.cumplido==1){
                      cadena = cadena + '<td><span class="badge badge-primary">Cumplido</span></td>';  
                    }else{
                      cadena = cadena + '<td><span class="badge badge-danger">Pendiente</span></td>';  
                    }
                    
                    cadena = cadena + '/<tr>';
                  });                     
                  $('#tbl_requisitos').append(cadena);                  
            }
     });

     $('#modal_detalle').modal('show');
     
  } 
      

</script>