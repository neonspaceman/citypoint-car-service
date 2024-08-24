<?php

namespace Tests\ModelBuilders\Car;

use App\Domain\Car\Models\Car;
use Faker\Generator;
use Illuminate\Support\Str;
use Tests\ModelBuilders\Assertions\ModelBuildProcessHasAlreadyStartedAssertion;
use Tests\ModelBuilders\Assertions\ModelBuildProcessHasNotStartedYetAssertion;

final class CarBuilder
{
    private ?Car $car = null;

    public function __construct(
        private Generator $faker,
    ) { }

    /**
     * @param array<mixed> $attributes
     */
    public function create(array $attributes = []): self
    {
        ModelBuildProcessHasNotStartedYetAssertion::assert($this->car);

        $this->car = new Car();
        $this->car->forceFill($this->compileAttributes($attributes));

        return $this;
    }

    public function getAndReset(): Car
    {
        ModelBuildProcessHasAlreadyStartedAssertion::assert(Car::class, $this->car);

        $car = $this->car;
        $car->push();
        $car->refresh();

        $this->reset();

        return $car;
    }

    /**
     * @param array<mixed> $attributes
     *
     * @return array<mixed>
     */
    private function compileAttributes(array $attributes): array
    {
        return array_merge($this->getRandomAttributes(), $attributes);
    }

    /**
     * @return array<mixed>
     */
    private function getRandomAttributes(): array
    {
        return [
            'RegNumber' => $this->faker->regexify('[A-Z] [0-9]{3} [A-Z]{2}'),
            'VIN' => Str::random(10),
            'Model' => $this->faker->word(),
            'Brand' => $this->faker->word(),
        ];
    }

    private function reset(): void
    {
        $this->car = null;
    }
}
