var input, button, greeting;
var word;
function setup() {

  // create canvas
  createCanvas(1920, 1080);

  input = createInput();
  input.position(20, 65);

  button = createButton('submit');
  button.position(150, 65);
  input.input(greet);

  greeting = createElement('h2', 'speak?');
  greeting.position(20, 5);

  textAlign(CENTER)
  textSize(50);


}

function greet() {

  var foo = input.value();

  if(foo != ' '){ // if it is a space, break the word
    word += foo;

    return;
  }else if(foo == " "){
   alert("space")
  for (var i=0; i<100; i++) {
    push();
    fill(random(255), random(255), random(255));
    translate(random(width), random(height));
    rotate(random(2*PI));
    text(word, 0, 0);
    pop();
  }
  word = ''
  input.value('');
  }
}
