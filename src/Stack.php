<?php

namespace ChromaX\StackUtil;

/**
 * Class Stack
 *
 * @package ChromaX\StackUtil
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
	 * @return int
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
	 * @param int $index
	 * @return $this
	 */
	public function delete($index)
	{
		if (isset($this->items[$index])) {
			unset($this->items[$index]);
			$this->items = array_values($this->items);
		}
		return $this;
	}

	/**
	 * Return the current element
	 *
	 * @link http://php.net/manual/en/iterator.current.php
	 * @return mixed
	 */
	#[\ReturnTypeWillChange]
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
	#[\ReturnTypeWillChange]
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
	#[\ReturnTypeWillChange]
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
	#[\ReturnTypeWillChange]
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
	#[\ReturnTypeWillChange]
	public function rewind()
	{
		$this->cursor = 0;
	}

}
