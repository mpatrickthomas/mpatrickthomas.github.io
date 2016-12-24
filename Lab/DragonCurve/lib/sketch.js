var red, green, blue;

function setup(){
  createCanvas(window.innerWidth, window.innerHeight);
  red = random(255);
  green = random(255);
  blue = random(255);
} // setup

function draw(){
  background(217);
  strokeWeight(2);
  stroke(red, green, blue);
  fill(red, green, blue, 127);
  ellipse(360, 200, 200, 200);
} // draw

// When the user clicks the mouse
function mousePressed() {
  // Check if mouse is inside the circle
  var d = dist(mouseX, mouseY, 360, 200);
  if (d < 100) {
    // Pick new random color values
    red = random(255);
    green = random(255);
    blue = random(255);
  } // if
} // mousePressed
