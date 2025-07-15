<?php

// Endpoint da API
$url = "http://api.agilize.app/crm/lead/lead";

// Dados a serem enviados (em formato JSON)
$data = [
    "name" => "Nome lead",
    // "tags" => ["68141cd4da5bfc9d9c85b20f"],
    "phones" => [
        ["phone" => "+551143214321"]
    ],
    "emails" => [
        ["email" => "sample@sample.com"]
    ]
];

// Converte o array PHP em JSON
$jsonData = json_encode($data);

// Inicializa o cURL
$ch = curl_init($url);

// Define os headers
$headers = [
    "Accept: application/json",
    "Content-Type: application/json",
    "x-api-key: SUA_CHAVE_DE_INTEGRACAO_AQUI"
];

// Configurações do cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Executa a requisição
$response = curl_exec($ch);

// Verifica se houve erro
if (curl_errno($ch)) {
    echo 'Erro na requisição: ' . curl_error($ch);
} else {
    // Imprime a resposta da API
    echo "Resposta da API:\n";
    echo $response;
}

// Fecha a conexão cURL
curl_close($ch);
