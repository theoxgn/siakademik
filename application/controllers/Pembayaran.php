<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');
    $this->load->library('pdf');

    if ($this->session->userdata('LOGGED') && ($this->session->userdata('ROLE') !== "GURU" && $this->session->userdata('ROLE') !== "KEPSEK")) {
      redirect('home', 'refresh');
    }
  }

  public function index()
  {
   $kondisi = false;
   if($this->input->get('from') != null && $this->input->get('to') != null) {
    $kondisi = [
     'TANGGAL_TAGIHAN >=' => $this->input->get('from'),
     'TANGGAL_TAGIHAN <=' => $this->input->get('to')
   ];
 }
 $data['view'] = 'pembayaran/detilpembayaran';
 $data['pembayaran'] = $this->api->joinPembayaranLaporan('pembayaran');
 $data['from'] = $this->input->get('from') ?? false;
 $data['to'] = $this->input->get('to') ?? false;
 $this->load->view('template', $data, FALSE);
}

public function tambah_pembayaran()
{
  $data['tagihan'] = $this->api->selectMultiData('tagihan');
  $data['view'] = 'pembayaran/tambahdetilpembayaran';
  $this->load->view('template',$data, FALSE);
}

public function cetak_pembayaran($id_pembayaran)
{

  $data['kepsek'] = $this->api->selectSingleData('GURU', ['JABATAN' =>'KEPSEK']);
  $data['data_pembayaran'] = $this->api->selectMultiData('PEMBAYARAN', ['IDPEMBAYARAN' => $id_pembayaran]);

  $this->load->library('pdf');

  $this->pdf->setPaper('A4', 'potrait');
  $this->pdf->filename = "laporan pembayaran.pdf";
  $this->pdf->load_view('laporan_pembayaran', $data);
}

public function cetaklaporanPembayaran()
{
  
  $data['kepsek'] = $this->api->selectSingleData('GURU', ['JABATAN' =>'KEPSEK']);
  $data['data_pembayaran'] = $this->api->joinPembayaranLaporan();
  $data['total'] = $this->api->selectSumData('PEMBAYARAN', 'TOTAL');

  $this->load->library('pdf');
  $this->pdf->setPaper('A4', 'potrait');
  $this->pdf->filename = "laporan pembayaran.pdf";
  $this->pdf->load_view('laporanpembayaran', $data);

}

public function detilpembayaran($idtagihan)
{
  $data['view'] = 'pembayaran/lihatdetilpembayaran';
  $data['pembayaran'] = $this->api->joinDetilPembayaran($idtagihan);

  //hitung
  /*$data['t'] = $this->api->hitungtagihan($idtagihan);
  $data['p'] = $this->api->hitungpembayaran($idtagihan);
  $data['total'] = $data['t']-$data['p'];*/
  $this->load->view('template', $data, FALSE);
}


}

/* End of file Pembayaran.php */
