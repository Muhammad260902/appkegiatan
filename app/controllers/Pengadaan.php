<?php
class Pengadaan extends Controller
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
        $data['title'] = 'Data Pengadaan';
        $data['tb_pengadaan'] = $this->model('PengadaanModel')->getAllPengadaan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengadaan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Pengadaan';
        $data['tb_pengadaan'] = $this->model('PengadaanModel')->cariPengadaan();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengadaan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Pengadaan';
        $data['tb_subkegiatan'] = $this->model('SubKegiatanModel')->getAllSubkegiatan();
        $data['tb_pengadaan'] = $this->model('PengadaanModel')->getPengadaanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengadaan/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pengadaan';
        $data['tb_subkegiatan'] = $this->model('SubKegiatanModel')->getAllSubkegiatan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengadaan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPengadaan()
    {
        if ($this->model('PengadaanModel')->tambahPengadaan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/pengadaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/pengadaan');
            exit;
        }
    }

    public function updatePengadaan()
    {
        if ($this->model('PengadaanModel')->updateDataPengadaan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/pengadaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/pengadaan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PengadaanModel')->deletePengadaan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/pengadaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/pengadaan');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Pengadaan';
        $data['tb_pengadaan)'] = $this->model('PengadaanModel')->getAllPengadaan();
        $this->view('pengadaan/lihatlaporan', $data);
    }


    public function laporan()
    {
        $data['tb_pengadaan'] = $this->model('PengadaanModel')->getAllPengadaan();
        $pdf = new FPDF('p', 'mm', 'A4');

        // membuat halaman baru 
        $pdf->AddPage();
        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string  
        $pdf->Cell(195, 7, 'LAPORAN PENGADAAN BARANG', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat 
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(35, 6, 'KODE SUB KEGIATAN', 1);
        $pdf->Cell(85, 6, 'SUB KEGIATAN', 1);
        $pdf->Cell(30, 6, 'NAMA BARANG', 1);
        $pdf->Cell(10, 6, 'JUMLAH', 1);
        $pdf->Cell(25, 6, 'HARGA', 1);
        $pdf->Cell(25, 6, 'TOTAL', 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);

        foreach ($data['tb_pengadaan'] as $row) {
            $pdf->Cell(35, 6, $row['kode_sub_kegiatan'], 1);
            $pdf->Cell(85, 6, $row['nama_sub_kegiatan'], 1);
            $pdf->Cell(30, 6, $row['nama_barang'], 1);
            $pdf->Cell(10, 6, $row['jumlah'], 1);
            $pdf->Cell(25, 6, $row['harga'], 1);
            $pdf->Cell(25, 6, $row['total'], 1);
            $pdf->Ln();
        }

        $pdf->Output('I', 'Laporan Pengadaan Barang.pdf', true);
    }
}
