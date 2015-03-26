ig.module('game.entities.rope'
        )
        .requires(
        'impact.entity'
        )
        .defines(function(){
        EntityRope = ig.Entity.extend({
        _wmDrawBox: true,
        font: new ig.Font('media/04b03.font.png'),
	_wmBoxColor: 'rgba(255, 0, 0, 0.7)',
        _wmScalable: true,
        player: null,
        playerSwing: false,
        playerX: 0,
        playerSizeX: 0,
        playerSizeY: 0,
        playerY: 0,
        type: ig.Entity.TYPE.NONE,
        checkAgainst: ig.Entity.TYPE.A,
        size: {x:50, y:150},
        showText: false,
        update:function(){
            if(this.player != null){
                this.playerSwing = true;
                this.playerX = this.player.pos.x;
                this.playerY = this.player.pos.y;
                this.playerSizeX = this.player.size.x;
                this.playerSizeY = this.player.size.y;
                
            }
            this.playerSwing = false;
        },
        draw:function(){
            var startX, startY, endX, endY;
            if(this.player && this.playerSwing){
                startX = ig.system.getDrawPos((this.pos.x + this.size.x/2) - ig.game.screen.x);
                startY = ig.system.getDrawPos(this.pos.y - ig.game.screen.y);
                
                endX = ig.system.getDrawPos((this.playerX + this.playerSizeX/2) - ig.game.screen.x);
                endY = ig.system.getDrawPos((this.playerY +20 )- ig.game.screen.y);
            }else{
                startX = ig.system.getDrawPos((this.pos.x + this.size.x/2) - ig.game.screen.x);
                startY = ig.system.getDrawPos(this.pos.y - ig.game.screen.y);
                
                endX = ig.system.getDrawPos((this.pos.x + this.size.x/2) - ig.game.screen.x);
                endY = ig.system.getDrawPos((this.pos.y + this.size.y) - ig.game.screen.y);
            }
           ig.system.context.strokeStyle = 'brown';
           ig.system.context.beginPath();
           ig.system.context.moveTo(startX, startY);
           ig.system.context.lineTo(endX, endY);
           ig.system.context.stroke();
           ig.system.context.closePath();
           this.parent();
        },
        check:function(other){
            if(other instanceof EntityPlayer){
                this.player = other;
                this.playerX = other.pos.x;
                this.playerY = other.pos.y;
                this.playerSwing = true;
                this.playerSizeX = other.size.x;
                this.playerSizeY = other.size.y;
            }
            other.initX = other.pos.x;
            other.initY = other.pos.y;
            other.ropeHeight = this.size.y; 
            other.swinging = true;
        },
          });
        });
