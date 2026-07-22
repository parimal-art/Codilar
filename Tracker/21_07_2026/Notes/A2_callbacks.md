# JavaScript Callbacks - Summary Notes (with Output)

---

# 📌 What is a Callback?

A **callback** is a function passed as an argument to another function, which is executed later after a specific task is completed.

> **Simple Definition:**  
> A callback is **a function that is passed into another function to be called later.**

---

# Basic Syntax

```javascript
function greet(name) {
    console.log("Hello " + name);
}

function processUser(callback) {
    callback("Parimal");
}

processUser(greet);
```

### Output

```
Hello Parimal
```

---

# Why are Callbacks Used?

Callbacks help us:

- Execute code later
- Handle asynchronous operations
- Handle events
- Control execution order
- Reuse functions

---

# Callback Flow

```
Main Function
      │
      ▼
Receives Callback
      │
      ▼
Performs Task
      │
      ▼
Calls Callback
      │
      ▼
Callback Executes
```

---

# Types of Callbacks

## 1. Synchronous Callback

Runs immediately while the outer function is executing.

```javascript
const numbers = [1,2,3];

numbers.forEach(function(num){
    console.log(num);
});
```

### Output

```
1
2
3
```

### Features

- Executes immediately
- Blocks the next line until finished
- Used in array methods

---

## 2. Asynchronous Callback

Runs later after some delay or event.

```javascript
console.log("Start");

setTimeout(function(){
    console.log("Hello");
},2000);

console.log("End");
```

### Output

```
Start
End
Hello
```

Explanation

- `setTimeout()` waits for **2 seconds**
- JavaScript continues executing the remaining code
- Callback runs later

---

# Event Handling Callback

Callbacks are commonly used for user interactions.

```javascript
function showMessage(){
    console.log("Button Clicked");
}

document.getElementById("btn")
        .addEventListener("click", showMessage);
```

### Output

```
Button Clicked
```

(Only when the button is clicked.)

---

## Don't Use Parentheses

✅ Correct

```javascript
button.addEventListener("click", showMessage);
```

❌ Wrong

```javascript
button.addEventListener("click", showMessage());
```

Reason:

- `showMessage` → Passes the function
- `showMessage()` → Executes immediately

---

# Asynchronous Callback (`setTimeout`)

```javascript
function greeting(){
    console.log("Welcome!");
}

setTimeout(greeting,3000);
```

### Output (after 3 seconds)

```
Welcome!
```

---

# Array Methods Using Callbacks

## 1. `forEach()`

Executes callback once for every element.

```javascript
const numbers = [10,20,30];

numbers.forEach(function(value){
    console.log(value);
});
```

### Output

```
10
20
30
```

---

## 2. `map()`

Creates a **new array**.

```javascript
const numbers = [1,2,3];

const result = numbers.map(function(num){
    return num*2;
});

console.log(result);
```

### Output

```
[2, 4, 6]
```

---

## 3. `filter()`

Returns elements that satisfy a condition.

```javascript
const numbers = [10,15,20,25];

const even = numbers.filter(function(num){
    return num % 2 === 0;
});

console.log(even);
```

### Output

```
[10, 20]
```

---

# Sequence Control Without Callback

```javascript
function calculator(a,b){
    return a+b;
}

function display(result){
    console.log(result);
}

let sum = calculator(5,5);

display(sum);
```

### Output

```
10
```

Problem:

- Need to call two functions separately.

---

# Sequence Control Inside Function

```javascript
function display(result){
    console.log(result);
}

function calculator(a,b){
    let sum = a+b;
    display(sum);
}

calculator(5,5);
```

### Output

```
10
```

Problem:

- `calculator()` always displays the result.
- Less flexible.

---

# Sequence Control Using Callback ⭐

```javascript
function display(result){
    console.log(result);
}

function calculator(a,b,callback){
    let sum = a+b;
    callback(sum);
}

calculator(5,5,display);
```

### Output

```
10
```

Benefits

- More flexible
- Reusable
- Caller decides what happens after calculation

---

# Callback Using Anonymous Function

```javascript
function calculator(a,b,callback){
    callback(a+b);
}

calculator(5,6,function(result){
    console.log(result);
});
```

### Output

```
11
```

---

# Callback Using Arrow Function

```javascript
function calculator(a,b,callback){
    callback(a+b);
}

calculator(5,7,(result)=>{
    console.log(result);
});
```

### Output

```
12
```

---

# Callback Key Concepts

## 1. Function as an Argument

Functions can be passed just like variables.

```javascript
function greet(){
    console.log("Hello");
}

function execute(fn){
    fn();
}

execute(greet);
```

### Output

```
Hello
```

---

## 2. Deferred Execution

The callback doesn't execute immediately.

It executes:

- After a delay
- After an event
- After an API response
- After file reading
- After a task completes

Example

```javascript
console.log("Loading...");

setTimeout(function(){
    console.log("Completed");
},1000);
```

### Output

```
Loading...
Completed
```

---

# Real-Life Example

Imagine ordering food 🍕

```
You order food
        │
        ▼
Restaurant cooks
        │
        ▼
Food is ready
        │
        ▼
Restaurant calls you
```

The **phone call** is like a **callback**.

---

# Common Uses of Callbacks

- `setTimeout()`
- `setInterval()`
- Event listeners
- API requests
- File reading
- Database operations
- Array methods (`map`, `filter`, `forEach`, `reduce`)

---

# Important Interview Points

### Callback

- Function passed as an argument
- Executed later
- Enables asynchronous programming

### Synchronous Callback

- Executes immediately
- Used in array methods

### Asynchronous Callback

- Executes later
- Used with timers, events, APIs

### Event Callback

- Executes when an event occurs

### `setTimeout()`

- Executes callback after specified delay

### `forEach()`

- Performs action on every array element

### `map()`

- Returns a new transformed array

### `filter()`

- Returns elements matching a condition

---

# Quick Revision

| Concept | Remember |
|----------|----------|
| Callback | Function passed as an argument |
| Synchronous Callback | Executes immediately |
| Asynchronous Callback | Executes later |
| `setTimeout()` | Delayed callback |
| `forEach()` | Iterates through array |
| `map()` | Returns new array |
| `filter()` | Returns filtered array |
| Event Listener | Executes callback on user action |
| Callback Benefit | Better sequence control and asynchronous programming |

---

# One-Line Summary

> **A callback is a function passed into another function so it can be executed later, enabling event-driven programming, asynchronous operations, and flexible control over the execution sequence.**