<?php
class Subkegiatan extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Subkegiatan';
        $data['tb_subkegiatan'] = $this->model('SubKegiatanModel')->getAllSubkegiatan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('subkegiatan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Subkegiatan';
        $data['tb_subkegiatan'] = $this->model('SubKegiatanModel')->cariSubkegiatan();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('subkegiatan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Subkegiatan';
        $data['tb_subkegiatan'] = $this->model('SubKegiatanModel')->getSubkegiatanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('subkegiatan/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Sub Kegiatan';
        $data['tb_subkegiatan'] = $this->model('SubKegiatanModel')->getAllSubKegiatan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('subkegiatan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanSubkegiatan()
    {
        if ($this->model('SubKegiatanModel')->tambahSubkegiatan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/subkegiatan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/subkegiatan');
            exit;
        }
    }

    public function updateSubkegiatan()
    {
        if ($this->model('SubKegiatanModel')->updateDataSubkegiatan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/subkegiatan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/subkegiatan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('SubKegiatanModel')->deleteSubkegiatan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/subkegiatan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/subkegiatan');
            exit;
        }
    }
}
