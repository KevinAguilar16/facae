<?php
class Destinatario_model extends CI_model {

	function listar_destinatario(){
		 $destinatario= $this->db->get('destinatario');
		 return $destinatario;
	}

	function listar_destinatario1(){
		 $destinatario= $this->db->get('destinatario1');
		 return $destinatario;
	}




 	function usuario( $id){
 		$usuario = $this->db->query('select * from usuario where idusuario="'. $id.'"');
 		return $usuario;
 	}

 	function save($array)
 	{
		$this->db->insert("destinatario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idusuario',$id);
 		$this->db->update('usuario',$array_item);
	}


  public function delete($id)
	{
 		$this->db->where('iddestinatario',$id);
		$this->db->delete('destinatario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddestinatario")->get('destinatario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddestinatario")->get('destinatario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$destinatario = $this->db->select("iddestinatario")->order_by("iddestinatario")->get('destinatario')->result_array();
		$arr=array("iddestinatario"=>$id);
		$clave=array_search($arr,$destinatario);
	   if(array_key_exists($clave+1,$destinatario))
		 {

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $destinatario[$clave+1]["iddestinatario"].'"');
		 }else{

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $id.'"');
		 }
		 	
 		return $destinatario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$destinatario = $this->db->select("iddestinatario")->order_by("iddestinatario")->get('destinatario')->result_array();
		$arr=array("iddestinatario"=>$id);
		$clave=array_search($arr,$destinatario);
	   if(array_key_exists($clave-1,$destinatario))
		 {

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $destinatario[$clave-1]["iddestinatario"].'"');
		 }else{

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $id.'"');
		 }
		 	
 		return $destinatario;
 	}






}
