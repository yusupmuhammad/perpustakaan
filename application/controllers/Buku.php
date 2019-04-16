<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');
class Buku extends CI_Controller{
	public function katalog_detail($id){
		//$id1 = $this->uri->segment(3);
		
			

			$data['item_detail']     = $this->m_perpus->get_detail($id);
			// $data['pengarang'] = $fields->pengarang;
			// $data['penerbit']  = $fields->penerbit;
			// $data['kategori']  = $fields->nama_kategori;
			// $data['tahun']     = $fields->thn_terbit;
			// $data['isbn']      = $fields->isbn;
			// $data['gambar']    = $->gambar;
			//$data['id']        = $id1;
		
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('detail_buku', $data);
	}
}