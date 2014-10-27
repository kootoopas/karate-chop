<?php

class BinaryChop {

  private $integerArray;
  private $integer;
  private $integerIndex;
  private $length;

  function init($integer, $integerArray) {
    $this->setInteger($integer);
    $this->setIntegerArray($integerArray);
  }

  function chop($integer, $integerArray) {
    $this->init($integer, $integerArray);

    $choppedLength = $this->length;
    $this->_initIntegerIndex();

    $i = 0;

    do {

      $choppedLength = floor($choppedLength / 2);

      if($this->integerArray[$this->integerIndex] < $this->integer) {
        $this->integerIndex += $choppedLength;

        if($this->length == $this->integerIndex)
          $this->integerIndex--;
      }
      elseif ($this->integerArray[$this->integerIndex] > $this->integer)
        $this->integerIndex -= $choppedLength;
      else
        break;

      $i++;

    } while($this->integerArray[$this->integerIndex] !== $this->integer && $i < $this->length);

    if($this->integerArray[$this->integerIndex] !== $this->integer)
      return -1;
      
    return $this->integerIndex;
  }

  function setIntegerArray($integerArray = []) {

    if(count($integerArray) == 0)
      throw new Exception('The integer array is empty.');
      
    $this->integerArray = $integerArray;

    $this->_sortIntegerArray();
    $this->_setLength();
  }

  function getIntegerArray() {
    return $this->integerArray;
  }

  private function _sortIntegerArray() {
    sort($this->integerArray, SORT_ASC);

  }

  private function _setLength() {
    $this->length = count($this->integerArray);
  }

  function getLength() {
    return $this->length;
  }

  function setInteger($integer) {
    $this->integer = (int) floor($integer);
  }

  function getInteger() {
    return $this->integer;
  }

  private function _initIntegerIndex() {
    $this->integerIndex = floor($this->length / 2);
  }

  function getIntegerIndex() {
    return $this->integerIndex;
  }

}

// $bc = new BinaryChop();
// echo $bc->chop(0, [1, 3, 5, 7]);