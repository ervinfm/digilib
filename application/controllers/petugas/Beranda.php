<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		// $data['row'] = $this->kelas_m->get_kelas(get_profil()->id_pengajar);
		// $this->template->load('template', 'pengajar/index', $data);
		echo "<h1>Halaman Beranda Petugas</h1>";
	}
}