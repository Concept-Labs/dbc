<?php
namespace Concept\DBC\Result;


use Concept\Singularity\Factory\ServiceFactory;

class ResultFactory extends ServiceFactory implements ResultFactoryInterface
{
 
    public function create(array $args = []): ResultInterface
    {
        return $this->createService(ResultInterface::class, $args);
    }
}