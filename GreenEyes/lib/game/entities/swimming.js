ig.module('game.entities.swimming'
        )
        .requires(
        'impact.entity'
        )
        .defines(function(){
            EntitySwimming = ig.Entity.extend({
        _wmDrawBox: true,
	_wmBoxColor: 'rgba(255, 0, 0, 0.7)',
        _wmScalable: true,
        type: ig.Entity.TYPE.B,
        checkAgainst: ig.Entity.TYPE.A,
        size: {x:8, y:8},
        update:function(){},
        check:function(other){
            
            other.swimming = true;
            other.health = other.health - .1;
            
        }
            });
        });