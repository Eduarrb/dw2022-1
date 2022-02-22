/* ⚡FUNCTIONS EXPRESSIONS⚡ */
saludar();

function saludar(){
    console.log('Hola a todos');
}

/* ⚡ ARROW FUNTIONS ⚡ */

// 💥💥 saludar2();
const saludar2 = () => {
    console.log('Hola a todos version flecha');
} 

saludar2();

const sumar = (num1, num2) => {
    return num1 + num2;
}

sumar(10, 20);

let res = sumar(20, 40);
console.log(res);

// const multiplicarx2 = (num) => {
//     return num * 2;
// }

// const multiplicarx2 = num => {
    // no debe haber varias lineas de codigo antes
//     return num * 2;
// }

const multiplicarx2 = num => num * 2;

console.log(multiplicarx2(4));

const saludar3 = (nom1, nom2) => `Hola ${nom1} y ${nom2}`;

console.log(saludar3('Jazmin', 'Josue'));