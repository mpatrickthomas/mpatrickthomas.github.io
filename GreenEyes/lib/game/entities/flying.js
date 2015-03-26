ig.module(
        'game.entities.flying'
        ).requires(
        'impact.entity'
        ).defines(function(){
    EntityFlying = ig.Entity.extend({
        _wmDrawBox: true,
	_wmBoxColor: 'rgba(255, 0, 0, 0.7)',
        _wmScalable: true,
        type: ig.Entity.TYPE.B,
        checkAgainst: ig.Entity.TYPE.A,
        size: {x:8, y:8},
        update:function(){},
        check:function(other){
            
            other.flying = true;
            //other.health = other.health - .1;
            
        }
            });
        });