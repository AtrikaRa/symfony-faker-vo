<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Money
{
    public function __construct(
        #[ORM\Column(length: 168, nullable: true)]
        private readonly ?string $value = "",
        #[ORM\Column(length: 3, nullable: true)]
        private readonly ?string $currency = null,
    ) {
    }

    public function __toString(): string
    {
        $value = $this->getValue();
        $currency = $this->getCurrency();

        $money = "$value $currency";
        return \trim($money);
    }


    public function getValue(): ?string
    {
        return (string) $this->value;
    }

    public function getCurrency(): ?string
    {
        return (string) $this->currency;
    }
}
