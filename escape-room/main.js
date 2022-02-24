// nice tutorial: https://www.youtube.com/watch?v=DEHsr4XicN8

let objects = [];
let resources;
let gameConsole = false;
let currentMessage = "Minha Mensagem";

function preload() {
  resources = loadJSON("resources/resourcesList.json", loadObjetos);
}

function setup() {
  createCanvas(1280, 720);
}

function draw() {
  background(245);
  objects.forEach((ob) => {
    ob.show();
  });
  if (gameConsole) {
    textSize(32);
    text(currentMessage, 50, 700);
    fill(51);
  }
}

function mousePressed() {
  for (var i = 0; i < objects.length; i++) {
    var cl = objects[i].clicked();
    if (cl) {
      gameConsole = true
      currentMessage = cl;
    }
  }
}

function loadObjetos() {
  console.log(resources.recursos);
  resources.recursos.forEach((rs) => {
    var img = loadImage("resources/images/" + rs.imgSrc);
    objects.push(
      new Objeto(
        rs.initialPosition[0],
        rs.initialPosition[1],
        rs.name,
        rs.description,
        rs.imgWidth,
        rs.imgHeight,
        img
      )
    );
  });
}
