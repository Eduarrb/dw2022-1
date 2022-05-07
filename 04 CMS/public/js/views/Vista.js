export default class Vista{
    _data;
    render(data){
        if(!data || (Array.isArray(data) && data.length === 0)) return this.renderError();
        this._data = data;
        const plantilla = this._generarPlantilla();
        this._clear();
        this._elementoPadre.innerHTML = plantilla;
    }

    _clear(){
        this._elementoPadre.innerHTML = '';
    }
    renderLoad(){
        const plantilla = `
            <div class="d-flex justify-content-center mb-4">
                <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `;
        this._clear();
        this._elementoPadre.innerHTML = plantilla;
    }
    renderError(mensaje = this._mensajeError){
        const platilla = `
            <div>
                ${mensaje} 💥💥
            </div>
        `;
        this._clear();
        this._elementoPadre.innerHTML = platilla;
    }
}