<?php

defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');
  }

  public function login()
  {
    $identity = $this->input->post('identity', TRUE);
    $password = $this->input->post('password', TRUE);
    if (empty($identity) || empty($password)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Masih ada form yang kosong"
      ));
    } else {
      $table = null;
      $payload = null;
      if (strlen($identity) > 7) {
        $table = "GURU";
        $payload = array(
          "NIP" => $identity,
          "PASSWORDGURU" => $password
        );
      } else {
        $table = "SISWA";
        $payload = array(
          "NIS" => $identity,
          "PASSWORDSISWA" => $password
        );
      }

      $query = $this->api->selectSingleData($table, $payload);
      if ($query == null) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Akun tidak ditemukan"
        ));
      } else {
        $role = null;
        if (strlen($identity) > 7) {
          $role = $query->JABATAN;
        } else {
          $role = "SISWA";
        }

        $data = array(
          "LOGGED" => true,
          "USERID" => $identity,
          "DATELOGIN" => date("d-m-Y h:i:s"),
          "ROLE" => $role,
        );

        $this->session->set_userdata($data);

        echo json_encode(array(
          "success" => true,
          "data" => null,
          "message" => "Login berhasil"
        ));
      }
    }
  }

  public function registrasi()
  {
    $name = $this->input->post('nama_lengkap');
    $place = $this->input->post('tempat_lahir');
    $born = $this->input->post('tanggal_lahir');
    $addr = $this->input->post('alamat');
    $jk = $this->input->post('jenis_kelamin');
    $rel = $this->input->post('agama');
    $tgl = $this->input->post('tanggal_daftar');
    $thn = $this->input->post('tahun_ajaran_daftar');
    if (empty($name) || empty($born) || empty($addr) || empty($jk) || empty($rel)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Masih ada form yang kosong"
      ));
    } else {
      if ($jk == 1) {
        $jk = 'L';
      } else {
        $jk = 'P';
      }
      $payload = array(
        "ID_CALON" => rand(1000, 9999),
        "IDKOTA" => $place,
        "NAMA_CALON_SISWA" => $name,
        "TANGGAL_LAHIR_CALON_SISWA" => $born,
        "ALAMAT_CALON_SISWA" => $addr,
        "JK_CALON_SISWA" => $jk,
        "AGAMA_CALON_SISWA" => $rel,
        "TANGGAL_PENDAFTARAN" => $tgl,
        "TAHUN_AJARAN_DAFTAR" => $thn

      );

      $query = $this->api->insertDataModel('CALON_SISWA', $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Data tidak dapat disimpan"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => null,
          "message" => "Data berhasil disimpan"
        ));
      }
    }
  }

  public function validasi()
  {
    $id = $this->input->post('calon_siswa');
    $nik = $this->input->post('nik');
    $kat = $this->input->post('kategori');
    $stat = $this->input->post('status');
    if (empty($id) || empty($nik) || empty($kat)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Masih ada form yang kosong"
      ));
    } else {
      $data = $this->api->selectSingleData('CALON_SISWA', array('ID_CALON' => $id));
      if (!$data) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Calon siswa tidak ditemukan"
        ));
      } else {
        $kategori = null;
        if ($this->input->post('kategori') == 1) {
          $kategori = "KELAS PERCOBAAN";
        } else {
          $kategori = "KELAS REGULER";
        }

        $payload = array(
          "NIS" => rand(1000000, 9999999),
          "ID_CALON" => $id,
          "PASSWORDSISWA" => 'siswa_teladan',
          "NIK" =>$nik,
          "NAMA_LENGKAP_SISWA" => $data->NAMA_CALON_SISWA,
          "TANGGAL_LAHIR" => $data->TANGGAL_LAHIR_CALON_SISWA,
          "ALAMAT_SISWA" => $data->ALAMAT_CALON_SISWA,
          "JK_SISWA" => $data->JK_CALON_SISWA,
          "AGAMA_SISWA" => $data->AGAMA_CALON_SISWA,
          "FOTO_SISWA" => "null",
          "KATEGORI_SISWA" => $kategori,
          "STATUS" => $stat
        );
        $query = $this->api->insertDataModel('SISWA', $payload);
        if (!$query) {
          echo json_encode(array(
            "success" => false,
            "data" => null,
            "message" => "Data tidak dapat disimpan"
          ));
        } else {
          echo json_encode(array(
            "success" => true,
            "data" => null,
            "message" => "Data berhasil disimpan"
          ));
        }
      }
    }
  }

  public function siswa($id)
  {
    if (empty($id)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "ID tidak diberikan"
      ));
    } else {
      $data = $this->api->selectSingleData('CALON_SISWA', array('ID_CALON' => $id));
      echo json_encode(array(
        'sucess' => true,
        'data' => $data,
        'message' => 'Berhasil mengambil data calon siswa'
      ));
    }
  }

  public function tambah_guru()
  {
    $nip = $this->input->post('NIP');
    $nama_guru = $this->input->post('NAMA');
    $id_kota = $this->input->post('KOTA');
    $alamat = $this->input->post('ALAMAT');
    $ttl = $this->input->post('TANGGAL_LAHIR');
    $jenis_kelamin = $this->input->post('JENIS_KELAMIN');
    $agama = $this->input->post('AGAMA');
    $status = $this->input->post('STATUS');
    $pendidikan = $this->input->post('PENDIDIKAN');
    $kepegawaian = $this->input->post('KEPEGAWAIAN');

    if (empty($nip) || empty($nama_guru) || empty($id_kota) || empty($alamat) || empty($ttl) || empty($jenis_kelamin) || empty($agama) || empty($status) || empty($pendidikan) || empty($kepegawaian)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "NIP" => $nip,
        "IDKOTA" => $id_kota,
        "PASSWORDGURU" => "123456",
        "NAMA_LENGKAP_GURU" => $nama_guru,
        "ALAMAT_GURU" => $alamat,
        "TANGGAL_LAHIR_GURU" => $ttl,
        "JK_GURU" => $jenis_kelamin,
        "AGAMA_GURU" => $agama,
        "STATUS_GURU" => $status,
        "PENDIDIKAN_TERAKHIR" => $pendidikan,
        "STATUS_KEPEGAWAIAN" => $kepegawaian,
        "JABATAN" => "GURU",
        "FOTO_GURU" => "/"
      ];
      $query = $this->api->insertDataModel("GURU", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan data guru"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan data guru"
        ));
      }
    }
  }

  public function tambah_kelas()
  {
    $id_kelas = rand(100001, 999999);
    $nip = $this->input->post('GURU');
    $nama = $this->input->post('NAMA_KELAS');
    if (empty($nip) || empty($nama)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "ID_KELAS" => $id_kelas,
        "NIP" => $nip,
        "NAMA_KELAS" => $nama
      ];

      $query = $this->api->insertDataModel("KELAS", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan kelas"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan kelas"
        ));
      }
    }
  }

  public function tambah_kota()
  {
    $id_kota = rand(100001, 999999);
    $nama = $this->input->post('NAMA_KOTA');
    if (empty($nama)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "IDKOTA" => $id_kota,
        "NAMAKOTA" => $nama
      ];

      $query = $this->api->insertDataModel("KOTA", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan kota"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan kota"
        ));
      }
    }
  }

  public function tambah_bidang()
  {
    $id_bidang = rand(100001, 999999);
    $nama = $this->input->post('NAMA_BIDANG');
    if (empty($nama)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "ID_BIDANG" => $id_bidang,
        "NAMA_BIDANG" => $nama
      ];

      $query = $this->api->insertDataModel("BIDANG_PERKEMBANGAN", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan bidang perkembangan"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan bidang perkembangan"
        ));
      }
    }
  }

  public function tambah_jenis_tagihan()
  {
    $id_tagihan = rand(100001, 999999);
    $nama = $this->input->post('NAMA_JENIS_TAGIHAN');
    if (empty($nama)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "ID_JENIS" => $id_tagihan,
        "NAMA_JENIS" => $nama
      ];

      $query = $this->api->insertDataModel("JENIS_TAGIHAN", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan jenis tagihan"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan jenis tagihan"
        ));
      }
    }
  }

  public function tambah_tagihan()
  {
    $idtagihan = rand(100001, 999999);
    $nis = $this->input->post('nis');
    $id_jenis = $this->input->post('id_jenis');
    $nama_tagihan = $this->input->post('nama_tagihan');
    $nominal = $this->input->post('nominal');
    $tanggal_tagihan = $this->input->post('tanggal_tagihan');
    $tanggal_terakhir_pembayaran = $this->input->post('tanggal_terakhir_pembayaran');

    if (empty($idtagihan)|| empty($nis) || empty($id_jenis) || empty($nama_tagihan) || empty($nominal) || empty($tanggal_tagihan) || empty($tanggal_terakhir_pembayaran)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "idtagihan" => $idtagihan,
        "nis" => $nis,
        "id_jenis" => $id_jenis,
        "nama_tagihan" => $nama_tagihan,
        "nominal" => $nominal,
        "tanggal_tagihan" => $tanggal_tagihan,
        "tanggal_terakhir_pembayaran" => $tanggal_terakhir_pembayaran,
        "tgl_dibuat" => tanggal()
      ];
      $query = $this->api->insertDataModel("TAGIHAN", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan data tagihan"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan data tagihan"
        ));
      }
    }
  }

  public function tambah_prestasi()
  {
    $id_prestasi = rand(100001, 999999);
    $nis = $this->input->post('nis');
    $nama_prestasi = $this->input->post('nama_prestasi');
    $tingkat_prestasi = $this->input->post('tingkat_prestasi');
    $tanggal_prestasi = $this->input->post('tanggal_prestasi');
    $keterangan_prestasi = $this->input->post('keterangan_prestasi');
    $foto = "null";
    if (empty($nis) || empty($nama_prestasi) || empty($tingkat_prestasi) || empty($tanggal_prestasi) || empty($keterangan_prestasi)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "ID_PRESTASI" => $id_prestasi,
        "NIS" => $nis,
        "NAMA_PRESTASI" => $nama_prestasi,
        "TINGKAT_PRESTASI" => $tingkat_prestasi,
        "TANGGAL_PRESTASI" => $tanggal_prestasi,
        "KETERANGAN_PRESTASI" => $keterangan_prestasi,
        "FOTO_PRESTASI" => $foto
      ];

      $query = $this->api->insertDataModel("PRESTASI", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan prestasi"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan prestasi"
        ));
      }
    }
  }

  public function detailtagihan($id)
  {
    if (empty($id)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "ID tidak diberikan"
      ));
    } else {
      $data = $this->api->JoinDetilTagihan('TAGIHAN', array('idtagihan' => $id));
      echo json_encode(array(
        'sucess' => true,
        'data' => $data,
        'message' => 'Berhasil mengambil data nis tagihan'
      ));
    }
  }

  public function tambah_pembayaran()
  {
    $idpembayaran = rand(100001, 999999);
    $idtagihan = $this->input->post('idtagihan');
    $atas_nama = $this->input->post('atas_nama');
    $total = $this->input->post('total');
    $tanggal = $this->input->post('tanggal');
    $keterangan = $this->input->post('nama_tagihan');
    $status = $this->input->post('status');
    if (empty($atas_nama) || empty($total) || empty($tanggal) || empty($keterangan) || empty($status)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "IDPEMBAYARAN" => $idpembayaran,
        "IDTAGIHAN" => $idtagihan,
        "ATAS_NAMA" => $atas_nama,
        "TOTAL" => $total,
        "TANGGAL" => $tanggal,
        "KETERANGAN" => $keterangan,
        "STATUS" => $status
      ];

      $query = $this->api->insertDataModel("PEMBAYARAN", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan prestasi"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan prestasi"
        ));
      }
    }
  }

  public function tambah_akademik()
  {
    $id_akademik = rand(100001, 999999);
    $nis = $this->input->post('nis');
    $id_kelas = $this->input->post('kelas');
    $semester = $this->input->post('semester');
    $tahun_ajaran = $this->input->post('tahun_ajaran');
    $status_akademik = $this->input->post('status_akademik');
    if (empty($nis) || empty($id_kelas)|| empty($semester)|| empty($tahun_ajaran)|| empty($status_akademik)) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Form masih ada yang kosong"
      ));
    } else {
      $payload = [
        "ID_AKADEMIK" => $id_akademik,
        "NIS" => $nis,
        "ID_KELAS" => $id_kelas,
        "SEMESTER" => $semester,
        "TAHUN_AJARAN" => $tahun_ajaran,
        "STATUS_AKADEMIK" => $status_akademik,
      ];

      $query = $this->api->insertDataModel("AKADEMIK", $payload);
      if (!$query) {
        echo json_encode(array(
          "success" => false,
          "data" => null,
          "message" => "Gagal menambahkan akademik"
        ));
      } else {
        echo json_encode(array(
          "success" => true,
          "data" => $payload,
          "message" => "Berhasil menambahkan akademik"
        ));
      }
    }
  }

  public function delete_siswa()
  {
  	$nis = $this->input->get('nis');

  	$payload = [
  		'NIS' => $nis
   ];

  	// Hapus data yang berhubungan dengan Akademik
   $akademikList = $this->api->selectMultiData('AKADEMIK', $payload);
   foreach ($akademikList as $akademik){
    $this->api->deleteDataModel('DETIL_AKADEMIK', ['ID_AKADEMIK' => $akademik->ID_AKADEMIK]);
    $this->api->deleteDataModel('AKADEMIK', ['ID_AKADEMIK' => $akademik->ID_AKADEMIK]);
  }

  	// Hapus data yang berhubungan dengan Tagihan
  $tagihanList = $this->api->selectMultiData('TAGIHAN', $payload);
  foreach ($tagihanList as $tagihan) {
    $this->api->deleteDataModel('PEMBAYARAN', ['IDTAGIHAN' => $tagihan->IDTAGIHAN]);
    $this->api->deleteDataModel('TAGIHAN', ['IDTAGIHAN' => $tagihan->IDTAGIHAN]);
  }

	// Hapus data yang berhubungan dengan Prestasi
  $this->api->deleteDataModel('PRESTASI', $payload);

  $query = $this->api->deleteDataModel('SISWA', $payload);
  if (!$query) {
    echo json_encode(array(
     "success" => false,
     "data" => null,
     "message" => "Gagal menghapus siswa"
   ));
  } else {
    echo json_encode(array(
     "success" => true,
     "data" => $payload,
     "message" => "Berhasil menghapus siswa"
   ));
  }
}

