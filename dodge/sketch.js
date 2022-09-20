// personagem
let x = 250;
let y = 250;

// vilões
let xV = [];
let yV = [];
let vel = [];
let xS = 0
let yS = 2500


let statusJogo = false;

function setup() {
  createCanvas(500, 500);

  for (let i = 0; i < 3; i++) {
    xV.push(0);
    yV.push(random(0, 500));
    vel.push(random(4,10))
  }
}

function draw() {
  background(220);
  
  if (keyIsDown(87)) {
    y = y - 5;
  }
  if (keyIsDown(83)) {
    y = y + 5;
  }
  if (keyIsDown(68)) {
    x = x + 5;
  }
  if (keyIsDown(65)) {
    x = x - 5;
  }
  


  
  personagem();

  if (statusJogo == true) {
    //inicio do vilao
    for (let i = 0; i < 3; i++) {
      xV[i] = xV[i] + vel[i];
      vilao(xV[i], yV[i]);
    }
  } else {
    for (let i = 0; i < 3; i++) {
      vilao(xV[i], yV[i]);
    }
  }

  // quando chega ao final (500) ele volta para o -200
  for (let i = 0; i < 3; i++) {
    if (xV[i] >= 500) {
      yV[i] = random(0, 500);
      xV[i] = -150;
      
    }
  }
  
  textSize(32)
  text(xS, 40,40);
  square(xS, yS, 10, 10);
  
  if (statusJogo == true){
    xS++;
  }

  
  if (statusJogo == false){
   background(210)
   textSize(32)
   text("Clique para começar....",100,250);
 }
  // verifica colisão (morte do personagem)
  
  for(let i = 0; i< 3 ; i++){
    let d = dist(x, y, xV[i], yV[i])
    
    if (d >= 0 && d <= 41){
      console.log(d);
      statusJogo = false
      x = 250
      y = 250
      xV[i] = 0
      yV[i] = random (0,500)
      xS = 0
    }
  }
}

function personagem(){
  // inicio do personagem
  fill("yellow");
  rect(x, y, 50, 50);
  fill("black");
  square(x + 5, y + 10, 10);
  fill("black");
  square(x + 35, y + 10, 10);
  fill("black");
  rect(x + 5, y + 27, 40, 10);
}

function vilao(x, y) {
  rect((x = x + 20), y, 100, 30);
}

function mouseClicked() {
  statusJogo = true;

}
