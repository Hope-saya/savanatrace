<?php

namespace App\Http\Controllers;

use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Log;

class MqttController extends Controller
{
    public function updateIpAddress()
    {
        // Defining the variables
        $brokerHost = 'broker.emqx.io';
        $brokerPort = 1883;
        $topic = 'ip-updates';

        try {
            // Connecting to MQTT broker
              //initializing an instance of the MQTT client.
            $mqtt = MQTT::connection();

            $mqtt->connect($brokerHost, $brokerPort);

            // Reading the current IP address
            $ipAddress = $this->getIpAddress();

            // Publishing IP address to the specified topic
            $mqtt->publish($topic, $ipAddress);

            // Disconnect from MQTT broker
            $mqtt->disconnect();

            Log::info('success!.');

            // Return a JSON response indicating success
            return response()->json(['message' => 'IP Address updated and broadcasted successfully']);
        } catch (\Exception $e) {
            // Log error message if MQTT update fails
            Log::error('MQTT Update Failed: ' . $e->getMessage());

            // Return a JSON response indicating failure
            return response()->json(['error' => 'Failed to update IP address via MQTT']);
        }
    }

    private function getIpAddress()
    {
        // retrieving the current IP addresss
        
    
    }
}

