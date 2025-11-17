<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

use Fintown\Sdk\LenderLoanAPI\REST\Authentication\Authentication;
use GuzzleHttp\Exception\GuzzleException;

class Client
{
    /**
     * @var Endpoints
     */
    private $endpoints;

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    public function __construct(Endpoints $endpoints, Authentication $authentication)
    {
        $this->endpoints = $endpoints;
        $this->httpClient = $authentication->createHTTPClient();
    }

    /**
     * @param CreateLoanRequest $request
     * @return string loan_public_id
     */
    public function createLoan(CreateLoanRequest $request): string
    {
        try {
            $response = $this->httpClient->request('POST', $this->endpoints::createLoan, [
//                'debug' => true,
                'connect_timeout' => 5.00,
                'timeout' => 5.00,
                'json' => $request->getData(),
            ]);

            $contents = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo $e->getMessage();

            return '';
        }

        if (is_object($contents) && property_exists($contents, 'data')) {
            return $contents->data->loan_public_id;
        }

        return $response->getBody()->getContents();
    }

    /**
     * @param CreateLoanPaymentRequest $request
     * @return array<string>
     */
    public function createLoanPayment(CreateLoanPaymentRequest $request): array
    {
        try {
            $response = $this->httpClient->request('POST', $this->endpoints::createLoanPayment, [
                'json' => $request->getData(),
            ]);

            $contents = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo $e->getMessage();

            return [];
        }

        if (!is_object($contents)) {
            throw new \RuntimeException('contents is not an object');
        }

        if (!property_exists($contents, 'data')) {
            throw new \RuntimeException('contents object has no data property');
        }

        return [
            'loan_public_id' => $contents->data->loan_public_id,
            'transaction_public_id' => $contents->data->transaction_public_id,
        ];
    }

    /**
     * @param ExtendLoanRequest $request
     * @return array<string>
     */
    public function extendLoan(ExtendLoanRequest $request): array
    {
        try {
            $response = $this->httpClient->request('POST', $this->endpoints::extendLoan, [
                'json' => $request->getData(),
            ]);

            $contents = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo $e->getMessage();

            return [];
        }

        if (!is_object($contents)) {
            throw new \RuntimeException('contents is not an object');
        }

        if (!property_exists($contents, 'data')) {
            throw new \RuntimeException('contents object has no data property');
        }

        return [
            'loan_public_id' => $contents->data->loan_public_id,
            'loan_closing_date' => $contents->data->loan_closing_date,
        ];
    }

    /**
     * @param BuybackLoanRequest $request
     * @return array<string>
     */
    public function buybackLoan(BuybackLoanRequest $request): array
    {
        try {
            $response = $this->httpClient->request('POST', $this->endpoints::buybackLoan, [
                'json' => $request->getData(),
            ]);

            $contents = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo $e->getMessage();

            return [];
        }

        if (!is_object($contents)) {
            throw new \RuntimeException('contents is not an object');
        }

        if (!property_exists($contents, 'data')) {
            throw new \RuntimeException('contents object has no data property');
        }

        return [
            'loan_public_id' => $contents->data->loan_public_id,
            'payment_date' => $contents->data->payment_date,
        ];
    }

    /**
     * @param string $loanId
     * @return array<string>
     */
    public function loanDetails(string $loanId): array
    {
        try {
            $response = $this->httpClient->request('GET', $this->endpoints::viewLoan, [
//                'debug' => true,
                'query' => ['loan_public_id' => $loanId],
            ]);

            $contents = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo $e->getMessage();

            return [];
        }

        if (!is_object($contents)) {
            throw new \RuntimeException('contents is not an object');
        }

        if (!property_exists($contents, 'data')) {
            throw new \RuntimeException('contents object has no data property');
        }

        return [
            'data' => $contents->data
        ];
    }

    /**
     * @return array
     */
    public function loanList(): array
    {
        try {
            $response = $this->httpClient->request('GET', $this->endpoints::listLoans, [
//                'debug' => true,
            ]);

            $contents = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo $e->getMessage();

            return [];
        }

        if (!is_object($contents)) {
            throw new \RuntimeException('contents is not an object');
        }

        if (!property_exists($contents, 'data')) {
            throw new \RuntimeException('contents object has no data property');
        }

        return [
            'data' => $contents->data
        ];
    }
}
