<?php
class laporankas extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Path lengkap ke file fpdf.php
        $fpdf_path = APPPATH . 'libraries/fpdf/fpdf.php';

        // Memuat file fpdf.php
        require_once($fpdf_path);
    }

    public function index() {
        // Gunakan fpdf atau inisialisasi kelas FPDF sesuai kebutuhan
        // Misalnya:
        $pdf = new FPDF();
        // Lakukan operasi lainnya dengan FPDF
    }
}