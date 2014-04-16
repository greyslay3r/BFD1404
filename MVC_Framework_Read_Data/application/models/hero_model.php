<?php
class Hero_model extends Model {

	function Hero_model() {
		parent::Model();
	}

	function hero_getall() {
		$this->load->database();
		$query = $this->db->get('hero');
		return $query->result();
	}
}

?>