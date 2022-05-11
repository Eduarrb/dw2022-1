import * as model from './model.js';
import publicacionesVista from "./views/publicacionesVista.js";
import paginacionVista from './views/paginacionVista.js';

const controllerResultadopublicaciones = async function(getFile){
    try {
        publicacionesVista.renderLoad();
        await model.cargarResultadosPublicaciones(getFile);
        // publicacionesVista.render(model.estado.publicaciones.resultados);
        publicacionesVista.render(model.obtenerResultadosPaginacion());
        paginacionVista.render(model.estado.publicaciones);
        // paginacionVista.agregarManejadorclick();
    } catch (error) {
        throw(error)
    }
}

const controllerPaginacion = function(goToPage){
    // console.log('vamos a ir a la pagina', goToPage);
    // controllerPaginacion()
}

controllerResultadopublicaciones('backFetch/publicaciones_get.php');
paginacionVista.agregarManejadorclick(controllerPaginacion);