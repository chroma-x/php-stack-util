<?php

namespace ChromaX\StackUtil;

use Iterator;

/**
 * Interface StackInterface
 *
 * @package ChromaX\StackUtil
 */
interface StackInterface extends Iterator
{

	/**
	 * @return int
	 */
	public function size();

	/**
	 * @param int $index
	 * @return mixed
	 */
	public function get($index = null);

	/**
	 * @param mixed $value
	 * @param int $index
	 * @return $this
	 */
	public function set($value, $index = null);

	/**
	 * @param mixed $item
	 * @return $this
	 */
	public function push($item);

	/**
	 * @return mixed
	 */
	public function pop();

}
