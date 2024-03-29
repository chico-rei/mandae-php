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
    private Guzzle $guzzle;

    /**
     * @var ResponseInterface
     */
    private ResponseInterface $lastResponse;

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

            $this->lastResponse = $this->guzzle->request(
                $request->getMethod(),
                $request->getPath(),
                ['json' => Util::cleanArray($payload)]
            );

            $parsedResponse = $this->handleResponse($this->lastResponse);

            if (isset($parsedResponse['error'])) {
                // Mandae API isn't responding with correct HTTP Status on some ending points
                throw new MandaeAPIException(
                    $parsedResponse['error']['message'],
                    $parsedResponse['error']['code'],
                    null,
                    $this->lastResponse
                );
            }

            return $parsedResponse;
        } catch (ServerException | ClientException $exception) {
            $this->lastResponse = $exception->getResponse();

            $response = $this->handleResponse($exception->getResponse());
            $message = $response['error']['message'] ?? $exception->getMessage();
            $code = $response['error']['code'] ?? $exception->getCode();

            throw new MandaeAPIException(
                $message,
                $code,
                $exception->getRequest(),
                $exception->getResponse()
            );
        } catch (GuzzleException | RequestException $exception) {
            throw new MandaeClientException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * Decode the Response
     *
     * @param ResponseInterface $response
     * @return null|array
     */
    public function handleResponse(ResponseInterface $response): ?array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get the last response from API
     *
     * @return ResponseInterface|null
     */
    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }
}
