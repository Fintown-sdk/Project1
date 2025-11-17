<?php

namespace Fintown\Sdk\LenderLoanAPI\REST\Authentication;

interface Authentication
{
    public function createHTTPClient(): \GuzzleHttp\Client;
}
