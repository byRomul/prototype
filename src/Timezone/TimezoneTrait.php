<?php

namespace App\Timezone;

trait TimezoneTrait
{
    private $context = [];

    public function addTimezoneContext(string $context): void
    {
        $this->context[$context] = true;
    }

    public function removeTimeZoneContext(string $context): void
    {
        unset($this->context[$context]);
    }

    protected function needToConvert(): bool
    {
        if (!($this instanceof LocatedInRegionInterface)) {
            return false;
        }

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);

        return $this->isAvailableContext($trace) && $this->isTimezoneProperty($trace);
    }

    protected function isAvailableContext(array $trace)
    {
        return isset($this->context[$trace[2]['class']]);
    }

    protected function isTimezoneProperty(array $trace): bool
    {
        return in_array($trace[1]['function'], $this->getTimezoneProperties());
    }

    protected function getConverted(): \DateTime
    {
        /** @var \DateTime $dt */
        $dt = clone $this->{debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function']}();

        return $dt->setTimezone(new \DateTimeZone($this->getRegion()->getTimezone()));
    }

    abstract protected function getTimezoneProperties(): array;

    abstract public function getRegion(): Region;
}