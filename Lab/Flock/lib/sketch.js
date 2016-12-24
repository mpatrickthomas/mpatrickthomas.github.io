// array that will hold all of the boids
var boids = [];

function setup(){
    createCanvas(windowWidth, windowHeight);
    for(var i = 0; i < 175; i++) boids[i] = new Boid(random(width), random(height));
}

function draw(){
    background(51);

    // run all boids
    for(var i = 0; i < boids.length; i++) boids[i].run(boids);
}

// ********************** Boid class ******************************
function Boid(x, y){
  this.acceleration = createVector(0,0);
  this.velocity = p5.Vector.random2D();
  this.position = createVector(x,y);
  this.r = 3.0;
  this.maxSpeed = 3; // Max speed
  this.maxForce = 0.05; // Steering force
}

Boid.prototype.run = function(boids){
  this.flock(boids);
  this.update();
  this.borders();
  this.render();
}

// forces go into acceleration
Boid.prototype.applyForce = function(force){
  this.acceleration.add(force);
}

Boid.prototype.flock = function(boids){
  var sep = this.separate(boids); // Separation
  var ali = this.align(boids);    // Alignment
  var coh = this.cohesion(boids); // Cohesion

  // apply arbitrary values
  sep.mult(2.5);
  ali.mult(1.0);
  coh.mult(1.0);

  // Apply the forces
  this.applyForce(sep);
  this.applyForce(ali);
  this.applyForce(coh);

}

// Method to update location
Boid.prototype.update = function(){
    // Update velocity
    this.velocity.add(this.acceleration);

    // limit speed
    this.velocity.limit(this.maxSpeed);
    this.position.add(this.velocity);

    // reset acceleration to 0
    this.acceleration.mult(0);
}

// A method that calculates and applies a steering force towards a target
// STEER = DESIRED MINUS VELOCITY
Boid.prototype.seek = function(target){
  var desired = p5.Vector.sub(target, this.position);

  // Normalize desired scale to max speed
  desired.normalize();
  desired.mult(this.maxSpeed);

  // Steering = desired - velocity

  var steer = p5.Vector.sub(desired, this.velocity);
  steer.limit(this.maxForce);
  return steer;
}

// Wraparound
Boid.prototype.borders = function(){
  if(this.position.x < -this.r) this.position.x = width + this.r;
  if(this.position.y < -this.r) this.position.y = height + this.r;
  if(this.position.x > width + this.r) this.position.x = -this.r;
  if(this.position.y > height + this.r) this.position.y = -this.r;
}

// Draw boid as a circle
Boid.prototype.render = function(){
  fill(127, 127);
  stroke(200);
  ellipse(this.position.x, this.position.y, 16, 16);
}

// Separation
// Method checks for nearby boids and steers away
Boid.prototype.separate = function(boids){
  var desiredSeparation = 25.0;
  var steer = createVector(0,0);
  var count = 0;

  // for each boid, check if it is too close
  for(var i = 0; i < boids.length; i++){
    var d = p5.Vector.dist(this.position, boids[i].position);
    if(d > 0 && d < desiredSeparation){
      // calculate vector pointing away from neighbor
      var diff = p5.Vector.sub(this.position, boids[i].position);
      diff.normalize();
      diff.div(d); // Weigh by distance
      steer.add(diff);
      count++;
    }
  }
  // Average it together
  if(count > 0) steer.div(count);

  // As long as the vector is greater than zero
  if(steer.mag() > 0){
    steer.normalize();
    steer.mult(this.maxSpeed);
    steer.sub(this.velocity);
    steer.limit(this.maxForce);
  }
  return steer;
}

// Alignment
// Foreach boid in the system, calculate the average velocity
Boid.prototype.align = function(boids){
  var neighborDist = 50;
  var sum = createVector(0,0);
  var count =0;
  for(var i = 0; i < boids.length; i++){
    var d = p5.Vector.dist(this.position, boids[i].position);
    if(d > 0 && d < neighborDist){
      sum.add(boids[i].velocity);
      count++
    }
  }
  if(count > 0){
    sum.div(count);
    sum.normalize();
    sum.mult(this.maxSpeed);
    var steer = p5.Vector.sub(sum, this.velocity);
    steer.limit(this.maxForce);
    return steer;
  } else return createVector(0,0);
}

// Cohesion
// for the average location (o.e center) of all nearby boids
Boid.prototype.cohesion = function(boids){
      var neighborDist = 50;
      var sum = createVector(0,0); // start with an empty vector
      var count = 0;
      for(var i = 0; i < boids.length; i++){
        var d = p5.Vector.dist(this.position, boids[i].position);
        if( d > 0 && d < neighborDist){
          sum.add(boids[i].position); // Add location
          count++;
        } // if
      } // for
      if(count > 0){
        sum.div(count);
        return this.seek(sum); // Steer towards the location
      }else return createVector(0,0);
} // Cohesion
