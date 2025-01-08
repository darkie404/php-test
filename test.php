<?php

// Replace with your Telegram bot token
$token = '7630571438:AAHeGKl7r_rbZr4hmgCWX5ldp6Bj1--33gU';
$chat_id = '6358629176';
$message = 'Hello from PHP!';

// URL for Telegram API to send a message
$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message);

// cURL setup to make the request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    echo 'Message sent successfully!';
}

// Close cURL
curl_close($ch);
