<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_member extends CI_Controller {

	public function index()	{
		$data = $this->model_member->get_member();
		$this->load->view('view_member', array('data' => $data));
	}

	public function add_data(){
		$this->load->view('view_member_add');
	}

	public function edit_data($id){
		$edit = $this->model_member->get_member("where id = '$id'");

		$data = array(
			"id"		=> $edit[0]['id'],
			"nama" 		=> $edit[0]['nama'],
			"jk"		=> $edit[0]['jk'],
			"tgl_lahir"	=> $edit[0]['tgl_lahir'],
			"telepon"	=> $edit[0]['telepon'],
			"email"		=> $edit[0]['email'],
			"password"	=> $edit[0]['password'],
			"alamat"	=> $edit[0]['alamat'],
			"foto"		=> $edit[0]['foto']
		);

		$this->load->view('view_member_edit', $data);
	}

	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

	public function do_add(){
		$id 		= $_POST['id'];
		$nama 		= $_POST['nama'];
		$jk			= $_POST['jk'];
		$tgl_lahir	= $_POST['tgl_lahir'];
		$telepon	= $_POST['telepon'];
		$email		= $_POST['email'];
		$password	= $_POST['password'];
		$alamat		= $_POST['alamat'];

		$dir_upload	= "gambar_upload/";
		$foto		= $_FILES['file']['name'];

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$cek = move_uploaded_file($_FILES['file']['tmp_name'], $dir_upload.$foto);
		}

		$data_add = array(
			"id" 		=> $id,
			"nama" 		=> $nama,
			"jk"		=> $jk,
			"tgl_lahir" => $tgl_lahir,
			"telepon"	=> $telepon,
			"email"		=> $email,
			"password"	=> $password,
			"alamat"	=> $alamat,
			"foto"		=> $foto 
		);

		$temp = $this->model_member->insert_data('member', $data_add);
		if($temp >=1){
			redirect('controller_member/index');
		} else{
			redirect('controller_member/add_data');
		}
	}

	public function do_delete($id){
		$where = array("id" => $id);
		$temp = $this->model_member->delete_data('member', $where);

		if($temp >=1){
			redirect('controller_member/index');
		}
	}

	public function do_edit(){
		$id 		= $_POST['id'];
		$nama 		= $_POST['nama'];
		$jk			= $_POST['jk'];
		$tgl_lahir	= $_POST['tgl_lahir'];
		$telepon	= $_POST['telepon'];
		$email		= $_POST['email'];
		$password	= $_POST['password'];
		$alamat		= $_POST['alamat'];		
		$foto_lama = $_POST['foto_lama'];
		
		$dir_upload = "gambar_upload/";
		$foto = $_FILES['file']['name'];

		if($foto == ""){
			$foto = "$foto_lama";
		}

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$cek = move_uploaded_file($_FILES['file']['tmp_name'], $dir_upload.$foto);
		}

		$data_edit = array(
			"nama" 		=> $nama,
			"jk"		=> $jk,
			"tgl_lahir" => $tgl_lahir,
			"telepon"	=> $telepon,
			"email"		=> $email,
			"password"	=> $password,
			"alamat"	=> $alamat,
			"foto"		=> $foto 
		);		

		$where = array("id" => $id);
		$temp = $this->model_member->update_data('member', $data_edit, $where);
		if($temp >=1 ){
			redirect('controller_member/index');
		}else{
			redirect('controller_member/edit_data');
		}
	}
}