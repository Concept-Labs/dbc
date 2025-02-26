<?php
namespace Concept\DBC\Contract;

use Concept\DBC\ConnectionInterface;

interface ConnectionAwareInterface
{
    /**
     * Clone an instance with the connection
     * 
     * @param ConnectionInterface $connection
     * 
     * @return static
     */
    public function withConnection(ConnectionInterface $connection): static;

    /**
     * Set the connection
     * 
     * @param ConnectionInterface $connection
     * 
     * @return static
     */
    public function setConnection(ConnectionInterface $connection): static;

    /**
     * Get the connection
     * 
     * @return ConnectionInterface
     */
    public function getConnection(): ConnectionInterface;

    /**
     * Check if the builder has a connection
     * 
     * @return bool
     */
    public function hasConnection(): bool;
}