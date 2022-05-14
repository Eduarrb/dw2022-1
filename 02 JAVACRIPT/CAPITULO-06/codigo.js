const libro = {
    // carateristicas y propiedades
    // key - value pair
    titulo: '100 años de soledad',
    fechaPubli: 1960,
    genero: 'Drama',
    autor: 'Gabriel García Marquez',
    // metodos = una funcion dentro de un objeto
    leer(){
        console.log('Estas leyendo el libro');
    }
}

// MODELO DE OBJETO DE CLASE BASE -> CLASS -> PODER HACER UN CONSTRUCTOR BASE DE OBJETOS

class Vehiculo {
    constructor(marca, modelo){
        this.marca = marca;
        this.modelo = modelo;
    }
    arrancar(){
        console.log(`el vehículo ${this.modelo} esta en marcha`);
        this.cargarMaterial();
    }
}

const toyota = new Vehiculo('toyota', 'yaris');
const subaru = new Vehiculo('subaru', 'sport');
// console.log(toyota);
// console.log(subaru);

class VehiculoPesado extends Vehiculo{
    constructor(marca, modelo, cantiCarga, alquiler){
        super(marca, modelo);
        this.cantiCarga = cantiCarga;
        this.alquiler = alquiler;
    }
    cargarMaterial(){
        console.log(`el vehículo ${this.modelo} puede cargar ${this.cantiCarga}`);
    }
}

const caterpilar = new VehiculoPesado('caterpilar', 'bp-213213', '2tn', 1253.52);
// console.log(caterpilar);
caterpilar.arrancar();
// caterpilar.cargarMaterial();
toyota.arrancar();

