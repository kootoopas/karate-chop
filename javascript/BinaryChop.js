var chop = module.exports = {};

chop.chop = function chop(integer, sortedArray) {
  var length = sortedArray.length;
  var choppedLength = length;
  var integerIndex = Math.floor(length / 2);
  var i = 0;

  if(length === 0) return -1;

  do {

    choppedLength = Math.floor(choppedLength / 2);

    if(sortedArray[integerIndex] < integer) {
      integerIndex += choppedLength;

      // check to avoid off by one error in which integerIndex is equal
      // to the length of the array, thus, bigger than the last element's index
      if(integerIndex === length) integerIndex--;
    }
    else if(sortedArray[integerIndex] > integer) integerIndex -= choppedLength;
    else break;

    i++;

    // "i !== length" acts as a failsafe to avoid infinite loops if the integer
    // is not found
  } while(sortedArray[integerIndex] !== integer && i < length);

  // the integer is not in the sorted array
  if(sortedArray[integerIndex] !== integer) return -1;

  return integerIndex;
};
