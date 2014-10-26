var bc = require('../javascript/BinaryChop');

module.exports = {
  emptyArrayTest: function (test) {
    console.log('\nShould return -1 due to empty array input:');

    test.equal(-1, bc.chop(3, []));
    
    test.done();
  },

  nonExistantIntsTest: function (test) {
    console.log('\nShould return -1 in every test:');

    test.equal(-1, bc.chop(3, [1]));

    test.equal(-1, bc.chop(0, [1, 3, 5]));
    test.equal(-1, bc.chop(2, [1, 3, 5]));
    test.equal(-1, bc.chop(4, [1, 3, 5]));
    test.equal(-1, bc.chop(6, [1, 3, 5]));

    test.equal(-1, bc.chop(0, [1, 3, 5, 7]));
    test.equal(-1, bc.chop(2, [1, 3, 5, 7]));
    test.equal(-1, bc.chop(4, [1, 3, 5, 7]));
    test.equal(-1, bc.chop(6, [1, 3, 5, 7]));
    test.equal(-1, bc.chop(8, [1, 3, 5, 7]));

    test.done();
  },

  existantIntsTest: function (test) {
    console.log('\nShould return the array index of the requested integer in every test:');

    test.equal(0,  bc.chop(1, [1]));    

    test.equal(0, bc.chop(1, [1, 3, 5]));
    test.equal(1, bc.chop(3, [1, 3, 5]));
    test.equal(2, bc.chop(5, [1, 3, 5]));

    test.equal(0, bc.chop(1, [1, 3, 5, 7]));
    test.equal(1, bc.chop(3, [1, 3, 5, 7]));
    test.equal(2, bc.chop(5, [1, 3, 5, 7]));
    test.equal(3, bc.chop(7, [1, 3, 5, 7]));

    test.done();
  }


};