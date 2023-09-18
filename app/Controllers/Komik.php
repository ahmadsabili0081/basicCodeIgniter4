<?php

namespace App\Controllers;

use App\Models\Komik_model;

class Komik extends BaseController
{
  protected $komikModel;
  public function __construct()
  {
    // hampir sama kayak di ci 3
    // $this->load->model('Komik_model');
    // $getdata = $this->Komik_model->getData();
    // kalo tidak pake instanse;
    $this->komikModel = new Komik_model();
  }
  public function index()
  {
    // kalau cara tidak rapih
    // $komik  = $this->komikModel->findAll();
    $data = [
      'title' => "Halaman Komik",
      'komik' => $this->komikModel->getKomik(),
    ];

    // cara kalo pake instanse model
    // $komikModel = new \App\Models\Komik_model();
    return view('pages/komik', $data);
  }
  public function detail($judul)
  {
    $data = [
      'title' => "Halaman Detail Komik",
      'komik' => $this->komikModel->getKomik($judul)
    ];
    if (empty($data['komik'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik' . ' ' . $judul . ' ' . 'Tidak Ditemukan!');
    }
    return view('pages/detail_komik', $data);
  }
  public function create_komik()
  {
    // session ditaro di base controller
    // session();
    $data = [
      'title' => "Tambah Data Komik",
      // menggunakan operator coalescing dalam PHP, jika nilai disebelah kiri operator null akan nilai default di sebelah kanan
      'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
    ];
    return view('pages/create_komik', $data);
  }
  public function save_komik()
  {
    // validasi input

    if (!$this->validate([
      'judul' => [
        'rules' => 'required|is_unique[tb_komik.judul]',
        'errors' => [
          'required' => 'Kolom Judul Harus Terisi!',
          'is_unique' => "Kolom Judul Yang Anda Masukkan Sudah Terdaftar!"
        ]
      ],
      'penerbit' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kolom Penerbit Harus Terisi!'
        ]
      ],
      'penulis' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kolom Penulis Harus Terisi!'
        ]
      ],
      'gambar' => [
        'rules' => 'max_size[gambar,2024]|is_image[gambar]|ext_in[gambar,png,jpeg,jpg]|mime_in[gambar,image/png,image/jpeg,image/jpg]',
        'errors' => [
          'max_size' => "Kolom Gambar Maksimum Ukuran 2MB",
          'is_image' => "Yang anda Masukkan Gambar!",
          'mime_in' => "File Yang Anda Upload Bukan Bertipe JPG,JPEG,PNG!",
          'ext_in' => "Anda Mencoba Mengupload Yang Bukan Seharusnya!"
        ],
      ],
    ])) {


      session()->setFlashdata('validation', \Config\Services::validation());

      return redirect()->to('/Komik/create_komik')->withInput();
    }

    $gambarFile = $this->request->getFile('gambar');
    if ($gambarFile->getError() == 4) {
      $namaGambar = 'default.png';
    } else {
      $namaGambar = $gambarFile->getRandomName();
      $gambarFile->move('images', $namaGambar);
    }

    // method $this->request->getVar() mau ambil seluruh data dari form
    // url title adalah untuk membuat huruf string menjadi huruf kecil semua dan spasinya hilang diganti dengan -
    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'judul' => $this->request->getVar('judul'),
      'penerbit' => $this->request->getVar('penerbit'),
      'penulis' => $this->request->getVar('penulis'),
      'gambar' => $namaGambar,
      'slug' => $slug
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    return redirect()->to('/Komik');
  }
  public function delete_komik($id)
  {
    $komik = $this->komikModel->find($id);
    if ($komik['gambar'] != 'default.png') {
      unlink('images/' . $komik['gambar']);
    }
    $this->komikModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    return redirect()->to('/Komik');
  }
  public function Edit_Komik($slug)
  {
    $data = [
      'title' => "Form Edit Data",
      'komik' => $this->komikModel->getKomik($slug),
      'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
    ];
    return view('pages/edit_komik', $data);
  }
  public function save_ubah($id)
  {
    $ambilKomikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
    if ($ambilKomikLama['judul'] == $this->request->getVar('judul')) {
      $rules = 'required';
    } else {
      $rules = 'required|is_unique[tb_komik.judul]';
    }
    if (!$this->validate([
      'judul' => [
        'rules' => $rules,
        'errors' => [
          'required' => 'Kolom Judul Harus Terisi!',
          'is_unique' => "Kolom Judul Yang Anda Masukkan Sudah Terdaftar!"
        ]
      ],
      'penerbit' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kolom Penerbit Harus Terisi!'
        ]
      ],
      'penulis' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kolom Penulis Harus Terisi!'
        ]
      ],
      'gambar' => [
        'rules' => 'max_size[gambar,2024]|is_image[gambar]|ext_in[gambar,png,jpeg,jpg]|mime_in[gambar,image/png,image/jpeg,image/jpg]',
        'errors' => [
          'max_size' => "Kolom Gambar Maksimum Ukuran 2MB",
          'is_image' => "Yang anda Masukkan Gambar!",
          'mime_in' => "File Yang Anda Upload Bukan Bertipe JPG,JPEG,PNG!",
          'ext_in' => "Anda Mencoba Mengupload Yang Bukan Seharusnya!"
        ],
      ],
    ])) {
      // method Chaining dibawah, ngirimin 2 hal, yang pertama withInput(semua input yang udah kita ketika) dan with(data validation nya)
      session()->setFlashdata('validation', \Config\Services::validation());
      return redirect()->to('/Komik/Edit_Komik/' . $this->request->getVar('slug'))->withInput();
    }

    $gambarFile = $this->request->getFile('gambar');
    // ini mengecek kalo file nya tidak di upload
    if ($gambarFile->getError() == 4) {
      $namaGambar  = $this->request->getVar('gambarLama');
    } else {
      $namaGambar = $gambarFile->getRandomName();
      $gambarFile->move('images', $namaGambar);
      unlink('images/' . $this->request->getVar('gambarLama'));
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'id_komik' => $id,
      'judul' => $this->request->getVar('judul'),
      'penerbit' => $this->request->getVar('penerbit'),
      'penulis' => $this->request->getVar('penulis'),
      'gambar' => $namaGambar,
      'slug' => $slug
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
    return redirect()->to('/Komik');
  }
}
