<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bibliografia_model extends CI_Model {
	
	public function addBibliografia($data){
		$add = $this->db->insert("bibliografias",$data);
		$this->db->close();
		return $add;
	}

	public function getBibliografias(){
		$query =$this->db->query('SET SQL_MODE=""');
		$bibliografias = array();
        $query = $this->db->query('SELECT * from (
										SELECT b.id_bibliografia, b.bibliografia, cg.capitulo  FROM caltecmx_banco.bibliografias b
											inner  join caltecmx_banco.'.$this->session->especialidad.'_cg_preguntas cg 
												on cg.id_bibliografia=b.id_bibliografia
											union
										SELECT b.id_bibliografia, b.bibliografia, cc.capitulo FROM caltecmx_banco.bibliografias b
											inner  join caltecmx_banco.'.$this->session->especialidad.'_cc_preguntas cc 
											on cc.id_bibliografia=b.id_bibliografia
										union
										SELECT id_bibliografia, bibliografia, capitulo FROM caltecmx_banco.bibliografias
										where id_especialidad='.$this->session->cg.'
									)as resumen
									group by id_bibliografia');

		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$bibliografias[]=$row;
			}
		}
		$this->db->close();
		return $bibliografias;
	}
	
	public function getBibliografia($id_bibliografia){
		$bibliografia = array();
		$query = $this->db->get_where("bibliografias",array("id_bibliografia"=>$id_bibliografia));
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $row ){
				$bibliografia=$row;
			}
		}
		$this->db->close();
		return $bibliografia;
	}

	public function updBibliografia($id_bibliografia,$data){
		$upd = $this->db->update("bibliografias",$data,array("id_bibliografia"=>$id_bibliografia));
		$this->db->close();
		return $upd;
	}

	public function delRow($id_bibliografia){
		$del = $this->db->delete("bibliografias",array("id_bibliografia"=>$id_bibliografia));
		$this->db->close();
		return $del;
	}
}