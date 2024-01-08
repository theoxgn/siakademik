<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akademik extends CI_Controller
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
    $data['view'] = 'penilaian/akademik';
    $data['akademik'] = $this->api->joinSiswaAkademik();
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_akademik()
  {
    $data['siswa'] = $this->api->selectMultiData('siswa');
    $data['kelas'] = $this->api->selectMultiData('kelas');
    $data['view'] = 'penilaian/tambah_akademik';
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_raport()
  {
    $data['akademik'] = $this->api->selectMultiData('akademik');
    $data['bidang'] = $this->api->selectMultiData('bidang_perkembangan');
    $data['view'] = 'penilaian/tambah_raport';
    $this->load->view('template', $data, FALSE);
  }

  public function tambah_detilakademik()
  {
  	$data['view'] = 'penilaian/tambah_detilakademik';
   $data['bidang'] = $this->api->selectMultiData('bidang_perkembangan');
   $this->load->view('template', $data, FALSE);
 }

 public function lihat_detilakademik($id_akademik)
 {
   $data['view'] = 'penilaian/lihat_detilakademik';
   $data['detilakademik'] = $this->api->joinDetilAkademik($id_akademik);
   $data['status_persetujuan'] = $this->api->joinDetilAkademik($id_akademik)[0]->STATUS_PERSETUJUAN ?? false;
   $this->load->view('template', $data, FALSE);
 }

 public function cetak_detilakademik($id_akademik)
 {
   $dataAkademik = $this->api->joinDetilAkademik($id_akademik);
   $dataWali = $this->api->joinWaliSiswaRaport($id_akademik);

   $data['walimurid'] = ['nama' => $dataWali[0]->NAMA];
   $data['data_akademik'] = $dataAkademik;
   $data['nama_siswa'] = $dataAkademik[0]->NAMA_LENGKAP_SISWA ?? '';
   $data['semester'] = $dataAkademik[0]->SEMESTER ?? '';
   $data['tahun_ajaran'] = $dataAkademik[0]->TAHUN_AJARAN ?? '';
   $data['kelompok'] = $dataAkademik[0]->NAMA_KELAS ?? '';
   $data['tanggal_lahir'] = $dataAkademik[0]->TANGGAL_LAHIR ?? '';
   $data['kepsek'] = $this->api->selectSingleData('GURU', ['JABATAN' =>'KEPSEK']);
   $data['guru'] = ['nama' => $dataAkademik[0]->NAMA_LENGKAP_GURU, 'nip' => $dataAkademik[0]->NIP];

   $this->load->library('pdf');

   $this->pdf->setPaper('A4', 'landscape');
   $this->pdf->filename = "laporan.pdf";
   $this->pdf->load_view('laporan_detilakademik', $data);
 }
}

/* End of file Prestasi.php */
