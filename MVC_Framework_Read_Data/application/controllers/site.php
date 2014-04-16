<?php

if (! defined('BASEPATH')) exit ('No direct script access');

class Site extends Controller {
	

	function __construct() {
		parent::Controller();
	}

	function index() {
		$this->load->view('site');
	}
}