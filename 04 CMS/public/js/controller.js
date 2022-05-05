import * as model from './model.js';
import publicacionesVista from "./views/publicacionesVista.js";

const controllerResultadopublicaciones = async function(){
    try {
        publicacionesVista.renderLoad();
        await model.cargarResultadosPublicaciones();
    } catch (error) {
        throw(error)
    }
}

controllerResultadopublicaciones();