<?php
$xml = new DOMDocument;
$xml->load('candidates.xml');
$x = $xml->getElementsByTagName('candidates')->item(0);
$fr = $x->getElementsByTagName('candidate');
$i = 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($fr as $candidate) {
        $candidateId = $candidate->getElementsByTagName('id')->item(0)->nodeValue;
        if ($candidateId == $id) {
            $x->removeChild($candidate);
            break;
        }
    }
    $xml->save('candidates.xml');
    header('Location: manage-candidates.php');
    exit;
}
?>