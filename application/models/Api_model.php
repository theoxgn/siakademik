<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_Model extends CI_Model
{

  public function selectSingleData($table, $data)
  {
    return $this->db->where($data)->get($table)->row();
  }

  public function selectNama($table, $data)
  {
    return $this->db->where($data)->get($table)->row();
  }

  public function selectMultiData($table, $data = false)
  {
    $result = null;
    if (!$data) {
      $result = $this->db->get($table)->result();
    } else {
      $result = $this->db->where($data)->get($table)->result();
    }

    return $result;
  }

  public function insertDataModel($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  public function updateDataModel($table, $kondisi, $set)
  {
  	return $this->db->from($table)
    ->where($kondisi)
    ->set($set)
    ->update();
  }

  public function selectRows($table)
  {
    return $this->db->get($table)->num_rows();
  }

  public function selectSumData($table, $field, $data = false)
  {
    if (!$data) {
      return $this->db->select_sum($field)->get($table)->row();
    } else {
      return $this->db->select_sum($field)->where($data)->get($table)->row();
    }
  }

  public function graph($table)
  {
    $data = $this->db->get($table)->result();
    return $data->result();
  }

  public function deleteDataModel($table, $data) {
  	return $this->db->delete($table, $data);
  }

  public function joinPembayaran($nis)
  {
  	return $this->db->select('*')->from('PEMBAYARAN')
    ->join('TAGIHAN', 'TAGIHAN.IDTAGIHAN = PEMBAYARAN.IDTAGIHAN')
    ->where('TAGIHAN.NIS', $nis)->get()->result();
  }

  public function joinDetilAkademik($id_akademik)
  {
  	return $this->db->select('*')->from('DETIL_AKADEMIK')
    ->join('AKADEMIK', 'AKADEMIK.ID_AKADEMIK = DETIL_AKADEMIK.ID_AKADEMIK')
    ->join('BIDANG_PERKEMBANGAN', 'BIDANG_PERKEMBANGAN.ID_BIDANG = DETIL_AKADEMIK.ID_BIDANG')
    ->join('SISWA', 'SISWA.NIS = AKADEMIK.NIS')
    ->join('KELAS', 'KELAS.ID_KELAS = AKADEMIK.ID_KELAS')
    ->join('GURU', 'GURU.NIP = KELAS.NIP')
    ->where('DETIL_AKADEMIK.ID_AKADEMIK', $id_akademik)->get()->result();
  }

  public function joinAllDetilAkademik($disetujui = true)
  {
  	return $this->db->select('*')->from('DETIL_AKADEMIK')
    ->join('AKADEMIK', 'AKADEMIK.ID_AKADEMIK = DETIL_AKADEMIK.ID_AKADEMIK')
    ->join('BIDANG_PERKEMBANGAN', 'BIDANG_PERKEMBANGAN.ID_BIDANG = DETIL_AKADEMIK.ID_BIDANG')
    ->where('AKADEMIK.STATUS_PERSETUJUAN', $disetujui ? 'DISETUJUI' : 'BELUM DISETUJUI')->get()->result();
  }

  public function joinSiswaAkademik()
  {
  	return $this->db->select('*')->from('AKADEMIK')
    ->join('SISWA', 'SISWA.NIS = AKADEMIK.NIS')->get()->result();
  }

  public function joinTagihanSiswa($id_tagihan)
  {
    return $this->db->select('*')->from('TAGIHAN')
    ->join('SISWA', 'SISWA.NIS = TAGIHAN.NIS')
    ->join('JENIS_TAGIHAN', 'JENIS_TAGIHAN.ID_JENIS = TAGIHAN.ID_JENIS')
    ->where('TAGIHAN.IDTAGIHAN', $id_tagihan)
    ->get()->result();
  }

  public function joinTagihanLaporan()
  {
    return $this->db->select('*')->from('TAGIHAN')
    ->join('SISWA', 'SISWA.NIS = TAGIHAN.NIS')
    ->join('JENIS_TAGIHAN', 'JENIS_TAGIHAN.ID_JENIS = TAGIHAN.ID_JENIS')
    ->get()->result();
  }

  public function joinPembayaranLaporan()
  {
    return $this->db->select('*')->from('PEMBAYARAN')
    ->join('TAGIHAN', 'TAGIHAN.IDTAGIHAN = PEMBAYARAN.IDTAGIHAN')
    ->get()->result();
  }

  public function joinWaliSiswa()
  {
    return $this->db->select('*')->from('WALIMURID')
    ->join('SISWA', 'SISWA.NIS = WALIMURID.NIS')
    ->get()->result();
  }

  public function GetSiswaAktif()
  {

    return $this->db->select('*')->from('SISWA')
    ->where('STATUS','AKTIF')
    ->get()->result();

  }

  public function joinDetilPembayaran($idtagihan)
  {
    return $this->db->select('*')->from('PEMBAYARAN')
    ->join('TAGIHAN', 'TAGIHAN.IDTAGIHAN = PEMBAYARAN.IDTAGIHAN')
    ->where('TAGIHAN.IDTAGIHAN', $idtagihan)->get()->result();
  }

  public function hitungtagihan($idtagihan)
  {
    return $this->db->select_sum('NOMINAL')
    ->where('TAGIHAN.IDTAGIHAN', $idtagihan)
    ->get('TAGIHAN')
    ->row();
  }

  public function hitungpembayaran($idtagihan)
  {
    return $this->db->select_sum('TOTAL')
    ->where('PEMBAYARAN.IDPEMBAYARAN', $idtagihan)
    ->get('PEMBAYARAN')
    ->row();
  }

  public function joinWaliSiswaRaport($id_akademik)
  {
    return $this->db->select('*')->from('WALIMURID')
    ->join('SISWA', 'SISWA.NIS = WALIMURID.NIS')
    ->get()->result();
  }

  public function JoinDetilTagihan($table, $data)
  {
    return $this->db->join('SISWA', 'SISWA.NIS = TAGIHAN.NIS')
    ->join('JENIS_TAGIHAN', 'JENIS_TAGIHAN.ID_JENIS = TAGIHAN.ID_JENIS')
    ->where($data)
    ->get($table)
    ->row();
  }


}

/* End of file Api_Model.php */
