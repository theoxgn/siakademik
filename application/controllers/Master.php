<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');
    
    if ($this->session->userdata('LOGGED') && ($this->session->userdata('ROLE') !== "GURU" && $this->session->userdata('ROLE') !== "KEPSEK")) {
      redirect('home', 'refresh');
    }
  }


  public function guru()
  {
    $data['view'] = 'master/guru';
    $data['guru'] = $this->api->selectMultiData('GURU', array('JABATAN' => 'GURU'));
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_guru()
  {
    $data['view'] = 'master/tambah_guru';
    $data['kota'] = $this->api->selectMultiData('KOTA');
    $this->load->view('template', $data, FALSE);
  }

  public function update_guru($nip)
  {
    $data['view'] = 'master/update_guru';
    $data['kota'] = $this->api->selectMultiData('KOTA');
    $data['guru'] = $this->api->selectSingleData('GURU', ['NIP' => $nip]);
    $this->load->view('template', $data, FALSE);
  }

  public function kelas()
  {
    $data['view'] = 'master/kelas';
    $data['guru'] = $this->api->selectMultiData('KELAS');
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_kelas()
  {
    $data['guru'] = $this->api->selectMultiData('GURU');
    $data['view'] = 'master/tambah_kelas';
    $this->load->view('template', $data, FALSE);
  }

  public function update_kelas($id_kelas)
  {
    $data['guru'] = $this->api->selectMultiData('GURU');
    $data['view'] = 'master/update_kelas';
    $data['kelas'] = $this->api->selectSingleData('KELAS', ['ID_KELAS' => $id_kelas]);
    $this->load->view('template', $data, FALSE);
  }

  public function kota()
  {
    $data['view'] = 'master/kota';
    $data['kota'] = $this->api->selectMultiData('KOTA');
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_kota()
  {
    $data['view'] = 'master/tambah_kota';
    $this->load->view('template', $data, FALSE);
  }

  public function update_kota($id_kota)
  {
    $data['view'] = 'master/update_kota';
    $data['kota'] = $this->api->selectSingleData('KOTA', ['IDKOTA' => $id_kota]);
    $this->load->view('template', $data, FALSE);
  }

  public function jenis_tagihan()
  {
    $data['view'] = 'master/jenis_tagihan';
    $data['tagihan'] = $this->api->selectMultiData('JENIS_TAGIHAN');
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_jenis_tagihan()
  {
    $data['view'] = 'master/tambah_jenis_tagihan';
    $this->load->view('template', $data, FALSE);
  }

  public function update_jenis_tagihan($id_jenis_tagihan)
  {
    $data['view'] = 'master/update_jenis_tagihan';
    $data['jenis_tagihan'] = $this->api->selectSingleData('JENIS_TAGIHAN', ['ID_JENIS' => $id_jenis_tagihan]);
    $this->load->view('template', $data, FALSE);
  }

  public function bidang()
  {
    $data['view'] = 'master/bidang';
    $data['bidang'] = $this->api->selectMultiData('BIDANG_PERKEMBANGAN');
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_bidang()
  {
    $data['view'] = 'master/tambah_bidang';
    $this->load->view('template', $data, FALSE);
  }

  public function update_bidang($id_bidang)
  {
    $data['view'] = 'master/update_bidang';
    $data['bidang'] = $this->api->selectSingleData('BIDANG_PERKEMBANGAN', ['ID_BIDANG' => $id_bidang]);
    $this->load->view('template', $data, FALSE);
  }
}

/* End of file Master.php */
