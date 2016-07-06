<?php

namespace Markenwerk\StackUtil;

/**
 * Class Stack
 *
 * @package Markenwerk\StackUtil
 */
class Stack implements StackInterface
{

	/**
	 * @var mixed[]
	 */
	private $items = array();

	/**
	 * @var int
	 */
	private $cursor = 0;

	/**
	 * @return mixed
	 */
	public function size()
	{
		return count($this->items);
	}

	/**
	 * @param int $index
	 * @return mixed
	 */
	public function get($index = null)
	{
		if (is_null($index)) {
			$index = $this->size() - 1;
		}
		if (isset($this->items[$index])) {
			return $this->items[$index];
		}
		return null;
	}

	/**
	 * @param mixed $value
	 * @param int $index
	 * @return $this
	 */
	public function set($value, $index = null)
	{
		if (is_null($index)) {
			// Find last item
			$index = $this->size() - 1;
		}
		if ($index > $this->size()) {
			// Index too large; append item
			$this->items[] = $value;
		} else {
			$this->items[$index] = $value;
		}
		return $this;
	}

	/**
	 * @param mixed $item
	 * @return $this
	 */
	public function push($item)
	{
		$this->items[] = $item;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function pop()
	{
		return array_pop($this->items);
	}

	/**
	 * Return the current element
	 *
	 * @link http://php.net/manual/en/iterator.current.php
	 * @return mixed
	 */
	public function current()
	{
		return $this->items[$this->cursor];
	}

	/**
	 * Move forward to next element
	 *
	 * @link http://php.net/manual/en/iterator.next.php
	 * @return void
	 */
	public function next()
	{
		++$this->cursor;
	}

	/**
	 * Return the key of the current element
	 *
	 * @link http://php.net/manual/en/iterator.key.php
	 * @return mixed scalar on success, or null on failure.
	 */
	public function key()
	{
		return $this->cursor;
	}

	/**
	 * Checks if current position is valid
	 *
	 * @link http://php.net/manual/en/iterator.valid.php
	 * @return boolean
	 */
	public function valid()
	{
		return isset($this->items[$this->cursor]);
	}

	/**
	 * Rewind the Iterator to the first element
	 *
	 * @link http://php.net/manual/en/iterator.rewind.php
	 * @return void
	 */
	public function rewind()
	{
		$this->cursor = 0;
	}

}
