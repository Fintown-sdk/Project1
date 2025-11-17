<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

class Endpoints
{
    /**
     * @var string
     */
    public $baseURI = 'https://api.example.com/';

    public const csrfCookie = 'sanctum/csrf-cookie';
    public const login = 'user/login';

    public const createLoan = 'lender/create_loan';
    public const createLoanPayment = 'lender/loan_payment';
    public const extendLoan = 'lender/loan_extension';
    public const buybackLoan = 'lender/loan_buyback';
    public const viewLoan = 'loan/view';
    public const listLoans = 'loan/list';

    /**
     * @param string $baseURI
     */
    public function __construct(string $baseURI)
    {
        $this->baseURI = $baseURI;
    }
}