public function tambah_detilakademik()
{
 $config['upload_path']="./assets/images";
 $config['allowed_types']='gif|jpg|jpeg|png';
 $config['encrypt_name'] = TRUE;

 $this->load->library('upload',$config);
 if($this->upload->do_upload("foto")){
  $data = array('upload_data' => $this->upload->data());

  $image= $data['upload_data']['file_name'];
  $id_akademik = $this->input->post('id_akademik');
  $id_bidang = $this->input->post('id_bidang');
  $narasi = $this->input->post('narasi');

  $payload = [
   'ID_AKADEMIK' => $id_akademik,
   'ID_BIDANG' => $id_bidang,
   'NARASI' => $narasi,
   'FOTO' => $image
 ];

 $query = $this->api->insertDataModel("DETIL_AKADEMIK", $payload);
 if (!$query) {
   echo json_encode(array(
    "success" => false,
    "data" => null,
    "message" => "Gagal menambahkan detil akademik"
  ));
 } else {
   echo json_encode(array(
    "success" => true,
    "data" => $payload,
    "message" => "Berhasil menambahkan detil akademik"
  ));
 }
}
}

public function update_status_detilakademik($id_akademik)
{
 $kondisi = [
  'ID_AKADEMIK' => $id_akademik
];

$set = [
  'STATUS_PERSETUJUAN' => 'DISETUJUI'
];

$query = $this->api->updateDataModel('AKADEMIK', $kondisi, $set);
if (!$query) {
  echo json_encode(array(
   "success" => false,
   "data" => null,
   "message" => "Gagal melakukan persetujuan"
 ));
} else {
  echo json_encode(array(
   "success" => true,
   "data" => null,
   "message" => "Berhasil melakukan persetujuan"
 ));
}
}

