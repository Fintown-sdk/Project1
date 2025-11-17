<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST\Authentication;

use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;

class TokenAuthentication implements Authentication
{
    /**
     * @var Endpoints
     */
    private $endpoints;

    /**
     * @var string
     */
    private $token;

    /**
     * @param string $token
     * @param Endpoints $endpoints
     */
    public function __construct(string $token, Endpoints $endpoints)
    {
        $this->token = $token;
        $this->endpoints = $endpoints;
    }

    public function createHTTPClient(): \GuzzleHttp\Client
    {
        return new \GuzzleHttp\Client([
            'base_uri' => $this->endpoints->baseURI,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
            ],
        ]);
    }
}
