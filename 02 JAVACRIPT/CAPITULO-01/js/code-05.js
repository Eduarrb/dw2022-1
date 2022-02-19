/* ⚡⚡ CONDICIONALES & BOOLEANOS ⚡⚡ */
// TRUE
// FALSE

let num = 23;

// 💡💡 OPERADORES DE COMPARACIÓN
// IGUALDAD -> ==, ===
// ASIGNACION -> = 
// >, >=, <, <=, 
// DIFERENTE !=, !==

// 
if(num === '23'){
    // TRUE
    console.log('son iguales');
} else{
    // FALSE
    console.log('son distintos');
}

console.log('******************');
console.log(typeof(['23']));
// if(num >= '20'){
// if(num >= +'20'){
if(Number(num) >= Number('25')){
    console.log(`el numero ${num} es mayor igual que 25`);
} else {
    console.log(`el numero ${num} no es mayor igual que 25`);
}

// ⚡⚡ HOISTING
if(num != '23'){
    console.log('son diferentes');
} else {
    console.log('son iguales');
}