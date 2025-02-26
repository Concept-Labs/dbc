<?php
namespace Concept\DBC\Contract;

use Concept\DBC\Driver\DriverInterface;
use Concept\DBC\Exception\RuntimeException;

trait DriverAwareTrait
{
    private ?DriverInterface $___driver = null;

    /**
     * {@inheritDoc}
     */
    public function setDriver(DriverInterface $driver): static
    {
        $this->___driver = $driver;

        return $this;
    }


    /**
     * {@inheritDoc}
     */
    public function withDriver(DriverInterface $driver): static
    {
        return (clone $this)->setDriver($driver);
    }

    /**
     * {@inheritDoc}
     */
    public function getDriver(): DriverInterface
    {
        if (!$this->hasDriver()) {
            throw new RuntimeException('Driver is not set');
        }
        return $this->___driver;
    }

    /**
     * {@inheritDoc}
     */
    public function hasDriver(): bool
    {
        return $this->___driver !== null;
    }
}