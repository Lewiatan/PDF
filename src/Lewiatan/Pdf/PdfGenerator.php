<?php namespace Lewiatan\Pdf;

use Illuminate\Support\Facades\Response;
use Mpdf\Mpdf;

class PdfGenerator {
    public function __construct(Mpdf $mPDF){
        $this->mpdf = $mPDF;
    }

    public function blankDocument($name = false, $orientation = 'A4') {
        return $this;
    }

    public function show() {
        return $this->mpdf->Output();
    }

    public function download() {
        return $this->mpdf->Output('', 'D');
    }

    public function addCss($css) {
        $this->mpdf->writeHTML(file_get_contents($css), 1);

        return $this;
    }

    public function addHtml($html) {
        $this->mpdf->writeHTML($html, 2);

        return $this;
    }

    public function addDocument($html) {
        $this->mpdf->writeHTML($html);

        return $this;
    }

    public function addPageWithHtml($html){
        $this->addPage();
        $this->addHtml($html);

        return $this;
    }

    public function addPageWithDocument($html){
        $this->addPage();
        $this->addDocument($html);

        return $this;
    }

    public function bookmark($html, $level = 0) {
        $this->mpdf->Bookmark($html, $level);

        return $this;
    }

    public function addPage() {
        $this->mpdf->AddPage();

        return $this;
    }

    public function setHeader($html) {
        $this->mpdf->setHTMLHeader($html);

        return $this;
    }
}
