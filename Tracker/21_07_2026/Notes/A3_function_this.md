# JavaScript `this` Keyword - Summary Notes (with Output)

---

# 📌 What is `this`?

The **`this` keyword** refers to an **object**.

The object it refers to **depends on how the function is called**, **not where it is written**.

> **Simple Definition:**  
> `this` refers to the object that is executing the current function.

---

# How `this` Works

The value of `this` is decided **when the function is called**.

```
Function Written
       │
       ▼
Function Called
       │
       ▼
JavaScript Decides
What "this" Refers To
```

---

# Functions are Object Methods

Every JavaScript function can be:

- An object method
- A global function
- An event handler
- A callback

---

# 1. `this` Inside an Object Method

Inside an object method, `this` refers to the object that owns the method.

```javascript
const person = {
    firstName: "John",
    lastName: "Doe",

    fullName: function(){
        return this.firstName + " " + this.lastName;
    }
};

console.log(person.fullName());
```

### Output

```
John Doe
```

Here,

```
this.firstName
```

is the same as

```
person.firstName
```

---

# 2. `this` Inside a Regular Function (Default)

In a browser, `this` refers to the global object (`window`).

```javascript
function show(){
    console.log(this);
}

show();
```

### Output (Browser)

```
Window {...}
```

---

# 3. `this` in Strict Mode

Strict mode removes the default global binding.

```javascript
"use strict";

function show(){
    console.log(this);
}

show();
```

### Output

```
undefined
```

---

# 4. `this` Alone

Outside any function,

`this` refers to the global object.

```javascript
console.log(this);
```

### Output (Browser)

```
Window {...}
```

Even in strict mode:

```javascript
"use strict";

console.log(this);
```

### Output

```
Window {...}
```

Reason:

`this` is in the global scope.

---

# 5. `globalThis`

`globalThis` is a standard way to access the global object in **any JavaScript environment**.

| Environment | Global Object |
|-------------|---------------|
| Browser | `window` |
| Node.js | `global` |
| Web Worker | `self` |
| Standard | `globalThis` |

---

### Browser Example

```javascript
console.log(globalThis === window);
```

### Output

```
true
```

---

### Node.js Example

```javascript
console.log(globalThis === global);
```

### Output

```
true
```

---

# 6. `this` in Event Handlers

In event handlers,

`this` refers to the HTML element that triggered the event.

```html
<button onclick="console.log(this)">
    Click Me
</button>
```

### Output (Console)

```
<button>Click Me</button>
```

---

Example

```html
<button onclick="this.innerHTML='Clicked!'">
    Click Me
</button>
```

### Before Click

```
Click Me
```

### After Click

```
Clicked!
```

---

# 7. `this` in Arrow Functions

Arrow functions **do not have their own `this`**.

They inherit `this` from the surrounding scope.

```javascript
const person = {
    name: "John",

    greet: () => {
        console.log(this.name);
    }
};

person.greet();
```

### Output

```
undefined
```

Reason:

Arrow functions don't bind `this` to the object.

---

# Regular Function vs Arrow Function

## Regular Function

```javascript
const person = {
    name: "John",

    greet: function(){
        console.log(this.name);
    }
};

person.greet();
```

### Output

```
John
```

---

## Arrow Function

```javascript
const person = {
    name: "John",

    greet: () => {
        console.log(this.name);
    }
};

person.greet();
```

### Output

```
undefined
```

---

# Arrow Functions Inside Methods

Arrow functions are useful **inside methods** because they inherit the surrounding `this`.

```javascript
const person = {

    firstName: "John",

    sayHello: function(){

        return () => {
            console.log(this.firstName);
        }

    }

};

const hello = person.sayHello();

hello();
```

### Output

```
John
```

---

# Event Example

## Regular Function

```javascript
button.addEventListener("click", function(){
    console.log(this);
});
```

### Output

```
<button>...</button>
```

`this` refers to the clicked button.

---

## Arrow Function

```javascript
button.addEventListener("click", () => {
    console.log(this);
});
```

### Output

```
Window {...}
```

`this` comes from the outer scope.

---

# Summary of `this`

| Situation | `this` Refers To |
|------------|------------------|
| Global Scope | Global Object (`window`) |
| Regular Function | Global Object (Browser) |
| Strict Mode Function | `undefined` |
| Object Method | Object that owns the method |
| Event Handler | HTML Element |
| Arrow Function | Surrounding Scope |
| `call()` | Object passed to `call()` |
| `apply()` | Object passed to `apply()` |
| `bind()` | Permanently bound object |

---

# `this` Precedence

Highest priority first:

| Priority | Method |
|----------|--------|
| 1 | `bind()` |
| 2 | `call()` |
| 3 | `apply()` |
| 4 | Object Method |
| 5 | Global Scope |

---

# Important Points

- `this` is **not** a variable.
- `this` is a **keyword**.
- The value of `this` depends on **how the function is called**.
- Arrow functions never create their own `this`.

---

# Common Mistakes

## ❌ Using Arrow Function as Object Method

```javascript
const person = {

    name:"John",

    greet: () => {
        console.log(this.name);
    }

};

person.greet();
```

### Output

```
undefined
```

---

## ✅ Correct Way

```javascript
const person = {

    name:"John",

    greet:function(){
        console.log(this.name);
    }

};

person.greet();
```

### Output

```
John
```

---

# Interview Points

### `this`

- Refers to an object
- Decided at runtime
- Depends on function call

### Object Method

- `this` refers to the object

### Regular Function

- Browser → `window`
- Strict Mode → `undefined`

### Arrow Function

- Doesn't create its own `this`
- Inherits surrounding `this`

### Event Handler

- Refers to the HTML element

### `globalThis`

- Universal global object
- Works in Browser, Node.js and Web Workers

---

# Quick Revision

| Concept | Remember |
|----------|----------|
| `this` | Refers to current object |
| Object Method | `this` → object |
| Regular Function | `this` → `window` (browser) |
| Strict Mode | `this` → `undefined` |
| Arrow Function | Inherits surrounding `this` |
| Event Handler | `this` → clicked element |
| `globalThis` | Universal global object |
| `call()` | Sets `this` manually |
| `apply()` | Sets `this` manually |
| `bind()` | Permanently binds `this` |

---

# One-Line Summary

> **`this` is a special JavaScript keyword whose value depends on how a function is called. In object methods it refers to the object, in regular functions it usually refers to the global object (or `undefined` in strict mode), and in arrow functions it inherits `this` from the surrounding scope.**