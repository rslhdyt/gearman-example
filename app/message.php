<?php

$client = new GearmanClient();
$client->addServers('0.0.0.0:4730');

// do a task with gearman worker
echo "sending message\n";

$quotesJson = file_get_contents('lotr-quotes.json');
$quotes = json_decode($quotesJson, true);
$totalQuotes = count($quotes);
$quote = $quotes[rand(0, $totalQuotes - 1)];

$message = !empty($argv[1]) ? $argv[1] : $quote['quote'] . ' - ' . $quote['author'];

$res = $client->doBackground('sendMessage', json_encode([
    'message' => $message
]));

echo "message sent\n";

print $res;