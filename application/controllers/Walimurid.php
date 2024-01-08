<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Walimurid extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');

    if ($this->session->userdata('LOGGED') && ($this->session->userdata('ROLE') !== "GURU" && $this->session->userdata('ROLE') !== "KEPSEK")) {
      redirect('home', 'refresh');
    }
  }

  public function index()
  {
    $data['view'] = 'walimurid/walimurid';
    $data['walimurid'] = $this->api->joinWaliSiswa('walimurid');
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_walimurid()
  {
    $data['kota'] = $this->api->selectMultiData('kota');
    $data['siswa'] = $this->api->selectMultiData('siswa');
    $data['view'] = 'walimurid/tambah_walimurid';
    $this->load->view('template', $data, FALSE);
  }

}

/* End of file Walimurid.php */
