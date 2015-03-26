/*
This entity gives damage (through ig.Entity's receiveDamage() method) to
the entity that is passed as the first argument to the triggeredBy() method.

I.e. you can connect an EntityTrigger to an EntityHurt to give damage to the
entity that activated the trigger.


Keys for Weltmeister:

damage
	Damage to give to the entity that triggered this entity.
	Default: 10
*/

ig.module(
	'game.entities.spinner'
)
.requires(
	'impact.entity'
)
.defines(function(){
	
EntitySpinner = ig.Entity.extend({
                size: {x: 50, y: 50},
                animSheet: new ig.AnimationSheet('media/portal.png', 50, 50),
               // maxVel: {x: 0, y: 400},
                //bounciness: 1,
                type: ig.Entity.TYPE.NONE,
                checkAgainst: ig.Entity.TYPE.A,
                collides: ig.Entity.COLLIDES.PASSIVE,
                init: function (x, y, settings) {
                    
                    
                    this.addAnim('spin', 0.2, [0,1,2,3]);
                },
                check: function (other) {
                   
                },
                /*
                kill: function () {
                    for (var i = 0; i < 100; i++)
                        ig.game.spawnEntity(EntityFireballParticle, this.pos.x, this.pos.y);
                    this.parent();
                },
                */
                handleMovementTrace: function (res) {
                    
                }
            });
});