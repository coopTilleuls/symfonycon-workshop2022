<?php

declare(strict_types=1);

namespace App\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Product;
use App\ProductDb;
use Symfony\Component\Uid\Uuid;

class ProductProvider implements ProviderInterface
{
    public function __construct(private ProductDb $productDb)
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array|object|null
    {
        if (!isset($uriVariables['id'])) {
            return $this->productDb->getCollection();
        }

        return $this->productDb->get($uriVariables['id']);
    }
}
