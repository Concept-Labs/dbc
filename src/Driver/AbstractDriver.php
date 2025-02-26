<?php
namespace Concept\DBC\Driver;

use Concept\DBC\Result\ResultFactoryInterface;
use Concept\DBC\Result\ResultInterface;

abstract class AbstractDriver implements DriverInterface
{

    private ?ResultFactoryInterface $resultFactory = null;

    private ?ResultInterface $resultPrototype = null;

    /**
     * {@inheritDoc}
     */
    public function setResultFactory(ResultFactoryInterface $resultFactory): void
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * Get the result prototype
     * 
     * @return ResultInterface
     */
    protected function getResultPrototype(): ResultInterface
    {
        if ($this->resultPrototype === null) {
            $this->resultPrototype = $this->getResultFactory()->create();
        }
        return $this->resultPrototype->prototype();
    }

    /**
     * {@inheritDoc}
     */
    public function getResultFactory(): ResultFactoryInterface
    {
        return $this->resultFactory;
    }

}