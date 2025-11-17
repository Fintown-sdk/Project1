<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

class BuybackLoanRequest
{
    use DataValidation;

    /**
     * @var string
     */
    private $loan_public_id;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var string
     */
    private $description;

    public function setLoanPublicId(string $loan_public_id): self
    {
        $this->loan_public_id = $loan_public_id;

        return $this;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getData(): array
    {
        $nullableFields = ['description'];

        $data = [
           'loan_public_id' => $this->loan_public_id,
            'reason' => $this->reason,
            'description' => $this->description,
        ];

        $this->validateData($data, $nullableFields);

        return $data;
    }
}
