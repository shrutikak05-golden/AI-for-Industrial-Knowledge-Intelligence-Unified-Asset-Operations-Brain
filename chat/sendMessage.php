<?php

$message = $_POST['message'];

$apiKey = "AQ.Ab8RN6JkF8YYXXbg7wyaKn77BeO9tftJN3hWliWz_9yN0GQZYA";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=".$apiKey;

$data = [
    "contents" => [
        [
            "parts" => [
                [
                    "text" => $message
                ]
            ]
        ]
    ]
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "X-goog-api-key: $apiKey"
]);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

curl_close($ch);

$result = json_decode($response, true);

echo "<pre>";
print_r($result);
echo "</pre>";
exit;

?>