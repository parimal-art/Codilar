# JavaScript Function Definitions - Summary Notes (with Output)

---

# 📌 Function Definition vs Function Declaration

## Function Definition
A **function definition** is a general term for creating a function.

It includes:
- Function Declaration
- Function Expression
- Arrow Function
- Function Constructor
- Object Method

---

## Function Declaration

A **function declaration** uses the `function` keyword with a required function name.

```javascript
function multiply(a, b) {
  return a * b;
}
```

### Output

```javascript
console.log(multiply(4,5));
```

```
20
```

### Features
- Uses `function` keyword
- Function name is required
- Hoisted
- Can be called before declaration

---

# Ways to Define a Function

## 1. Function Declaration

```javascript
function add(a, b) {
    return a + b;
}

console.log(add(5,3));
```

### Output

```
8
```

---

## 2. Function Expression

### Anonymous Function

```javascript
const multiply = function(a,b){
    return a*b;
}

console.log(multiply(5,6));
```

### Output

```
30
```

---

### Named Function Expression

```javascript
const multiply = function product(a,b){
    return a*b;
}

console.log(multiply(2,4));
```

### Output

```
8
```

### Features
- Stored in a variable
- Can be anonymous
- Executes only after definition
- Not fully hoisted

---

## 3. Arrow Function

```javascript
const multiply = (a,b) => a*b;

console.log(multiply(4,8));
```

### Output

```
32
```

### Features
- ES6 syntax
- Short and clean
- No own `this`

---

## 4. Function Constructor

```javascript
const multiply = new Function(
    "a",
    "b",
    "return a*b"
);

console.log(multiply(5,4));
```

### Output

```
20
```

### Features
- Rarely used
- Slower
- Avoid unless necessary

Equivalent to:

```javascript
const multiply = function(a,b){
    return a*b;
}
```

---

## 5. Object Method

```javascript
const calculator = {
    multiply(a,b){
        return a*b;
    }
}

console.log(calculator.multiply(5,6));
```

### Output

```
30
```

---

# Function Invocation

Functions execute only when they are called.

```javascript
function greet(){
    console.log("Hello");
}

greet();
```

### Output

```
Hello
```

---

# Hoisting

## Function Declaration ✅

Can be called before definition.

```javascript
console.log(add(2,3));

function add(a,b){
    return a+b;
}
```

### Output

```
5
```

Reason: Function declarations are hoisted.

---

## Function Expression ❌

Cannot be called before definition.

```javascript
console.log(add(2,3));

const add = function(a,b){
    return a+b;
}
```

### Output

```
ReferenceError:
Cannot access 'add' before initialization
```

Reason: Only the variable is hoisted, not the function assignment.

---

# Function Declaration vs Function Expression

| Feature | Function Declaration | Function Expression |
|----------|----------------------|---------------------|
| Name Required | ✅ Yes | ❌ Optional |
| Hoisted | ✅ Yes | ❌ No |
| Call Before Definition | ✅ Yes | ❌ No |
| Stored in Variable | ❌ No | ✅ Yes |
| Anonymous Possible | ❌ No | ✅ Yes |
| Common Use | General reusable functions | Callbacks, Event Handlers |

---

# Functions Stored in Variables

```javascript
function multiply(a,b){
    return a*b;
}

let x = multiply;

console.log(x(4,5));
```

### Output

```
20
```

---

Another Example

```javascript
const multiply = function(a,b){
    return a*b;
}

console.log(multiply(3,7));
```

### Output

```
21
```

---

# Functions in Expressions

```javascript
function multiply(a,b){
    return a*b;
}

let result = multiply(4,5) * 2;

console.log(result);
```

### Output

```
40
```

---

# Function Constructor

```javascript
const sum = new Function(
    "a",
    "b",
    "return a+b"
);

console.log(sum(10,20));
```

### Output

```
30
```

---

# Functions are Objects

```javascript
function greet(){}

console.log(typeof greet);
```

### Output

```
function
```

Although `typeof` returns `"function"`, functions are special objects in JavaScript.

---

# `arguments.length`

Returns the number of arguments passed.

```javascript
function multiply(a,b){
    return arguments.length;
}

console.log(multiply());
console.log(multiply(5,6));
console.log(multiply(1,2,3));
```

### Output

```
0
2
3
```

---

# `toString()` Method

Returns the source code of a function as a string.

```javascript
function multiply(a,b){
    return a*b;
}

console.log(multiply.toString());
```

### Output

```javascript
function multiply(a,b){
    return a*b;
}
```

---

# Important Interview Points

### Function Declaration
- Uses `function` keyword
- Hoisted
- Can be called before declaration
- Name is required

### Function Expression
- Stored in variables
- Can be anonymous
- Cannot be called before definition
- Used in callbacks

### Arrow Function
- Introduced in ES6
- Short syntax
- No own `this`

### Function Constructor
- Creates functions dynamically
- Rarely used
- Slower than normal functions

### Object Method
- Function inside an object

### Functions are Objects
- `typeof` returns `"function"`
- Have methods and properties
- Can be assigned to variables
- Can be passed as arguments
- Can be returned from other functions

---

# Quick Revision

| Concept | Remember |
|----------|----------|
| Function Definition | General way of creating functions |
| Function Declaration | Hoisted, name required |
| Function Expression | Stored in variable, not hoisted |
| Arrow Function | Short ES6 syntax |
| Function Constructor | Rarely used |
| Object Method | Function inside object |
| `arguments.length` | Number of arguments received |
| `toString()` | Converts function to string |
| Functions | First-class objects in JavaScript |

---

# One-Line Summary

> **A function definition is any way of creating a function. A function declaration is one specific type of function definition that is hoisted, while function expressions are stored in variables and execute only after they are defined.**











