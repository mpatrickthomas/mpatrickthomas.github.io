ig.module(
        'game.entities.VaCuum'
        )
.requires(
        'impact.entity'
        //'game.entity'
        )
        .defines(function(){
            EntityVaCuum = ig.Entity.extend({
                animSheet: new ig.AnimationSheet ('media/vacuum.png', 50,50),
                size:{x:50 , y:40},
                offset: {x:0, y:5},
                maxVel: {x:100, y:100},
                type: ig.Entity.TYPE.B,
                checkAgainst: ig.Entity.TYPE.A,
                collides: ig.Entity.COLLIDES.ACTIVE,
                flip : false,
                freeze: false,
                textX: 0,
                textY:0,
                textDist: 0,
                burn: false,
                i: 0, //used to measure time character is frozen/burning/etc.\
                turnCount: 0, //used to detect how many times a burning vacuum has turned around
                health:50,
                friction:{x:150, y:0},
                speed: 14,
                burnDam:0,
                font: new ig.Font('media/04b03.font.png'),
                init:function(x,y,settings){
                this.parent(x,y,settings); 
                this.addAnim('move', .25, [0,1,2,1]);
                this.addAnim('frozen', 1, [4]);
                this.addAnim('thawing', .01, [4,0]);
                this.addAnim('burning', .1, [5,6,7]);
            },
            check: function( other ){
                if(!this.freeze) other.receiveDamage(3, this);
                else if(this.burn) other.receiveDamage(6, this);
                },
            receiveDamage: function(value){
                
                if(value === 3){
                    this.burnDam +=.5;
                }
                this.parent(value + this.burnDam);
            },
            kill: function(){
                this.parent();
                if(this.freeze)ig.game.spawnEntity(EntityIceballParticle, this.pos.x, this.pos.y, {colorOffset:1});
                else if(this.burn){
                    for(var q = 0; q < 500; q++){
                        ig.game.spawnEntity(EntityFireballParticle, this.pos.x, this.pos.y, {colorOffset:1});
                }
                }
                //ig.game.spawnEntity(EntityDeathExplosion, this.pos.x, this.pos.y, {colorOffset:1});
            },
            update:function(){
                if(this.health < 0) this.kill();
               var player = ig.game.getEntitiesByType(EntityPlayer)[0];
               if(player){
               this.textX = player.pos.x;
               this.textY = player.pos.y;
               this.textDist= this.distanceTo(player);
           }
               if(!this.freeze && !this.burn){ //normal movement (not on fire nor frozen)
                if(!ig.game.collisionMap.getTile(
                    this.pos.x + (this.flip ? + 50 : this.size.x -50),
                    this.pos.y + this.size.y+1
                    )
                    ){
                    this.flip = !this.flip;
                }
                
                if(player){
                if(player.pos.x < this.pos.x && this.distanceTo(player) < 300 ){ //target will run toward the player 
                    this.flip = false;
                }else if(player.pos.x > this.pos.x&& this.distanceTo(player) < 400){
                    this.flip = true;
                }
                
            }
            
                            var xdir = this.flip ? -1 : 1;
                            this.vel.x = this.speed * -xdir;
                            this.currentAnim.flip.x = this.flip;
                        }


            else if(this.burn && !this.freeze){ //if the target is on fire
                this.currentAnim = this.anims.burning;
                if(this.health < 0) this.kill();
                if(!ig.game.collisionMap.getTile(
                    this.pos.x + (this.flip ? + 50 : this.size.x -50),
                    this.pos.y + this.size.y+1
                    )
                    ){
                    this.flip = !this.flip;
                }
                if(player){
                if(player.pos.x < this.pos.x){ //target will run toward the player if on fire
                    this.flip = false;
                }else if(player.pos.x > this.pos.x){
                    this.flip = true;
                }
            }
                this.i += .1;
                if(this.i < 50){ 
                    this.health -= .05;
                    if(this.health < 0) this.kill();
                }else{
                    this.i = 0;
                    this.burn = false;
                    this.burnDam = 0;
                    this.currentAnim = this.anims.move;
                }
                var xdir = this.flip ? -1 : 1;
                this.vel.x = 65 * -xdir;
                this.currentAnim.flip.x = this.flip;
                
            }
            
                else{ //if the taget is frozen
                this.vel.x = 0;
                this.currentAnim = this.anims.frozen;
                this.currentAnim.flip.x = this.flip;
                this.i += .1;
                if(this.i > 70 && this.i < 90){
                    this.currentAnim = this.anims.thawing;
                    this.currentAnim.flip.x = this.flip;
                }
                if(this.i >= 90) {
                    this.i = 0;
                    this.freeze = false;
                    this.currentAnim = this.anims.move;
                    
                }
            }
                
                this.parent();
    },
    
    draw: function(other){
                
                if(this.textX < this.pos.x) this.font.draw(Math.floor(this.health) + '/50', ig.system.width/2 + this.textDist,
                                                    ig.system.height/2  - (this.textY - this.pos.y), ig.Font.ALIGN.CENTER);
                else this.font.draw(Math.floor(this.health) + '/50', ig.system.width/2 - this.textDist,
                                                    ig.system.height/2  - (this.textY - this.pos.y), ig.Font.ALIGN.CENTER);
            
            this.parent();
        },
    
            handleMovementTrace: function( res ){
               this.parent( res );
               if(res.collision.x ){
                   this.flip = !this.flip;
               }
           }
           });

        });
