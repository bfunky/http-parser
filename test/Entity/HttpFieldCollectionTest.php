<?php
/**
 * Author: bfunky
 */

namespace BFunky\Test\HttpParser\Entity;


use BFunky\HttpParser\Entity\HttpField;
use BFunky\HttpParser\Entity\HttpFieldCollection;
use PHPUnit\Framework\TestCase;

class HttpFieldCollectionTest extends TestCase
{
    public function testGetElement()
    {
        $collection = new HttpFieldCollection([HttpField::fromKeyAndValue('key', 'value')]);
        $element = $collection->get('key');
        $this->assertEquals('value', $element->getValue());
    }

    public function testAddElement()
    {
        $collection = new HttpFieldCollection();
        $collection->add(HttpField::fromKeyAndValue('key', 'value'));
        $element = $collection->get('key');
        $this->assertEquals('value', $element->getValue());
    }

    /**
     * @expectedException \BFunky\HttpParser\Exception\HttpFieldNotFoundOnCollection
     */
    public function testDeleteElement(){
        $collection = new HttpFieldCollection([HttpField::fromKeyAndValue('key', 'value')]);
        $collection->delete('key');
        $collection->get('key');
    }

    public function testNamedConstructorFromHttpFieldArray(){
        $collection =  HttpFieldCollection::fromHttpFieldArray([HttpField::fromKeyAndValue('key', 'value')]);
        $element = $collection->get('key');
        $this->assertEquals('value', $element->getValue());
    }

    /**
     * @expectedException \BFunky\HttpParser\Exception\HttpFieldNotFoundOnCollection
     */
    public function testGetMethodReturnsErrorIfElementDoesNotExists()
    {
        $collection = new HttpFieldCollection();
        $collection->add(HttpField::fromKeyAndValue('key', 'value'));
        $element = $collection->get('key');
    }

    /**
     * @expectedException \BFunky\HttpParser\Exception\HttpFieldNotFoundOnCollection
     */
    public function testDeleteMethodReturnsErrorIfElementDoesNotExists()
    {
        $collection = new HttpFieldCollection();
        $collection->delete('key');
    }
}
