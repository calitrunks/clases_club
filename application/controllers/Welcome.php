<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
    }

    public function index(){
        $this->load->view('login');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

    public function ValidaUsuario(){
        $nombre = $this->input->post('nombre');
        $clave = $this->input->post('clave');
        $resul = $this->MainModel->ValidaUsuario($nombre,$clave);        
        if(isset($resul)){            
          $sessUser = array('nombre'=>$resul->nombre,

                              'nombre_largo'=>$resul->nombre_largo,

                              'logo'=>$resul->logo,

                              'id_unidad'=>$resul->id_unidad);
          $this->session->set_userdata($sessUser);  

          $this->output
                    ->set_content_type('application/json')
                    ->set_output(
                        json_encode(array(
                            'success'=>true,    
                            'session'=>$sessUser,                            
                        ))
          );        
        }else{
          $this->output
                    ->set_content_type('application/json')
                    ->set_output(
                        json_encode(array(
                            'success'=>false,                                
                        ))
          );          
        }    
    }

	public function registro()
	{
        if($this->session->userdata('nombre_largo')){                    
            $this->load->view('header');
    		$this->load->view('registro');
        }else{
            echo "Acceso Denegado";
        }
        //$this->load->view('footer');
	}

    public function AgendaAnual(){
        if($this->session->userdata('nombre_largo')){          
            $this->load->view('header');
            $this->load->view('AgendaAnual');   
        }else{
            echo "Acceso Denegado";
        }   
        //$this->load->view('footer');
    }

     public function AvanceAventurero(){
         if($this->session->userdata('nombre_largo')){           
            $this->load->view('header');
            $this->load->view('AvanceAventurero');   
          }else{
            echo "Acceso Denegado";
        }     
        //$this->load->view('footer');
    }


    public function PlanificacionRequisitos(){
         if($this->session->userdata('nombre')=='instructores'){           
            $this->load->view('header');
            $this->load->view('PlanificacionRequisitos');   
          }else{
            echo "Acceso Denegado";
         }     
    }

    public function AgendaRequisito(){
        $data['id_requisito']=$this->input->post('id_requisito');
        $date = new DateTime($this->input->post('fecha'));        
        $data['fecha']=$date->format('Y-m-d');
        $data['id_unidad']=$this->input->post('id_unidad');        
        $this->MainModel->AgendaRequisito($data);
        $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true        
                            ))
        );    
    }

    public function CargarUnidades(){
         if($this->session->userdata('nombre')=='instructores'){           
            $unidades  = $this->MainModel->CargarUnidades();
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                
                                'unidades'=>$unidades,
                            ))
            );    
         }   
    }

    public function CargaRequisitos(){
         if($this->session->userdata('nombre')=='instructores'){           
            $requisitos  = $this->MainModel->CargaRequisitos($this->input->post('id_unidad'));
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                
                                'requisitos'=>$requisitos,
                            ))
            );    
         }   
    }


    public function DetalleRequisitosEspecialidadAventurero(){
        if($this->session->userdata('nombre_largo')){           
            $id_especialidad = $this->input->post('id_especialidad');
            $id_aventurero = $this->input->post('id_aventurero');
            $requisitos_especialidad = $this->MainModel->DetalleRequisitosEspecialidadAventurero($id_aventurero, $id_especialidad);
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                
                                'requisitos'=>$requisitos_especialidad,
                            ))
            );    
        }else{
            echo "Acceso Denegado";
        }       
    }

    public function TraeRequisitosEspecialidad(){
        if($this->session->userdata('nombre_largo')){           
            $id_especialidad = $this->input->post('id_especialidad');
            //Aqui debo pasarle el id de session, para probar usaremo 1 en duro        
            $id_unidad = $this->session->userdata('id_unidad');    
            $requisitos = $this->MainModel->TraeRequisitosEspecialidad($id_especialidad);
            $aventureros = $this->MainModel->ListaAventurerosUnidad($id_unidad);
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                
                                'requisitos'=>$requisitos,
                                'aventureros'=>$aventureros
                            ))
            );      
        }else{
            echo "Acceso Denegado";
        }                       
    }

    
    public function DetalleRequisitoAventurero(){
        if($this->session->userdata('nombre_largo')){           
            $id_aventurero = $this->input->post('id_aventurero');   
            //Aqui debo pasarle el id de session, para probar usaremo 1 en duro
            $id_unidad = $this->session->userdata('id_unidad');    
            $requisitos = $this->MainModel->DetalleRequisitoAventurero($id_aventurero,$id_unidad);        
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                
                                'requisitos'=>$requisitos
                            ))
            );      
        }else{
            echo "Acceso Denegado";
        }                                       
    }

    public function GetDetalleCumplimiento(){
        if($this->session->userdata('nombre_largo')){           
         //Aqui debo pasarle el id de session, para probar usaremo 1 en duro
            $id_unidad = $this->session->userdata('id_unidad');
            $lista = $this->MainModel->CuentaRequisitosCumplidos($id_unidad);
            $requisitos_clase = $this->MainModel->CuentaRequisitosClase($id_unidad);
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,
                                'lista'=>$lista,
                                'requisitos_clase'=>$requisitos_clase
                            ))
            );      
        }else{
            echo "Acceso Denegado";
        }                                                       
    }

   


    public function ListaRequisitos(){
        if($this->session->userdata('nombre_largo')){           
            //Aqui debo pasarle el id de session, para probar usaremo 1 en duro
            $id_unidad = $this->session->userdata('id_unidad');
            $lista = $this->MainModel->ListaRequisitos($id_unidad);
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,
                                'lista'=>$lista
                            ))
            );      
        }else{
            echo "Acceso Denegado";
        }                                                                       
    }

    public function MarcaStatus(){
        if($this->session->userdata('nombre_largo')){           
            $data["id_aventurero"] =  $this->input->post('id_aventurero');
            $data["cumplido"] =  $this->input->post('cumplido');
            $data["id_encabezado"] =  $this->input->post('id_encabezado');
            $this->MainModel->MarcaStatus($data);
        }else{
            echo "Acceso Denegado";
        }                                                                           
    }

    public function MarcaStatusRequisitoEspecialidad(){
        if($this->session->userdata('nombre_largo')){           
            $data['fecha_cumplido'] = date('Y-m-d'); 
            $data['cumplido'] = 1; 
            $data["id_aventurero"] =  $this->input->post('id_aventurero');
            $data["id_requisito_especialidad"] =  $this->input->post('id_requisito_especialidad');
            $data["id_encabezado"] =  $this->input->post('id_encabezado');
            //Registra Avance de los Aventureros en la especialidad
            $this->MainModel->MarcaStatusRequisitoEspecialidad($data);
            //Marca el requisito de la especialidad como hecho
            $data2['fecha_hecho'] = date('Y-m-d'); 
            $data2['hecho'] = 1;         
            $this->MainModel->MarcaRequisitoEspecialidad($data2,$this->input->post('id_requisito_especialidad'));
            //Devuelve resultado
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                           
                            ))
            );      
        }else{
            echo "Acceso Denegado";
        }                                                                                           
    }

    public function MarcaStatusRequisitoEspecialidadAventurero(){
        if($this->session->userdata('nombre_largo')){           
            $data['fecha_cumplido'] = date('Y-m-d'); 
            $data['cumplido'] = 1; 
            $data["id_aventurero"] =  $this->input->post('id_aventurero');
            $data["id_requisito_especialidad"] =  $this->input->post('id_requisito_especialidad');
            $data["id_encabezado"] =  $this->input->post('id_encabezado');
            //Registra Avance de los Aventureros en la especialidad
            $this->MainModel->MarcaStatusRequisitoEspecialidad($data);      
            //Devuelve resultado
            $this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,                           
                            ))
            );      
        }else{
            echo "Acceso Denegado";
        }                                                                                                      
    }

    public function GuardaAventurero(){        
        if($this->session->userdata('nombre_largo')){           
            $data["nombre"] =  $this->input->post('nombre');
            //Aqui debo pasarle el id de session, para probar usaremo 1 en duro
            $data["id_unidad"] =  $this->session->userdata('id_unidad');
            $this->MainModel->GuardaAventurero($data);
        }else{
            echo "Acceso Denegado";
        }    
    }

	public function TraeRequiito(){
        if($this->session->userdata('nombre_largo')){           
            //Aqui debo pasarle el id de session, para probar usaremo 1 en duro
            $id_unidad =  $this->session->userdata('id_unidad');
    		$requisito   = $this->MainModel->TraeRequiito($id_unidad);
    		$this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,
                                'requisito'=>$requisito
                            ))
            );      
	    }else{
            echo "Acceso Denegado";
        }                
	}


    

	public function ListaAventurerosRegistro(){
       if($this->session->userdata('nombre_largo')){           
            $id_encabezado = $this->input->post('id_encabezado');
            //Aqui debo pasarle el id de session, para probar usaremo 1 en duro
            $id_unidad = $this->session->userdata('id_unidad');		
    		$aventureros   = $this->MainModel->ListaAventurerosRegistro($id_unidad,$id_encabezado);
    		$this->output
                        ->set_content_type('application/json')
                        ->set_output(
                            json_encode(array(
                                'success'=>true,
                                'aventureros'=>$aventureros
                            ))  
            );      
	}else{
            echo "Acceso Denegado";
        }                
}
}

