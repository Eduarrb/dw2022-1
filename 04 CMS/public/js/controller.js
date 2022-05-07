import * as model from './model.js';
import publicacionesVista from "./views/publicacionesVista.js";

const controllerResultadopublicaciones = async function(getFile){
    try {
        publicacionesVista.renderLoad();
        await model.cargarResultadosPublicaciones(getFile);
        console.log(model.estado);
    } catch (error) {
        throw(error)
    }
}

controllerResultadopublicaciones('backFetch/publicaciones_get.php');