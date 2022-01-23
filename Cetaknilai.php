<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cetaknilai extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
	function index()
	{
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'Daftra Nilai TBQ',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(90,6,'NIM',1,0,'C');
        $pdf->Cell(120,6,'Nilai',1,0,'C');
        $pdf->Cell(40,6,'Keterangan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $nilai = $this->db->get('nilai')->result();
        $no=0;
        $keterangan = "Tidak Ada";
        foreach ($nilai as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(90,6,$data->nim,1,0);
            $pdf->Cell(120,6,$data->nilai,1,0);
            $pdf->Cell(40,6,$keterangan ,1,1);
        }
        $pdf->Output();
	}
}