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
	'game.entities.kibble'
)
.requires(
	'impact.entity'
)
.defines(function(){
	
EntityKibble = ig.Entity.extend({
                size: {x: 5, y: 5},
                animSheet: new ig.AnimationSheet('media/kibble.png', 10, 10),
                maxVel: {x: 0, y: 400},
                bounciness: 1,
                type: ig.Entity.TYPE.NONE,
                checkAgainst: ig.Entity.TYPE.A,
                collides: ig.Entity.COLLIDES.PASSIVE,
                init: function (x, y, settings) {
                    this.parent(x + (settings.flip ? -4 : 8), y + 8, settings);
                    this.vel.y = this.accel.y = 50;
                    this.addAnim('kibble', 0.2, [0]);
                },
                check: function (other) {
                   if(other.maxHealth > other.health) other.health += 7;
                   this.kill();
                },
                /*
                kill: function () {
                    for (var i = 0; i < 100; i++)
                        ig.game.spawnEntity(EntityFireballParticle, this.pos.x, this.pos.y);
                    this.parent();
                },
                */
                handleMovementTrace: function (res) {
                    this.parent(res);
                    if (res.collision.x || res.collision.y) {
                        //this.kill();
                    }
                }
            });
});