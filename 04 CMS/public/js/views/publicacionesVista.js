import Vista from "./Vista.js";

class PublicacionesVista extends Vista{
    _elementoPadre = document.querySelector('.publicaciones');
    _mensajeError = 'No se encontro ninguna publicación';
    _generarPlantilla(){
        return this._data.map(this._generarPlantillaPrevia).join('');
    }
    _generarPlantillaPrevia(el){
        return `
            <div class="col-lg-6">
                <div class="card mb-4">
                    <a href="post.php?blog=${el.id}"><img class="card-img-top" src="img/${el.img}" alt="${el.titulo}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">${el.fecha}</div>
                        <h2 class="card-title h4">${el.titulo}</h2>
                        <p class="card-text">${el.resumen}</p>
                        <a class="btn btn-primary" href="post.php?blog=${el.id}">Leer más →</a>
                    </div>
                </div>
            </div>
        `;
    }

}

export default new PublicacionesVista();