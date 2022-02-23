let data=[
{"label":"C","value":50},
{"label":"C++","value":100},
{"label":"Java","value":20},
{"label":"PHP","value":60}
];


var tab = [];
var language = [];

for (var i = 0 ; i < data.length; i++) {

    tab[i] = data[i].value;
    console.log(data[i].value);
    language[i] = data[i].label;
    console.log(data[i].label);


}


const canvas = document.querySelector('canvas')

canvas.width = window.innervision
canvas.height = window.innerHeight
const ctx = canvas.getContext('2d')


const init = () => {
ctx.beginPath()
ctx.arc(150, 150, 100, 0, Math.PI * 2, false)
ctx.stroke()
  
}

init()