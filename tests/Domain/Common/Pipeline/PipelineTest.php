<?php

namespace Draftlab\Tests\Domain\Common\Pipeline;

use Draftlab\Domain\Common\Pipe;
use Draftlab\Domain\Common\Pipeline;
use PHPUnit\Framework\TestCase;

class PipelineTest extends TestCase
{
    public function testPipelineWithAnonymousClasses(): void
    {
        $stepOne = new class () implements Pipe {
            public function __invoke(mixed $passenger): mixed
            {
                return $passenger + 5;
            }
        };

        $stepTwo = new class () implements Pipe {
            public function __invoke(mixed $passenger): int|float
            {
                return $passenger * 2;
            }
        };

        $pipeline = new Pipeline()
            ->pipe($stepOne)
            ->pipe($stepTwo);

        $this->assertEquals(20, $pipeline->carry(5));
    }

    public function testPipelineWithClassString(): void
    {
        $pipeline = new Pipeline()
            ->pipe(ExamplePipe::class);

        $this->assertEquals(150, $pipeline->carry(10));
    }

    public function testPipelineWithClass(): void
    {

        $pipeline = new Pipeline()
            ->pipe(new ExamplePipe);

        $this->assertEquals(150, $pipeline->carry(10));
    }

    public function testPipelineWithCallable(): void
    {

        $pipeline = new Pipeline()
            ->pipe(fn ($passenger) => $passenger + 25);

        $this->assertEquals(35, $pipeline->carry(10));
    }

    public function testPipesOfDifferentTypesCanBeCombined(): void
    {
        $anonymousClass = new class () implements Pipe {
            public function __invoke(mixed $passenger): mixed
            {
                return $passenger + 5;
            }
        };

        $pipeline = new Pipeline()
            ->pipe(new ExamplePipe)
            ->pipe(AlternatePipe::class)
            ->pipe($anonymousClass)
            ->pipe(fn ($passenger) => $passenger - 25);

        $this->assertEquals(55, $pipeline->carry(10));
    }

    public function testPipesPassThroughArrayValues(): void
    {
        $pipe = new class() implements Pipe {
            public function __invoke(mixed $passenger): array
            {
                $passenger['array'][] = 3;
                return $passenger;
            }
        };

        $pipeline = new Pipeline()
            ->pipe($pipe);

        $this->assertEquals([
            'array' => [1, 2, 3],
            'foo' => 'bar'
        ], $pipeline->carry([
            'array' => [1, 2],
            'foo' => 'bar'
        ]));
    }
}
