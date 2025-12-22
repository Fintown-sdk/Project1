<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

abstract class Request
{
    /**
     * @var array<string, string>
     */
    private $custom = [];

    public function addCustomData(string $key, string $value): self
    {
        $this->custom[$key] = $value;

        return $this;
    }

    public function mergeCustomData(array $data): array
    {
        return array_merge($data, $this->custom);
    }
}