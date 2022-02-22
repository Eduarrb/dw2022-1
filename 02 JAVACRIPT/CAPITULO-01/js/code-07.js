'use strict';
/* ⚡FUNCTIONS⚡ */
saludar();

function saludar(){
    /* INSTRUCCIONES A REALIZAR CADA VEZ QUE LLAMEMOS A LA FUNCION */
    console.log('Hola a todos');
}

const fechaNacimiento = 1990;
const nombre = 'Pepito';

// 💡💡 PARAMETROS - VARIABLES / INPUTS QUE MANEJAN LAS FUNCIONES
function obtenerEdad(fechaNacimiento, nombre){
    // CADA FUNCION TIENE SU PROPIO SCOPE(AMBITO, CONTEXTO, EMPAQUETAQUEDO) DE EJECUCIÓN
    let edad = 2022 - fechaNacimiento;
    console.log(`Soy ${nombre} y tengo ${edad} años`);
}
// saludar();
// 💡💡 EN LA EJECUCIÓN DE LA FUNCION = ARGUMENTOS
obtenerEdad(fechaNacimiento);

const fechaNacimiento2 = 1980;

function obtenerEdad2(fechaNac){
    let edad = 2030 - fechaNacimiento2;
    console.log(edad);
}

obtenerEdad2(1969); // 50

function sumar(num1, num2){
    // let suma = +num1 + +num2;
    // let suma = Number(num1) + Number(num2);
    let suma = parseInt(num1) + parseInt(num2);
    // console.log(suma);
    // console.log('hola');
    return suma;
}

// sumar(1, '2');

console.log(sumar(1, 3));

let resultado = sumar(10, 21);
console.log(resultado);

function devolverResultadosExamen(nota1, nota2){
    return nota1 + nota2;
}

let nota = devolverResultadosExamen(5, 18);
console.log(nota);

function devolverArray(){
    return ['a', 'b', 'c'];
    // return 'a', 'b';
}

console.log(devolverArray());