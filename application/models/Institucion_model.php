<?php
class Institucion_model extends CI_model {

	function lista_instituciones(){
		 $institucion= $this->db->get('institucion');
		 return $institucion;
	}

 	function institucion( $id){
 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $id.'"');
 		return $institucion;
 	}

 	function save($array)
 	{
		$this->db->insert("institucion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idinstitucion',$id);
 		$this->db->update('institucion',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idinstitucion',$id);
		$this->db->delete('institucion');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idinstitucion")->get('institucion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idinstitucion")->get('institucion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$institucion = $this->db->select("idinstitucion")->order_by("idinstitucion")->get('institucion')->result_array();
		$arr=array("idinstitucion"=>$id);
		$clave=array_search($arr,$institucion);
	   if(array_key_exists($clave+1,$institucion))
		 {

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $institucion[$clave+1]["idinstitucion"].'"');
		 }else{

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $id.'"');
		 }
		 	
 		return $institucion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$institucion = $this->db->select("idinstitucion")->order_by("idinstitucion")->get('institucion')->result_array();
		$arr=array("idinstitucion"=>$id);
		$clave=array_search($arr,$institucion);
	   if(array_key_exists($clave-1,$institucion))
		 {

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $institucion[$clave-1]["idinstitucion"].'"');
		 }else{

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $id.'"');
		 }
		 	
 		return $institucion;
 	}






 

}
