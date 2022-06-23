var Engine = Matter.Engine,
  Runner = Matter.Runner,
  World = Matter.World,
  Bodies = Matter.Bodies,
  Composite = Matter.Composite;

// create an engine
var engine;
var world;

let balls = [];
let obstacles = [];
let scoreBoard = [];
let scoreBounds;
let availableBalls = 3;

function setup() {
  createCanvas(500, 500);
  engine = Engine.create();
  world = engine.world;
  Runner.run(engine);
  generateGround();
  generateObstacles();
  scoreBoard = generateScoreboard();
  scoreBounds = generateBounds();
  // console.log(scoreBounds);
  generatePointsArea();
}

function mousePressed() {
  if (
    mouseX >= 0 &&
    mouseX <= 500 &&
    mouseY >= 0 &&
    mouseY <= 60 &&
    availableBalls > 0
  )
    balls.push(new Ball(mouseX, mouseY, 10));
  availableBalls--;
}

function draw() {
  background(240);
  drawPointsArea();
  drawDropArea();
  for (let i = 0; i < balls.length; i++) {
    balls[i].show();
  }

  for (let i = 0; i < obstacles.length; i++) {
    obstacles[i].show();
  }
  score = calculateScore();
  fill("black");
  textSize(18);
  text("Score: " + score, 40, 20);
}

// Objects
function Ball(x, y, r) {
  this.body = Bodies.circle(x, y, r / 2);
  World.add(world, this.body);

  this.show = function () {
    var pos = this.body.position;
    circle(pos.x, pos.y, r);
  };
}

function Obstacle(x, y, r) {
  this.body = Bodies.circle(x, y, r / 2, { isStatic: true });
  this.r = r;
  World.add(world, this.body);

  this.show = function () {
    var pos = this.body.position;
    var angle = this.body.angle;

    //push();
    //translate(pos.x, pos.y);
    //rotate(angle)

    circle(x, y, r);
    //pop();
    //console.log(pos.x,pos.y,this.w,this.h)
  };
}

// generation functions
function generateObstacles() {
  let posX = 0;
  let posY = 50;
  let distortion = 0;
  for (let i = 0; i < 7; i++) {
    posY = posY + 50;
    posX = 30;
    if (i % 2 == 0) {
      distortion = 25;
    } else {
      distortion = 0;
    }
    for (let j = 0; j < 9; j++) {
      obstacles.push(new Obstacle(posX + distortion, posY, random(20, 30)));
      posX = posX + 50;
    }
  }
}

function generateScoreboard() {
  let scoreboard = [];
  for (i = 0; i < 10; i++) {
    scoreBoard.push(floor(random(0, 10)));
  }
  return scoreBoard;
}

// draw interface
function drawDropArea() {
  rectMode(CORNER);
  c = color("rgba(0, 0, 255, 0.2)");
  fill(c);
  rect(0, 0, 500, 60);
  textSize(40);
  text("Drop Area", 250, 45);
}

function drawPointsArea() {
  rectMode(CORNER);
  c = color("rgba(255, 0, 0, 0.2)");
  fill(c);
  rect(0, 500 - 60, 500, 60);

  rectMode(CENTER);

  let posX = -44;
  for (let i = 0; i < 12; i++) {
    rect(posX, 470, 10, 60);
    posX = posX + 49;
  }

  let txtPosX = -50;
  fill("black");
  textSize(25);
  textAlign(CENTER);

  for (let i = 0; i < 10; i++) {
    txtPosX = txtPosX + 49;
    text(scoreBoard[i], txtPosX + 30, 480);
  }
}

// generation functions
function generatePointsArea() {
  let posX = -44;
  for (let i = 0; i < 12; i++) {
    let walls = Bodies.rectangle(posX, 470, 10, 60, { isStatic: true });
    World.add(world, walls);
    posX = posX + 49;
  }
}

function generateGround() {
  // rectMode(CENTER);
  // rect(width / 2, 500, 500, 20)
  let ground = Bodies.rectangle(250, 525, 500, 50, { isStatic: true });
  World.add(world, ground);
}

function generateBounds() {
  let sb = [];
  let posX = -44;
  for (let a = 0; a < 12; a++) {
    // console.log(a);
    let boundLeft = posX + 44;
    posX = posX + 49;
    let boundRight = posX + 44;
    sb.push({ boundLeft, boundRight });
  }
  return sb;
}

function calculateScore() {
  let score = 0;

  for (i = 0; i < balls.length; i++) {
    for (j = 0; j < scoreBounds.length; j++) {
      //console.log(balls[i].body.position.x, scoreBounds[i].boundLeft, scoreBounds[i].boundRight);
      if (
        balls[i].body.position.y > 400 &&
        balls[i].body.position.x > scoreBounds[j].boundLeft &&
        balls[i].body.position.x < scoreBounds[j].boundRight
      ) {
        score = score + scoreBoard[j];
      }
    }
  }
  return score;
}
