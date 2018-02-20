<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_barang extends CI_Controller {

	public function index(){
		$data = $this->model_barang->get_barang();
		$this->load->view('view_barang', array('data' => $data));
	}

	public function add_data(){
		$this->load->view('view_barang_add');
	}

	public function edit_data($id){
		$edit = $this->model_barang->get_barang("where id = '$id'");

		$data = array(
			"id"			=> $edit[0]['id'],
			"nama_barang" 	=> $edit[0]['nama_barang'],
			"harga"			=> $edit[0]['harga'],
			"ket_gambar"	=> $edit[0]['ket_gambar'],
			"foto"			=> $edit[0]['foto']
		);

		$this->load->view('view_barang_edit', $data);
	}

	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

	public function do_add(){
		$id 			= $_POST['id'];
		$nama_barang 	= $_POST['nama_barang'];
		$harga			= $_POST['harga'];
		$ket_gambar		= $_POST['ket_gambar'];

		$dir_upload	= "gambar_upload/";
		$foto		= $_FILES['file']['name'];

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$cek = move_uploaded_file($_FILES['file']['tmp_name'], $dir_upload.$foto);
		}

		$data_add = array(
			"id" 			=> $id,
			"nama_barang" 	=> $nama_barang,
			"harga"			=> $harga,
			"ket_gambar" 	=> $ket_gambar,
			"foto"			=> $foto 
		);

		$temp = $this->model_barang->insert_data('barang', $data_add);
		if($temp >=1){
			redirect('controller_barang/index');
		} else{
			redirect('controller_barang/add_data');
		}
	}

	public function do_delete($id){
		$where = array("id" => $id);
		$temp = $this->model_barang->delete_data('barang', $where);

		if($temp >=1){
			redirect('controller_barang/index');
		}
	}

	public function do_edit(){
		$id 			= $_POST['id'];
		$nama_barang 	= $_POST['nama_barang'];
		$harga			= $_POST['harga'];
		$ket_gambar		= $_POST['ket_gambar'];
		$foto_lama 		= $_POST['foto_lama'];
		
		$dir_upload = "gambar_upload/";
		$foto = $_FILES['file']['name'];

		if($foto == ""){
			$foto = "$foto_lama";
		}

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$cek = move_uploaded_file($_FILES['file']['tmp_name'], $dir_upload.$foto);
		}

		$data_edit = array(
			"nama_barang" 	=> $nama_barang,
			"harga"			=> $harga,
			"ket_gambar" 	=> $ket_gambar,
			"foto"			=> $foto 
		);		

		$where = array("id" => $id);
		$temp = $this->model_barang->update_data('barang', $data_edit, $where);
		if($temp >=1 ){
			redirect('controller_barang/index');
		}else{
			redirect('controller_barang/edit_data');
		}
	}
}