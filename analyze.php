<?php
// analyze.php
header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resume_text = $_POST["resume"];
    $prompt = "Analyze the following resume and give recommendations for improvement:\


    $url = "https://api.openai.com/v1/engines/davinci-codex/completions";
    $data = [
        "prompt" => $prompt,
        "max_tokens" => 1000,
        "n" => 1,
        "stop" => null,
        "temperature" => 0.7,
    ];

    $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer " . getenv("OPENAI_API_KEY"),
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    error_log("Sending request to OpenAI API..."); // Debug message

    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        echo "An error occurred. Please try again.";
        error_log("cURL Error: " . $err); // Debug message
    } else {
        $json_response = json_decode($response, true);
        $recommendations = $json_response["choices"][0]["text"];
        echo nl2br(trim($recommendations));
    }
}
