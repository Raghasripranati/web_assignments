let element = document.querySelector(".element-1");
let plus = document.getElementById("plus");
let minus = document.getElementById("minus");
let multiply = document.getElementById("multiply");
let divide = document.getElementById("divide");
let enter = document.getElementById("enter");
let clear = document.getElementById("clear");
let cancel = document.getElementById("cancel");
let squareRoot = document.getElementById("square-root");
let square = document.getElementById("square");
let buttonsContainer = document.querySelector(".mini-container");

let has_dot = false;
element.value = "";
buttonsContainer.addEventListener("click", (e) => {
  const clicked = e.target.closest(".button");
  if (!clicked) return;

  switch (clicked.value) {
    case "+":
    case "-":
    case "*":
    case "/":
    case "^":
    case "sroot":
      has_dot = false;
      element.value += clicked.value;
      break;
    case ".":
      if (!has_dot && !element.value.endsWith(".")) {
        element.value += clicked.value;
        has_dot = true;
      }
      break;
    default:
      element.value += clicked.value;
  }
});

enter.addEventListener("click", (e) => {
  element.value = eval(element.value).toString();
  has_dot = !element.value.endsWith(".") && element.value.includes(".");
});

cancel.addEventListener("click", (e) => {
  element.value = element.value.slice(0, -1);
  has_dot = !element.value.endsWith(".") && element.value.includes(".");
});

squareRoot.addEventListener("click", (e) => {
  element.value = Math.sqrt(eval(element.value)).toString();
  has_dot = !element.value.endsWith(".") && element.value.includes(".");
});

square.addEventListener("click", (e) => {
  element.value = (eval(element.value) ** 2).toString();
  has_dot = !element.value.endsWith(".") && element.value.includes(".");
});

clear.addEventListener("click", (e) => {
  has_dot = false;
  element.value = "";
});
