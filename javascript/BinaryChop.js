exports.chop = function (integer, sortedArray) {
  var integerIndex,
      length,
      choppedLength,
      i;

  length = sortedArray.length;

  if(length === 0)
    return -1;

  choppedLength = length;
  integerIndex  = Math.floor(length / 2);

  i = 0;

  do {

    choppedLength = Math.floor(choppedLength / 2);

    if(sortedArray[integerIndex] < integer) {
      // console.log('chopedLength ' + choppedLength + ' got added to integerIndex ' + integerIndex);
      integerIndex += choppedLength;

      // check to avoid off by one error in which integerIndex is equal
      // to the length of the array and thus, bigger than the last element's index
      if(integerIndex == length)
        integerIndex--;
    }
    else if(sortedArray[integerIndex] > integer) {
      // console.log('chopedLength ' + choppedLength + ' got subtracted from integerIndex ' + integerIndex);
      integerIndex -= choppedLength;
    }
    else
      break;

    i++;

    // "i !== length" acts as a failsafe to avoid infinite loops if the integer is not found
  } while(sortedArray[integerIndex] !== integer && i < length);

  // the integer is not in the sorted array
  if(sortedArray[integerIndex] !== integer)
    return -1;

  return integerIndex;
};