ig.module(
        'game.entities.overhead'
        ).requires(
        'impact.entity'
        ).defines(function(){
    EntityOverhead = ig.Entity.extend({
        _wmDrawBox: true,
	_wmBoxColor: 'rgba(255, 0, 0, 0.7)',
        _wmScalable: true,
        type: ig.Entity.TYPE.B,
        checkAgainst: ig.Entity.TYPE.A,
        size: {x:50, y:50},
        update:function(){},
        check:function(other){
            
            other.overhead = true;
            //other.health = other.health - .1;
            
        }
            });
        });