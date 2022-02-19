/* ⚡⚡ ARRAYS - LISTAS ⚡⚡ */
// 💡💡 CONJUNTO DE ELEMENTOS

const numeros = [12, 878, 976, 687, 54, 3214534, 12.89];
console.log(numeros);

console.log(numeros.length);

// ⚡⚡ INDICES -> 0, 1, 2 ......
console.log(numeros[3]);
console.log(numeros[6]);
console.log(numeros[numeros.length - 1]);

const personajes = ['joshi', 'ryo', 'mario', 'link'];
console.log(personajes);
console.log(personajes[1]);

const arrayMixto = [12, '12', true, ['blanka', 'snake']];
console.log(arrayMixto);
console.log(arrayMixto[3]);
console.log(arrayMixto[3][0]);

const personajes2 =  ['joshi', 'ryo', 'mario', 'link', 'ken', 'Thanos', 'Ironman', 'Loki'];

// ⚡⚡ LOOPS - FOR

// funcion -> (argumentos)
// 8
for(let contador = 0; contador < personajes2.length; contador++){
    // accion
    console.log(personajes2[contador]);
}

let html = '';
console.log(html);

for(let c = 0; c < personajes2.length; c++){
    html = html + `<h3>${personajes2[c]}</h3>`;
}

console.log(html);
const bloque2 = document.querySelector('#bloquesito');
bloque2.innerHTML = html;