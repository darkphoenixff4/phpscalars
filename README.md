PHP Scalars
===========

By [Joe Fallon](http://blog.joefallon.net) 

PHP Scalars is a set of classes that provides two main capabilities:

1.  A set of wrapper classes for each of the PHP primitive types (i.e. `bool`, `int`,
    `float`, and `string`).
2.  A set of classes for working with arbitrary large integers and arbitrarily precise
    floating point numbers.

Installation
------------

The easiest way to install PHP Scalars is with
[Composer](https://getcomposer.org/). Create the following `composer.json` file
and run the `php composer.phar install` command to install it.

```json
{
    "require": {
        "joefallon/phpscalars": "*"
    }
}
```

Primitive Wrapper Classes
-------------------------

Providing wrapper (or box) classes for the PHP primitives allows type hinting to be used
for method parameters. It also ensures that nulls are not passed into methods. Also, it
eliminates the need to constantly perform casting of values using methods like
`intval()`, `floatval()`, and `strval()`.

All of the primitive wrapper classes provide a default value for the constructor.

The primitive wrapper classes include:
*   `Bool` (defaults to false)
*   `Float` (defaults to 0.0)
*   `Integer` (defaults to 0)
*   `String` (defaults to an empty string)

Here are examples of the usage of the primitive wrappers:

```php
$boolIn  = new Bool(true);       // <--- $boolIn is an instance of Bool
$boolOut = $boolIn->getValue();   // <--- $boolOut is true

$floatIn  = new Float(3.14);     // <--- $floatIn is an instance of Float
$floatOut = $floatIn->getValue();  // <--- $floatOut is 3.14

$intIn  = new Integer(5);        // <--- $intIn is an instance of Integer
$intOut = $intIn->getValue();    // <--- $intOut is 5

$strIn  = new String('string');  // <--- $strIn is an instance of String
$strOut = $strIn->getValue();    // <--- $strOut is 'string'
```

BigInt and Decimal Classes
--------------------------

BigInt provides the ability to perform basic math on arbitrarily large integers. Decimal
provides the ability to perform basic math on floating point numbers of arbitrary
precision. The BCMath library is used internally in both.

For the `Decimal` class, a `sprintf` method is provided for output formatting.

### Addition

Here is an example of adding two numbers using BigInt and Decimal:

```php
// BigInt Example
$bigInt1 = new BigInt(2);
$bigInt2 = new BigInt(3);
$bigInt3 = $bigInt1->add($bigInt2);

$bigInt3->toString();  // returns '5'

// Decimal Example
$decimal1 = new Decimal('1.1');
$decimal2 = new Decimal('2.2');
$decimal3 = $decimal1->add($decimal2);

$decimal3->toString();  // returns '3.3'
```

### Subtraction

Here is an example of subtracting two numbers using BigInt and Decimal:

```php
// BigInt Example
$bigInt1 = new BigInt(5);
$bigInt2 = new BigInt(3);
$bigInt3 = $bigInt1->subtract($bigInt2);

$bigInt3->toString();  // returns '2'

// Decimal Example
$decimal1 = new Decimal('3.3');
$decimal2 = new Decimal('2.2');
$decimal3 = $decimal1->subtract($decimal2);

$decimal3->toString();  // returns '1.1'
```

### Multiplication

Here is an example of multiplying two numbers using BigInt and Decimal:

```php
// BigInt Example
$bigInt1 = new BigInt(2);
$bigInt2 = new BigInt(3);
$bigInt3 = $bigInt1->multiply($bigInt2);

$bigInt3->toString();  // returns '6'

// Decimal Example
$decimal1 = new Decimal('3.3');
$decimal2 = new Decimal('2.2');
$decimal3 = $decimal1->multiply($decimal2);

$decimal3->toString();  // returns '7.26'
```

### Division

Here is an example of dividing two numbers using BigInt and Decimal:

```php
// BigInt Example
$bigInt1 = new BigInt(6);
$bigInt2 = new BigInt(2);
$bigInt3 = $bigInt1->divide($bigInt2);

$bigInt3->toString();  // returns '3'

// Decimal Example
$decimal1 = new Decimal('3.3');
$decimal2 = new Decimal('2.2');
$decimal3 = $decimal1->divide($decimal2);

$decimal3->toString();  // returns '1.5'
```

### Modulus

Here is an example of calculating the modulus using BigInt:

```php
$bigInt1 = new BigInt(10);
$bigInt2 = new BigInt(3);
$bigInt3 = $bigInt1->modulus($bigInt2);

$bigInt3->toString();  // returns '1'
```

### Raise to a Power

Here is an example of raising a floating point number to a power using Decimal:

```php
$decimal1 = new Decimal('3.3');
$decimal2 = new Decimal('2');
$decimal3 = $decimal1->pow($decimal2);

$decimal3->toString();  // returns '10.89'
```

### Comparison

Here is an example of comparing two numbers using BigInt:

```php
$i1 = new BigInt(6);
$i2 = new BigInt(3);

$i1->compare($i2);  // returns 1  ($i1 is greater than $i2)

$i1 = new BigInt(3);
$i2 = new BigInt(3);

$i1->compare($i2);  // returns 0 ($i1 is equal to $i2)

$i1 = new BigInt(3);
$i2 = new BigInt(6);

$i1->compare($i2);  // returns -1 ($i1 is less than $i2)
```

Here is an example of comparing two numbers using Decimal:

```php
$d1 = new Decimal(3.3);
$d2 = new Decimal(2.0);
$d3 = new Decimal(2.0);

$d2->compare($d1);          // returns -1 ($d2 is less than $d1)
$d1->compare($d2);          // returns  1 ($d1 is greater than $d2)
$d2->compare($d3, 0.0001);  // returns  0 ($d2 is equal to $d3)
```

### Output Formatting

Here is an example of padding an integer with zeros using sprintf:

```php
$integer = new BigInt(2);
$integer->sprintf('%02s');  // returns '02'
```

Here is an example of padding a floating point number with zeros using sprintf:

```php
$decimal = new Decimal(2.1);
$decimal->sprintf('%04s');  // returns '02.1'
```

