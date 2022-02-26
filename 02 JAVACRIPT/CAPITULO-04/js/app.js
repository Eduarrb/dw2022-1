const form = document.querySelector('.quiz-form');

const respCorrectas = ['A', 'A', 'A', 'A'];

const resultado = document.querySelector('.result');

form.addEventListener('submit', e => {
    // console.log(e);
    e.preventDefault();

    // ⚡⚡ obtener la data de las respuestas
    // console.log(form.q1.value);
    // console.log(form.q2.value);
    // console.log(form.q3.value);
    // console.log(form.q4.value);
    const respUsuario = [
        form.q1.value,
        form.q2.value,
        form.q3.value,
        form.q4.value
    ];
    // console.log(respUsuario);
    let puntaje = 0;
    // for(let i = 0; i < respUsuario.lenght; i++){}
    respUsuario.forEach((valor, indice) => {
        // console.log(indice, valor);
        if(valor === respCorrectas[indice]){
            console.log(`La respuesta de la pregunta ${indice + 1} es correcta ⭐`);
            // puntaje = puntaje + 25;
            puntaje += 25;
        } else {
            console.log(`La respuesta de la pregunta ${indice + 1} es erronea 💥`);
        }
    });
    // console.log(puntaje);

    let posicionEjeY = scrollY; // 190px
    // console.log(posicionEjeY);
    // setInterval(function(){
    //     console.log('soy un mensaje');
    // }, 1000);

    let animacionTop = setInterval(() => {
        if(posicionEjeY <= 0){
            clearInterval(animacionTop);
        } else {
            scrollTo(0, posicionEjeY);
            posicionEjeY = posicionEjeY - 7;
        }
    }, 5);

    resultado.classList.remove('d-none');
    // resultado.querySelector('span').textContent = `${puntaje}%`;

    let sumaPuntajeTotal = 0;
    let velocidad = 20;

    let timer = setInterval(() => {
        if(sumaPuntajeTotal === puntaje){
            clearInterval(timer);
        } else {
            // sumaPuntajeTotal = sumaPuntajeTotal + 1;
            sumaPuntajeTotal++;
        }

        resultado.querySelector('span').textContent = `${sumaPuntajeTotal}%`;

    }, velocidad)
});
