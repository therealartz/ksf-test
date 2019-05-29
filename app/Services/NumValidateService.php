<?php

namespace App\Services;

use App\Contracts\PhoneValidationServiceInterface;
use App\Exceptions\PhoneValidationException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

final class NumValidateService implements PhoneValidationServiceInterface
{
    private $http;

    public function __construct(string $apiKey)
    {
        $this->http = new Client([
            'base_uri' => 'http://apilayer.net/api/',
            'query' => [
                'access_key' => $apiKey,
            ],
        ]);
    }

    public function validate(string $phone): bool
    {
        try {
            $response = $this->http->get('validate', [
                'query' => array_merge(
                    $this->http->getConfig('query'),
                    [
                        'number' => $phone,
                    ]
                ),
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            throw new PhoneValidationException($exception->getMessage());
        }

        return $result['valid'];
    }
}
