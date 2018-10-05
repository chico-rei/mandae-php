<?php

namespace ChicoRei\Packages\Mandae;

use ChicoRei\Packages\Mandae\Exception\MandaeClientException;
use ChicoRei\Packages\Mandae\Exception\MandaeException;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
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
     * @param array $options
     */
    public function __construct($apiToken, array $options)
    {
        $this->guzzle = new Guzzle([
            'base_uri' => $options['sandbox'] ? Mandae::API_SANDBOX_URL : Mandae::API_URL,
            'timeout' => $options['timeout'],
            'http_errors' => true,
            'headers' => [
                'Authorization' => $apiToken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * @param IRequest $request
     * @return array
     * @throws MandaeException
     * @throws MandaeClientException
     */
    public function sendRequest(IRequest $request)
    {
        try {
            $response = $this->guzzle->request(
                $request->getMethod(),
                $request->getPath(),
                ['json' => $request->getPayload()]);

            return $this->handleResponse($response);
        } catch (ClientException $clientException) {
            $response = $this->handleResponse($clientException->getResponse());
            $error = $response['error'];

            throw new MandaeException($error['message'], $error['code'], $clientException->getRequest(), $clientException->getResponse());
        } catch (ServerException $serverException) {
            throw new MandaeException('Ocorreu um erro na API da Mandaê', 500, $serverException->getRequest(), $serverException->getResponse());
        } catch (RequestException $e) {
            throw new MandaeClientException($e->getMessage(), $e->getCode());
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            throw new MandaeClientException($e->getMessage(), $e->getCode());
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
}