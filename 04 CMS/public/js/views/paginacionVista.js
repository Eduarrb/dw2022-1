import Vista from "./Vista.js";

class paginacionVista extends Vista{
    _elementoPadre = document.querySelector('.pagination');
    agregarManejadorclick(manejador){
        this._elementoPadre.addEventListener('click', function(e){
            e.preventDefault();
            // console.log(e);
            const btn = e.target.closest('.page-link');
            if(!btn) return;
            // console.log(btn);
            const goToPage = +btn.dataset.ir;
            // console.log(goToPage);
            manejador(goToPage);
        });
    }
    _generarPlantilla(){
        const paginaActual = this._data.pagina;
        // return paginaActual;
        const numPaginas = Math.ceil(this._data.resultados.length / this._data.resultadosPorPagina);
        // return numPaginas;
        if(paginaActual === 1 && numPaginas > 1){
            return `
                <li class="page-item ms-2">
                    <a class="page-link" href="#" data-ir="${paginaActual + 1}">Página ${paginaActual + 1}</a>
                </li>
            `;
        }
        if(paginaActual < numPaginas){
            return `
                <li class="page-item me-2">
                    <a class="page-link" href="#" data-ir="${paginaActual - 1}">Página ${paginaActual - 1}</a>
                </li>
                <li class="page-item ms-2">
                    <a class="page-link" href="#" data-ir="${paginaActual + 1}">Página ${paginaActual + 1}</a>
                </li>
            `;
        }
        if(paginaActual === numPaginas && numPaginas > 1){
            return `
                <li class="page-item me-2">
                    <a class="page-link" href="#" data-ir="${paginaActual - 1}">Página ${paginaActual - 1}</a>
                </li>
            `;
        }
    }
}

export default new paginacionVista();