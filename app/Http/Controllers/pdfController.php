<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class pdfController extends Controller
{
    
    public function index(){
        $db = \DB::table('Transactions')->get();
        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage();
        // Saut de ligne 20 mm
		$this->fpdf->Ln(0);

		// Titre gras (B) police Helbetica de 11
		$this->fpdf->SetFont('Helvetica','B',11);
		// fond de couleur gris (valeurs en RGB)
		$this->fpdf->setFillColor(230,230,230);
 		$this->fpdf->SetX(70);
		$this->fpdf->Cell(60,8,'NURU BANQUE RAPPORT',0,1,'C',1);
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Helvetica','I',11);
        $codex = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6);
        $codex = substr(str_shuffle("0123456789"), 0, 6).'.'.$codex;
		$codex = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$codex;
		$codex = substr(str_shuffle("0123456789"), 0, 6).'.'.$codex;
		$codex = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$codex;
		$this->fpdf->Cell(105,8,'ID-RAPPORT: '.$codex,0,1,'L',1);
		$this->fpdf->Ln(1);
       
        foreach($db as $items){
            $this->fpdf->Ln();
            $this->fpdf->Cell(40,5, $items->id,'C');
            $this->fpdf->SetX(20);
            $this->fpdf->Cell(40,5, $items->date_trans);
            $this->fpdf->Cell(40,5, $items->montant_ret);
            $this->fpdf->Cell(40,5, $items->solde);
            $this->fpdf->Cell(40,5, $items->motif);
            $this->fpdf->Cell(40,5, $items->trans_mat);
            $this->fpdf->Cell(40,5, $items->client_mat);
            $this->fpdf->Cell(40,5, $items->benef_mat);
      }
    //footer
        $this->fpdf->SetY(-15);
		// Police Arial italique 8
		$this->fpdf->SetFont('Helvetica','I',9);
		// Numéro de page, centré (C)
		$this->fpdf->Line(200,283,10,283);
		$this->fpdf->Cell(0,10,'Nuru_banque@2022 sur www.nurubanque.cd ',0,0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(0,10, 'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'C');
    $this->fpdf->Output();
    exit;  
    }
}
