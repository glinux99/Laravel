<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class pdfController extends Controller
{
    
    public function index(Request $request){
        $db = session('trans_pdf');
        $this->fpdf = new Fpdf('P','mm','A4');
        $this->fpdf->AddPage();
        // Saut de ligne 20 mm
        $this->fpdf->AliasNbPages();
        $this->fpdf->Image('assets/img/logo1.png',10,6,15);
		// Saut de ligne 20 mm
		$this->fpdf->Ln(5);

		// Titre gras (B) police Helbetica de 11
		$this->fpdf->SetFont('Helvetica','B',11);
		// fond de couleur gris (valeurs en RGB)
		$this->fpdf->setFillColor(230,230,230);
 		$this->fpdf->SetX(70);
        $this->fpdf->Cell(60,8,'NURU BANQUE RAPPORT',0,1,'C',1);
        
        $this->fpdf->Cell(0,10,'Nuru_banque@2022 sur www.nurubanque.cd ',0,0,'C', );
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Helvetica','I',11);
        $codex = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6);
        $codex = substr(str_shuffle("0123456789"), 0, 6).'.'.$codex;
		$codex = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$codex;
		$codex = substr(str_shuffle("0123456789"), 0, 6).'.'.$codex;
		$codex = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$codex;
		$this->fpdf->Cell(110,8,'ID-RAPPORT: '.$codex,0,1,'L',1);
        $this->fpdf->Ln(1);
        $this->fpdf->Cell(110,8,'Client: '.session('nom_cli_trans'),0,1,'L',1);
        $this->fpdf->Ln(1);
        $this->fpdf->Cell(110,8,'Matricule Client: '.session('matCli'),0,1,'L',1);
        $this->fpdf->Ln(1);
        $date = date('d-m-Y h:i:s');
        $this->fpdf->Cell(110,8,'Date: '.$date,0,1,'L',1);
       //entete
       $this->fpdf->Ln(8);
            $this->fpdf->SetX(2);
            $this->fpdf->SetFont('Helvetica','',10);
            $this->fpdf->Cell(8,8, '#',1,0,'C');
            $this->fpdf->SetX(10);
            $this->fpdf->Cell(38,8, 'Date / Heure',1,0,'C');
            $this->fpdf->SetX(48);
            $this->fpdf->Cell(60,8, "Transaction ID",1,0,'C');
            $this->fpdf->SetX(108); 
            //mot doit etre inferieur a 30 cad 30-12
            if(session('account')==='Client') $this->fpdf->Cell(60,8, 'Motif de la transaction',1,0,'C');
            else $this->fpdf->Cell(60,8, 'Matricule du Client / Nom',1,0,'C');
            $this->fpdf->SetX(168);
            $this->fpdf->Cell(20,8, "Solde($)",1,0,'C');
            $this->fpdf->SetX(188); 
            $this->fpdf->Cell(20,8, "Montant($)",1,0,'C');
        foreach($db as $items){
            $this->fpdf->Ln(8);
            $this->fpdf->SetX(2);
            $this->fpdf->Cell(8,8, $items->id,1,0,'C');
            $this->fpdf->SetX(10);
            $this->fpdf->Cell(38,8, $items->date_trans,1,0,'C');
            $this->fpdf->SetX(48);
            $this->fpdf->Cell(60,8, $items->trans_mat,1,0,'C');
            $this->fpdf->SetX(108); 
            //mot doit etre inferieur a 30 cad 30-12
            if(session('account')==='Client') $this->fpdf->Cell(60,8, $items->motif,1,0,'C');
            else{
                $this->fpdf->SetFont('Helvetica','',8);
                $this->fpdf->Cell(60,8,$items->client_mat.' / '.$items->nom.' '.$items->prenom ,1,0,'C');
                $this->fpdf->SetFont('Helvetica','',10);
            }
            $this->fpdf->SetX(168);
            $this->fpdf->Cell(20,8, $items->solde,1,0,'C');
            $this->fpdf->SetX(188); 
            $this->fpdf->Cell(20,8, $items->montant_ret,1,0,'C');
      }
    //footer
        $this->fpdf->SetY(0);
		// Police Arial italique 8
		$this->fpdf->SetFont('Helvetica','I',9);
		// // Numéro de page, centré (C)
        // $this->fpdf->Line(200,283,10,283);
        $this->fpdf->Cell(0,10, 'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'C');
        $this->fpdf->Ln(5);
        $this->fpdf->Line(200,30,10,30);
    $this->fpdf->Output();
    exit;  
    }
}
