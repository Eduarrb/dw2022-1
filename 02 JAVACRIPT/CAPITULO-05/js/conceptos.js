// console.log('funciona');

// 1 ⚡⚡ EJECUCIONES ASINCRONAS Y SINCRONAS
// ASINCRONAS
// setInterval(() => {
//     console.log('esta es una ejecucion asincrona');
// }, 3000);


// SINCRONAS
let nombre = 'juan';
console.log(nombre);

let apellido = 'torres';
console.log(apellido);

let num = 12;
console.log(num);

// 2 ⚡⚡ PETICIONES Y RESPUESTAS A APIS, UTILIZANDO JSON
// JSON javascript object notation => casi un tipo de objeto en texto plano

// 💡💡 PETICION A UN JSON
// DEVOLVER UNA PROMESA -> PROMISE
// console.log(fetch('data/personas.json'))
fetch('data/personas.json').then(datos => console.log(datos.json()));

fetch("https://api.discogs.com/database/search?q=mana&token=SSyKMrSbhlFUPtNIuLgFampouFVxFkNQiPbTtuVe")
    .then(datos => {
        console.log(datos.json());
    })

