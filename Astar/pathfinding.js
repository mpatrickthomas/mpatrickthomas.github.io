var canvas = null;

var ctx = null;

var spritesheet = null;

var spritesheetloaded = false;

var world = [[]];

var worldwidth = 16;

var worldheight = 16;

var tilewidth = 32;

var tileheight = 32;

var pathStart = [worldwidth, worldheight];
var pathEnd = [0,0];
var currentPath = [];

if(typeof console == "undefined") var console = {log:function(){}};

function onload(){
    console.log('Page loaded.');
    canvas = document.getElementById('gameCanvas');
    canvas.width = worldWidth * titleWidth;
    canvas.height = worldheight * tileheight;
    canvas.addEventListener("click", canvasClick, false);
    ctx = canvas.getContext("2d");
    spritesheet = new Image();
    
    spritesheet.src = 'spritesheet.png';
    spritesheet.onload = loaded;
}


function loaded() 
{
  console.log('Spritesheet loaded.');
  spritesheetLoaded = true;
  createWorld();
}
 
function createWorld()
{
  console.log('Creating world...');
  
  
  for (var x=0; x < worldWidth; x++)
  {
    world[x] = [];
    
    for (var y=0; y < worldHeight; y++)
    {
      world[x][y] = 0;
    }
  }
  
  
  for (var x=0; x < worldWidth; x++)
  {
    for (var y=0; y < worldHeight; y++)
    {
      if (Math.random() > 0.75)
        world[x][y] = 1;
    }
  }
  
  currentPath = [];
  while (currentPath.length == 0) 
  {
    pathStart = [Math.floor(Math.random()*worldWidth),Math.floor(Math.random()*worldHeight)];
    pathEnd = [Math.floor(Math.random()*worldWidth),Math.floor(Math.random()*worldHeight)];
    if (world[pathStart[0]][pathStart[1]] == 0)
      currentPath = findPath(world,pathStart,pathEnd,'Manhattan');
  }
  redraw();
  
}
function redraw() 
{
  if (!spritesheetLoaded) return;
 
	console.log('redrawing...');
 
	var spriteNum = 0;
 
	// clear the screen
	ctx.fillStyle = '#000000';
	ctx.fillRect(0, 0, canvas.width, canvas.height);
 
	for (var x=0; x < worldWidth; x++)
	{
		for (var y=0; y < worldHeight; y++)
		{
  		// choose a sprite to draw
  		switch(world[x][y])
  		{
  			case 1: 
  			spriteNum = 1; 
  			break;
  			default:
  			spriteNum = 0; 
  			break;
  		}
  
  		// draw it
  		// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
  		ctx.drawImage(spritesheet, 
    		spriteNum*tileWidth, 0, 
    		tileWidth, tileHeight,
  	  	x*tileWidth, y*tileHeight,
  		  tileWidth, tileHeight);
		}
	}
 
	// draw the path
	console.log('Current path length: '+currentPath.length);
	for (rp=0; rp<currentPath.length; rp++)
	{
		switch(rp)
		{
			case 0:
  			spriteNum = 2; // start
  			break;
			case currentPath.length-1:
	  		spriteNum = 3; // end
  			break;
			default:
  			spriteNum = 4; // path node
  			break;
		}
 
		ctx.drawImage(spritesheet, 
			spriteNum*tileWidth, 0, 
			tileWidth, tileHeight,
			currentPath[rp][0]*tileWidth, 
			currentPath[rp][1]*tileHeight,
			tileWidth, tileHeight);
	}		
}