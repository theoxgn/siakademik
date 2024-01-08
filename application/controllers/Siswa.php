<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');

    if (!$this->session->userdata('LOGGED')) {
      redirect('home', 'refresh');
    }
  }


  public function index()
  {
    $data['view'] = 'siswa/siswa';
    $data['siswa'] = $this->api->selectMultiData('SISWA');
    $this->load->view('template', $data, FALSE);
  }

  public function pendaftaran()
  {
    $data['kota'] = $this->api->selectMultiData('KOTA');
    $data['view'] = 'siswa/registrasi_siswa';
    $this->load->view('template', $data, FALSE);
  }

  public function validasi()
  {
    $data['view'] = 'siswa/validasi_siswa.php';
    $data['calon'] = $this->api->selectMultiData('CALON_SISWA');
    $this->load->view('template', $data, FALSE);
  }

  public function edit($nis)
  {
  	$data['view'] = 'siswa/edit_siswa';
  	$data['siswa'] = $this->api->selectSingleData('SISWA', ['NIS' => $nis]);
  	$this->load->view('template', $data, FALSE);
  }

  public function tagihan()
  {
  	$data['view'] = 'siswa/tagihan_siswa';
  	$data['tagihan'] = $this->api->selectMultiData('TAGIHAN', ['NIS' => $this->session->userdata('USERID')]);
  	$this->load->view('template', $data, FALSE);
  }

  public function pembayaran()
  {
  	$data['view'] = 'siswa/pembayaran_siswa';
  	$data['pembayaran'] = $this->api->joinPembayaran($this->session->userdata('USERID'));
  	$this->load->view('template', $data, FALSE);
  }

  public function prestasi()
  {
  	$data['view'] = 'siswa/prestasi_siswa';
  	$data['prestasi'] = $this->api->selectMultiData('PRESTASI', ['NIS' => $this->session->userdata('USERID')]);
  	$this->load->view('template', $data, FALSE);
  }

  public function akademik()
  {
  	$data['view'] = 'siswa/akademik_siswa';
  	$data['akademik'] = $this->api->selectMultiData('AKADEMIK', ['NIS' => $this->session->userdata('USERID')]);
  	$this->load->view('template', $data, FALSE);
  }

  public function detilakademik($id_akademik)
  {
  	$data['view'] = 'siswa/detilakademik_siswa';
   $data['detilakademik'] = $this->api->joinDetilAkademik($id_akademik);
   $this->load->view('template', $data, FALSE);
 }

 public function detilpembayaran($idtagihan)
 {
  $data['view'] = 'siswa/detilpembayaran_siswa';
  $data['pembayaran'] = $this->api->joinDetilPembayaran($idtagihan);
  $this->load->view('template', $data, FALSE);
}

}

/* End of file Siswa.php */
