


ig.module(
        'game.entities.LaStrawberrae'
        )
        .requires(
                'impact.entity',
                'impact.font'
                )
        .defines(function () {
            EntityLaStrawberrae = ig.Entity.extend({
                animSheet: new ig.AnimationSheet('media/Strawberry.png', 50, 49),
                size: {x: 100, y: 49},
                healthText: new ig.Font('media/04b03.font.png'),
                offset: {x: 0, y: -10},
                type: ig.Entity.TYPE.NONE,
                checkAgainst: ig.Entity.TYPE.A,
                collides: ig.Entity.COLLIDES.NEVER,
                flip: false,
                //friction:{x:150, y:0},
                init: function (x, y, settings) {
                    this.parent(x, y, settings);
                    this.addAnim('idle', .4, [0, 2, 3, 2]);
                    this.addAnim('speech', .5, [0, 1, 3]);
                },
                check: function (other) {
                    //this.currentAnim = this.anims.speech;
                    if(other.health < other.maxHealth)other.health = other.health + .05;
                    if(other.pos.x < this.pos.x){
                        this.flip = true;
                    }else{
                        this.flip = false;
                    }
                    this.currentAnim.flip.x = this.flip;
                },
                update: function () {
                    this.currentAnim = this.anims.idle;
                    this.parent();
                }

            });
        });
