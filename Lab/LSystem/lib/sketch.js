// turtle stuff
var x, y; // current turtle position
var currentAngle = 0; // which way the turtle is pointing
var step = 10; // how much the turtle moves with each 'F'
var angle = 90; // how much the turtle turns on + or -
var fr = 120;

// Sound stuff
var notes = [
  60, // Middle C
  62, // D
  64, // E
  65, // F
  67, // G
  69, // A
  71 // B
];

var currentNote = 72; // start at C
var osc;

// LSystem stuff
var theString = 'FX';
var numLoops = 15; // how many iterations to precompute
var theRules = [];
theRules[0] = ['X', 'X+YF+']; // Rule #1
theRules[1] = ['Y', '-FX-Y']; // Rule #2

var stringLoc = 0; // where in the LSystem we are

function setup(){
    frameRate(fr);
    createCanvas(10000, 10000);
    background(255);
    stroke(0, 0, 0, 255);

    // start the x and y position in a random location
    x = width / 2;
    y = height / 2;

    for(var i = 0; i < numLoops; i++) theString = lindenmayer(theString);

    //osc = new p5.TriOsc();
    //osc.start();
    //osc.amp(0);
}

function draw(){
  // draw the current character in the string;
  drawIt(theString[stringLoc]);

  // increment the point we are reading from
  // wrap around at the end
  stringLoc++;
  if(stringLoc > theString.length - 1) stringLoc = 0;
}

// interpret the LSystem
function lindenmayer(input){
  var output = ''; // start with a blank stringLoc

  // iterate through the rules looking for symbol matches
  for(var i = 0; i < input.length; i++){
    var isMatch = false;
    for(var j = 0; j < theRules.length; j++){
      if(input[i] == theRules[j][0]){
        output += theRules[j][1]; // make the substitution
        isMatch = true;
        break;
      }
    }
    // copy the symbol over if nothing matches
    if(!isMatch) output += input[i];
  }
  return output;
}

function drawIt(input){
  if(input == 'F'){ // draw forward
    // polar to cartesian based on step and current angle
    var x1 = x + step * cos(radians(currentAngle));
    var y1 = y + step * sin(radians(currentAngle));

    line(x,y, x1, y1);
    //osc.freq(midiToFreq(random(currentNote)));
    // Fade it in
    //osc.fade(0.5,0.2);
    // update the turtle's position
    x = x1;
    y = y1;
  }else if (input == '+') {
    currentAngle -= angle;
    currentNote--;
  }else if (input == '-') {
    currentAngle += angle;
    currentNote++;
  }
  //if(currentNote < 0) currentNote =  0;
  //else if( currentNote > 127 ) currentNote = 127;
  // give random color values
  //var red = random(128, 255);
  //var green = random(0, 192);
  //var blue = random(0, 50);
  //var alpha = random(50, 100);

  // pick a gaussian (D & D) distribution for the radius
  //var radius = 0;
  //radius += random(0, 15);
  //radius += random(0, 15);
  //radius += random(0, 15);
  //radius /= 3;

  // draw the stuff
  //fill(red, green, blue, alpha);
  //ellipse(x, y, radius, radius);
}
