<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KoordinatorController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "koordinator") {
      echo 'Access denied';
      exit;
    }
  }

  public function index()
  {
    return view("koordinator/dashboard");
  }

  public function dokumen()
  {
    $db = \Config\Database::connect();
    return view("koordinator/dokumen", [
      'students' => $db->table('tbl_siswa')->select()->get(),
    ]);
  }

  public function penilaian()
  {
    // penilaian per siswa
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    return view("koordinator/dokumen_detail", [
      'student' => $db->table('tbl_siswa')->select()->join('tbl_penilaian', 'tbl_penilaian.id_siswa = tbl_siswa.id_siswa', 'inner')->where('tbl_siswa.id_siswa', $request->getUri()->getSegment(3))->get(),
    ]);
  }

  public function save_nilai()
  {
    $db = \Config\Database::connect();

    $db->table('tbl_penilaian')->set('nilai', $this->request->getPost('nilai'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Nilai berhasil disimpan');
    // var_dump($this->request);
    return redirect()->to(base_url('koordinator/dokumen'));
  }

  public function rapor()
  {
    return view("koordinator/rapor");
  }

  public function rekapNilai()
  {
    return view("koordinator/rekapNilai");
  }
}
