<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true);

    if ($data && isset($data['script']) && isset($data['error'])) {

        $logFilePath = __DIR__. '/app/logs/erreurJS.txt';

        // On s'assure que le dossier existe (au cas où)
        $logDir = dirname($logFilePath);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $timestamp = date('Y-m-d H:i:s');
        $script = strip_tags($data['script']);
        $errorMsg = strip_tags($data['error']);

        $logLine = "[$timestamp] SCRIPT: $script | ERREUR: $errorMsg" . PHP_EOL;

        if (file_put_contents($logFilePath, $logLine, FILE_APPEND | LOCK_EX)) {
            echo json_encode(['status' => 'ok', 'message' => 'Log enregistré']);
            exit;
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Erreur écriture fichier']);
        }
    }
}

http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Données invalides']);
?>