<?php

namespace SebastiaanLuca\Helpers\Tests\Unit\Classes;

use SebastiaanLuca\PhpHelpers\Classes\MethodHelper;
use SebastiaanLuca\PhpHelpers\Tests\TestCase;

class MethodHelperTest extends TestCase
{
    /**
     * @test
     */
    public function it detects if a method of a certain visibility exists(): void
    {
        $class = new class {
            private function myMethod(): bool
            {
                return true;
            }
        };

        static::assertTrue(MethodHelper::hasMethodOfType($class, 'myMethod', 'private'));
    }

    /**
     * @test
     */
    public function it detects a missing method(): void
    {
        $class = new class {
            protected function myMethod(): bool
            {
                return true;
            }
        };

        static::assertFalse(MethodHelper::hasMethodOfType($class, 'myInvalidMethod', 'protected'));
    }

    /**
     * @test
     */
    public function it detects a method with different visibility(): void
    {
        $class = new class {
            public function myMethod(): bool
            {
                return true;
            }
        };

        static::assertFalse(MethodHelper::hasMethodOfType($class, 'myMethod', 'private'));
    }

    /**
     * @test
     */
    public function it detects a protected method(): void
    {
        $class = new class {
            protected function myMethod(): bool
            {
                return true;
            }
        };

        static::assertTrue(MethodHelper::hasProtectedMethod($class, 'myMethod'));
    }

    /**
     * @test
     */
    public function it detects a public method(): void
    {
        $class = new class {
            public function myMethod(): bool
            {
                return true;
            }
        };

        static::assertTrue(MethodHelper::hasPublicMethod($class, 'myMethod'));
    }
}
