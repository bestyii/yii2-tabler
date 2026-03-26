<?php

declare(strict_types=1);

namespace bestyii\tabler\Concerns;

use BadMethodCallException;

trait HasPresetStaticCalls
{
    /**
     * @param array<int|string, mixed> $arguments
     */
    public static function __callStatic(string $name, array $arguments): mixed
    {
        if (!array_key_exists($name, static::PRESET_SHORTCUTS)) {
            throw new BadMethodCallException(sprintf('Call to undefined method %s::%s()', static::class, $name));
        }

        $preset = static::PRESET_SHORTCUTS[$name];

        // Forward the resolved preset and preserve the caller's positional and named arguments.
        /** @var callable(mixed...): mixed $factory */
        $factory = [static::class, 'make'];

        return $factory($preset, ...$arguments);
    }
}
