import { obtenerJson } from "./helpers.js";

export const estado = {
    publicaciones: {
        resultados: [],
        // 1, 2, 3 , 4
        pagina: 1,
        resultadosPorPagina: 2
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

export const obtenerResultadosPaginacion = function(pagina = estado.publicaciones.pagina){
    estado.publicaciones.pagina = pagina;
    const inicio = (pagina - 1) * estado.publicaciones.resultadosPorPagina; // 2
    const final = pagina * estado.publicaciones.resultadosPorPagina; // 2
    return estado.publicaciones.resultados.slice(inicio, final);
}