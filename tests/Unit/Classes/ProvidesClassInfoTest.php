<?php

namespace SebastiaanLuca\Helpers\Tests\Unit\Classes;

use ReflectionClass;
use SebastiaanLuca\PhpHelpers\Classes\ProvidesClassInfo;
use SebastiaanLuca\PhpHelpers\Tests\TestCase;

class ProvidesClassInfoTest extends TestCase
{
    /**
     * @test
     */
    public function it returns the class directory() : void
    {
        $class = new class
        {
            use ProvidesClassInfo;

            public function getDirectory()
            {
                return $this->getClassDirectory();
            }
        };

        $this->assertSame(
            dirname((new ReflectionClass($this))->getFileName()),
            $class->getDirectory()
        );
    }
}
