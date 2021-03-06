<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
* @covers StringFormatter
*/

class StringFormatterTest extends TestCase
{
    private $stringFormater;

    /**
    * @before
    */
    public function setupProperties()
    {
        $this->stringFormater = new StringFormatter();
    }

    public function testConcat()
    {
        $result = $this->stringFormater->concat("Hello ", "world");
        $this->assertEquals($result, "Hello world");
    }

    public function testToCamelCase()
    {
        $this->assertEquals($this->stringFormater->toCamelCase("camel", "case"), "camelCase");
        $this->assertEquals($this->stringFormater->toCamelCase("CAMEL", "CASE"), "camelCase");
        $this->assertEquals($this->stringFormater->toCamelCase("CAMEL", "cASE"), "camelCase");
        $this->assertEquals($this->stringFormater->toCamelCase("Camel", "Case"), "camelCase");
        $this->assertEquals($this->stringFormater->toCamelCase("Camel", "case"), "camelCase");
        $this->assertEquals($this->stringFormater->toCamelCase("camel", "Case"), "camelCase");
    }

    public function testPrefix()
    {
        // with camelCase
        $this->assertEquals($this->stringFormater->prefix("camel", "case", true), "camelCase");
        $this->assertNotEquals($this->stringFormater->prefix("camel", "case", true), "camelcase");
      // without camelCase
        $this->assertNotEquals($this->stringFormater->prefix("camel", "case", false), "camelCase");
        $this->assertEquals($this->stringFormater->prefix("camel", "case", false), "camelcase");
    }

    public function testSuffix()
    {
        // with camelCase
        $this->assertEquals($this->stringFormater->suffix("camel", "case", true), "caseCamel");
        $this->assertNotEquals($this->stringFormater->suffix("camel", "case", true), "casecamel");
        // without camelCase
        $this->assertNotEquals($this->stringFormater->suffix("camel", "case", false), "caseCamel");
        $this->assertEquals($this->stringFormater->suffix("camel", "case", false), "casecamel");
    }
}
