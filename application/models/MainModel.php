<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function ListaAventurerosRegistro($id_unidad,$id_encabezado){				
			$sql = 	"SELECT aventurero.id_aventurero, aventurero.nombre, detalle_registro.cumplido ";
			$sql = $sql . "FROM aventurero ";
			$sql = $sql . "LEFT JOIN detalle_registro  ";
			$sql = $sql . "ON detalle_registro.id_aventurero = aventurero.id_aventurero AND detalle_registro.id_encabezado=".$id_encabezado;
			$sql = $sql . " WHERE aventurero.id_unidad=".$id_unidad;
			$sql = $sql . " ORDER BY aventurero.nombre";
			$q = $this->db->query($sql);				
			return $q->result();
		}

		
		public function DetalleRequisitoAventurero($id_aventurero, $id_unidad){				
			$sql = 	"SELECT requisito.descripcion, detalle_registro.cumplido ";
			$sql = $sql . "FROM requisito ";
			$sql = $sql . "LEFT JOIN encabezado_registro  ";
			$sql = $sql . "ON encabezado_registro.id_requisito = requisito.id_requisito ";
			$sql = $sql . "LEFT JOIN detalle_registro  ";
			$sql = $sql . "ON detalle_registro.id_encabezado = encabezado_registro.id_encabezado  AND detalle_registro.id_aventurero=".$id_aventurero;		
			$sql = $sql ." WHERE requisito.id_unidad=".$id_unidad;
			$q = $this->db->query($sql);				
			return $q->result();
		}		

		public function TraeRequisitosEspecialidad($id_especialidad){
			$this->db->where('id_especialidad',$id_especialidad);
			$data= $this->db->get('requisito_especialidad');
			return $data->result();
		}

		public function ListaAventurerosUnidad($id_unidad){
			$this->db->where('id_unidad',$id_unidad);
			$data= $this->db->get('aventurero');
			return $data->result();
		}

		public function CargarUnidades(){
			$data= $this->db->get('unidad');
			return $data->result();
		}

		public function CargaRequisitos($id_unidad){			
			$this->db->where('requisito.id_unidad',$id_unidad);
			$this->db->from('requisito');
			$this->db->join('encabezado_registro','encabezado_registro.id_requisito = requisito.id_requisito','left');
			$this->db->select('descripcion, DATE_FORMAT(encabezado_registro.fecha, "%d-%m-%Y") fecha');
			$this->db->order_by('requisito.id_requisito','ASC');
			$data= $this->db->get();
			return $data->result();
		}

		public function ValidaUsuario($nombre,$clave){
			$this->db->where('nombre',$nombre);
			$this->db->where('clave',$clave);
			$data= $this->db->get('unidad');
			return $data->row();
		}

		public function DetalleRequisitosEspecialidadAventurero($id_aventurero, $id_especialidad){
			$sql = 	"SELECT descripcion, DATE_FORMAT(fecha_cumplido, '%d-%m-%Y') fecha_cumplido, requisito_especialidad.id_requisito_especialidad ";
			$sql = $sql . "FROM requisito_especialidad ";
			$sql = $sql . "LEFT JOIN detalle_registro_especialidad  ";
			$sql = $sql . "ON detalle_registro_especialidad.id_requisito_especialidad = requisito_especialidad.id_requisito_especialidad
			AND detalle_registro_especialidad.id_aventurero=".$id_aventurero;		
			$sql = $sql ." WHERE requisito_especialidad.id_especialidad=".$id_especialidad;
			$q = $this->db->query($sql);				
			return $q->result();			
		}

		public function ListaRequisitos($id_unidad){
			$this->db->where('encabezado_registro.id_unidad',$id_unidad);
			$this->db->from('encabezado_registro');
			$this->db->join('requisito','requisito.id_requisito = encabezado_registro.id_requisito');
			$this->db->select('*');
			$this->db->order_by('fecha');
			$data= $this->db->get();
			return $data->result();
		}

		
		function CuentaRequisitosCumplidos($id_unidad){
			$this->db->where('aventurero.id_unidad',$id_unidad);			
			$this->db->from('detalle_registro');
			$this->db->join('aventurero','aventurero.id_aventurero = detalle_registro.id_aventurero','right');			
			$this->db->select('aventurero.nombre, aventurero.id_aventurero,  count(detalle_registro.cumplido) cantidad');
			$this->db->group_by('nombre');
			$this->db->order_by('nombre');
			$data= $this->db->get();
			return $data->result();
		}
		
		function CuentaRequisitosClase($id_unidad){
			$this->db->where('id_unidad',$id_unidad);
			$data= $this->db->select('COUNT(requisito.id_requisito) as req_clase');
			$data= $this->db->get('requisito');
			return $data->row();
		}	
		

		public function MarcaStatus($data){
			$this->db->insert('detalle_registro',$data);
	 		return $this->db->insert_id();
		}

		public function MarcaStatusRequisitoEspecialidad($data){
			$this->db->insert('detalle_registro_especialidad',$data);
	 		return $this->db->insert_id();
		}

		public function MarcaRequisitoEspecialidad($data, $id_requisito_especialidad){
			$this->db->where('id_requisito_especialidad',$id_requisito_especialidad);
			$this->db->update('requisito_especialidad',$data);
		}

		public function GuardaAventurero($data){
			$this->db->insert('aventurero',$data);
	 		return $this->db->insert_id();
		}

		public function TieneRegistroRequisito($id_aventurero,$id_encabezado){
			$this->db->where('id_aventurero',$id_aventurero);
			$this->db->where('id_encabezado',$id_encabezado);
			$data= $this->db->select('cumplido');
			$data= $this->db->get('detalle_registro');
			return $data->row();
		}

		public function TraeRequiito($id_unidad){
			$this->db->where('fecha', date('Y-m-d'));
			$this->db->where('encabezado_registro.id_unidad', $id_unidad);
			$this->db->from('encabezado_registro');
			$this->db->join('requisito','requisito.id_requisito = encabezado_registro.id_requisito');
			$this->db->select('*');
			$data=$this->db->get();
			return $data->row();
		}	
}

/* End of file MainModel.php */
/* Location: ./application/models/MainModel.php */