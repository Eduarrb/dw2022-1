const btn = document.querySelector('button');
// console.log(btn);
const popup = document.querySelector('.popup-caja');
// console.log(popup);
const btnClose = document.querySelector('.popup-close');

btn.addEventListener('click', function(){
    // console.log('hiciste click');
    popup.classList.add('mostrarCaja');
});

btnClose.addEventListener('click', () => {
    popup.classList.remove('mostrarCaja');
});

window.addEventListener('keyup', e => {
    console.log(e);
    if(e.key === 'Escape'){
        popup.classList.remove('mostrarCaja');
    }
});

popup.addEventListener('click', e => {
    // console.log(e);
    if(e.target.classList.contains('popup-caja')){
        popup.classList.remove('mostrarCaja');
    }
})
