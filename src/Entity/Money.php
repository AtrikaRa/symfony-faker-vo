<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Money
{
    /**
     * @ORM\Column(type="integer")
     */
    private int $value;

    /**
     * @ORM\Column(type="string")
     */
    private string $currency;

    public function __construct(
    )
    {
    }

    public function __toString(): string
    {
        $value = $this->getValue();
        $currency = $this->getCurrency();

        $money = "$value $currency";
        return \trim($money);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }
}