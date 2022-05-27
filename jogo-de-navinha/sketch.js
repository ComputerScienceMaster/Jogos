let enemies = [];
let timer = 1;
let points = 0;

function setup() {
  createCanvas(800, 800);
  bullets = [];
  player = new Player(300, 700, 30);
  generateRandomEnemies();
}

function draw() {
  background("rgb(204,242,204)");
  player.draw();
  player.move();

  for (let i = 0; i < bullets.length; i++) {
    bullets[i].draw();
  }
  for (let i = 0; i < enemies.length; i++) {
    enemies[i].draw();
  }
  checkHit();

  if (frameCount % 60 == 0 && timer > 0) {
    timer--;
    if (timer == 0) {
      generateEnemy();
      timer = 1;
    }
  }

  text("Score: " + points, 10, 30);
  textSize(30);
}

function keyReleased(event) {
  console.log();
  if (event.code === "Space") {
    shoot();
  }
  return false;
}

function generateRandomEnemies() {
  for (let i = 0; i < 5; i++) {
    enemies.push(
      new Enemy(
        floor(random(20, width - 50)),
        floor(random(20, height / 3 - 50)),
        20
      )
    );
  }
}

function shoot() {
  let bullet = new Bullet(player.posX + 12, player.posY - 20, 5, 20);
  this.bullets.push(bullet);
  for (let i = 0; i < bullets.length; i++) {
    if (this.bullets[i].posY < 0) {
      bullets.splice(i, 1);
    }
  }
  console.log(bullets);
}

function checkHit() {
  for (let i = 0; i < bullets.length; i++) {
    for (let j = 0; j < enemies.length; j++) {
      let d = dist(
        bullets[i].posX,
        bullets[i].posY,
        enemies[j].posX,
        enemies[j].posY
      );
      if (d < enemies[j].size) {
        enemies.splice(j, 1);
        points++;
      }
    }
  }

  for (let i = 0; i < enemies.length; i++) {
    let d = dist(enemies[i].posX, enemies[i].posY, player.posX, player.posY);
    if (d < player.size) {
      points = 0;
      player.posX = 300;
      player.posY = 700;
      enemies = [];
      generateRandomEnemies();
    }
  }
}

function generateEnemy() {
  enemies.push(
    new Enemy(
      floor(random(20, width - 50)),
      floor(random(20, height / 3 - 50)),
      20
    )
  );
}

class Player {
  constructor(posX, posY, size) {
    this.posX = posX;
    this.posY = posY;
    this.size = size;
  }

  draw() {
    fill("#2A701D");
    rect(this.posX, this.posY, this.size, this.size);
    fill("#424242");
    rect(this.posX + 10, this.posY - 10, 10, 30);
    fill("#424242");
    rect(this.posX + 30, this.posY + 5, 5, 20);
    rect(this.posX - 5, this.posY + 5, 5, 20);
    rect(this.posX + 12, this.posY - 20, 5, 20);
  }

  move() {
    if (keyIsDown(LEFT_ARROW) && this.posX >= 5) {
      this.posX -= 5;
    }

    if (keyIsDown(RIGHT_ARROW) && this.posX <= width - player.size) {
      console.log(this.posX);
      this.posX += 5;
    }

    if (keyIsDown(UP_ARROW) && this.posY >= 5 + player.size) {
      this.posY -= 5;
    }

    if (keyIsDown(DOWN_ARROW) && this.posY <= height - player.size) {
      this.posY += 5;
    }
  }
}

class Enemy {
  constructor(posX, posY, size) {
    this.posX = posX;
    this.posY = posY;
    this.size = size;
  }
  draw() {
    rect(this.posX, this.posY, this.size, this.size);
    this.posY++;
  }
}

class Bullet {
  constructor(posX, posY, sizeX, sizeY) {
    this.posX = posX;
    this.posY = posY;
    this.sizeX = sizeX;
    this.sizeY = sizeY;
  }

  draw() {
    rect(this.posX, this.posY, this.sizeX, this.sizeY);
    this.posY = this.posY - 10;
  }
}
