<?php
namespace Concept\DBC\Contract;

use Concept\DBC\Driver\DriverInterface;

Interface DriverAwareInterface
{

    /**
     * Set the driver
     * 
     * @param DriverInterface $driver
     * 
     * @return static
     */
    public function withDriver(DriverInterface $driver): static;

    /**
     * Set the driver
     * 
     * @param DriverInterface $driver
     * 
     * @return static
     */
    public function setDriver(DriverInterface $driver): static;

    /**
     * Get the driver
     * 
     * @return DriverInterface
     */
    public function getDriver(): DriverInterface;

    /**
     * Check if the driver is set
     * 
     * @return bool
     */
    public function hasDriver(): bool;
}