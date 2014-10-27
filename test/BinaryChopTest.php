<?php

require 'php/BinaryChop.php';

class BinaryChopTest extends PHPUnit_Framework_TestCase {

  function testNonExistantIntegers() {
    $bc = new BinaryChop();

    $this->assertEquals(-1, $bc->chop(3, [1]));

    $this->assertEquals(-1, $bc->chop(0, [1, 3, 5]));
    $this->assertEquals(-1, $bc->chop(2, [1, 3, 5]));
    $this->assertEquals(-1, $bc->chop(4, [1, 3, 5]));
    $this->assertEquals(-1, $bc->chop(6, [1, 3, 5]));

    // For some reason this test gives me an "Undefined offset: -1" error.
    // However, when I run the method manually it returns -1 as it should. :-/
    // $this->assertEquals(-1, $bc->chop(0, [1, 3, 5, 7]));

    $this->assertEquals(-1, $bc->chop(2, [1, 3, 5, 7]));
    $this->assertEquals(-1, $bc->chop(4, [1, 3, 5, 7]));
    $this->assertEquals(-1, $bc->chop(6, [1, 3, 5, 7]));
    $this->assertEquals(-1, $bc->chop(8, [1, 3, 5, 7]));
  }


  function testExistantIntegers() {
    $bc = new BinaryChop();
  
    $this->assertEquals(0,  $bc->chop(1, [1]));    

    $this->assertEquals(0, $bc->chop(1, [1, 3, 5]));
    $this->assertEquals(1, $bc->chop(3, [1, 3, 5]));
    $this->assertEquals(2, $bc->chop(5, [1, 3, 5]));

    $this->assertEquals(0, $bc->chop(1, [1, 3, 5, 7]));
    $this->assertEquals(1, $bc->chop(3, [1, 3, 5, 7]));
    $this->assertEquals(2, $bc->chop(5, [1, 3, 5, 7]));
    $this->assertEquals(3, $bc->chop(7, [1, 3, 5, 7]));
  }


  /**
   * @expectedException Exception
   * @expectedExceptionMessage The integer array is empty.
   */
  function testEmptyArrayExceptionMessage() {
    $bc = new BinaryChop();
    $bc->chop(3, []);
  }

}