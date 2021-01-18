<?php

namespace ChromaX\StackUtil;

/**
 * Class StackTest
 *
 * @package ChromaX\StackUtil
 */
class StackTest extends \PHPUnit_Framework_TestCase
{

	public function testStack()
	{
		$stack = new Stack();
		$this->assertEquals(0, $stack->size());
		$stack
			->push('Item')
			->push('Another item')
			->push(12)
			->push(null)
			->push(8.12);
		$this->assertEquals(5, $stack->size());
		$this->assertEquals(8.12, $stack->get());
		$this->assertEquals('Another item', $stack->get(1));
		$this->assertEquals(8.12, $stack->pop());
		$this->assertEquals(4, $stack->size());
		$stack->set('9.12');
		$this->assertEquals('9.12', $stack->get());
		$stack->set('Third item', 2);
		$this->assertEquals('Third item', $stack->get(2));
		$stack->delete(1);
		$this->assertEquals(3, $stack->size());
		$stack->set('append', 10);
		$this->assertEquals(4, $stack->size());
		$stack->pop();
		$this->assertEquals(3, $stack->size());
		$notFound = $stack->get(100);
		$this->assertNull($notFound);
		$items = array();
		foreach ($stack as $stackItemKey => $stackItemValue) {
			$items[] = $stackItemValue;
		}
		$this->assertEquals('Item;Third item;9.12', implode(';', $items));
		$items = array();
		for ($i = 0; $i < $stack->size(); $i++) {
			$items[] = $stack->get($i);
		}
		$this->assertEquals('Item;Third item;9.12', implode(';', $items));
	}

}
