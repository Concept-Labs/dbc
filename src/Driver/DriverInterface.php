<?php

namespace Concept\DBC\Driver;

use Concept\Config\ConfigInterface;
use Concept\DBC\Result\ResultFactoryInterface;
use Concept\DBC\Result\ResultInterface;

interface DriverInterface
{
    public function setResultFactory(ResultFactoryInterface $resultFactory): void;
    public function getResultFactory(): ResultFactoryInterface;

    public function connect(ConfigInterface $config): static;
    public function disconnect(): static;
    public function isConnected(): bool;

    public function quote(string $string): string;
    public function escape(string $value): string;

    //public function query(string $sql, array $params = []): ResultInterface;
    public function execute(string $sql, array $params = []): ResultInterface;
//    public function exec(string $sql, array $params = []): int|bool;
    //public function prepare(string $sql, array $options = []): mixed;

    public function beginTransaction(): bool;
    public function commit(): bool;
    public function rollback(): bool;
    public function inTransaction(): bool;

    // public function lastInsertId(string $name = null): int|string|null;
    // public function quote(string $string): string;

}
