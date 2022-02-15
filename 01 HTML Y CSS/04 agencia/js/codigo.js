// alert('hola mundo');
// console.log('Funcionaaaaaaaaaaaaaaaaaaaaa');

// console.log(window.pageYOffset)

// function(paramentros){
//     // acciones
// }

const nav = document.querySelector('.header__nav');
// console.log(nav);

window.addEventListener('scroll', function(){
    // console.log('hiciste scroll');
    // console.log(window.scrollY);
    if(window.scrollY > 0){
        // console.log('es mayor a 0');
        nav.classList.add('active');
    } else{
        // console.log('no es mayor a 0 o es igual a 0');
        nav.classList.remove('active');
    }
<<<<<<< HEAD
})

// nav.style.background = 'peru';
=======
})
>>>>>>> 04a038c70220ac7b4dd2d17925c5806843c8ccd6
