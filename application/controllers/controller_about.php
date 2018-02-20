<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_about extends CI_Controller {

	public function index(){
		$this->load->view('view_about');
	}
}