var WALL = 0,
performance = window.performance;
var goal = 0;
var sum = 0;
var numClicks = 0;
var searchSpeed;
$(function () {
    var $grid = $("#search_grid"),
        $selectGridSize = $("#selectGridSize"),
        $selectSpeed = $("#selectSpeed"),
        $heuristic = $("#selectHeuristic")
        opts = {
        gridSize: $selectGridSize.val(),
        //heuristic: $heuristic.val(),
        speed: $selectSpeed.val()
    };
   var gameInstruct = false;
    var grid = new GraphSearch($grid, opts, astar.search);
    $("#gameBtn").click(function(){
        if(!gameInstruct) alert("Create paths and try to make the path lengths equal the goal number! Don't go over, though!");
        gameInstruct = true;
        sum = 0;
        numClicks = Math.floor((Math.random() * 7) + 1);
        goal = Math.floor((Math.random() * 200) + 1);
        document.getElementById("goal").textContent = "Goal: " +goal;
        document.getElementById("sum").textContent = "Your sum: " + sum;
        document.getElementById("numClicks").textContent = "Number of clicks left: " +numClicks;
    });
    $("#btnGenerate").click(function () {
        grid.initialize();
    });

    $selectGridSize.change(function () {
        grid.setOption({
            gridSize: $(this).val()
        });
        grid.initialize();
    });
    $selectSpeed.change(function(){
       grid.setOption({
           speed: $(this).val()
       });
        grid.initialize();
    });
    $heuristic.change(function(){
       grid.setOption({
           heuristic: $(this).val()
       });
        grid.initialize();
    });

    $("#generateWeights").click(function () {
        if ($("#generateWeights").prop("checked")) {
            $('#weightsKey').slideDown();
        } else {
            $('#weightsKey').slideUp();
        }
    });

});

var css = {
    start: "start",
    finish: "finish",
    wall: "wall",
    active: "active"
};

function GraphSearch($graph, options, implementation) {
    this.$graph = $graph;
    this.search = implementation;
    this.opts = $.extend({
        wallFrequency: 0.2,
        heuristic: astar.heuristics.diagonal,
        gridSize: 10
    }, options);
    this.initialize();
}
GraphSearch.prototype.setOption = function (opt) {
    this.opts = $.extend(this.opts, opt);
    this.showValues();
};
GraphSearch.prototype.initialize = function () {
    this.grid = [];
    var self = this,
        nodes = [],
        $graph = this.$graph;

    $graph.empty();

    var cellWidth = ($graph.width() / this.opts.gridSize) - 2, // -2 for border
        cellHeight = ($graph.height() / this.opts.gridSize) - 2,
        $cellTemplate = $("<span />").addClass("grid_item").width(cellWidth).height(cellHeight),
        startSet = false;

    for (var x = 0; x < this.opts.gridSize; x++) {
        var $row = $("<div class='clear' />"),
            nodeRow = [],
            gridRow = [];

        for (var y = 0; y < this.opts.gridSize; y++) {
            var id = "cell_" + x + "_" + y,
                $cell = $cellTemplate.clone();
            $cell.attr("id", id).attr("x", x).attr("y", y);
            $row.append($cell);
            gridRow.push($cell);

            var isWall = Math.floor(Math.random() * (1 / self.opts.wallFrequency));
            if (isWall === 0) {
                nodeRow.push(WALL);
                $cell.addClass(css.wall);
            } else {
                var cell_weight = ($("#generateWeights").prop("checked") ? (Math.floor(Math.random() * 3)) * 2 + 1 : 1);
                nodeRow.push(cell_weight);
                $cell.addClass('weight' + cell_weight);
                if (!startSet) {
                    $cell.addClass(css.start);
                    startSet = true;
                }
            }
        }
        $graph.append($row);
        this.grid.push(gridRow);
        nodes.push(nodeRow);
    }
    this.graph = new Graph(nodes);
    this.$cells = $graph.find(".grid_item");
    this.$cells.click(function () {
        self.cellClicked($(this));
    });
};
GraphSearch.prototype.cellClicked = function ($end) {
    var end = this.nodeFromElement($end);
    if ($end.hasClass(css.wall) || $end.hasClass(css.start)) {
        return;
    }
    numClicks--;
    this.$cells.removeClass(css.finish);
    $end.addClass("finish");
    var $start = this.$cells.filter("." + css.start),
        start = this.nodeFromElement($start);

    var sTime = performance ? performance.now() : new Date().getTime();

    var path = this.search(this.graph, start, end, opts);
    var fTime = performance ? performance.now() : new Date().getTime(),
        duration = (fTime - sTime).toFixed(2);

    if (path.length === 0) {
        this.animateNoPath();
    } else {
        this.showValues();
        this.animatePath(path);
    }
};
GraphSearch.prototype.showValues = function () {
    this.$cells.html(" ");
    var that = this;
    if (this.opts.gridSize < 40) {
        that.$cells.each(function () {
            var node = that.nodeFromElement($(this)),
               vals = false;
            if (node.visited) {
                vals = "F: " + node.f + "<br />G: " + node.g + "<br />H: " + node.h;
            }

            if (vals) {
                $(this).html(vals);
            }
        });
    }
};
GraphSearch.prototype.nodeFromElement = function ($cell) {
    return this.graph.grid[parseInt($cell.attr("x"))][parseInt($cell.attr("y"))];
};
GraphSearch.prototype.animateNoPath = function () {
    alert("Can't make a path there!");
};
GraphSearch.prototype.animatePath = function (path) {
    var grid = this.grid,
        timeout = this.opts.speed / grid.length,
        elementFromNode = function (node) {
            return grid[node.x][node.y];
        };

    var self = this;
    var removeClass = function (path, i) {
        if (i >= path.length) {
            return setStartClass(path, i + 1);
        }
        elementFromNode(path[i]).removeClass(css.active);
        setTimeout(function () {
            removeClass(path, i+1);
        }, timeout * path[i].getCost());
    };
    var setStartClass = function (path, i) {
        if (i === path.length) {
            self.$graph.find("." + css.start).removeClass(css.start);
            elementFromNode(path[i - 1]).addClass(css.start);
        }
    };
    var addClass = function (path, i) {
        if (i >= path.length) {
            //sum += path.length;
            document.getElementById("sum").textContent = "Your sum: "+sum;
            document.getElementById("goal").textContent = "Goal: " + goal;
            document.getElementById("numClicks").textContent = "Number of clicks left: " + numClicks;
            document.getElementById("length").textContent = "Path length: " + path.length;
            if(sum <  goal) document.getElementById("sum").textContent = sum;
            else if ((sum > goal && goal > 0 )||( numClicks < 0 && goal > 0) ){ alert("Oh noes! You lost!");
                                            goal = 0;}
            else if(sum === goal && numClicks >= 0){alert("Congrats you won!!!");}
            return removeClass(path, 0);
        }
        elementFromNode(path[i]).addClass(css.active);
        setTimeout(function () {
            addClass(path, i + 1);
            
            sum++;
            document.getElementById("sum").textContent = "Your sum " +sum;
        }, timeout * path[i].getCost());
        
    };

    addClass(path, 0);
    this.$graph.find("." + css.start).removeClass(css.start); //deletes the old start position
    this.$graph.find("." + css.finish).removeClass(css.finish).addClass(css.start); //makes the old end position the new start position
};