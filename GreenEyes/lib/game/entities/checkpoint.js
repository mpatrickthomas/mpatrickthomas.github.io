ig.module('game.entities.checkpoint'
        )
        .requires(
        'impact.entity'
        )
        .defines(function(){
        EntityCheckpoint = ig.Entity.extend({
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
            other.startPosition.x = this.pos.x;
            other.startPosition.y = this.pos.y;
            this.showText = true;
        },
        draw: function(other){
            if(this.showText){
                this.font.draw('Checkpoint!', ig.system.height/2, ig.system.width/2, ig.Font.ALIGN.CENTER);
            }
            this.parent();
        }
          });
        });
