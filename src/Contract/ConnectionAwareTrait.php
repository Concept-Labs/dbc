<?php
namespace Concept\DBC\Contract;

use Concept\DBAL\Exception\RuntimeException;
use Concept\DBC\ConnectionInterface;

trait ConnectionAwareTrait
{
    /**
     * The connection
     *
     * @var ConnectionInterface
     */
    private ?ConnectionInterface $___connection = null;

    /**
     * {@inheritDoc}
     */
    
    public function withConnection(ConnectionInterface $connection): static
    {
        return (clone $this)->setConnection($connection);
    }

    /**
     * {@inheritDoc}
     */
    public function setConnection(ConnectionInterface $connection): static
    {
        $this->___connection = $connection;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasConnection(): bool
    {
        return $this->___connection instanceof ConnectionInterface;
    }

    /**
     * {@inheritDoc}
     */
    public function getConnection(): ConnectionInterface
    {
        if (!$this->hasConnection()) {
            throw new RuntimeException('No connection has been set');
        }
        return $this->___connection;
    }
}