public function update_siswa($nis)
{
 $kondisi = [
  'NIS' => $nis
];

$set = [
  'NAMA_LENGKAP_SISWA' => $this->input->post('nama_lengkap'),
  'TANGGAL_LAHIR' => $this->input->post('tanggal_lahir'),
  'ALAMAT_SISWA' => $this->input->post('alamat'),
  'JK_SISWA' => $this->input->post('jenis_kelamin'),
  'AGAMA_SISWA' => $this->input->post('agama')
];

$query = $this->api->updateDataModel('SISWA', $kondisi, $set);
if (!$query) {
  echo json_encode(array(
   "success" => false,
   "data" => null,
   "message" => "Gagal melakukan persetujuan"
 ));
} else {
  echo json_encode(array(
   "success" => true,
   "data" => null,
   "message" => "Berhasil melakukan persetujuan"
 ));
}
}

public function update_kota($id_kota)
{
  $kondisi = [
    'IDKOTA' => $id_kota
  ];

  $set = [
    'NAMAKOTA' => $this->input->post('NAMA_KOTA')
  ];

  $query = $this->api->updateDataModel('KOTA', $kondisi, $set);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal update kota"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil update kota"
    ));
  }
}

public function delete_kota($id_kota)
{
  $kondisi = [
    'IDKOTA' => $id_kota
  ];

  $query = $this->api->deleteDataModel('KOTA', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus kota"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus kota"
    ));
  }
}

