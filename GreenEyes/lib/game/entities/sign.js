/*
This entity gives damage (through ig.Entity's receiveDamage() method) to
the entity that is passed as the first argument to the triggeredBy() method.

I.e. you can connect an EntityTrigger to an EntityHurt to give damage to the
entity that activated the trigger.


Keys for Weltmeister:

text
	What the sign is going to say
        Default: "Default Text"
*/

ig.module(
	'game.entities.sign'
)
.requires(
	'impact.entity'
)
.defines(function(){
	
EntitySign = ig.Entity.extend({
	_wmDrawBox: true,
	_wmBoxColor: 'rgba(255, 0, 0, 0.7)',
        checkAgainst: ig.Entity.TYPE.BOTH,
	_wmScalable: true,
	size: {x: 8, y: 8},
        showText: false,
	text: 'Default Text',
		
	draw: function(){
            if(this.showText){
                var str = this.text;
                this.font.draw(str, ig.system.height/3, ig.system.width/3, ig.Font.ALIGN.CENTER);
            }
            this.parent();
        },
	update: function(){
            this.showText = false;
        },
        check: function(other){
            this.showText = true;
        }
});

});