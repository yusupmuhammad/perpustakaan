<?php defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Peminjaman extends CI_Controller{
	function __construct(){
		parent::__construct();
		// cek login 
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
	function index(){
		$data['peminjaman'] = $this->db->query("SELECT * FROM detail_pinjam D, peminjaman P, buku B, anggota A WHERE B.id_buku=D.id_buku and A.id_anggota=P.id_anggota")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/peminjaman',$data);
		$this->load->view('admin/footer');
	}

	//one to many public function

	public function tambah_pinjam($id){
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
		else{
			$d = $this->m_perpus->find($id, 'buku');
			$isi = array(
				'id_pinjam' => $this->m_perpus->kode_otomatis(),
				'id_buku' => $id,
				'id_anggota' => $this->session->userdata('id_agt'),
				'tgl_pencatatan' => date('Y-m-d'),
				'tgl_pinjam' => '-',
				'tgl_kembali' => '-', 'denda' => '10000',
				'tgl_pengembalian' =>'-',
				'total_denda' =>'0',
				'status_peminjaman' =>'Belum Selesai',
				'status_pengembalian' =>'Belum Kembali',
			);
			$o = $this->m_perpus->edit_data(array('id_buku'=>$id),'transaksi')->num_rows();
			if($o>0) { 
				$this->session->set_flashdata('alert','Buku ini sudah ada dikeranjang');
				redirect(base_url().'member');
			}
			$this->m_perpus->insert_data($isi, 'transaksi');
			$jml_buku = $d->jumlah_buku-1;
			$w=array('id_buku'=>$id);
			$data = array('jumlah_buku'=>$jml_buku);
			//$this->m_perpus->update_data('buku', $data,$w);
			redirect(base_url().'member');
		}
	}

	public function lihat_keranjang(){
		$data['anggota'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
		$where = $this->session->userdata('id_agt');
		$data['peminjaman']=$this->db->query("SELECT*from transaksi t,buku b,anggota a where b.id_buku=t.id_buku and a.id_anggota=t.id_anggota and a.id_anggota=$where")->result();
		$d=$this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'transaksi')->num_rows();
		if($d>0){
			$this->load->view('desain');
			$this->load->view('toplayout',$data);
			$this->load->view('keranjang', $data);
		}else{redirect('member');}
	}

	function hapus_keranjang($nomor){
		$w = array('id_buku' => $nomor);
		$data = $this->m_perpus->edit_data($w,'transaksi')->row();
		$ww = array('id_buku' => $data->id_buku);
		$data2 = array('status_buku' => '1');
		//$this->m_perpus->update_data($w,$data2,'buku');
		$this->m_perpus->delete_data($w,'transaksi');
		redirect(base_url().'peminjaman/lihat_keranjang');
	}

	public function selesai_booking($where){
		
		$d = $this->m_perpus->find($where, 'transaksi');
		$isi = array(
			'id_pinjam' => $this->m_perpus->kode_otomatis(),
			'tanggal' => date('Y-m-d H:m:s'),
			'id_anggota' => $where,
			'tgl_pinjam' => '-',
			'tgl_kembali' => '-',
			'totaldenda' => '0',
			'status_pinjam' => 'Booking'
			
		);	
		$this->m_perpus->insert_data($isi, 'peminjaman');
		$this->m_perpus->insert_detail($where);
		$this->m_perpus->kosongkan_data('transaksi');
		$data['useraktif'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
		$data['tet'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
		$data['items'] = $this->db->query("SELECT * from peminjaman	p,detail_pinjam d, buku b where b.id_buku=d.id_buku and d.id_pinjam=p.id_pinjam	and p.id_anggota='$where'")->result_array();
		$data['tet'] = $this->m_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')),'anggota')->result();
		$this->load->view('desain');
		$this->load->view('toplayout',$data);
		$this->load->view('info', $data);
	}
}