public function update_jenis_tagihan($id_jenis_tagihan)
{
  $kondisi = [
    'ID_JENIS' => $id_jenis_tagihan
  ];

  $set = [
    'NAMA_JENIS' => $this->input->post('NAMA_JENIS_TAGIHAN')
  ];

  $query = $this->api->updateDataModel('JENIS_TAGIHAN', $kondisi, $set);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal update kota"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil update kota"
    ));
  }
}

public function delete_jenis_tagihan($id_jenis_tagihan)
{
  $kondisi = [
    'ID_JENIS' => $id_jenis_tagihan
  ];
  
  $tagihanList = $this->api->selectMultiData('TAGIHAN', $kondisi);

  foreach ($tagihanList as $tagihan) {
    $this->api->deleteDataModel('PEMBAYARAN', ['IDTAGIHAN' => $tagihan->IDTAGIHAN]);
    $this->api->deleteDataModel('TAGIHAN', ['IDTAGIHAN' => $tagihan->IDTAGIHAN]);
  }

  $query = $this->api->deleteDataModel('JENIS_TAGIHAN', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus kota"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus kota"
    ));
  }
}

public function update_bidang($id_bidang)
{
  $kondisi = [
    'ID_BIDANG' => $id_bidang
  ];

  $set = [
    'NAMA_BIDANG' => $this->input->post('NAMA_BIDANG')
  ];

  $query = $this->api->updateDataModel('BIDANG_PERKEMBANGAN', $kondisi, $set);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal update bidang"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil update bidang"
    ));
  }
}

