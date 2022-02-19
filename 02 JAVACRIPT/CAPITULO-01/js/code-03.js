/* ⚡ TEMPLATE STRINGS ⚡ */

const nombre = 'Jaimito';
const apellido = 'Perez';

let edad = 3000;

// HOISTING
let persona = 'Hola, soy ' + nombre + ' ' + apellido + ' y tengo ' + edad + ' años de edad';
console.log(persona);

const dataPerson = `Hola, soy ${nombre} ${apellido} y tengo ${edad} años de edad`;
console.log(dataPerson);

const operacion = `${edad / 100}`;
console.log(operacion);

// ********************************************
// ⚡⚡ MANIPULAR EL DOM - DOCUMENT OBJECT MODEL
let html = `
    <h1>Hola, soy ${nombre}</h1>
    <p>Tengo ${edad} años de edad</p>
`;
console.log(html);
/*
const bloque = document.getElementById('bloquesito');
const bloquesito = document.getElementsByClassName('bloque2');
*/
const bloque1 = document.querySelector('.bloque1');
console.log(bloque1);

bloque1.innerHTML = html;