<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

class ExtendLoanRequest
{
    use DataValidation;

    /**
     * @var string
     */
    private $loan_public_id;

    /**
     * @var string
     */
    private $loan_closing_date;

    // -------------------------

    /**
     * @var array<int, array<string, string>>
     */
    private $schedule_update;

    public function setLoanPublicId(string $loan_public_id): self
    {
        $this->loan_public_id = $loan_public_id;

        return $this;
    }

    public function setLoanClosingDate(string $loan_closing_date): self
    {
        $this->loan_closing_date = $loan_closing_date;

        return $this;
    }

    public function addScheduleUpdate(string $nmbr, string $next_pay_date, string $should_pay_principal, string $should_pay_interest, string $should_pay_total): self
    {
        $this->schedule_update[] = [
            'nmbr' => $nmbr,
            'next_pay_date' => $next_pay_date,
            'should_pay_principal' => $should_pay_principal,
            'should_pay_interest' => $should_pay_interest,
            'should_pay_total' => $should_pay_total
        ];

        return $this;
    }

    /**
     * @return array<string, null|string|array<int, array<string, string>>>
     */
    public function getData(): array
    {
        $nullableFields = [];

        $data = [
            'loan_public_id' => $this->loan_public_id,
            'loan_closing_date' => $this->loan_closing_date,

            'schedule_update' => $this->schedule_update,
        ];

        $this->validateData($data, $nullableFields);

        return $data;
    }
}
