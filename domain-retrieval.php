<?php

// Defining the API endpoint URL
$api_url = 'https://api.recruitment.shq.nz';

// Defining the client ID and API key
$client_id = 100;
$api_key = 'h523hDtETbkJ3nSJL323hjYLXbCyDaRZ';

// Constructing the URL with parameters
$url = $api_url . '/domains/' . $client_id . '?api_key=' . $api_key;

// Making the request to the API
$response = file_get_contents($url);

// Check if the request was successful
if ($response !== false) {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Printing the domains and DNS records
    if (isset($data['domains'])) {
        echo "Domains for client ID $client_id:\n";
        foreach ($data['domains'] as $domain) {
            echo "- Domain: " . $domain['name'] . "\n";
            if (isset($domain['zones'])) {
                foreach ($domain['zones'] as $zone) {
                    echo "  - Zone ID: " . $zone['id'] . "\n";
                
                }
            }
        }
    } else {
        echo "No domains found for client ID $client_id\n";
    }
} else {
    echo "Failed to retrieve data from the API\n";
}
?>
