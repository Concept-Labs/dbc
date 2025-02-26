<?php

namespace Concept\DBC;

use Concept\Config\ConfigInterface;
use Concept\Config\Traits\ConfigurableTrait;
use Concept\DBAL\DML\DmlManagerFactoryInterface;
use Concept\DBAL\DML\DmlManagerInterface;
use Concept\DBC\Contract\DriverAwareTrait;
use Concept\Singularity\Contract\Initialization\AutoConfigureInterface;

class Connection implements ConnectionInterface, AutoConfigureInterface
{
    use ConfigurableTrait;
    use DriverAwareTrait;

    private ?DmlManagerInterface $dmlManager = null;

    public function __construct(
        private readonly DmlManagerFactoryInterface $dmlManagerFactory
    )
    {
        echo "CONNECTION CREATED";
    }

    public function autoConfigure(ConfigInterface $config): void
    {
        echo "<hr>autoConfigure<hr>";
        print_r($config->get());
        $this->setConfig($config);
    }
    
    protected function getDMLMamnagerFactory(): DmlManagerFactoryInterface
    {
        return $this->dmlManagerFactory;
    }

    /**
     * Get the DML manager
     * 
     * @return DmlManagerInterface
     */
    public function getDmlManager(): DmlManagerInterface
    {
        if ($this->dmlManager === null) {
            $this->dmlManager = $this
                ->getDMLMamnagerFactory()
                    ->create()
            ;
        }

        /**
         * DML Manager must be connected to the database
         * to use quote as decorator
         */
        if (!$this->isConnected()) {
            $this->connect();
        }

        return $this->dmlManager;
    }

    /**
     * Connect to the database
     * 
     * @return static
     */
    public function connect(?ConfigInterface $config = null): static
    {
        $this->getDriver()->connect($config ?? $this->getConfig());

        return $this;
    }

    /**
     * Disconnect from the database
     * 
     * @return static
     */
    public function disconnect(): static
    {
        $this->getDriver()->disconnect();

        return $this;
    }

    /**
     * Check if the connection is connected
     * 
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->getDriver()->isConnected();
    }

    
}
