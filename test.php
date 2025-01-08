<?php

$token = "7630571438:AAHeGKl7r_rbZr4hmgCWX5ldp6Bj1--33gU";
$url = "https://api.telegram.org/bot$token/";

function sendMessage($chat_id, $text) {
    global $url;
    $send_url = $url . "sendMessage";
    $data = [
        'chat_id' => $chat_id,
        'text' => $text
    ];
    file_get_contents($send_url . '?' . http_build_query($data));
}

function getUpdates($offset = null) {
    global $url;
    $get_url = $url . "getUpdates";
    $params = $offset ? ['offset' => $offset] : [];
    $response = file_get_contents($get_url . '?' . http_build_query($params));
    return json_decode($response, true)['result'];
}

function main() {
    $last_update_id = null;
    while (true) {
        $updates = getUpdates($last_update_id);
        foreach ($updates as $update) {
            $chat_id = $update['message']['chat']['id'];
            $text = $update['message']['text'];
            sendMessage($chat_id, "You said: $text");
            $last_update_id = $update['update_id'] + 1;
        }
    }
}

main();