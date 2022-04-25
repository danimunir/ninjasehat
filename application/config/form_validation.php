<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
        'register' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required|callback_username_check'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|min_length[5]'
                )
        ),
        'login' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|callback_password_check'
                )
        ),
        'post' => array(
                array(
                        'field' => 'title',
                        'label' => 'Judul Artikel',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'author',
                        'label' => 'Penulis',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'content',
                        'label' => 'Isi Artikel',
                        'rules' => 'required'
                )
        )
);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */