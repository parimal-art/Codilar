// 1. Function Declaration
function multiply1(x, y) {
  return x * y;
}

// 2. Function Expression (Named)
const multiply2 = function namedMultiply(x, y) {
  return x * y;
};

// 3. Function Expression (Anonymous)
const multiply3 = function (x, y) {
  return x * y;
};

// 4. Arrow Function
const multiply4 = (x, y) => x * y;

// 5. Function Constructor
const multiply5 = new Function("x", "y", "return x * y");

// 6. Object Method
const obj = {
  multiply6(x, y) {
    return x * y;
  },
};

// Calling all functions
console.log(multiply1(5, 2)); // 10
console.log(multiply2(5, 2)); // 10
console.log(multiply3(5, 2)); // 10
console.log(multiply4(5, 2)); // 10
console.log(multiply5(5, 2)); // 10
console.log(obj.multiply6(5, 2)); // 10