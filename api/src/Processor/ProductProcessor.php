<?php

declare(strict_types=1);

namespace App\Processor;

use ApiPlatform\Metadata\DeleteOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ProductDb;

class ProductProcessor implements ProcessorInterface
{
    public function __construct(private ProductDb $productDb)
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof DeleteOperationInterface) {
            $this->productDb->delete($data);

            return;
        }

        $this->productDb->save($data);

        return $data;
    }
}
