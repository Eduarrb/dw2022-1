export const estado = {
    publicaciones: {
        resultados: [],
    }
}

export const cargarResultadosPublicaciones = async function(){
    try {
        const res = await fetch('backFetch/publicaciones_get.php');
        const data = await res.json();
        console.log(data);
    } catch (error) {
        throw(error);
    }
}