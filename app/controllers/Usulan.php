<?php
class Usulan extends Controller
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
        $data['title'] = 'Data Usulan';
        $data['tb_usulan'] = $this->model('UsulanKegiatanModel')->getAllUsulan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('usulan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Usulan';
        $data['tb_usulan'] = $this->model('UsulanKegiatanModel')->cariUsulan();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('usulan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Usulan';
        $data['tb_usulan'] = $this->model('UsulanKegiatanModel')->getUsulanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('usulan/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Usulan';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('usulan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanUsulan()
    {
        if ($this->model('UsulanKegiatanModel')->tambahUsulan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/usulan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/usulan');
            exit;
        }
    }

    public function updateUsulan()
    {
        if ($this->model('UsulanKegiatanModel')->updateDataUsulan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/usulan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/usulan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('UsulanKegiatanModel')->deleteUsulan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/usulan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/usulan');
            exit;
        }
    }
}
