<?php

namespace App\Repositories;

use App\Interfaces\ApodRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApodRepository implements ApodRepositoryInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPictureByDate($date)
    {
        try {
            $response = $this->client->get('https://api.nasa.gov/planetary/apod?api_key=oTTQY5H6cgBKma99ZYweeAmk1aZk9o0Xrzrwodcu&date='.$date);

            return json_decode($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();

            $responseBodyAsString = $response->getBody()->getContents();

            return json_decode($responseBodyAsString);
        }
    }
}
