<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Processor\ProductProcessor;
use App\Provider\ProductProvider;
use Symfony\Component\Uid\Uuid;

#[ApiResource(
    provider: ProductProvider::class,
    processor: ProductProcessor::class,
)]
class Product
{
    public readonly Uuid $id;

    public function __construct(
        public readonly string $name,
        public readonly string $price,
        ?Uuid $id = null,
    )
    {
        $this->id = $id ?? Uuid::v4();
    }
}
