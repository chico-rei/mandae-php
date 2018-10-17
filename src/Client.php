<?php

namespace ChicoRei\Packages\Mandae;

use ChicoRei\Packages\Mandae\Exception\MandaeClientException;
use ChicoRei\Packages\Mandae\Exception\MandaeAPIException;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * @var Guzzle
     */
    private $guzzle;

    /**
     * @param $apiToken
     * @param $sandbox
     * @param array $options
     */
    public function __construct($apiToken, $sandbox, array $options)
    {
        $this->guzzle = new Guzzle(array_merge($options, [
            'base_uri' => $sandbox ? Mandae::API_SANDBOX_URL : Mandae::API_URL,
            'http_errors' => true,
            'headers' => [
                'Authorization' => $apiToken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]));
    }

    /**
     * @param IRequest $request
     * @return array
     * @throws MandaeAPIException
     * @throws MandaeClientException
     */
    public function sendRequest(IRequest $request)
    {
        try {
            $payload = $request->getPayload();

            $response = $this->guzzle->request(
                $request->getMethod(),
                $request->getPath(),
                ['json' => $this->cleanPayload($payload)]);

             $parsedResponse = $this->handleResponse($response);
             
             if(isset($parsedResponse['error'])) {
                 // Mandae API isn't responding with correct HTTP Status on some ending points
                 throw new MandaeAPIException($parsedResponse['error']['message'], $parsedResponse['error']['code'], null, $response);
             }

             return $parsedResponse;
        } catch (ServerException | ClientException $exception) {
            $response = $this->handleResponse($exception->getResponse());
            $message = $response['error']['message'] ?? $exception->getMessage();
            $code = $response['error']['code'] ?? $exception->getCode();

            throw new MandaeAPIException($message, $code, $exception->getRequest(), $exception->getResponse());
        }  catch (GuzzleException | RequestException $exception) {
            throw new MandaeClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * Handle the Response
     *
     * @param ResponseInterface $response
     * @return null|array
     */
    private function handleResponse(ResponseInterface $response): ?array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Remove all null values from array
     *
     * @param array|null $payload
     * @return array|null
     */
    private function cleanPayload(?array &$payload): ?array
    {
        if (is_null($payload))
            return null;

        foreach ($payload as $key => &$value) {
            if (is_null($value))
                unset($payload[$key]);
            else if (is_array($value))
                $this->cleanPayload($value);
        }

        return $payload;
    }
}