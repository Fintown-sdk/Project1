<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

class CreateLoanRequest
{
    use DataValidation;

    /**
     * @var string
     */
    private $lender_loan_id;

    /**
     * @var string
     */
    private $loan_type;

    /**
     * @var string
     */
    private $risk_score;

    /**
     * @var string
     */
    private $loan_amount;

    /**
     * @var string
     */
    private $loan_currency;

    /**
     * @var string
     */
    private $interest_rate;

    /**
     * @var string
     */
    private $original_loan_amount = null;

    /**
     * @var string
     */
    private $original_loan_currency = null;

    /**
     * @var string
     */
    private $exchange_rate;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $loan_issue_date;

    /**
     * @var string
     */
    private $loan_closing_date;

    /**
     * @var string
     */
    private $loan_prolongation;

    /**
     * @var string
     */
    private $client_type;

    /**
     * @var string
     */
    private $buyback;

    /**
     * @var string
     */
    private $last_update;

    // consumer client ----------------------------

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $personal_code = null;

    // business client -----------------------------

    /**
     * @var string
     */
    private $company_name;

    /**
     * @var string
     */
    private $company_registry_code;

    /**
     * @var string
     */
    private $representative_name;

    /**
     * @var string
     */
    private $representative_code;

    /**
     * @var string
     */
    private $collateral_value;

    /**
     * @var string
     */
    private $currency;

    // schedule -------------------------------

    /**
     * @var array<int, array<string, string>>
     */
    private $schedule;

    // custom fields -------------------------

    /**
     * @var array<string, string>
     */
    private $custom = [];

    /**
     * @param string $lender_loan_id
     * @return $this
     */
    public function setLenderLoanId(string $lender_loan_id): self
    {
        $this->lender_loan_id = $lender_loan_id;

        return $this;
    }

    public function setLoanType(string $loan_type): self
    {
        $this->loan_type = $loan_type;

        return $this;
    }

    public function setRiskScore(string $risk_score): self
    {
        $this->risk_score = $risk_score;

        return $this;
    }

    public function setLoanAmount(string $loan_amount): self
    {
        $this->loan_amount = $loan_amount;

        return $this;
    }

    public function setLoanCurrency(string $loan_currency): self
    {
        $this->loan_currency = $loan_currency;

        return $this;
    }

    public function setInterestRate(string $interest_rate): self
    {
        $this->interest_rate = $interest_rate;

        return $this;
    }

    public function setOriginalLoanAmount(string $original_loan_amount): self
    {
        $this->original_loan_amount = $original_loan_amount;

        return $this;
    }

    public function setOriginalLoanCurrency(string $original_loan_currency): self
    {
        $this->original_loan_currency = $original_loan_currency;

        return $this;
    }

    public function setExchangeRate(string $exchange_rate): self
    {
        $this->exchange_rate = $exchange_rate;

        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function setLoanIssueDate(string $loan_issue_date): self
    {
        $this->loan_issue_date = $loan_issue_date;

        return $this;
    }

    public function setLoanClosingDate(string $loan_closing_date): self
    {
        $this->loan_closing_date = $loan_closing_date;

        return $this;
    }

    public function setLoanProlongation(string $loan_prolongation): self
    {
        $this->loan_prolongation = $loan_prolongation;

        return $this;
    }

    public function setClientType(string $client_type): self
    {
        $this->client_type = $client_type;

        return $this;
    }

    public function setBuyback(string $buyback): self
    {
        $this->buyback = $buyback;

        return $this;
    }

    public function setLastUpdate(string $last_update): self
    {
        $this->last_update = $last_update;

        return $this;
    }

    public function setConsumerClientFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function setConsumerClientLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function setConsumerClientGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function setConsumerClientPersonalCode(string $personal_code): self
    {
        $this->personal_code = $personal_code;

        return $this;
    }

    public function setBusinessClientCompanyName(string $company_name): self
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function setBusinessClientCompanyRegistryCode(string $company_registry_code): self
    {
        $this->company_registry_code = $company_registry_code;

        return $this;
    }

    public function setBusinessClientRepresentativeName(string $representative_name): self
    {
        $this->representative_name = $representative_name;

        return $this;
    }

    public function setBusinessClientRepresentativeCode(string $representative_code): self
    {
        $this->representative_code = $representative_code;

        return $this;
    }

    public function setBusinessClientCollateralValue(string $collateral_value): self
    {
        $this->collateral_value = $collateral_value;

        return $this;
    }

    public function setBusinessClientCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function addSchedule(string $nmbr, string $next_pay_date, string $should_pay_principal, string $should_pay_interest, string $should_pay_total): self
    {
        $this->schedule[] = [
            'nmbr' => $nmbr,
            'next_pay_date' => $next_pay_date,
            'should_pay_principal' => $should_pay_principal,
            'should_pay_interest' => $should_pay_interest,
            'should_pay_total' => $should_pay_total
        ];

        return $this;
    }

    public function addCustomData(string $key, string $value): self
    {
        $this->custom[$key] = $value;

        return $this;
    }

    /**
     * @return array<string, null|string|array<string, null|string>|array<int, array<string, string>>>
     */
    public function getData(): array
    {
        if ('consumer' === $this->client_type) {
            $nullableFields = [
                'original_loan_amount',
                'original_loan_currency',
                'exchange_rate',
                'last_update',

                'personal_code',

                'company_name',
                'company_registry_code',
                'representative_name',
                'representative_code',
                'collateral_value',
                'currency',
            ];
        } else {
            $nullableFields = [
                'original_loan_amount',
                'original_loan_currency',
                'exchange_rate',
                'last_update',
            ];
        }

        $data = [
            'lender_loan_id' => $this->lender_loan_id,
            'loan_type' => $this->loan_type,
            'risk_score' => $this->risk_score,
            'loan_amount' => $this->loan_amount,
            'loan_currency' => $this->loan_currency,
            'interest_rate' => $this->interest_rate,
            'original_loan_amount' => $this->original_loan_amount,
            'original_loan_currency' => $this->original_loan_currency,
            'exchange_rate' => $this->exchange_rate,
            'country' => $this->country,
            'loan_issue_date' => $this->loan_issue_date,
            'loan_closing_date' => $this->loan_closing_date,
            'loan_prolongation' => $this->loan_prolongation,
            'client_type' => $this->client_type,
            'buyback' => $this->buyback,
            'last_update' => $this->last_update,

            'consumer_client' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'personal_code' => $this->personal_code,
            ],

            'business_client' => [
                'company_name' => $this->company_name,
                'company_registry_code' => $this->company_registry_code,
                'representative_name' => $this->representative_name,
                'representative_code' => $this->representative_code,
                'collateral_value' => $this->collateral_value,
                'currency' => $this->currency,
            ],

            'schedule' => $this->schedule,
        ];

        $data = array_merge($data, $this->custom);

        $this->validateData($data, $nullableFields);

        return $data;
    }
}
