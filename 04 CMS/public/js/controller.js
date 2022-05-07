import * as model from './model.js';
import publicacionesVista from "./views/publicacionesVista.js";

const controllerResultadopublicaciones = async function(getFile){
    try {
        publicacionesVista.renderLoad();
        await model.cargarResultadosPublicaciones(getFile);
        publicacionesVista.render(model.estado.publicaciones.resultados);
    } catch (error) {
        throw(error)
    }
}

controllerResultadopublicaciones('backFetch/publicaciones_get.php');