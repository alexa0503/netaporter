(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes

// library properties:
lib.properties = {
	width: 640,
	height: 1040,
	fps: 18,
	color: "#D70010",
	manifest: [
		{src:"images/s01.png", id:"s01"},
		{src:"images/s02.png", id:"s02"}
	]
};



// symbols:



(lib.s01 = function() {
	this.initialize(img.s01);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,130,91);


(lib.s02 = function() {
	this.initialize(img.s02);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,145,141);


(lib.Symbol3 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.s02();
	this.instance.setTransform(-72.5,-70.5);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-72.5,-70.5,145,141);


(lib.Symbol2 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.s01();
	this.instance.setTransform(-65,-45.5);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-65,-45.5,130,91);


(lib.Symbol1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Symbol 3
	this.instance = new lib.Symbol3("synched",0);
	this.instance.setTransform(-25,116,1,1,0,0,0,0,70.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(14).to({startPosition:0},0).to({scaleY:0.95,y:115.9},3,cjs.Ease.get(1)).wait(2).to({startPosition:0},0).to({scaleY:1,y:66},4,cjs.Ease.get(1)).to({y:116},4,cjs.Ease.get(-1)).to({scaleY:0.93,y:115.9},4).to({scaleY:1,y:116},3).wait(1));

	// Symbol 2
	this.instance_1 = new lib.Symbol2("synched",0);
	this.instance_1.setTransform(-25,-25,1,1,0,0,0,-57.5,45.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(14).to({startPosition:0},0).to({scaleY:0.95,rotation:-15,y:-16.2},3,cjs.Ease.get(1)).wait(2).to({startPosition:0},0).to({regX:-57.4,scaleY:1,rotation:65.4,y:-73.5},4,cjs.Ease.get(1)).to({regX:-57.5,rotation:-22.2,y:-25},4,cjs.Ease.get(-1)).to({scaleX:1,scaleY:0.93,rotation:0,skewX:10.7,skewY:9.3,x:-25.1,y:-15.3},4).to({scaleX:1,scaleY:1,skewX:0,skewY:0,x:-25,y:-25},3).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-97.5,-116,195,232);


(lib.ldMc = function() {
	this.initialize();

	// ldmc_nei
	this.instance = new lib.Symbol1();
	this.instance.setTransform(24,-113.5);

	// txt
	this.txt = new cjs.Text("000%", "bold 22px 'Arial Black'", "#F5D8A2");
	this.txt.name = "txt";
	this.txt.textAlign = "center";
	this.txt.lineHeight = 24;
	this.txt.lineWidth = 100;
	this.txt.setTransform(-0.5,15.5);

	this.addChild(this.txt,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-73.5,-229.5,195,280);


// stage content:
(lib.s0 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_1 = function() {
		var S=this
		S.stop()
		
		function reset()
		{
			S.ldMc.txt.text="0%";
			S.ldMc.gotoAndStop(0)
		}
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).wait(1).call(this.frame_1).wait(1));

	// Layer 2
	this.ldMc = new lib.ldMc();
	this.ldMc.setTransform(318.5,428,1,1,0,0,0,-1.5,-40);
	this.ldMc._off = true;

	this.timeline.addTween(cjs.Tween.get(this.ldMc).wait(1).to({_off:false},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = null;

})(lib0 = lib0||{}, img0 = img0||{}, createjs = createjs||{}, ss = ss||{});
var lib0, img0, createjs, ss;