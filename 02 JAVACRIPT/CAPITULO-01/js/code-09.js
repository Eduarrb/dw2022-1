/* ⚡ OBJECTS ⚡ */

/*
    CELULAR => PROPIEDADES Y CARACTERISTICAS
    color -> mate,
    modelo -> huawei p50 plus,
    marca -> huawei,
    precio -> 2500,

*/

const celular = {
    // key - value pair
    color: 'mate',
    modelo: 'P50 plus',
    marca: 'Huawei',
    precio: 2500,
    enPeru: true,
    piezas: ['camara', 'infrarojo', 'mica'],
    accesorios: {
        lamina: 'rinoshield',
        frontal: false
    }
}

console.log(celular);
// 💡💡 PROPIEDAD
console.log(celular.precio);
console.log(celular.piezas);
console.log(celular.piezas[1].length);
console.log(celular.accesorios.lamina.length)

// console.log('palabra'.length)

const usuario = {
    nombre: 'Jaimito',
    correo: 'jaimito@gmail.com',
    cel: '905452565',
    edad: 31,
    // ⚡⚡ METODOS
    saludar: function(){
        console.log(`Hola a todos`);
    },
    obtenerEdad: function(fechaNac){
        return 2022 - fechaNac;
    },
    metodo: () => {
        console.log('metodo con arrow funtion');
    }
}

console.log(usuario);
usuario.saludar();
let edad = usuario.obtenerEdad(1999); // imprime algo??
console.log(edad);
usuario.metodo();

// document.querySelector()
console.log('*****************************');
/* 🔥🔥 METODOS, LA PALABRA RESERVADA THIS Y EL PROBLEMA CON ARROW FUNTIONS 🔥🔥 */

// 💡💡 como variable global hacer referencia al objeto global window
console.log(this);

const personaje = {
    nombre: 'Joshi',
    correo: 'joshi@nintendo.com',
    habilidades: ['saltar', 'comer tortugas', 'sacar la lengua', ' correr', 'sacrificarse por mario'],
    imprimirThis: function(){
        console.log(this);
    },
    saltar: function(){
        console.log(`${this.nombre} esta saltando`)
    },
    // 💥💥💥💥💥💥 MUCHO CUIDADO
    /*
    referenciaThisConArrow: () => {
        console.log(this); 
    }
    */
    imprimirHabilidadesEnDom: function(){
        let html = '';
        for(let i = 0; i < this.habilidades.length; i++){
            // html = html + ''
            html += `<p>${this.nombre} puede: <strong>${this.habilidades[i]}</strong></p>`;
        }
        document.querySelector('.bloque1').innerHTML = html;
    }
}

personaje.imprimirThis();
personaje.saltar(); // joshi esta saltando
// personaje.referenciaThisConArrow(); // el objeto window
personaje.imprimirHabilidadesEnDom();


