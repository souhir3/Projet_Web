<?php
include '../Controller/ReponseC.php';

$reponseC = new ReponseC();
$list = $reponseC->listReponses();

if (isset($_POST["type"]) && $_POST["type"] === "pdf") {
    require 'vendor/autoload.php';
    require 'vendor/tecnickcom/tcpdf/tcpdf.php';
    error_reporting(E_ALL); // Afficher toutes les erreurs pour le débogage, désactiver en production
    ob_start(); // Commencer la mise en tampon de sortie

    // Create new PDF instance
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Reponse List Table PDF');
    $pdf->SetSubject('Reponse List Table');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('dejavusans', '', 10); // Slightly smaller font for better table readability

    // Output the HTML content with custom design
    $html = '<h1 style="text-align: center;"> Reponse List Table</h1>';
    $html .= '<style>';
    $html .= 'table { width: 100%; border-collapse: collapse; }';
    $html .= 'th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }';
    $html .= 'thead { background-color: #f2f2f2; }';
    $html .= 'tr:nth-child(even) { background-color: #f9f9f9; }'; // Zebra striping for rows
    $html .= '</style>';
    $html .= '<table>';
    $html .= '<thead><tr><th>idrep</th><th>emailrep</th><th>messagerep</th><th>idrec</th></tr></thead>';
    $html .= '<tbody>';

    foreach ($list as $reponse) {
        $html .= '<tr>';
        $html .= '<td>' . $reponse['idrep'] . '</td>';
        $html .= '<td>' . $reponse['emailrep'] . '</td>';
        $html .= '<td>' . $reponse['messagerep'] . '</td>';        
        $html .= '<td>' . $reponse['idrec'] . '</td>';
       
        
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    ob_end_clean(); // Clear output buffer before sending the PDF
    $pdf->Output('Reponse List_table.pdf', 'D'); // Output the PDF for download
    exit;
}
?>
