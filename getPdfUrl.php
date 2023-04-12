<?php

$objectId = $_GET['objectId'] ?? '';
if (!$objectId) die();
$url = 'https://mooc1.chaoxing.com/ananas/status/' . $objectId;
while (true) {
    $data = file_get_contents($url, false, stream_context_create([
        'http' => ['header' => 'Referer: github@oyps']
    ]));
    $json = json_decode($data, true);
    $status = $json['status'];
    if ($status == 'success') {
        $pdfUrl = $json['pdf'];
        header('Location: ' . $pdfUrl);
        break;
    }
}
