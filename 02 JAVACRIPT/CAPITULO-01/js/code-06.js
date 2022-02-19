/* LOOP + CONDICIONALES */
const personajes = [
  "joshi",
  "ryo",
  "mario",
  "link",
  "ken",
  "Thanos",
  "Ironman",
  "Loki",
];

for (let i = 0; i < personajes.length; i++) {
  // 🔥🔥 LA VARIABLE i ESTA DECLARADA DENTRO DEL
  // DEL SCOPE(AMBITO O CONTEXTO DEL BLOQUE O FUNCION)
  // NO ES UNA VARIABLE GLOBAL
  if (i % 2) {
    console.log(personajes[i]);
  }
}

// 💡💡 WHILE
// 🔥🔥 ESTA VARIABLE i ESTA DECLARADA DENTRO DEL AMBITO SCOPE GLOBAL O EXTERNO
let i = 0;
while (i < personajes.length) {
  if (personajes[i] === "Loki") {
    console.log(personajes[i]);
  }
  i++;
}
