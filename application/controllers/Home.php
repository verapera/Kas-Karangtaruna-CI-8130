<?php
function rupiah($angka){
    $hasil = "Rp " . number_format($angka,0,',','.' );
    return $hasil;

  $pemasukan = $this->Transaksi_model->pemasukan();
  $pengeluaran = $this->Transaksi_model->pengeluaran();
  $saldo_akhir = $pemasukan - $pengeluaran;
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->library('Pdf');
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
        $this->load->model('User_model');
        // memanggil function user_model dan menjalankan fungsinya meskipun fungsi lain di jalankan, 
		// karena fungsi itu sudah pasti dijalankan
    }
	public function index()
	{
		$this->template->load('layout/template','dashboard');
	}
	public function laporan(){
		$tanggal1 = $this->input->get('tanggal1');
		$tanggal2 = $this->input->get('tanggal2');
		$this->db->from('transaksi');
        $this->db->where("tanggal >= ",$tanggal1);
        $this->db->where("tanggal <= ",$tanggal2);
        $this->db->order_by("tanggal",'ASC');
		$laporan = $this->db->get()->result_array();
		$data = array(
			'tanggal1' =>$tanggal1,
			'tanggal2' =>$tanggal2,
			'laporan' =>$laporan,
		);

		 // Path lengkap ke file fpdf.php
		 $fpdf_path = APPPATH . 'libraries/fpdf/fpdf.php';

		 // Memuat file fpdf.php
		 require_once($fpdf_path);
		 $pdf = new FPDF();
		// $this->load->view('laporan',$data);
		$pdf->AddPage();

        // Menambahkan konten ke PDF
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,10,"Laporan dari $tanggal1 sampai $tanggal2",0,1,'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(10,5,'No',1,0,'C');
		$pdf->Cell(25,5,'Tanggal',1,0,'C');
		$pdf->Cell(60,5,'Keterangan',1,0,'C');
		$pdf->Cell(25,5,'Pemasukan',1,0,'C');
		$pdf->Cell(25,5,'Pengeluaran',1,0,'C');
		$pdf->Cell(25,5,'Saldo',1,1,'C');
		$pdf->SetFont('Arial','',11);

		$saldo = $this->Transaksi_model->saldo_awal($tanggal1);
		$saldo_awal = rupiah($saldo);
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(10,5,'',1,0,'C');
		$pdf->Cell(85,5,"Saldo awal sebelum tanggal $tanggal1",1,0,'C');
		$pdf->Cell(25,5,'',1,0,'C');
		$pdf->Cell(25,5,'',1,0,'C');
		$pdf->Cell(25,5,$saldo_awal,1,1,'C');
		$pdf->SetFont('Arial','',11);
		$no = 1;
		$saldo = 0;
		foreach($laporan as $a){
		$pdf->Cell(10,5,$no,1,0,'C');
		$pdf->Cell(25,5,$a['tanggal'],1,0,'C');
		$pdf->Cell(60,5,$a['keterangan'],1,0,'C');
		if($a['jenis_transaksi']=='Pemasukan'){
			$pdf->Cell(25,5,rupiah($a['nominal']),1,0,'R');
			$pdf->Cell(25,5,'',1,0,'R');
			
		}else{
			$pdf->Cell(25,5,'',1,0,'R');
			$pdf->Cell(25,5,rupiah($a['nominal']),1,0,'R');
		}
		$saldo = $saldo+$a['nominal'];
		$pdf->Cell(25,5,rupiah($saldo),1,1,'R');
		$no++;
		}
        // Output PDF
        $pdf->Output();
	}
}


