<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST\Authentication;

use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;

class SessionAuthentication implements Authentication
{
    /**
     * @var Endpoints
     */
    private $endpoints;

    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var string
     */
    private $sessionCookieName;

    /**
     * @param Endpoints $endpoints
     * @param string $sessionId
     * @param string $sessionCookieName
     */
    public function __construct(Endpoints $endpoints, string $sessionId, string $sessionCookieName)
    {
        $this->endpoints = $endpoints;
        $this->sessionId = $sessionId;
        $this->sessionCookieName = $sessionCookieName;
    }

    public function createHTTPClient(): \GuzzleHttp\Client
    {
        $parsed_url = parse_url($this->endpoints->baseURI);

        if (!is_array($parsed_url)) {
            throw new \RuntimeException('Invalid endpoints base URI');
        }

        $base_uri = "{$parsed_url['scheme']}://{$parsed_url['host']}";
        if (key_exists('port', $parsed_url)) {
            $base_uri .= ":{$parsed_url['port']}";
        }

        return new \GuzzleHttp\Client([
            'base_uri' => $this->endpoints->baseURI,
            'headers' => [
                'Accept' => 'application/json',
                'Cookie' => "{$this->sessionCookieName}={$this->sessionId}",
                'Origin' => $base_uri,
            ],
        ]);
    }
}
