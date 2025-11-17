# Project1

PHP SDK for Fintown investment platform.  
PHP version required: 7.2 or higher.

How to use with composer:

    composer require fintown-sdk/project1

Code examples:

1. Create Loan

        <?php
        
        declare(strict_types=1);
        
        use Fintown\Sdk\LenderLoanAPI\REST\Authentication\TokenAuthentication;
        use Fintown\Sdk\LenderLoanAPI\REST\Client;
        use Fintown\Sdk\LenderLoanAPI\REST\CreateLoanRequest;
        use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;
        
        require __DIR__ . '/../vendor/autoload.php';
        
        $token = 'a68DVYVjcPsDWYuMWc3DgBqOFAJRQgtmpVpf806p59563abc';
        $baseUri = 'https://example.com/api/v1/';
        $endpoints = new Endpoints($baseUri);
        $authorization = new TokenAuthentication($token, $endpoints);
        
        $client = new Client($endpoints, $authorization);
        
        $request = new CreateLoanRequest();
        
        $request
            ->setLenderLoanId('lender-123')
            ->setLoanType('short_term_loan')
            ->setRiskScore('1')
            ->setLoanCurrency('EUR')
            ->setCountry('UA')
            ->setClientType('consumer')
        
            ->setConsumerClientFirstName('a')
            ->setConsumerClientLastName('b')
            ->setConsumerClientGender('male')
            ->setConsumerClientPersonalCode('12345')
        
        //    ->setBusinessClientCompanyName('a')
        //    ->setBusinessClientCompanyRegistryCode('123')
        //    ->setBusinessClientRepresentativeName('A')
        //    ->setBusinessClientRepresentativeCode('A-123')
        //    ->setBusinessClientCollateralValue('1')
        //    ->setBusinessClientCurrency('EUR')
        
            ->setLoanAmount('1000')
            ->setInterestRate('12')
            ->setOriginalLoanAmount('1000')
            ->setOriginalLoanCurrency('EUR')
            ->setExchangeRate('3')
            ->setLoanIssueDate('2025-10-06')
            ->setLoanClosingDate('2025-12-06')
            ->setLoanProlongation('month')
            ->setBuyback('60')
            ->setLastUpdate('1762327914');
        
        $request->addSchedule(
            '1',
            '2025-11-06',
            '0',
            '10.19',
            '10.19'
        );
        
        $request->addSchedule(
            '2',
            '2025-12-06',
            '1000',
            '9.86',
            '1009.86'
        );
        
        $result = $client->createLoan($request);
        
        print_r("$result\n");

2. Create Loan Payment

         <?php
         
         declare(strict_types=1);
         
         use Fintown\Sdk\LenderLoanAPI\REST\Authentication\TokenAuthentication;
         use Fintown\Sdk\LenderLoanAPI\REST\Client;
         use Fintown\Sdk\LenderLoanAPI\REST\CreateLoanPaymentRequest;
         use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;
         
         require __DIR__ . '/../vendor/autoload.php';
         
         
         $token = 'a68DVYVjcPsDWYuMWc3DgBqOFAJRQgtmpVpf806p59563abc';
         $baseUri = 'https://example.com/api/v1/';
         $endpoints = new Endpoints($baseUri);
         $authorization = new TokenAuthentication($token, $endpoints);
         
         $client = new Client($endpoints, $authorization);
         
         $request = new CreateLoanPaymentRequest();
         $request = $request
             ->setLoanPublicId('SAPDQF21Z42ESA')
             ->setTransactionPublicId('579aw24551918')
             ->setTransactionTotalAmount('10.19')
             ->setScheduleNmbr(1)
             ->setSchedulePaymentReceivedDate('2025-11-06')
             ->setScheduleReceivedPrincipal('0')
             ->setScheduleReceivedInterest('10.19')
             ->setScheduleReceivedPenalty('0')
             ->setScheduleReceivedTotal('10.19')
             ->setScheduleTotalRemainingPrincipal('1000')
             ->setSchedulePaymentStatus('in_time');
         
         $result = $client->createLoanPayment($request);
         print_r($result);
   
