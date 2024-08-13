<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class PrintController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function print($hid)
	{
		$report = ReportH::find($hid);

		if (!$report) route_redirect('reports');

		$start = get('s');
		$end = get('e');

		if (!$start || !$end) route_redirect('reports');

		$this->load->library('Fpdfci');

		$pdf = $this->fpdfci->new();

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->SetTitle('Report');
		$pdf->AddPage();

		$pdf->SetFont('Arial', 'B', 16);

		$pdf->MultiCell(0, 5, $report->title, '', 'C');

		$pdf->Ln(3);		

		$pdf->SetFont('Arial', '', 12);

		$pdf->MultiCell(0, 5, date('M. d, Y', strtotime($start)).' - '.date('M. d, Y', strtotime($end)), '', 'C');

		$pdf->Ln(10);

		$pdf->SetFont('Arial', 'B', 12);

		$table = new easyTable($pdf, 2, "border:1; align:{CC}");

        $table->easyCell('Item');
        $table->easyCell('Value');
        // $table->easyCell('Date Time');
        $table->printRow(true);

        $pdf->SetFont('Arial', '', 12);

        $data = ReportD::where('hid', $report->id)
        ->whereBetween(DB::raw('date(created_at)'), [$start, $end])
        ->get();

        # $data = ReportD::get();

        foreach ($data as $d) 
        {
			$table->easyCell($d->name);
	        $table->easyCell($d->value);
	        // $table->easyCell($d->created_at->format('M. d, Y h:i A'));
	        $table->printRow();        	
        }

        $table->endTable();

        $pdf->Ln(10);

        $user = AppUser::with('rel_user_extension')->find(sess_id());

        $y = $pdf->getY();

        $pdf->MultiCell(70, 7, $user->name, '', 'C');

        $pdf->setY($y);
        $pdf->setX($pdf->GetPageWidth() - 80);
		$pdf->MultiCell(70, 7, date('M. d, Y'), '', 'C');        

        $pdf->SetFont('Arial', 'B', 12);

        $y = $pdf->getY();

        $pdf->MultiCell(70, 7, "Prepared By", 'T', 'C');

        $pdf->setY($y);
        $pdf->setX($pdf->GetPageWidth() - 80);
        $pdf->MultiCell(70, 7, "Date Printed", 'T', 'C');

		$pdf->Output();
	}
}
