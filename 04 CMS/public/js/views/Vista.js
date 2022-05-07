export default class Vista{
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
}