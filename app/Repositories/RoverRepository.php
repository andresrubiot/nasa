<?php

namespace App\Repositories;

use App\Interfaces\RoverRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RoverRepository implements RoverRepositoryInterface
{
    protected $client;
    protected $apiKey;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = "oTTQY5H6cgBKma99ZYweeAmk1aZk9o0Xrzrwodcu";
    }

    public function getPictureByDate($date)
    {
        try {
            $response = $this->client->get("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date={$date}&api_key={$this->apiKey}");

            return json_decode($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();

            $responseBodyAsString = $response->getBody()->getContents();

            return json_decode($responseBodyAsString);
        }
    }
}
