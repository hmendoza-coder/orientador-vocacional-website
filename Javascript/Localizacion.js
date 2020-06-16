var ctx = document.getElementById('myChart').getContext('2d');
var carrera1 = document.getElementById('carrera1').innerHTML;
var carrera2 = document.getElementById('carrera2').innerHTML;
var carrera3 = document.getElementById('carrera3').innerHTML;

var valor1 = document.getElementById('valor1').value;
var valor2 = document.getElementById('valor2').value;
var valor3 = document.getElementById('valor3').value;

var eliminar = "LICENCIATURA EN";
console.log(palabraEliminar(carrera1, eliminar));
console.log("valor1");

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["","Carrera 1", "Carrera 2", "Carrera 3",""],
        datasets: [{
            label: 'Carrera recomendadas', 
            backgroundColor: 'rgb(10, 100, 255)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0,valor1, valor2, valor3, 0]
        }]
    },

    // Configuration options go here
    options: {}
});


function palabraEliminar(oracion, palabra) {
    var cadena;
    if(oracion.includes(palabra)){
        console.log("incluye");
        cadena =  oracion.split(oracion, palabra);
        console.log(cadena);
    }
}