<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->template->load('template','home/index');
	}

	public function login()
	{
		if($_GET['cat']){
			$this->session->set_userdata(array($_GET['cat'] => @$_GET['tk']));
			$this->template->load('auth/template','auth/index');
		}else{
			redirect();
		}
	}

	public function forgot()
	{
		if($_GET['cat']){
			$this->session->set_userdata(array($_GET['cat'] => @$_GET['tk']));
			$this->template->load('auth/template','auth/forgot');
		}else{
			redirect();
		}
	}

	public function new($id = null)
	{
		if($id != null){
			$this->load->model('auth_m');
			$query['row'] = $this->auth_m->user($id)->row();
			$this->template->load('auth/template','auth/new', $query);
		}else{
			redirect();
		}
	}

	public function register()
	{
		if($_GET['cat']){
			$this->session->set_userdata(array($_GET['cat'] => @$_GET['tk']));
			$this->template->load('auth/template','auth/register');
		}else{
			redirect();
		}
	}
}
