<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

class CreateLoanPaymentRequest
{
    use DataValidation;

    /**
     * @var string
     */
    private $loan_public_id;

    /**
     * @var string
     */
    private $transaction_public_id;

    /**
     * @var string
     */
    private $transaction_total_amount;

    // schedule -------------------------------

    /**
     * @var int
     */
    private $nmbr;

    /**
     * @var string
     */
    private $payment_received_date;

    /**
     * @var string
     */
    private $received_principal;

    /**
     * @var string
     */
    private $received_interest;

    /**
     * @var string
     */
    private $received_penalty;

    /**
     * @var string
     */
    private $received_total;

    /**
     * @var string
     */
    private $total_remaining_principal;

    /**
     * @var string
     */
    private $payment_status;

    // -----------------------

    /**
     * @var array<int, array<string, string>>
     */
    private $schedule_update;

    public function setLoanPublicId(string $loan_public_id): self
    {
        $this->loan_public_id = $loan_public_id;

        return $this;
    }

    public function setTransactionPublicId(string $transaction_public_id): self
    {
        $this->transaction_public_id = $transaction_public_id;

        return $this;
    }

    public function setTransactionTotalAmount(string $transaction_total_amount): self
    {
        $this->transaction_total_amount = $transaction_total_amount;

        return $this;
    }

    public function setScheduleNmbr(int $nmbr): self
    {
        $this->nmbr = $nmbr;

        return $this;
    }

    public function setSchedulePaymentReceivedDate(string $payment_received_date): self
    {
        $this->payment_received_date = $payment_received_date;

        return $this;
    }

    public function setScheduleReceivedPrincipal(string $received_principal): self
    {
        $this->received_principal = $received_principal;

        return $this;
    }

    public function setScheduleReceivedInterest(string $received_interest): self
    {
        $this->received_interest = $received_interest;

        return $this;
    }

    public function setScheduleReceivedPenalty(string $received_penalty): self
    {
        $this->received_penalty = $received_penalty;

        return $this;
    }

    public function setScheduleReceivedTotal(string $received_total): self
    {
        $this->received_total = $received_total;

        return $this;
    }

    public function setScheduleTotalRemainingPrincipal(string $total_remaining_principal): self
    {
        $this->total_remaining_principal = $total_remaining_principal;

        return $this;
    }

    public function setSchedulePaymentStatus(string $payment_status): self
    {
        $this->payment_status = $payment_status;

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
     * @return array<string|array>
     */
    public function getData(): array
    {
        $nullableFields = ['transaction_total_amount', 'schedule_update'];

        $data = [
            'loan_public_id' => $this->loan_public_id,
            'transaction_public_id' => $this->transaction_public_id,
            'transaction_total_amount' => $this->transaction_total_amount,

            'nmbr' => $this->nmbr,
            'payment_received_date' => $this->payment_received_date,
            'received_principal' => $this->received_principal,
            'received_interest' => $this->received_interest,
            'received_penalty' => $this->received_penalty,
            'received_total' => $this->received_total,
            'total_remaining_principal' => $this->total_remaining_principal,
            'payment_status' => $this->payment_status,

            'schedule_update' => $this->schedule_update,
        ];

        $this->validateData($data, $nullableFields);

        return $data;
    }
}
