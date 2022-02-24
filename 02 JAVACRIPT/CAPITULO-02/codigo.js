// console.log('funciona');
const input = document.querySelector('.tarea');
// console.log(input);
// console.log(input.value);

const btn = document.querySelector('button');

const alerta = document.querySelector('.alerta');
const tareasBox = document.querySelector('ul');

// btn.addEventListener('click', function(){})
btn.addEventListener('click', () => {
    // console.log('hiciste click');
    // console.log(input.value);
    // input.value = '';
    if(input.value === ''){
        // alerta.innerHTML = 'hola';
        alerta.textContent = '💥💥Debes ingresar una tarea para continuar 💥💥';
    } else {
        alerta.innerHTML = '';
        let li = `<li>${input.value}</li>`;
        // console.log(li);
        // tareasBox.innerHTML = li;
        tareasBox.insertAdjacentHTML('beforeend', li);
        input.value = '';
    }
});

/***********************************/
// const listasDeTareas = document.querySelector('li');
// 💡💡 nodeList = tipo de objeto, muy parecido a un array
/*
const listasDeTareas = document.querySelectorAll('li');

for(let i = 0; i < listasDeTareas.length; i++){
    console.log(listasDeTareas[i]);
    listasDeTareas[i].addEventListener('click', () => {
        // console.log('hiciste clik en el li');
        listasDeTareas[i].remove();
        // alerta.textContent = 'Tarea realizada correctamente 👍';
    });
}
*/

/* ⚡⚡ EVENT DELEGATION ⚡⚡ */

tareasBox.addEventListener('click', (evento) => {
    // console.log('hiciste click');
    console.log(evento);
    if(evento.target.tagName === 'LI'){
        // console.log('hiciste click en un li');
        evento.target.remove();
    }
})
