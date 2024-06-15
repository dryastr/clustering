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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Data Karyawan Keseluruhan
$route['karyawan'] = 'KaryawanController/index';
$route['karyawan/create'] = 'KaryawanController/create';
$route['karyawan/store'] = 'KaryawanController/store';
$route['karyawan/edit/(:any)'] = 'KaryawanController/edit/$1';
$route['karyawan/update'] = 'KaryawanController/update';
$route['karyawan/delete/(:num)'] = 'KaryawanController/destroy/$1';

// Data Barang Keseluruhan
$route['data-barang'] = 'DataBarangController/index';
$route['data-barang/create'] = 'DataBarangController/create';
$route['data-barang/store'] = 'DataBarangController/store';
$route['data-barang/edit/(:any)'] = 'DataBarangController/edit/$1';
$route['data-barang/update'] = 'DataBarangController/update';
$route['data-barang/delete/(:num)'] = 'DataBarangController/destroy/$1';
$route['data-barang/cetak-pdf'] = 'DataBarangController/cetak_pdf';

// Data Barang Masuk
$route['data-barang-masuk'] = 'DataBarangMasukController/index';
$route['data-barang-masuk/create'] = 'DataBarangMasukController/create';
$route['data-barang-masuk/store'] = 'DataBarangMasukController/store';
$route['data-barang-masuk/edit/(:any)'] = 'DataBarangMasukController/edit/$1';
$route['data-barang-masuk/update'] = 'DataBarangMasukController/update';
$route['data-barang-masuk/delete/(:num)'] = 'DataBarangMasukController/destroy/$1';

// Data Barang Keluar
$route['data-barang-keluar'] = 'DataBarangKeluarController/index';
$route['data-barang-keluar/create'] = 'DataBarangKeluarController/create';
$route['data-barang-keluar/store'] = 'DataBarangKeluarController/store';
$route['data-barang-keluar/edit/(:any)'] = 'DataBarangKeluarController/edit/$1';
$route['data-barang-keluar/update'] = 'DataBarangKeluarController/update';
$route['data-barang-keluar/delete/(:num)'] = 'DataBarangKeluarController/destroy/$1';

// Data Clustering
$route['data-clustering'] = 'ClusteringDataBarangController/index';
$route['data-clustering/upload-excel/submit'] = 'ClusteringDataBarangController/uploadExcel';
$route['tentukan-clustering'] = 'ClusteringDataBarangController/processView';
$route['tentukan-clustering/process'] = 'ClusteringDataBarangController/process';
$route['hasil-clustering'] = 'ClusteringDataBarangController/clusterResultView';
