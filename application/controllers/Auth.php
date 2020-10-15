<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function login()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			if($post['tk'] == $this->session->userdata('login')){
				$this->load->model('auth_m');
				$email = $this->auth_m->email($post);
				if($email->num_rows() > 0){
					$pass = $this->auth_m->pass($post);
					if($pass->num_rows() > 0){
                        $row = $pass->row();
                        if($row->status_user == 1){
                            $params = array(
                                'userid' => $row->id_user,
                                'email' => $row->email_user, 
                                'level' => $row->level_user,
                                '_token' =>  random_string('alnum', 25),
                            );
                            $this->session->set_userdata($params);
                            if($row->level_user == 1){
                                redirect('petugas/beranda');
                            }else if($row->level_user == 2){
                                redirect('anggota/beranda');
                            }else{
                                $this->session->set_flashdata('mail', $post['email']);
                                $this->session->set_flashdata('pass', $post['password']);
                                $this->session->set_flashdata('confirm', 'Akun bermasalah, hubungi Petugas!');
                                redirect('login?tk='.$post['tk'].'&t='.date('Ymd').'&cat=login');
                            }
                        }else{
                            $this->session->set_flashdata('mail', $post['email']);
                            $this->session->set_flashdata('pass', $post['password']);
                            $this->session->set_flashdata('confirm', 'Akun belum diaktifkan!');
                            redirect('login?tk='.$post['tk'].'&t='.date('Ymd').'&cat=login');
                        }
					}else{
						$this->session->set_flashdata('mail', $post['email']);
						$this->session->set_flashdata('pass', $post['password']);
						$this->session->set_flashdata('confirm', 'Password Salah!');
						redirect('login?tk='.$post['tk'].'&t='.date('Ymd').'&cat=login');
					}
				}else{
					$this->session->set_flashdata('mail', $post['email']);
					$this->session->set_flashdata('pass', $post['password']);
					$this->session->set_flashdata('confirm', 'Email tidak terdaftar!');
					redirect('login?tk='.$post['tk'].'&t='.date('Ymd').'&cat=login');
				}
			}else{
				redirect('logout');
			}
		}else{
			redirect('logout');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect();
    }

    function forgot()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['forgot'])){
            if($post['tk'] == $this->session->userdata('forgot')){
                $this->load->model('auth_m');
				$query = $this->auth_m->email($post);
				if($query->num_rows() > 0){
                    $this->load->library('smtp');
                        $data = $query->row();
                        $messages = '
                        <b>Hallo, '.$data->nama_user.' </b><br>
                        Sistem mengidentifikasi apakah memang benar anda yang melakukan upaya atur ulang akun. <br>
                        berikut data Akun anda :<br>
                        
                        Email : '.$data->email_user.' <br>
                        Akun  : '.$data->nama_user.' <br>
                        Token : '.$data->_tokens.' <br>
                        Pemintaan ulang : '.date('d/m/Y H:i:s').' <br>
                        
                        Silahkan <a href="'.site_url('auth/new/'.$data->_tokens).'"> KLIK LINK INI </a> untuk dialihkan ke halaman Atur ulang Akun <br><br>
                        
                        Jika Anda tidak mencoba melakukan atur ulang akun, silahkan hiraukan pesan ini<br>
                        
                        
                        Terima kasih,<br>
                        
                        Sistem Digilib';
                        $recovery = [
                            'destination' => $post['email'], 
                            'subject' => 'Permintaan Atur Ulang Akun Digital Library', 
                            'massage'=> $messages
                        ];
                        $send = $this->smtp->email($recovery);
                        if($send == 1){
                            $this->session->set_flashdata('mail', $post['email']);
					        $this->session->set_flashdata('confirm', 'Permintaan Berhasil!, periksa email sekarang');
                            redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login');
                        }else{
                            $this->session->set_flashdata('mail', $post['email']);
                            $this->session->set_flashdata('confirm', 'Email permintaan gagal dikirim!');
                            redirect('forgot'.'?tk='.$post['tk'].'&t='.date('Ymd').'&cat=forgot');
                        }
                }else{
                    $this->session->set_flashdata('mail', $post['email']);
					$this->session->set_flashdata('confirm', 'Email tidak terdaftar!');
					redirect('forgot?tk='.$post['tk'].'&t='.date('Ymd').'&cat=login');
                }
            }else{
                redirect('forgot?tk='.$post['tk'].'&t='.date('Ymd').'&cat=forgot');
            }
        }else{
            redirect('forgot?tk='.$post['tk'].'&t='.date('Ymd').'&cat=forgot');
        }
    }

    function new($id = null)
    {
        if($id != null){
            $this->load->model('auth_m');
            $query = $this->auth_m->tokens($id);
            if($query->num_rows() > 0){
                redirect('home/new/'.$query->row()->id_user);
            }else{
                $this->session->set_flashdata('confirm', 'Tokens expired now!');
                redirect();
            }
        }else{
            redirect();
        }
    }

    function newer()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['new'])){
            $this->load->model('auth_m');
            $this->auth_m->new($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('mail', $post['email']);
                $this->session->set_flashdata('pass', $post['password']);
                $this->session->set_flashdata('confirm', 'Perubahan Berhasil!, login sekarang');
                redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login');
            }else{
                $this->session->set_flashdata('confirm', 'System error, Pastikan koneksi anda aman!');
                redirect();
            }
        }else{
            redirect();
        }
    }

    function register()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['register'])){
            if($post['tk'] == $this->session->userdata('register')){
                $this->load->model('auth_m');
                $email = $this->auth_m->email($post);
                if($email->num_rows() == 0){
                    $query = $this->auth_m->get_anggota($post);
                    if($query->num_rows() > 0){
                        $post['id_user'] = random_string('alnum',25).''.date('dmy');
                        $post['id_anggota'] = $query->row()->id_anggota;
                        $this->auth_m->register($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->auth_m->update_anggota($post);
                            $user = $this->auth_m->user($post['id_user'])->row();


                            $this->load->library('smtp');
                            $messages = '
                            <b>Hallo, '.$data->nama_user.' </b><br>
                            Permintaan pendaftaran akun baru digital library berhasil!. <br>
                            berikut data Akun anda :<br>
                            
                            Email : '.$post['email'].' <br>
                            Akun  : '.$query->row()->nama_anggota.' <br>
                            NIK   : '.$post['id'].' <br>
                            Pemintaan ulang : '.date('d/m/Y H:i:s').' <br>
                            
                            Silahkan <a href="'.site_url('auth/aktivasi/'.$post['id_user']).'/'.date('dmy').'"> KLIK LINK INI </a> untuk Aktivasi Akun <br><br>
                            
                            Jika Anda tidak mencoba melakukan pendaftaran akun, silahkan hiraukan pesan ini<br>
                            
                            Terima kasih,<br>
                            
                            Sistem Digilib';
                            $recovery = [
                                'destination' => $post['email'], 
                                'subject' => 'Pendaftaran Akun Baru Digital Library', 
                                'massage'=> $messages
                            ];
                            $send = $this->smtp->email($recovery);
                            if($send == 1){
                                $this->session->set_flashdata('confirm', 'Pendaftaran kamu berhail, <br> cek email dan aktivasi!');
                                redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login');
                            }else{
                                $this->session->set_flashdata('confirm', 'Pendaftaran kamu berhail, <br> namun emai gagal dikirim!');
                                redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login');
                            }

                        
                        }else{
                            $this->session->set_flashdata('mail', $post['email']);
                            $this->session->set_flashdata('pass', $post['password']);
                            $this->session->set_flashdata('ids', $post['id']);
                            $this->session->set_flashdata('name', $post['nama']);
                            $this->session->set_flashdata('confirm', 'System error, silahkan coba lagi');
                            redirect(redirect('register'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=register'));
                        }
                    }else{
                        $this->session->set_flashdata('mail', $post['email']);
                        $this->session->set_flashdata('pass', $post['password']);
                        $this->session->set_flashdata('ids', $post['id']);
                        $this->session->set_flashdata('name', $post['nama']);
                        $this->session->set_flashdata('confirm', 'NIK kamu tidak terdaftar sebagai anggota!');
                        redirect(redirect('register'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=register'));
                    }
                }else{
                    $this->session->set_flashdata('mail', $post['email']);
                    $this->session->set_flashdata('pass', $post['password']);
                    $this->session->set_flashdata('ids', $post['id']);
                    $this->session->set_flashdata('name', $post['nama']);
                    $this->session->set_flashdata('confirm', 'Email kamu sudah terdaftar di akun lain!');
                    redirect(redirect('register'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=register'));
                }
            }else{
                redirect(redirect('register'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=register'));
            }
        }else{
            redirect(redirect('register'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=register'));
        }
    }

    function aktivasi($id = null,$ex = null)
    {
        if($ex == date('dmy')){
            if($id != null){
                $this->load->model('auth_m');
                $query = $this->auth_m->user($id);
                if($query->num_rows() > 0){
                    $this->auth_m->aktivasi($id);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('mail', $query->row()->email_user);
                        $this->session->set_flashdata('confirm', 'Aktivasi akun berhasil!');
                        redirect(redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login'));
                    }else{
                        $this->session->set_flashdata('confirm', 'Aktivasi gagal, Akun sudah Aktif!');
                        redirect(redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login'));
                    }
                }else{
                    $this->session->set_flashdata('confirm', 'Akun tidak ditemukan!');
                    redirect(redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login'));
                }
            }else{
                $this->session->set_flashdata('confirm', 'Aktivasi gagal!');
                redirect(redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login'));
            }
        }else{
            $this->session->set_flashdata('confirm', 'Email aktivasi sudah kadaluarsa!');
            redirect(redirect('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login'));
        }
    }

}