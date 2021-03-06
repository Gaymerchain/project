<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Pdf {
	function pdf_create($html, $filename, $stream=TRUE){
	    require_once(APPPATH."third_party/Dompdf/dompdf_config.inc.php");//Require Loader Class n Config
	    spl_autoload_register('DOMPDF_autoload');//Autoload Resource
 
	    $dompdf = new DOMPDF();//Instansiasi
	    $dompdf->load_html($html);//Load HTML File untuk dirender
	    $dompdf->render();//Proses Rendering File
	    if ($stream) {
		$dompdf->stream($filename.".pdf");
	    } else {
		$CI =& get_instance();
		$CI->load->helper('file');
		write_file($filename, $dompdf->output());//file name adalah ABSOLUTE PATH dari tempat menyimpan file PDF
	    }
	}
}

/**
public function index(){
	
	$this->load->library('pdf');
	$file_pdf = $this->load->view('welcome_message','',TRUE);//Save as variable
	$this->pdf->pdf_create($file_pdf,'welcome');
	
}
*/
?>