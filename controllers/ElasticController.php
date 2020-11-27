<?php

namespace Controllers;

use Elasticsearch\ClientBuilder;

class ElasticController
{
    public $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()->build();
    }
    public function create()
    {
        try {

            $params = [
                'index' => 'first_index',
                'type' => 'first_type',
                'id' => 'first_id',
                'body' => [
                    'testField' => 'Hai'
                ],
            ];
            $response = $this->client->index($params);
            //echo $response['created'];
            echo "<pre>";
            print_r($response);
            echo "</pre>";
            exit;
        } catch (\Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
            echo "</pre>";
            exit;
        }
    }

    public function get()
    {
        $params = [
            'index' => 'first_index',
            'id'    => 'first_id'
        ];

        //$response = $this->client->get($params);
        $response = $this->client->getSource($params);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        exit;
    }

    public function search()
    {
        $params = [
            'index' => 'first_index',
            'body'  => [
                'query' => [
                    'match' => [
                        'testField' => 'Hai'
                    ]
                ]
            ]
        ];
        
        $response = $this->client->search($params);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        exit;
    }
}
