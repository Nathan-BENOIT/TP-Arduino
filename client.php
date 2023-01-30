<?php
use GuzzleHttp\Client;

$client = new Client();

$response = $client->post('http://vb/api', [
    'form_params' => [
        'command' => 'set_led_status',
        'status' => 1
    ]
]);

$statusCode = $response->getStatusCode();
if ($statusCode == 200) {
    $result = json_decode($response->getBody(), true);
    if ($result['success']) {
        // la commande a été exécutée avec succès
    } else {
        print ('rip');
        // échec de l'exécution de la commande
    }
} else {
    // échec de la communication avec l'ESP
    print ('rip');
}
