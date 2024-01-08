<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');

    if (!$this->session->userdata('LOGGED')) {
      redirect('login', 'refresh');
    }
  }

  public function index()
  {
    if ($this->session->userdata('ROLE') == 'KEPSEK') {
      $data['view'] = 'kepsek/dashboard-kepsek';
      $data['siswa'] = $this->api->selectRows('SISWA');
      $data['tagihan'] = $this->api->selectSumData('TAGIHAN', 'NOMINAL');
      $data['pembayaran'] = $this->api->selectSumData('PEMBAYARAN', 'TOTAL');
    } else if ($this->session->userdata('ROLE') == 'GURU') {
      $data['view'] = 'guru/dashboard-guru';
      $data['siswa'] = $this->api->selectRows('SISWA');
      $data['tagihan'] = $this->api->selectSumData('TAGIHAN', 'NOMINAL');
      $data['pembayaran'] = $this->api->selectSumData('PEMBAYARAN', 'TOTAL');
    } else if ($this->session->userdata('ROLE') == 'SISWA') {
		$data['view'] = 'guru/dashboard-guru';
		$data['siswa'] = $this->api->selectRows('SISWA');
		$data['tagihan'] = $this->api->selectSumData('TAGIHAN', 'NOMINAL');
		$data['pembayaran'] = $this->api->selectSumData('PEMBAYARAN', 'TOTAL');
	}
    return $this->load->view('template', $data);
  }
}

/* End of file Home.php */
