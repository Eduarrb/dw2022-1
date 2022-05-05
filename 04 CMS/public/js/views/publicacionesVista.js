import Vista from "./Vista.js";

class PublicacionesVista extends Vista{
    _elementoPadre = document.querySelector('.publicaciones');
}

export default new PublicacionesVista();