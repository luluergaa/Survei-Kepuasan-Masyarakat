<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Laporan_pdf extends Dompdf
{
	protected $ci;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'portrait')
	{
		$dompdf = new Dompdf();
		$html = $this->CI->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		// Render the HTML as PDF
		$dompdf->render();
		$dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
	}
}
 
/* End of file Laporan_pdf.php */
/* Location: ./system/application/libraries/Laporan_pdf.php */