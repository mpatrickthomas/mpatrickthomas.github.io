ig.module(
        'game.entities.player'
        )
        .requires(
                'impact.entity',
                'plugins.box2d.entity'
                )
        .defines(function () {
            EntityPlayer = ig.Entity.extend({
                animSheet: new ig.AnimationSheet('media/kitties.png', 50, 45),
                size: {x: 40, y:45},
                offset: {x: 0, y: -5},
                flip: false,
                kibbles: 0,
                maxHealth: 150,
                health: 130,
                invincible: true,
                
                invincibleDelay: 2,
                invincibleTimer: null,
                type: ig.Entity.TYPE.A,
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.PASSIVE,
                maxVel: {x: 200, y: 400},
                friction: {x: 600, y: 0},
                accelGround: 400,
                accelAir: 250,
               
                initX: 0, //used in swinging
                initY: 0, //used in swinging
                theta: 1.5,
                ropeHeight: 0,
                maxYVelSwim: 80,
                swingHeight: 0,
                weapon: 0,
                swimming: false,
                swinging: false,
                climbing: false,
                flying: false,
                overhead:false,
                startPosition: null,
                totalWeapons: 3,
                activeWeapon: "EntityFireBall",
                jump: 250,
                

                init: function (x, y, settings) {
                    this.startPosition = {x: x, y: y};
                    this.parent(x, y, settings);
                    this.addAnim('idle', .6, [12, 13, 14, 15,14,13]);
                    this.addAnim('flying', .1, [0,1]);
                    this.addAnim('run', 0.07, [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
                    this.addAnim('jump', 1, [17]);
                    this.addAnim('fall', 0.4, [18]);
                    this.addAnim('shoot', 1, [16]);
                    this.addAnim('swim', .1, [19, 20, 21]);
                    this.addAnim('climb', .5, [22, 23]);
                    this.addAnim('towards', .07,[26,27]);
                    this.addAnim('away', .07, [24,25]);
                    
                    this.invincibleTimer = new ig.Timer();
                    this.makeInvincible();
                },
                receiveDamage: function (amount, from) {
                    if (this.invincible)
                        return;
                    this.parent(amount, from);
                },
                draw: function () {
                    if (this.invincible)
                        this.currentAnim.alpha = this.invincibleTimer.delta() / this.invincibleDelay * 1;
                    this.parent();
                },
                makeInvincible: function () {
                    this.invincible = true;
                    this.invincibleTimer.reset();
                },
                kill: function () {
                    this.parent();
                    if(ig.game.playerLives === 3){
                                      console.log("Beep");
                                        ig.game.playerLives = 2;
                                  } 
                    else if(ig.game.playerLives === 2) ig.game.playerLives = 1; 
                    else if(ig.game.playerLives === 1) ig.game.playerLives = 0;
                    var x = this.startPosition.x;
                    var y = this.startPosition.y;
                    ig.game.spawnEntity(EntityDeathExplosion, this.pos.x, this.pos.y,
                            {callBack: function () {
                                    ig.game.spawnEntity(EntityPlayer, x, y)
                                }});
                },
                triggeredBy: function(trigger) {	
                    this.swingHeight = trigger.size.y;
                    this.initX = this.pos.x;
                    this.initY = this.pos.y;
                    
                },
                update: function () {
                   // console.log(this.overhead);
                  //console.log(ig.game.playerLives);
                    if(this.health < 0) {
                        //ig.game.playerLives = 0;
                        
                        this.kill();
                    }
                   
                    if (ig.input.pressed('switch')) {
                        this.weapon++;
                        if (this.weapon >= this.totalWeapons)
                            this.weapon = 0;
                        switch (this.weapon) {
                            case 0:
                                this.activeWeapon = "EntityFireBall";
                                break;
                            case 1:
                                this.activeWeapon = "EntityIceBall";
                                break;
                            case 2:
                                this.activeWeapon = "EntityPlasmaBall";
                                break;
                        }
                    }

                    var accel = this.standing ? this.accelGround : this.accelAir;

                    if (!this.swimming && !this.climbing && !this.swinging && !this.flying && !this.overhead) { //movement when on ground
                        this.maxVel.y = 400;
                        if (ig.input.state('left')) {
                            this.accel.x = -accel;
                            this.flip = true;
                        } else if (ig.input.state('right')) {
                            this.accel.x = accel;
                            this.flip = false;
                        } else {
                            this.accel.x = 0;
                        }
                        
                        if (this.standing && ig.input.state('jump')) {
                            this.vel.y = -this.jump;
                            
                        }
                    }

                    else if (this.swimming) {//movement in the water
                        this.maxVel.y = this.maxYVelSwim;
                        this.currentAnim = this.anims.swim;
                        if (ig.input.state('left')) {
                            this.accel.x = -accel;
                            this.flip = true;
                        } else if (ig.input.state('right')) {
                            this.accel.x = accel;
                            this.flip = false;
                        } else {
                            this.accel.x = 0;
                        }

                        if (ig.input.state('jump')) {
                            this.vel.y = -80;
                        }
                    }
                     else if (this.flying) {//movement in the skies
                         //console.log("Flying");
                         this.gravityFactor = 0;
                        this.currentAnim = this.anims.flying;
                        if (ig.input.state('left')) {
                            this.accel.x = -accel;
                            this.flip = true;
                        } else if (ig.input.state('right')) {
                            this.accel.x = accel;
                            this.flip = false;
                        } else {
                            this.accel.x = 0;
                        }
                        if (ig.input.pressed('jump')) {
                            this.vel.y = -120;
                        }
                    }
                    else if (this.climbing) { //movement when climbing
                        
                        if (ig.input.state('left')) {
                            this.accel.x = -accel;
                            this.flip = true;
                        } else if (ig.input.state('right')) {
                            this.accel.x = accel;
                            this.flip = false;
                        } else {
                            this.accel.x = 0;
                        }

                        if (ig.input.state('jump')) {
                            this.vel.y = -120;
                        }
                    }
                    else if (this.overhead) { //movement when overhead
                        //console.log("blah");
                        this.standing = true;
                        this.friction.x=500;
                        this.friction.y=500;
                        if (ig.input.state('left')) {
                            this.accel.x = -accel;
                            this.flip = true;
                            this.currentAnim = this.anims.run;
                        } else if (ig.input.state('right')) {
                            this.accel.x = accel;
                            this.flip = false;
                            this.currentAnim = this.anims.run;
                        } else {
                            this.accel.x = 0;
                        }
                       
                        if (ig.input.state('jump')) {
                            this.currentAnim = this.anims.away;
                            //console.log("beep");
                            this.accel.y = -120;
                        }else if(ig.input.state('down')){
                            this.currentAnim = this.anims.towards;
                            this.accel.y = 120;
                            //console.log("boink");
                        }else this.accel.y = 0;
                        
                        if(this.vel.x == 0 && this.vel.y == 0) this.currentAnim = this.anims.idle;
                    }
                    
                    else if(this.swinging){
                        this.currentAnim = this.anims.climb;
                        if(!this.flip){
                            this.vel.x = this.initX + this.ropeHeight* Math.cos(this.theta * (Math.PI/180));
                        }else  this.vel.x = -(this.initX + this.ropeHeight* Math.cos(this.theta * (Math.PI/180)));
                        
                        this.vel.y = (-this.initY* Math.sin(this.theta * (Math.PI/180)))/4;
                        //if(this.theta < 0) this.theta -= 1.5;
                        this.theta += 1.5;
                    }

                    if (ig.input.pressed('shoot') && !this.climbing && !this.swimming && !this.swinging && !this.flying) {
                        this.currentAnim = this.anims.shoot;
                        if(this.flip == false) ig.game.spawnEntity(this.activeWeapon, this.pos.x + 25, this.pos.y+15, {flip: this.flip});
                        else ig.game.spawnEntity(this.activeWeapon, this.pos.x, this.pos.y+15, {flip: this.flip});
                    }

                    if (!this.swimming && !this.climbing && !this.swinging && !this.flying && !this.overhead) { //animations when on normal ground
                        if (this.vel.y < 0) {
                            this.currentAnim = this.anims.jump;
                        } else if (this.vel.y > 0) {
                            this.currentAnim = this.anims.fall;
                        } else if (this.vel.x != 0) {
                            this.currentAnim = this.anims.run;
                        }else if(ig.input.state('shoot')){
                            this.currentAnim = this.anims.shoot;
                        }
                        else{
                                this.currentAnim = this.anims.idle;
                        }
                    }else if (this.swimming) { //animations when swimming
                        this.currentAnim = this.anims.swim;
                    }else if (this.swinging) { //animations when swimming
                        this.currentAnim = this.anims.climb;
                    } else if (this.climbing && !this.standing) { //animation when climbing
                        this.currentAnim = this.anims.climb; 
                    }else if(this.climbing && this.vel.x !== 0 && this.vel.y === 0){
                        this.currentAnim = this.anims.run;
                    }else if (this.flying) { //animation when climbing
                        this.currentAnim = this.anims.flying; 
                    }else if(this.overhead){ //coming towards the player
                        if(ig.input.state('down'))this.currenAnim = this.anims.towards;
                        else if(ig.input.state('up'))this.currenAnim = this.anims.away;
                        else if(this.vel.x != 0){
                            this.currenAnim = this.anims.run;
                            console.log("herp");
                        }
                        
                    }else this.currentAnim = this.anims.idle;

                    this.currentAnim.flip.x = this.flip;

                    if (this.invincibleTimer.delta() > this.invincibleDelay) {
                        this.invincible = false;
                        this.currentAnim.alpha = 1;
                    }

                    this.swimming = false;
                    this.climbing = false;
                    this.swinging = false;
                    this.flying = false;
                    this.gravityFactor = 1;
                    if(this.standing) this.theta = 1.5;
                    this.parent();

                }
            });


            EntityDeathExplosion = ig.Entity.extend({
                lifetime: 1,
                callBack: null,
                particles: 50,
                init: function (x, y, settings) {
                    this.parent(x, y, settings);
                    for (var i = 0; i < 30; i++)
                        ig.game.spawnEntity(EntityDeathExplosionParticle, x, y,
                                {colorOffset: settings.colorOffset ? settings.colorOffset : 0});
                    this.idleTimer = new ig.Timer();
                },
                update: function () {
                    if (this.idleTimer.delta() > this.lifetime) {
                        this.kill();
                        if (this.callBack)
                            this.callBack();
                        return;
                    }
                }
            });
            EntityDeathExplosionParticle = ig.Box2DEntity.extend({
                size: {x: 2, y: 2},
                mexVel: {x: 160, y: 200},
                lifetime: 2,
                fadetime: 1,
                bounciness: 0,
                vel: {x: 200, y: 300},
                friction: {x: 100, y: 0},
                collides: ig.Entity.COLLIDES.LITE,
                colorOffset: 0,
                totalColors: 7,
                animSheet: new ig.AnimationSheet('media/blood.png', 2, 2),
                init: function (x, y, settings) {
                    this.parent(x, y, settings);
                    var frameID = Math.round(Math.random() * this.totalColors) + (this.colorOffset * (this.totalColors + 1));
                    this.addAnim('idle', 0.2, [frameID]);
                   // this.vel.x = (Math.random() * 3 - 1) * this.vel.x;
                    //this.vel.y = (Math.random() * 3 - 1) * this.vel.y;
                    this.body.ApplyForce(new Box2D.Common.Math.b2Vec2((Math.random() *50 - 10),(Math.random() *50-10)),this.body.GetPosition());
                    this.idleTimer = new ig.Timer();
                },
                update: function () {
                    if (this.idleTimer.delta() > this.lifetime) {
                        this.kill();
                        return;
                    }
                    this.currentAnim.alpha = this.idleTimer.delta().map(
                            this.lifetime - this.fadetime, this.lifetime, 1, 0);
                    this.parent();
                }
            });
            EntityFireBall = ig.Entity.extend({
                size: {x: 5, y: 5},
                animSheet: new ig.AnimationSheet('media/fireball.png', 10, 10),
                maxVel: {x: 400, y: 0},
                type: ig.Entity.TYPE.NONE,
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.PASSIVE,
                init: function (x, y, settings) {
                    this.parent(x + (settings.flip ? -4 : 8), y + 8, settings);
                    this.vel.x = this.accel.x = (settings.flip ? -this.maxVel.x : this.maxVel.x);
                    this.addAnim('idle', 0.2, [0]);
                },
                check: function (other) {
                    other.receiveDamage(3, this);
                    if(other.freeze) other.freeze = false;
                    other.burn = true;
                    if(other.i > 0) other.i = 0;
                    this.kill();
                },
                kill: function () {
                    for (var i = 0; i < 100; i++)
                        ig.game.spawnEntity(EntityFireballParticle, this.pos.x, this.pos.y);
                    this.parent();
                },
                handleMovementTrace: function (res) {
                    this.parent(res);
                    if (res.collision.x || res.collision.y) {
                        this.kill();
                    }
                }
            });
            EntityPlasmaBall = ig.Entity.extend({
                size: {x: 5, y: 5},
                animSheet: new ig.AnimationSheet('media/plasma.png', 10, 10),
                maxVel: {x: 400, y: 0},
                type: ig.Entity.TYPE.NONE,
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.PASSIVE,
                init: function (x, y, settings) {
                    this.parent(x + (settings.flip ? -4 : 8), y + 8, settings);
                    this.vel.x = this.accel.x = (settings.flip ? -this.maxVel.x : this.maxVel.x);
                    this.addAnim('idle', 0.2, [0]);
                },
                check: function (other) {
                    other.receiveDamage(1, this);
                    //if(other.freeze) other.freeze = false;
                    //other.burn = true;
                    //if(other.i > 0) other.i = 0;
                    var player = ig.game.getEntitiesByType(EntityPlayer)[0];
                    
                    if(player){
                        if(player.health < player.maxHealth)player.health = player.health + 1;
                    }
                    this.kill();
                },
                kill: function () {
                    for (var i = 0; i < 100; i++)
                        ig.game.spawnEntity(EntityPlasmaParticle, this.pos.x, this.pos.y);
                    this.parent();
                },
                handleMovementTrace: function (res) {
                    this.parent(res);
                    if (res.collision.x || res.collision.y) {
                        this.kill();
                    }
                }
            });
            EntityFireballParticle = ig.Entity.extend({
                size: {x: 1, y: 1},
                maxVel: {x: 300, y: 400},
                lifetime: 1,
                fadetime: 1,
                bounciness: 0.3,
                vel: {x: 40, y: 60},
                friction: {x: 0, y: 0},
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.LITE,
                animSheet: new ig.AnimationSheet('media/explosion.png', 3, 3),
                init: function (x, y, settings) {
                    this.parent(x, y, settings);
                    this.vel.x = (Math.random() * 4 - 1) * this.vel.x;
                    this.vel.y = (Math.random() * 10 - 1) * this.vel.y;
                    this.idleTimer = new ig.Timer();
                    var frameID = Math.round(Math.random() * 7);
                    this.addAnim('idle', 0.2, [frameID]);
                },
                update: function () {
                    if (this.idleTimer.delta() > this.lifetime) {
                        this.kill();
                        return;
                    }
                    this.currentAnim.alpha = this.idleTimer.delta().map(
                            this.lifetime - this.fadetime, this.lifetime,
                            1, 0);
                    this.parent();
                }
            });
            EntityIceBall = ig.Entity.extend({
                size: {x: 10, y: 10},
                animSheet: new ig.AnimationSheet('media/iceBall.png', 16, 16),
                maxVel: {x: 400, y: 0},
                type: ig.Entity.TYPE.NONE,
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.PASSIVE,
                init: function (x, y, settings) {
                    this.parent(x + (settings.flip ? -4 : 8), y + 8, settings);
                    this.vel.x = this.accel.x = (settings.flip ? -this.maxVel.x : this.maxVel.x);
                    this.addAnim('idle', 0.2, [0]);
                },
                check: function (other) {
                    other.receiveDamage(.5, this);
                    if(other.burn) other.burn = false;
                    other.freeze = true;
                    other.i = 0;
                    this.kill();
                },
                handleMovementTrace: function (res) {
                    this.parent(res);
                    if (res.collision.x || res.collision.y) {
                        this.kill();
                    }
                },
                kill: function(){
                    for (var i = 0; i < 100; i++)
                        ig.game.spawnEntity(EntityIceballParticle, this.pos.x, this.pos.y);
                    this.parent();
                }
            });
            EntityPlasmaParticle = ig.Entity.extend({
                size: {x: 1, y: 1},
                maxVel: {x: 160, y: 200},
                lifetime: 1,
                fadetime: 1,
                bounciness: 0.3,
                vel: {x: 40, y: 60},
                friction: {x: 0, y: 0},
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.LITE,
                animSheet: new ig.AnimationSheet('media/plasma.png', 4, 4),
                init: function (x, y, settings) {
                    this.parent(x, y, settings);
                    this.vel.x = (Math.random() * 4 - 1) * this.vel.x;
                    this.vel.y = (Math.random() * 10 - 1) * this.vel.y;
                    this.idleTimer = new ig.Timer();
                    var frameID = Math.round(Math.random() * 7);
                    this.addAnim('idle', 0.2, [frameID]);
                },
                update: function () {
                    if (this.idleTimer.delta() > this.lifetime) {
                        this.kill();
                        return;
                    }
                    this.currentAnim.alpha = this.idleTimer.delta().map(
                            this.lifetime - this.fadetime, this.lifetime,
                            1, 0);
                    this.parent();
                }
            });
            EntityIceballParticle = ig.Entity.extend({
                size: {x: 1, y: 1},
                maxVel: {x: 160, y: 200},
                lifetime: 1,
                fadetime: 1,
                bounciness: 0.3,
                vel: {x: 40, y: 60},
                friction: {x: 0, y: 0},
                checkAgainst: ig.Entity.TYPE.B,
                collides: ig.Entity.COLLIDES.LITE,
                animSheet: new ig.AnimationSheet('media/iceBall.png', 4, 4),
                init: function (x, y, settings) {
                    this.parent(x, y, settings);
                    this.vel.x = (Math.random() * 4 - 1) * this.vel.x;
                    this.vel.y = (Math.random() * 10 - 1) * this.vel.y;
                    this.idleTimer = new ig.Timer();
                    var frameID = Math.round(Math.random() * 7);
                    this.addAnim('idle', 0.2, [frameID]);
                },
                update: function () {
                    if (this.idleTimer.delta() > this.lifetime) {
                        this.kill();
                        return;
                    }
                    this.currentAnim.alpha = this.idleTimer.delta().map(
                            this.lifetime - this.fadetime, this.lifetime,
                            1, 0);
                    this.parent();
                }
            });

        });