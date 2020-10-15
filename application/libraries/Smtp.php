<?php 

    class Smtp{

        function email($post)
        {
            # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?] 
            $ci = &get_instance();
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'mabes.develover@gmail.com',  // Email gmail
                'smtp_pass'   => 'Ervin@14',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $ci->load->library('email', $config);

            // Email dan nama pengirim
            $ci->email->from('mabes.develover@gmail.com', 'Sistem Digital Library');

            // Email penerima
            $ci->email->to($post['destination']); // Ganti dengan email tujuan

            // Subject email
            $ci->email->subject($post['subject']);

            // Isi email
            $ci->email->message($post['massage']);

            // Tampilkan pesan sukses atau error
            if ($ci->email->send()) {
                return 1;
            } else {
                return 0;
            }
        }
    }

?>