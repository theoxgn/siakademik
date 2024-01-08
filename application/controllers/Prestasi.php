<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
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
    $data['view'] = 'prestasi/prestasi';
    $data['prestasi'] = $this->api->selectMultiData('prestasi');
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_prestasi()
  {
    $data['prestasi'] = $this->api->selectMultiData('siswa');
    $data['view'] = 'prestasi/tambah_prestasi';
    $this->load->view('template', $data, FALSE);
  }

  public function update_prestasi($id_prestasi)
  {
    $data['siswa'] = $this->api->selectMultiData('siswa');
    $data['view'] = 'prestasi/update_prestasi';
    $data['prestasi'] = $this->api->selectSingleData('PRESTASI', ['ID_PRESTASI' => $id_prestasi]);
    $this->load->view('template', $data, FALSE);
  }
}

/* End of file Prestasi.php */
