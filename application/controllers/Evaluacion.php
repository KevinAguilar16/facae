<?php

class Evaluacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('evaluacion_model');
      $this->load->model('pregunta_model');
      $this->load->model('respuesta_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['evaluacion']=$this->evaluacion_model->evaluacion(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('evaluacion_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva Institución";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('evaluacion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idevaluacion' => $this->input->post('idevaluacion'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->evaluacion_model->save($array_item);
	 	redirect('evaluacion');
 	}



public function edit()
{
	 	$data['evaluacion'] = $this->evaluacion_model->evaluacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Evaluacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('evaluacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idevaluacion');
	 	$array_item=array(
		 	
		 	'idevaluacion' => $this->input->post('idevaluacion'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->evaluacion_model->update($id,$array_item);
	 	redirect('evaluacion');
 	}



public function listar()
{
	
  $data['evaluacion'] = $this->evaluacion_model->lista_evaluaciones()->result();
  $data['title']="Evaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacion_list',$data);
	$this->load->view('template/page_footer');
}

function evaluacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->evaluacion_model->lista_evaluaciones();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idevaluacion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idevaluacion="'.$r->idevaluacion.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}


public function elprimero()
{
	$data['evaluacion'] = $this->evaluacion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Evaluacion";
    $this->load->view('template/page_header');		
    $this->load->view('evaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['evaluacion'] = $this->evaluacion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Evaluacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('evaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['evaluacion_list']=$this->evaluacion_model->lista_evaluacion()->result();
	$data['evaluacion'] = $this->evaluacion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Evaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['evaluacion_list']=$this->evaluacion_model->lista_evaluacion()->result();
	$data['evaluacion'] = $this->evaluacion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Evaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacion_record',$data);
	$this->load->view('template/page_footer');
}


	public function imprimir(){
	 	$data['evaluacion'] = $this->evaluacion_model->evaluacion($this->uri->segment(3))->result();
//		print_r($data['evaluacion']);
//		die();

	 	$data['preguntas'] = $this->pregunta_model->preguntasxevaluacion($this->uri->segment(3))->result();
		$data['res']=$this->respuesta_model;
 		$data['title'] = $data['evaluacion'][0]->nombre;
 		$data['detalle'] = $data['evaluacion'][0]->detalle;
 
		$this->load->view('evaluacion_informe',$data);
 	}




}