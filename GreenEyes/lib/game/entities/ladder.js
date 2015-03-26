ig.module('game.entities.ladder'
        )
        .requires(
        'impact.entity'
        )
        .defines(function(){
        EntityLadder = ig.Entity.extend({
        _wmDrawBox: true,
        font: new ig.Font('media/04b03.font.png'),
	    _wmBoxColor: 'rgba(255, 0, 0, 0.7)',
        _wmScalable: true,
        type: ig.Entity.TYPE.NONE,
        checkAgainst: ig.Entity.TYPE.A,
        size: {x:8, y:8},
        showText: false,
        update:function(){
           this.showText = false;
        },
        check:function(other){
            other.climbing = true;
            this.showText = true;
        },
        draw: function(other){
            if(this.showText){
                this.font.draw('Press the up arrow to climb!', ig.system.height/3, ig.system.width/3, ig.Font.ALIGN.CENTER);
            }
            this.parent();
        }
          });
        });