public function delete_bidang($id_bidang)
{
  $kondisi = [
    'ID_BIDANG' => $id_bidang
  ];

  $detilAkademikList = $this->api->selectMultiData('DETIL_AKADEMIK', $kondisi);
  foreach ($detilAkademikList as $detilAkademik) {
    $this->api->deleteDataModel('DETIL_AKADEMIK', ['ID_AKADEMIK' => $detilAkademik->ID_AKADEMIK]);
    $this->api->deleteDataModel('AKADEMIK', ['ID_AKADEMIK' => $detilAkademik->ID_AKADEMIK]);
  }

  $query = $this->api->deleteDataModel('BIDANG_PERKEMBANGAN', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus bidang"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus bidang"
    ));
  }
}

public function update_kelas($id_kelas)
{
  $kondisi = [
    'ID_KELAS' => $id_kelas
  ];

  $set = [
    'NAMA_KELAS' => $this->input->post('NAMA_KELAS'),
    'NIP' => $this->input->post('GURU')
  ];

  $query = $this->api->updateDataModel('KELAS', $kondisi, $set);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal update kelas"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil update kelas"
    ));
  }
}

public function delete_kelas($id_kelas)
{
  $kondisi = [
    'ID_KELAS' => $id_kelas
  ];

  $this->api->deleteDataModel('AKADEMIK', $kondisi);

  $query = $this->api->deleteDataModel('KELAS', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus kelas"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus kelas"
    ));
  }
}

public function update_guru($nip)
{
  $kondisi = [
    'NIP' => $nip
  ];

  $set = [
    'NIP' => $this->input->post('nip'),
    'NAMA_LENGKAP_GURU' => $this->input->post('nama'),
    'IDKOTA' => $this->input->post('kota'),
    'ALAMAT_GURU' => $this->input->post('alamat'),
    'TANGGAL_LAHIR_GURU' => $this->input->post('tanggal'),
    'JK_GURU' => $this->input->post('jenis_kelamin'),
    'AGAMA_GURU' => $this->input->post('agama'),
    'STATUS_GURU' => $this->input->post('status'),
    'PENDIDIKAN_TERAKHIR' => $this->input->post('pendidikan'),
    'STATUS_KEPEGAWAIAN' => $this->input->post('kepegawaian')
  ];

  $query = $this->api->updateDataModel('GURU', $kondisi, $set);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal update kelas"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil update kelas"
    ));
  }
}

