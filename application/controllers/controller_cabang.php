<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_cabang extends CI_Controller {

	public function index()	{
		$data = $this->model_cabang->get_cabang();
		$this->load->view('view_cabang', array('data' => $data));
	}

	public function add_data(){
		$this->load->view('view_cabang_add');
	}

	public function edit_data($id){
		$edit = $this->model_cabang->get_cabang("where id = '$id'");

		$data = array(
			"id"			=> $edit[0]['id'],
			"nama_cabang"	=> $edit[0]['nama_cabang'],
			"nama_atasan" 	=> $edit[0]['nama_atasan'],
			"telepon"		=> $edit[0]['telepon'],
			"alamat"		=> $edit[0]['alamat']
		);

		$this->load->view('view_cabang_edit', $data);
	}

	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

	public function do_add(){
		$id 			= $_POST['id'];
		$nama_cabang	= $_POST['nama_cabang'];
		$nama_atasan	= $_POST['nama_atasan'];
		$telepon		= $_POST['telepon'];
		$alamat			= $_POST['alamat'];

		$data_add = array(
			"id" 			=> $id,
			"nama_cabang" 	=> $nama_cabang,
			"nama_atasan"	=> $nama_atasan,
			"telepon"		=> $telepon,
			"alamat"		=> $alamat 
		);

		$temp = $this->model_cabang->insert_data('cabang', $data_add);
		if($temp >=1){
			redirect('controller_cabang/index');
		} else{
			redirect('controller_cabang/add_data');
		}
	}

	public function do_delete($id){
		$where = array("id" => $id);
		$temp = $this->model_cabang->delete_data('cabang', $where);

		if($temp >=1){
			redirect('controller_cabang/index');
		}
	}

	public function do_edit(){
		$id 			= $_POST['id'];
		$nama_cabang 	= $_POST['nama_cabang'];
		$nama_atasan	= $_POST['nama_atasan'];
		$telepon		= $_POST['telepon'];
		$alamat			= $_POST['alamat'];

		$data_edit = array(
			"nama_cabang" 	=> $nama_cabang,
			"nama_atasan"	=> $nama_atasan,
			"telepon"		=> $telepon,
			"alamat"		=> $alamat
		);		

		$where = array("id" => $id);
		$temp = $this->model_cabang->update_data('cabang', $data_edit, $where);
		if($temp >=1 ){
			redirect('controller_cabang/index');
		}else{
			redirect('controller_cabang/edit_data');
		}
	}
}