// **** Variables *****
// Center point
var centerX   = 0.0;
var centerY   = 0.0;

// Geometry
var radius    = 45;
var rotAngle  = -90;

// physics
var accelerationX = 0.0;
var accelerationY = 0.0;
var deltaX = 0.0;
var deltaY = 0.0;
var springing = 0.0009;
var damping = 0.98;

// Corner nodes
var cornerNodes = 5;

// Zero fill arrays
var nodeStartX = [];
var nodeStartY = [];
var nodeX = [];
var nodeY = [];
var angle = [];
var frequency = [];

// Soft-body dynamics
var organicConstant = 1.0

// window size
const WIDTH = 1920;
const HEIGHT = 1080;

// ****** Functions *******

function Setup(){
  createCanvas(WIDTH, HEIGHT);

   // center shape in window
   centerX = width/2;
   centerY = height/2;

   for(var i = 0; i < nodes; i++){
     nodeStartX[i] = 0;
     nodeStartY[i] = 0;

     nodeY[i] = 0;
     nodeX[i] = 0;

     angle[i] = 0;

     //initialize frequencies of corner nodes
     for(var i = 0; i < cornerNodes; i++){
       frequency[i] = random(5, 12);
     }

     noStroke();
     frameRate(60);
   }
} // End Setup

function draw(){
  // fade background
  fill(0, 100);
  rect(0, 0, width, height);
  drawShape();
  moveShape();
}// End drawShape

function drawShape(){
  // calculate the starting locations
  for(var i = 0; i < cornerNodes; i++){
    nodeStartX[i] = centerX + cos(radians(rotAngle)) * radius;
    nodeStartY[i] = centerY + sin(radians(rotAngle)) * radius;

    rotAngle += 360.0/cornerNodes;
  }
} // End drawShape

function moveShape(){
  // move the center point
  deltaX = mouseX - centerX;
  deltaY = mouseY - centerY;

  // creating the springing effect
  deltaX *= springing;
  deltaY *= springing;

  accelerationX *= deltaX;
  accelerationY *= deltaY;

  // move the center
  centerX += accelerationX;
  centerY += accelerationY;

  // slow the springing
  accelerationX *= damping;
  accelerationY *= damping;

  organicConstant = 1 - ((abs(accelerationX) + abs(accelerationY)) * 0.1);

  // move nodes
  for(var i = 0; i < cornerNodes; i++){
    nodeX[i] = nodeStartX[i] + sin(radians(angle[i])) * (accelerationX * 2);
    nodeY[i] = nodeStartY[i] + sin(radians(angle[i])) * (accelerationY * 2);
    angle[i] += frequency[i];

  }

}
