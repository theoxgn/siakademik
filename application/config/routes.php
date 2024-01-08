<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login';
$route['dashboardkepsek'] = 'KepsekController/pageDashboard';

$route['master/tambah/guru'] = 'master/tambah_guru';
$route['master/tambah/kelas'] = 'master/tambah_kelas';
$route['master/tambah/kota'] = 'master/tambah_kota';
$route['master/tambah/jenis/tagihan'] = 'master/tambah_jenis_tagihan';
$route['master/tagihan'] = 'master/jenis_tagihan';
$route['master/tambah/bidang'] = 'master/tambah_bidang';
$route['master/update/kota/(:any)'] = 'master/update_kota/$1';
$route['master/update/jenis_tagihan/(:any)'] = 'master/update_jenis_tagihan/$1';
$route['master/update/bidang/(:any)'] = 'master/update_bidang/$1';
$route['master/update/kelas/(:any)'] = 'master/update_kelas/$1';
$route['master/update/guru/(:any)'] = 'master/update_guru/$1';
$route['prestasi/update/prestasi/(:any)'] = 'prestasi/update_prestasi/$1';


//tambah di ajax view
$route['api/tambah/guru'] = 'api/tambah_guru';
$route['api/tambah/kelas'] = 'api/tambah_kelas';
$route['api/tambah/kota'] = 'api/tambah_kota';
$route['api/tambah/jenis/tagihan'] = 'api/tambah_jenis_tagihan';
$route['api/tambah/bidang'] = 'api/tambah_bidang';
$route['api/tambah/tagihan'] = 'api/tambah_tagihan';
$route['api/tambah/kota'] = 'api/tambah_kota';
$route['api/tambah/prestasi'] = 'api/tambah_prestasi';
$route['api/tambah/pembayaran'] = 'api/tambah_pembayaran';
$route['api/tambah/detilpembayaran'] = 'api/tambah_detilpembayaran';
$route['api/tambah/akademik'] = 'api/tambah_akademik';
$route['api/tambah/detilakademik'] = 'api/tambah_detilakademik';
$route['api/tambah/walimurid'] = 'api/tambah_walimurid';
$route['api/tambah/tagihan_mass'] = 'api/tambah_tagihan_mass';
//update
$route['api/update/status_detilakademil/(:any)'] = 'api/update_status_detilakademik/$1';
$route['api/update/siswa/(:any)'] = 'api/update_siswa/$1';
$route['api/update/kota/(:any)'] = 'api/update_kota/$1';
$route['api/update/jenis_tagihan/(:any)'] = 'api/update_jenis_tagihan/$1';
$route['api/update/bidang/(:any)'] = 'api/update_bidang/$1';
$route['api/update/kelas/(:any)'] = 'api/update_kelas/$1';
$route['api/update/guru/(:any)'] = 'api/update_guru/$1';
$route['api/update/prestasi/(:any)'] = 'api/update_prestasi/$1';
//delete
$route['api/delete/kota/(:any)'] = 'api/delete_kota/$1';
$route['api/delete/jenis_tagihan/(:any)'] = 'api/delete_jenis_tagihan/$1';
$route['api/delete/bidang/(:any)'] = 'api/delete_bidang/$1';
$route['api/delete/kelas/(:any)'] = 'api/delete_kelas/$1';
$route['api/delete/guru/(:any)'] = 'api/delete_guru/$1';
$route['api/delete/prestasi/(:any)'] = 'api/delete_prestasi/$1';
$route['api/delete/walimurid/(:any)'] = 'api/delete_walimurid/$1';


//tambah data di controllers untuk di view template
$route['tambah/tagihansiswa'] = 'tagihan/tambah_tagihan';
$route['tambah/prestasisiswa'] = 'prestasi/tambah_prestasi';
$route['tambah/pembayaran'] = 'pembayaran/tambah_pembayaran';
$route['tambah/detilpembayaran'] = 'pembayaran/tambah_detilpembayaran';
$route['tambah/akademik'] = 'akademik/tambah_akademik';
$route['tambah/detilakademik/(:any)'] = 'akademik/tambah_detilakademik/$1';

$route['siswa/edit/(:any)'] = 'siswa/edit/$1';
$route['akademik/cetak-detilakademik/(:any)'] = 'akademik/cetak_detilakademik/$1';
$route['akademik/(:any)'] = 'akademik/lihat_detilakademik/$1';
$route['siswa/akademik/(:any)'] = 'siswa/detilakademik/$1';
$route['siswa/tagihan/(:any)'] = 'siswa/detilpembayaran/$1';
$route['pembayaran/cetak-pembayaran/(:any)'] = 'pembayaran/cetak_pembayaran/$1';
$route['tagihan/cetak-tagihan/(:any)'] = 'tagihan/cetak_tagihan/$1';
$route['tambah/walimurid'] = 'walimurid/tambah_walimurid';
$route['pembayaran/(:any)'] = 'pembayaran/lihatdetilpembayaran/$1';