public function delete_guru($nip)
{
  $kondisi = [
    'NIP' => $nip
  ];

  $this->api->deleteDataModel('KELAS', $kondisi);

  $query = $this->api->deleteDataModel('GURU', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus guru"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus guru"
    ));
  }
}

public function update_prestasi($id_prestasi)
{
  $kondisi = [
    'ID_PRESTASI' => $id_prestasi
  ];

  $set = [
    'NAMA_PRESTASI'=> $this->input->post('nama_prestasi'),
    'TINGKAT_PRESTASI'=> $this->input->post('tingkat_prestasi'),
    'TANGGAL_PRESTASI' =>$this->input->post('tanggal_prestasi'),
    'KETERANGAN_PRESTASI' =>$this->input->post('keterangan_prestasi')
  ];

  $query = $this->api->updateDataModel('PRESTASI', $kondisi, $set);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal update prestasi"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil update prestasi"
    ));
  }
}

public function delete_prestasi($id_prestasi)
{
  $kondisi = [
    'ID_PRESTASI' => $id_prestasi
  ];

  $query = $this->api->deleteDataModel('PRESTASI', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus prestasi"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus prestasi"
    ));
  }
}

public function tambah_walimurid()
{
  $idwali = rand(100001, 999999);
  $siswa = $this->input->post('siswa');
  $nama = $this->input->post('nama');
  $kota = $this->input->post('tempat_lahir');
  $ttl = $this->input->post('ttl');
  $alamat = $this->input->post('alamat');
  $jk = $this->input->post('jenis_kelamin');
  $ag = $this->input->post('agama');
  $no = $this->input->post('hp');
  if (empty($nama)) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Form masih ada yang kosong"
    ));
  } else {
    $payload = [
      "IDWALI" => $idwali,
      "NIS" => $siswa,
      "IDKOTA" => $kota,
      "NAMA" => $nama,
      "ALAMAT" => $alamat,
      "TTL" => $ttl,
      "JK" => $jk,
      "AGAMA" => $ag,
      "NOHP" => $no
    ];

    $query = $this->api->insertDataModel("WALIMURID", $payload);
    if (!$query) {
      echo json_encode(array(
        "success" => false,
        "data" => null,
        "message" => "Gagal menambahkan jenis tagihan"
      ));
    } else {
      echo json_encode(array(
        "success" => true,
        "data" => $payload,
        "message" => "Berhasil menambahkan jenis tagihan"
      ));
    }
  }
} 
public function delete_walimurid($idwali)
{
  $kondisi = [
    'IDWALI' => $idwali
  ];

  $query = $this->api->deleteDataModel('WALIMURID', $kondisi);
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal hapus prestasi"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => null,
      "message" => "Berhasil hapus prestasi"
    ));
  }
}

public function tambah_tagihan_mass()
{
  $id_jenis = $this->input->post('id_jenis');
  $nama_tagihan = $this->input->post('nama_tagihan');
  $nominal = $this->input->post('nominal');
  $tanggal_tagihan = $this->input->post('tanggal_tagihan');
  $tanggal_terakhir_pembayaran = $this->input->post('tanggal_terakhir_pembayaran');

    // Tambah data masslooping
  $tagihanmass = $this->api->GetSiswaAktif();
  //print_r($tagihanmass);
  foreach ($tagihanmass as $data){

    $idtagihan = rand(100001, 999999);
    $payload = [
      "idtagihan" => $idtagihan,
      "nis" => $data->NIS,
      "id_jenis" => $id_jenis,
      "nama_tagihan" => $nama_tagihan,
      "nominal" => $nominal,
      "tanggal_tagihan" => $tanggal_tagihan,
      "tanggal_terakhir_pembayaran" => $tanggal_terakhir_pembayaran
    ];
    //print_r($payload);
    $query = $this->api->insertDataModel("TAGIHAN", $payload);
  }
  if (!$query) {
    echo json_encode(array(
      "success" => false,
      "data" => null,
      "message" => "Gagal menambahkan data tagihan"
    ));
  } else {
    echo json_encode(array(
      "success" => true,
      "data" => $payload,
      "message" => "Berhasil menambahkan data tagihan"
    ));
  }
}
}
/* End of file API.php */
