<?php

namespace Concept\DBC\Result;

use Concept\Prototype\PrototypableInterface;
use Concept\Prototype\ResetableInterface;
use IteratorAggregate;
use PDOStatement;
use Traversable;

interface ResultInterface 
    extends 
        PrototypableInterface,
        IteratorAggregate,
        ResetableInterface,
        Traversable
{
    public function withStatement(PDOStatement $statement): static;
    public function errorCode(): ?int;
    public function errorMessage(): ?string;
    public function errorInfo(): ?array;
    public function fetch(): mixed;
    public function fetchAll(): array;
    public function rowCount(): int;
    public function lastInsertId(): mixed;

}
