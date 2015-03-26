ig.module( 
	'game.main' 
)
.requires(
	'impact.game',
	'game.levels.KittyLevel1',
        'game.levels.level2',
        'game.levels.level3',
        'game.levels.overhead',
	'plugins.box2d.entity',
	'plugins.box2d.game'

)


.defines(function(){

MyGame = ig.Box2DGame.extend({
	gravity:300,
	instructText: new ig.Font('media/04b03.font.png'),
	healthText: new ig.Font('media/04b03.font.png'),
        playerLives:3,
	init: function() {
                
		this.loadLevel(LevelLevel3);
                //this.playerLives = 9;
                ig.input.bind(ig.KEY.LEFT_ARROW, 'left');
                ig.input.bind(ig.KEY.RIGHT_ARROW, 'right');
                ig.input.bind(ig.KEY.UP_ARROW, 'jump');
                ig.input.bind(ig.KEY.SPACE, 'shoot');
                ig.input.bind(ig.KEY.TAB, 'switch');
                ig.input.bind(ig.KEY.DOWN_ARROW,'down');
	},
	
	update: function() {
		var player = this.getEntitiesByType(EntityPlayer)[0];
			if (player) {
                              
                                  
                                  if(ig.game.playerLives === 0) ig.system.setGame(GameOver)
                                  
                              
                                //console.log(this.playerLives);
                                
				this.screen.x = player.pos.x - ig.system.width / 2;
				this.screen.y = player.pos.y - ig.system.height / 2;
                          
                                if(player.accel.x > 0 && this.instructText) this.instructText = null;
                                if(player.swimming == true) this.gravity = 150;
                                if(player.overhead == true) this.gravity = 0;
                                else this.gravity = 300;
                }
                
		this.parent();
		
		// Add your own, additional update code here
	},
	
	draw: function() {
		
		this.parent();
                var player = this.getEntitiesByType(EntityPlayer)[0];
                
                if(player){
                var x = ig.system.width/15,
                        y = ig.system.height/10;
                this.healthText.draw('Health: ' + Math.floor(player.health)+"/"+player.maxHealth, x, y, ig.Font.ALIGN.LEFT);
                this.healthText.draw('Lives: ' + ig.game.playerLives,x,y+20,ig.Font.ALIGN.LEFT);
                if(player.activeWeapon === "EntityFireBall") this.healthText.draw('Weapon: Fireball',x,y+40,ig.Font.ALIGN.LEFT);
                else if(player.activeWeapon === "EntityIceBall") this.healthText.draw('Weapon: Freeze Ray',x,y+40,ig.Font.ALIGN.LEFT);
                else this.healthText.draw('Weapon: Plasma Beam',x,y+40,ig.Font.ALIGN.LEFT);
            }
               
                if(this.instructText){
		var x = ig.system.width/2,
                    y = ig.system.height -10;
                this.instructText.draw(
                        'Use ARROW KEYS to move, SPACE to shoot, and TAB to change weapons',
                x,y,ig.Font.ALIGN.CENTER);
            }
	}
});



// Start the Game with 60fps, a resolution of 320x240, scaled
// up by a factor of 2
StartScreen = ig.Game.extend({
    instructText:new ig.Font('media/04b03.font.png'),
    background:new ig.Image('media/titlePage.png'),
    init:function(){
        ig.input.bind(ig.KEY.SPACE,'start');
    },
    update:function(){
        if(ig.input.pressed('start')){
            ig.system.setGame(MyGame)
        }
        this.parent();
    },
    draw:function(){
        this.parent();
        this.background.draw(0,0);
        var x = ig.system.width/2;
        var y = ig.system.height - 110;
        this.instructText.draw('Press SPACE to begin your adventure',x+100,y, ig.Font.ALIGN.RIGHT);
    }
});
GameOver = ig.Game.extend({
    instructText:new ig.Font('media/04b03.font.png'),
    background:new ig.Image('media/dead.png'),
    init:function(){
        ig.input.bind(ig.KEY.SPACE,'start');
    },
    update:function(){
        if(ig.input.pressed('start')){
            ig.system.setGame(MyGame)
        }
        this.parent();
    },
    draw:function(){
        this.parent();
        this.background.draw(0,0);
        var x = ig.system.width/2;
        var y = ig.system.height - 110;
        this.instructText.draw('Press SPACE to try again',x+150,y, ig.Font.ALIGN.CENTER);
    }
});
ig.main( '#canvas', StartScreen, 120, 640, 480, 2 );

});
