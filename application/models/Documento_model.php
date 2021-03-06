<?php
class Documento_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_documentos(){
		 $documento= $this->db->get('documento');
		 return $documento;
	}

  //Retorna solamente un registro de el id pasado como parame
 	function documento($id){
 		$documento = $this->db->query('select * from documento where iddocumento="'. $id.'" order by iddocumento');
 		return $documento;
 	}

  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->insert("documento", $array);
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumento',$id);
 		$this->db->update('documento',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("iddocumento")->get('documento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumento")->get('documento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documento = $this->db->select("iddocumento")->order_by("iddocumento")->get('documento')->result_array();
		$arr=array("iddocumento"=>$id);
		$clave=array_search($arr,$documento);
	   if(array_key_exists($clave+1,$documento))
		 {

 		$documento = $this->db->query('select * from documento where iddocumento="'. $documento[$clave+1]["iddocumento"].'"');
		 }else{

 		$documento = $this->db->query('select * from documento where iddocumento="'. $id.'"');
		 }
		 	
 		return $documento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documento = $this->db->select("iddocumento")->order_by("iddocumento")->get('documento')->result_array();
		$arr=array("iddocumento"=>$id);
		$clave=array_search($arr,$documento);
	   if(array_key_exists($clave-1,$documento))
		 {

 		$documento = $this->db->query('select * from documento where iddocumento="'. $documento[$clave-1]["iddocumento"].'"');
		 }else{

 		$documento = $this->db->query('select * from documento where iddocumento="'. $id.'"');
		 }
		 	
 		return $documento;
 	}




	// Para moverse presentar  los emisores 
	function emisores( $iddocu)
	{
 		$this->db->select('idpersona,nombres');
		$this->db->where('iddocumento="'.$iddocu.'"');
		$emisores=$this->db->get('emisor1');
		$emisores=$this->db->query('select idpersona,nombres from emisor1 where iddocumento="'. $iddocu.'"');
		return $emisores;
	}


  // Para presentar los destinatarios
	function destinatarios( $iddocu)
	{
		$destinatarios=$this->db->query('select idpersona,nombres from destinatario1 where iddocumento="'. $iddocu.'"');
		return $destinatarios;
	}



 
}
