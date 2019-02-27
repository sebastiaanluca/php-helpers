<?php

namespace SebastiaanLuca\Helpers\Tests\Unit\Classes;

use SebastiaanLuca\PhpHelpers\Classes\Enum;
use SebastiaanLuca\PhpHelpers\Tests\TestCase;

class ConstantsHelperTest extends TestCase
{
    /**
     * @test
     */
    public function it returns all constants() : void
    {
        $class = new class
        {
            use Enum;

            public const FIRST_CONSTANT = 1;
            public const SECOND_CONSTANT = 2;
            public const THIRD_CONSTANT = 3;
        };

        $this->assertEquals([
            'FIRST_CONSTANT' => 1,
            'SECOND_CONSTANT' => 2,
            'THIRD_CONSTANT' => 3,
        ], $class::enums());
    }

    /**
     * @test
     */
    public function it returns all constant names() : void
    {
        $class = new class
        {
            use Enum;

            public const FIRST_CONSTANT = 1;
            public const SECOND_CONSTANT = 2;
            public const THIRD_CONSTANT = 'three';
        };

        $this->assertEquals([
            'FIRST_CONSTANT',
            'SECOND_CONSTANT',
            'THIRD_CONSTANT',
        ], $class::keys());
    }

    /**
     * @test
     */
    public function it returns all constant values() : void
    {
        $class = new class
        {
            use Enum;

            public const FIRST_CONSTANT = 1;
            public const SECOND_CONSTANT = 'two';
            public const THIRD_CONSTANT = 3;
        };

        $this->assertEquals([
            1,
            'two',
            3,
        ], $class::values());
    }
}
