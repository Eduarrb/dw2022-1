// console.log("hola mundo y mas alla");
// JAVASCRIPT ES KEY SENSITIVE
/* TIPOS DE DATOS */
/*
    PRIMITIVOS
    - STRINGS - CADEDA DE TEXTO
    - NUMBERS
    - BOOLEANS
    - OBJECTS
*/
/*⚡ STRIGS ⚡*/

// el signo = es para asignar;
// VAR -> desde la primera version javascript
// SCOPE -> AMBITO de donde estan declaradas las variables
// ES6 y mas adelante LET y CONST
var primerNom = "Juan";
var apellido = 'Smith';
// var num = 1;
// console.log(primerNom); 
// console.log(primerNom, apellido);
// 💥💥 no iniciar con números o caracteres especiales

let segundoNombre = 'Carlos';
console.log(segundoNombre);
segundoNombre = 'Miguel';
console.log(segundoNombre);
const miNombre = 'Eduardo';
console.log(miNombre);
// miNombre = 'Pepito';

// ⚡⚡ CONCATENAR "+" UNIR CADENAS DE TEXTO
console.log(primerNom + ' ' + apellido);
console.log(1 + primerNom);
console.log(1 + '1');

const fullName = primerNom + ' ' + apellido;
console.log(fullName);

// ⚡⚡ PROPIEDADES - TRATARLOS COMO UN TIPO DE OBJETO
// OBJETO.propiedad
// OBJETO.metodo()

console.log(fullName.length);

// ⚡⚡ INDICES
//   0    1    2 
// 0 1 2 ...
// J u a ...
// [juan, 24, alto]
console.log(fullName[0]);
console.log(fullName[9]);
console.log(fullName[fullName.length - 1]);

// fullname = Juan Smith
// jsmith@continental.edu.pe
// Codigo aqui
const correo = primerNom[0] + apellido + '@continental.edu.pe';
console.log(correo);

// ⚡⚡ Metodos
console.log(correo.toLowerCase());
console.log(correo.toUpperCase());
