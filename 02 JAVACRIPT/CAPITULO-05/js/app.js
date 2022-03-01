const btn = document.querySelector('.btn');
const artista = document.querySelector('.search');
const discoBloque = document.querySelector('.section__right__contenido__resultado__discografia');

const renderDisco = function(album){
    const plantilla = `
        <div class="section__right__contenido__resultado__discografia__item">
            <h3 class="section__right__contenido__resultado__discografia__item--titulo">${album.title}</h3>
            <div class="section__right__contenido__resultado__discografia__item__left">
                <img src="${album.cover_image}" alt="${album.title}">
                <div class="section__right__contenido__resultado__discografia__item__left__info">
                    <p>Año: <span>${album.year}</span></p>
                    <p>País: <span>${album.country}</span></p>
                </div>
            </div>
        </div>
    `;
    discoBloque.insertAdjacentHTML('beforeend', plantilla);
}

const obtenerJson = async function(artistaSearch){
    try {
        const data = await fetch(`https://api.discogs.com/database/search?q=${artistaSearch}&type=master&artist=${artistaSearch}&format=album&token=<aqui tu token>`);
        // console.log(data);
        const resultado = await data.json();
        // console.log(resultado.results);
        // let plantilla = '';
        discoBloque.innerHTML = '';
        resultado.results.forEach(el => {
            // console.log(el);
            // plantilla += `
            //     <div class="section__right__contenido__resultado__discografia__item">
            //         <h3 class="section__right__contenido__resultado__discografia__item--titulo">${el.title}</h3>
            //         <div class="section__right__contenido__resultado__discografia__item__left">
            //             <img src="${el.cover_image}" alt="${el.title}">
            //             <div class="section__right__contenido__resultado__discografia__item__left__info">
            //                 <p>Año: <span>${el.year}</span></p>
            //                 <p>País: <span>${el.country}</span></p>
            //             </div>
            //         </div>
            //     </div>
            // `;
            renderDisco(el);
        });
        artista.value = '';
        // console.log(plantilla);
        // discoBloque.innerHTML = plantilla;

    } catch (error) {
        console.log(error)
    }
}  

btn.addEventListener('click', function(){
    // console.log(artista.value);
    obtenerJson(artista.value);
})