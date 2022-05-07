import { obtenerJson } from "./helpers.js";

export const estado = {
    publicaciones: {
        resultados: [],
    },
    fechaOptions: {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    }
}

export const cargarResultadosPublicaciones = async function(url){
    try {
        const data = await obtenerJson(url);
        estado.publicaciones.resultados = data.resultado.map(el => {
            const fecha = new Date(`${el.pub_fecha} 00:00:00`);
            return {
                id: +el.pub_id,
                titulo: el.pub_titulo,
                resumen: el.pub_resumen,
                fecha: fecha.toLocaleDateString('es-ES', estado.fechaOptions),
                img: el.pub_img
            }
        });
    } catch (error) {
        throw(error);
    }
}