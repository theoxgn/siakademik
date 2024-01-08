<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
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
   $data['view'] = 'tagihan/datatagihan';
   $data['tagihan'] = $this->api->joinTagihanLaporan('tagihan', $kondisi);
   $data['from'] = $this->input->get('from') ?? false;
   $data['to'] = $this->input->get('to') ?? false;
   $this->load->view('template', $data, FALSE);
 }

 public function tambah_tagihan()
 {
  $data['tagihan'] = $this->api->selectMultiData('JENIS_TAGIHAN');
  $data['siswa'] = $this->api->selectMultiData('SISWA');
  $data['view'] = 'tagihan/tambahdatatagihan';
  $this->load->view('template', $data, FALSE);
}

public function cetak_tagihan($id_tagihan)
{
  $data['kepsek'] = $this->api->selectSingleData('GURU', ['JABATAN' =>'KEPSEK']);
  $data['data_tagihan'] = $this->api->joinTagihanSiswa($id_tagihan);

  $this->load->library('pdf');

  $this->pdf->setPaper('A4', 'potrait');
  $this->pdf->filename = "laporan tagihan.pdf";
  $this->pdf->load_view('laporan_tagihan', $data);
}

public function cetaklaporan()
{
  $data['kepsek'] = $this->api->selectSingleData('GURU', ['JABATAN' =>'KEPSEK']);
  $data['data_tagihan'] = $this->api->joinTagihanLaporan();
  $this->load->library('pdf');

  $this->pdf->setPaper('A4', 'potrait');
  $this->pdf->filename = "laporan tagihan.pdf";
  $this->pdf->load_view('laporantagihan', $data);
}
public function tambah_tagihan_mass()
{
  $data['tagihan'] = $this->api->selectMultiData('JENIS_TAGIHAN');
  $data['view'] = 'tagihan/tambahdatatagihan_mass';
  $this->load->view('template', $data, FALSE);
}
}

/* End of file Tagihan.php */
