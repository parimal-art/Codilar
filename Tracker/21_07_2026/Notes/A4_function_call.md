# JavaScript `call()` Method - Summary Notes (with Output)

---

# 📌 What is `call()`?

The **`call()`** method is used to **call a function with a specific `this` value**.

It allows one object to use a method that belongs to another object.

> **Simple Definition:**  
> `call()` lets you manually set the value of `this` while immediately executing the function.

---

# Why Use `call()`?

`call()` is useful when:

- You want to control the value of `this`
- You want one object to use another object's method
- You want to pass arguments individually

---

# Basic Syntax

```javascript
functionName.call(thisValue, arg1, arg2, ...);
```

### Parameters

| Parameter | Description |
|-----------|-------------|
| `thisValue` | Object that `this` should refer to |
| `arg1, arg2...` | Arguments passed individually |

---

# Basic Example

```javascript
const person = {
    name: "John"
};

function greet(){
    console.log("Hello " + this.name);
}

greet.call(person);
```

### Output

```
Hello John
```

Here,

```
this → person
```

---

# Setting `this` Using `call()`

```javascript
const person1 = { name: "John" };
const person2 = { name: "Paul" };
const person3 = { name: "Ringo" };

function greet(message){
    return message + " " + this.name;
}

console.log(greet.call(person3, "Hello"));
```

### Output

```
Hello Ringo
```

---

# Borrowing Methods

`call()` allows one object to use another object's method.

---

## Example 1

```javascript
const person = {

    fullName:function(){
        return this.firstName + " " + this.lastName;
    }

};

const person1 = {

    firstName:"John",
    lastName:"Doe"

};

console.log(person.fullName.call(person1));
```

### Output

```
John Doe
```

---

## Example 2

```javascript
const person = {

    fullName:function(){
        return this.firstName + " " + this.lastName;
    }

};

const person2 = {

    firstName:"Mary",
    lastName:"Doe"

};

console.log(person.fullName.call(person2));
```

### Output

```
Mary Doe
```

---

# `call()` with Arguments

Arguments are passed **one by one**, separated by commas.

```javascript
const person = {

    fullName:function(city,country){

        return this.firstName + " " +
               this.lastName + ", " +
               city + ", " +
               country;

    }

};

const person1 = {

    firstName:"John",
    lastName:"Doe"

};

console.log(
    person.fullName.call(person1,"Oslo","Norway")
);
```

### Output

```
John Doe, Oslo, Norway
```

---

# Normal Function Call vs `call()`

## Normal Function Call

```javascript
function showName(){
    return this.name;
}

const person = {

    name:"John"

};

console.log(showName());
```

### Output (Browser)

```
undefined
```

or

```
Window
```

Depends on the environment and strict mode.

Reason:

`this` is **not** the `person` object.

---

## Using `call()`

```javascript
function showName(){
    return this.name;
}

const person = {

    name:"John"

};

console.log(showName.call(person));
```

### Output

```
John
```

---

# `call()` Executes Immediately

```javascript
function sayHello(){
    return "Hello " + this.name;
}

const person = {

    name:"John"

};

console.log(
    sayHello.call(person)
);
```

### Output

```
Hello John
```

`call()` immediately invokes the function.

---

# `call()` Does NOT Return a New Function

```javascript
function greet(){
    console.log(this.name);
}

const person = {

    name:"John"

};

greet.call(person);
```

### Output

```
John
```

Unlike `bind()`, `call()` does **not** create a reusable function.

---

# Real-Life Example

Imagine two students.

```
Student A
    │
    ▼
Has a Calculator

Student B
    │
    ▼
Uses Student A's Calculator
```

`call()` lets **Student B borrow Student A's calculator** without creating a new one.

---

# `call()` Flow

```
Function
    │
    ▼
call(object)
    │
    ▼
this = object
    │
    ▼
Function Executes Immediately
```

---

# `call()` vs Normal Function Call

| Normal Call | `call()` |
|--------------|----------|
| `this` decided automatically | `this` decided manually |
| Cannot change `this` | Can change `this` |
| Executes normally | Executes immediately |
| Limited control | Full control over `this` |

---

# `call()` vs `apply()` vs `bind()`

| Method | Executes Immediately | Arguments | Returns New Function |
|---------|----------------------|-----------|----------------------|
| `call()` | ✅ Yes | Comma-separated | ❌ No |
| `apply()` | ✅ Yes | Array | ❌ No |
| `bind()` | ❌ No | Comma-separated | ✅ Yes |

---

# Common Mistakes

## ❌ Forgetting `call()` Executes Immediately

```javascript
greet.call(person);
```

This runs immediately.

---

## ❌ Passing Array to `call()`

Wrong

```javascript
greet.call(person, ["Hello"]);
```

Correct

```javascript
greet.call(person, "Hello");
```

Use `apply()` if arguments are in an array.

---

## ❌ Not Understanding `this`

Always know which object `this` should refer to.

---

# Important Interview Points

### `call()`

- Changes the value of `this`
- Executes function immediately
- Can borrow methods
- Arguments passed individually

### Method Borrowing

One object can use another object's method.

### `call()` Arguments

Passed using commas.

```javascript
fn.call(obj,arg1,arg2,arg3)
```

### `call()` Return Value

Returns the result of the executed function.

### `call()` vs `bind()`

- `call()` executes immediately.
- `bind()` returns a new function.

---

# Quick Revision

| Concept | Remember |
|----------|----------|
| `call()` | Calls function with custom `this` |
| `this` | Manually assigned |
| Executes | Immediately |
| Arguments | Passed individually |
| Method Borrowing | Supported |
| Returns | Function result |
| New Function | ❌ No |
| Similar Method | `apply()`, `bind()` |

---

# One-Line Summary

> **The `call()` method immediately invokes a function while allowing you to explicitly set the value of `this` and pass arguments individually, making it useful for method borrowing and controlling function context.**