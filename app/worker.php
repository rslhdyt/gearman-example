
<?php

$worker= new GearmanWorker();
$status = $worker->addServer('0.0.0.0', 4730);

$worker->addFunction('sendMessage', function ($job) {
    // decode input
    $n = $job->workload();
    $data = json_decode($n, true);

    $apiToken = "714298775:AAEh5CI0yBtP7KMrSZyivxRu14Gi2y_HEVo";

    $data = [
        'chat_id' => '@baradur_messenger',
        'text' => $data['message']
    ];

    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

    return true;
});

echo "Waiting for job...\n";

while ($worker->work());


