/*⚡ NUMBERS ⚡*/
/*
let num1 = 10;
let num2 = 354;
console.log(num1, num2);
console.log('10');
*/
// let num3 = 12; num4 = 45;
/*
let num3, num4, num5;
num3 = 12;
num4 = 54;
num5 = 5345;
*/

const pi = 3.1416;
let radio = 11.5;

// console.log(pi, radio);

// ⚡⚡ OPERADORES MATEMATICOS
// PI POR RADIO AL CUADRADO
let areaCirculo = pi * radio ** 2;
// 2 + 2 * 2
// console.log(areaCirculo);

// ⚡⚡ RESIDUO
let num = 12;
// console.log(num % 2);
// console.log(num % 3);
// console.log(num % 7);

// SUMA Y RESTA
let num1 = 10;
let num2 = num1 + 4;
// console.log(num2);

num1 = num1 + 1;
// console.log(num1); // 11
num1++ // = num1 = num1 + 1
// ++num1;
// console.log(num1); // 12
num1--; // = num1 = num1 - 1
// console.log(num1); // 11

num1 += 4; // = num1 = num1 + 4
num1 -= 5; // num1 = num1 - 5
// console.log('**********************************');

// ⚡⚡ Metodos
let num3 = 10.5;
console.log(num3);
console.log(Number(num3.toFixed(2)));
console.log( 1 + +num3.toFixed(2));

let res1 = Math.floor(num3); // 10
console.log('floor', res1);

let res2 = Math.ceil(num3); // 11
console.log('ceil', res2);

let res3 = Math.round(num3); // automatico
console.log('round', res3);

let aleatorio = Math.random();
console.log('aleatorio', aleatorio);
// 0.00000001 -> 0.999999999999 nunca va serr igual a 1
console.log(Math.floor(aleatorio));
console.log(Math.ceil(aleatorio));

let ale2 = Math.random() * 10;
console.log(Math.round(ale2));