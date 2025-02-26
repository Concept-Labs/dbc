<?php

namespace Concept\DBC;

use Concept\Config\ConfigInterface;
use Concept\Config\ConfigurableInterface;
use Concept\DBAL\DML\DmlManagerInterface;
use Concept\DBC\Contract\DriverAwareInterface;

interface ConnectionInterface 
    extends 
        ConfigurableInterface,
        DriverAwareInterface
{
    public function getDmlManager(): DmlManagerInterface;
    
    public function connect(?ConfigInterface $config = null): static;
    public function disconnect(): static;
    public function isConnected(): bool;
    
    // public function query(Stringable $sql, array $params = []): ResultInterface;
    // public function exec(Stringable $sql): int|bool;
    //public function prepare(string $sql, array $options = []): mixed;

    // public function beginTransaction(): bool;
    // public function commit(): bool;
    // public function rollback(): bool;
    // public function inTransaction(): bool;

    //public function quote(string $string): string;
    
    //public function lastInsertId(string $name = null): mixed;
    // public function errorCode(): mixed;
    // public function errorInfo(): mixed;
}
