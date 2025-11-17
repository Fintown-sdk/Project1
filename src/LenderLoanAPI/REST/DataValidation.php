<?php

declare(strict_types=1);

namespace Fintown\Sdk\LenderLoanAPI\REST;

trait DataValidation
{
    /**
     * @param array<string, null|string|array<string, null|string>|array<int, array<string, string>>> $data
     * @param array<int, string> $nullableFields
     * @return void
     */
    private function validateData(array $data, array $nullableFields = []): void
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    if (!in_array($subKey, $nullableFields) && is_null($subValue)) {
                        throw new \RuntimeException("not nullable field $subKey is null");
                    }
                }
            }

            if (!in_array($key, $nullableFields) && is_null($value)) {
                throw new \RuntimeException("not nullable field $key is null");
            }
        }
    }
}
