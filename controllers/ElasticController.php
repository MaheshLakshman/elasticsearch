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
    /**
     * Index a document
     *
     * @return void
     */
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
    /**
     * Get a Document
     *
     * @return void
     */
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
    /**
     * Search for a document
     *
     * @return void
     */
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
    /**
     * Delete a Document
     *
     * @return void
     */
    public function delete()
    {
        $params = [
            'index' => 'first_index',
            'id'    => 'first_id'
        ];
        
        $response = $this->client->delete($params);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        exit;
    }
    /**
     * Delete an index
     *
     * @return void
     */
    public function deleteIndex()
    {
        $deleteParams = [
            'index' => 'first_index'
        ];
        $response = $this->client->indices()->delete($deleteParams);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        exit;
    }

    public function createIndex()
    {
        $params = [
            'index' => 'first_index',
            'body'  => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];
        
        $response = $this->client->indices()->create($params);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        exit;
    }
}
