<?php
// analyze.php
header('Content-Type: text/html; charset=utf-8');

$env = parse_ini_file(__DIR__ . '/.env');
$api_key = isset($env['OPENAI_API_KEY']) ? $env['OPENAI_API_KEY'] : null;

// Check if the API key is loaded
if (!$api_key) {
    die("OPENAI_API_KEY not found in .env file.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resume_text = $_POST["resume"];
    $prompt = "Analyze the following resume and give recommendations for improvement:\n" . $resume_text . "\nRecommendations:";

    $url = "https://api.openai.com/v1/engines/davinci-codex/completions";
    $data = [
        "prompt" => $prompt,
        "max_tokens" => 100,
        "n" => 1,
        "stop" => null,
        "temperature" => 0.7,
    ];

    $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer " . $api_key,
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
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get the HTTP status code
    curl_close($ch);

    if ($err) {
        echo "An error occurred. Please try again.";
        error_log("cURL Error: " . $err); // Debug message
    } else {
        $json_response = json_decode($response, true);

        // Check if the response has a "choices" key
        if (isset($json_response["choices"])) {
            $recommendations = $json_response["choices"][0]["text"];
            echo nl2br(trim($recommendations));
        } else {
            echo "An error occurred. Please try again.";
            error_log("OpenAI API Error: " . $response); // Debug message
            error_log("HTTP Status Code: " . $http_status); // Debug message
        }
    }
}
