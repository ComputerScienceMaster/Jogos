function Objeto(i, j, name, description, width, height, img) {
  this.name = name;
  this.description = description;
  this.x = i;
  this.y = j;
  this.width = width;
  this.height = this.height;
  this.img = img;

  this.clicked = function () {
    //var d = dist(mouseX, mouseY, this.x, this.y);
    if (
      mouseX >= this.x &&
      mouseX <= this.x + this.width &&
      mouseY >= this.y &&
      mouseY <= this.y + height
    ) {
      return this.description;
    }else{
      return false;
    }
  };

  this.show = function () {
    img.resize(width, height);
    image(img, this.x, this.y);
  };
}
