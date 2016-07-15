# PHP Stack Util

[![Build Status](https://travis-ci.org/markenwerk/php-stack-util.svg?branch=master)](https://travis-ci.org/markenwerk/php-stack-util)
[![Test Coverage](https://codeclimate.com/github/markenwerk/php-stack-util/badges/coverage.svg)](https://codeclimate.com/github/markenwerk/php-stack-util/coverage)
[![Dependency Status](https://www.versioneye.com/user/projects/577d62ac91aab50027c6ca4d/badge.svg)](https://www.versioneye.com/user/projects/577d62ac91aab50027c6ca4d)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/2323e4c0-64f1-4976-87f2-6b459b8c338e.svg)](https://insight.sensiolabs.com/projects/2323e4c0-64f1-4976-87f2-6b459b8c338e)
[![Code Climate](https://codeclimate.com/github/markenwerk/php-stack-util/badges/gpa.svg)](https://codeclimate.com/github/markenwerk/php-stack-util)
[![Latest Stable Version](https://poser.pugx.org/markenwerk/stack-util/v/stable)](https://packagist.org/packages/markenwerk/stack-util)
[![Total Downloads](https://poser.pugx.org/markenwerk/stack-util/downloads)](https://packagist.org/packages/markenwerk/stack-util)
[![License](https://poser.pugx.org/markenwerk/stack-util/license)](https://packagist.org/packages/markenwerk/stack-util)

A PHP library providing common Stack implementation.

## Installation

```{json}
{
   	"require": {
        "markenwerk/stack-util": "~1.0"
    }
}
```

## Usage

### Autoloading and namesapce

```{php}  
require_once('path/to/vendor/autoload.php');
```

### Handling a stack

#### Pushing to the stack

```{php}
use Markenwerk\StackUtil\Stack;

$stack = new Stack();

$stack
	->push('Item')
	->push('Another item')
	->push(12)
	->push(null)
	->push(8.12);

$stackSize = $stack->size();
echo 'Stack size: ' . $stackSize . PHP_EOL;
```

##### Output

```{http}
Stack size: 5
```

### Reading from the stack

#### Getting the last item

```{php}
$lastItem = $stack->get();
echo 'Last item: ' . $lastItem . PHP_EOL;
```

##### Output

```{http}
Last item: 8.12
```

#### Getting an item by index

If the index is not available `null` is returned

```{php}
$secondItem = $stack->get(1);
echo 'Second item: ' . $secondItem . PHP_EOL;
```

##### Output

```{http}
Second item: Another item
```

### Popping from the stack

```{php}
$poppedItem = $stack->pop();
echo 'Popped item: ' . $poppedItem . PHP_EOL;

$stackSize = $stack->size();
echo 'Stack size: ' . $stackSize . PHP_EOL;
```

##### Output

```{http}
Popped item: 8.12
Stack size: 4
```

### Updating stacked values

#### Updating the last item

```{php}
$lastItem = $stack
	->set('9.12')
	->get();
echo 'Updated last item: ' . $lastItem . PHP_EOL;
```

##### Output

```{http}
Updated last item: 9.12
```

#### Updating an item by index

```{php}
$thirdItem = $stack
	->set('Third item', 2)
	->get(2);
echo 'Updated third item: ' . $thirdItem . PHP_EOL;
```

##### Output

```{http}
Updated third item: Third item
```

### Removing from the stack

```{php}
echo 'Stack size: ' . $stack->size() . PHP_EOL;
$stack->delete(1);
echo 'Stack size: ' . $stack->size() . PHP_EOL;
```

##### Output

```{http}
Stack size: 4
Stack size: 3
```

### Iterating over the stack

#### Using `foreach`

```{php}
foreach ($stack as $stackItemKey => $stackItemValue) {
	echo 'Stack item ' . $stackItemKey . ': ' . $stackItemValue . PHP_EOL;
}
```

##### Output

```{http}
Stack item 0: Item
Stack item 1: Third item
Stack item 2: 9.12
```

#### Using `for`

```{php}
for ($i = 0; $i < $stack->size(); $i++) {
	echo 'Stack index ' . $i . ': ' . $stack->get($i) . PHP_EOL;
}
```

##### Output

```{http}
Stack index 0: Item
Stack index 1: Third item
Stack index 2: 9.12
```

---

## Contribution

Contributing to our projects is always very appreciated.  
**But: please follow the contribution guidelines written down in the [CONTRIBUTING.md](https://github.com/markenwerk/php-stack-util/blob/master/CONTRIBUTING.md) document.**

## License

PHP Stack Util is under the MIT license.
