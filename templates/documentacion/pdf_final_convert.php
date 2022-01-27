<?php
namespace Qwadmin\Controller;
// Importar biblioteca TCPDF
use TCPDF;
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
// Importar biblioteca FPDI,
// Encontré muchos problemas aquí. Solo escribiendo de esta manera no puedo reportar un error que diga que setasign \ Fpdi no se puede encontrar.
// Entonces puedes crear una instancia de la clase fpdi a continuación (no sé si tienes otra forma, lo escribí así)
use setasign\Fpdi;
use setasign\Fpdi\PdfReader;
require_once ('Fpdi/autoload.php');
class DirectorsController extends ComController{	
	?===Tu codigo===?
	public function hbpdf($id=''){
        $address = M('filesaddress','qw_')->where(array('conferenceid'=>$id))->select();
//        foreach ($address as $k=>$v){
//            $path=$path.$v['address'].',';
//        }
//        exec("python D:\python\hbpdf\Include\hbpdf.py {$path}",$out,$res);
//        print_r($out);
 Ignore la sección de comentarios. Llamo código python para lograrPDFCombinado conPYPDF2Biblioteca de clases para completar
        foreach ($address as $k=>$v){
            $pdf_road_datas[$k]=$v['address'];
        }
        $pdf = new Fpdi\Tcpdf\Fpdi();="Aquí hay un hoyo, solo puedo escribir así al crear una instancia (no sé cuál es tu escritura)
        foreach ($pdf_road_datas as $k=>$v){
            $page_count = $pdf->setSourceFile($v);
 ¡El punto está aquí! ! ! Cuando escribí, informó un error diciendo que no se llamó a la clase setSourceFile, pero yoCTRLSe pueden encontrar códigos de persecución, ¡pozo enorme! ! ! !
            var_dump($page_count);die();
            for ($pageNo = 1; $pageNo <= $page_count; $pageNo++) {
// Leer el PDF página por página y agregarlo a un nuevo PDF
                $templateId = $pdf->importPage($pageNo);
 Esta importPage también es un pozo, por lo que no puedo encontrar la identificación del dispositivo de lectura (). ? El documento no dice qué identificación es el lector.
                $size = $pdf->getTemplateSize($templateId);
                $pdf->AddPage($size['orientation'], $size);
                $pdf->useTemplate($templateId);
                $pdf->Close();
            }
        }
        $pdf->Output('777.pdf','I');
    }
}
?>