3. Extend Loan

         <?php
         
         declare(strict_types=1);
         
         use Fintown\Sdk\LenderLoanAPI\REST\Authentication\TokenAuthentication;
         use Fintown\Sdk\LenderLoanAPI\REST\Client;
         use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;
         use Fintown\Sdk\LenderLoanAPI\REST\ExtendLoanRequest;
         
         require __DIR__ . '/../vendor/autoload.php';
         
         $token = 'a68DVYVjcPsDWYuMWc3DgBqOFAJRQgtmpVpf806p59563abc';
         $baseUri = 'https://example.com/api/v1/';
         $endpoints = new Endpoints($baseUri);
         $authorization = new TokenAuthentication($token, $endpoints);
         
         $client = new Client($endpoints, $authorization);
         
         $request = new ExtendLoanRequest();
         $request = $request
             ->setLoanPublicId('833DS9OUHGOMVA')
             ->setLoanClosingDate('2026-01-06')
             ->addScheduleUpdate('1', '2025-11-06', '0', '10.19', '10.19')
             ->addScheduleUpdate('2', '2025-12-06', '0', '9.86', '9.86')
             ->addScheduleUpdate('3', '2026-01-06', '1000', '10.19', '1010.19');
         
         $result = $client->extendLoan($request);
         print_r($result);

4. Buyback Loan

         <?php
         
         declare(strict_types=1);
         
         use Fintown\Sdk\LenderLoanAPI\REST\Authentication\TokenAuthentication;
         use Fintown\Sdk\LenderLoanAPI\REST\BuybackLoanRequest;
         use Fintown\Sdk\LenderLoanAPI\REST\Client;
         use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;
         
         require __DIR__ . '/../vendor/autoload.php';
         
         $token = 'a68DVYVjcPsDWYuMWc3DgBqOFAJRQgtmpVpf806p59563abc';
         $baseUri = 'https://example.com/api/v1/';
         $endpoints = new Endpoints($baseUri);
         $authorization = new TokenAuthentication($token, $endpoints);
         
         $client = new Client($endpoints, $authorization);
         
         $request = new BuybackLoanRequest();
         $request = $request
             ->setLoanPublicId('SAPDQF21Z42ESA')
             ->setReason('early_buyback')
             ->setDescription('desc');
         
         $result = $client->buybackLoan($request);
         print_r($result);

5. View Loan

         <?php
         
         declare(strict_types=1);
         
         use Fintown\Sdk\LenderLoanAPI\REST\Authentication\TokenAuthentication;
         use Fintown\Sdk\LenderLoanAPI\REST\Client;
         use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;
         
         require __DIR__ . '/../vendor/autoload.php';
         
         $token = 'a68DVYVjcPsDWYuMWc3DgBqOFAJRQgtmpVpf806p59563abc';
         $baseUri = 'https://example.com/api/v1/';
         $endpoints = new Endpoints($baseUri);
         $authorization = new TokenAuthentication($token, $endpoints);
         
         $client = new Client($endpoints, $authorization);
         
         $result = $client->loanDetails('833DS9OUHGOMVA');
         print_r($result);

6. List Loans

         <?php
         
         declare(strict_types=1);
         
         use Fintown\Sdk\LenderLoanAPI\REST\Authentication\TokenAuthentication;
         use Fintown\Sdk\LenderLoanAPI\REST\Client;
         use Fintown\Sdk\LenderLoanAPI\REST\Endpoints;
         
         require __DIR__ . '/../vendor/autoload.php';
         
         $token = 'a68DVYVjcPsDWYuMWc3DgBqOFAJRQgtmpVpf806p59563abc';
         $baseUri = 'https://example.com/api/v1/';
         $endpoints = new Endpoints($baseUri);
         $authorization = new TokenAuthentication($token, $endpoints);
         
         $client = new Client($endpoints, $authorization);
         
         $result = $client->loanList();
         print_r($result);
