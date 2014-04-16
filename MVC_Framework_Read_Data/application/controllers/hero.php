<?php
class Hero extends Controller {

	function hero() {

		parent::Controller();
	}

	function GetAll() {

		$this->load->model('hero_model');

		$data['query'] = $this->hero_model->hero_getall();

		$this->load->view('hero_viewall', $data);

	}

}
?>