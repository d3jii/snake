<!doctype HTML>
<html>
<head>
	<title> S 1.0 </title>
</head>
<style type="text/css">
.s{

}

.sbody-fragment{
	width: 90px;
    height: 90px;
    background-color: #aaa;
    border: 1px solid #eee;
    position: absolute;
}
</style>
<body>
	<button onclick="move('u')"> Up </button> <br />
	<button onclick="move('r')"> Left </button> <button onclick="move('l')"> Right </button> <br />
	<button onclick="move('d')"> Down </button>
	
<!-- <div class="s"> -->
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">1
	</div>
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">2
	</div>
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">3
	</div>
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">4
	</div>
<!-- </div> -->

<script type="text/javascript">
var dirposs = {
	l:{calc:"left",data:"data-right",horizon:"top"},
	r:{calc:"left",data:"data-right",decr:true,horizon:"top"},
	d:{calc:"top",data:"data-top",horizon:"left"},
	u:{calc:"top",data:"data-top",decr:true,horizon:"left"}
}
var sbody = document.getElementsByClassName('sbody-fragment');

console.log(typeof sbody[0].getAttribute('data-location'));
var i = 0, length = sbody.length, width = 90;
for(i = 0; i < length; i++){
	var left = (i * width);
	sbody[i].setAttribute('data-right',left);
	sbody[i].style.left = left + "px";
}

function moveRight(){
	var t = sbody.length - 1;
	var dirchange = false;
	for(var x = t; x >= 0; x--){
		var dir = sbody[x].getAttribute('data-pos'); 
		var top = +sbody[x].getAttribute('data-top'); 
		var left = +sbody[x].getAttribute('data-right'); 
		var calc = {top:top,left:left};

		//GetNextFragment
		var nx,dirn,topn,leftn;
		if(x + 1 <= t && x !== t){
			var nx = x + 1;
			var dirn = sbody[nx].getAttribute('data-pos'); 
			var oldposn = sbody[nx].getAttribute('data-old-pos'); 
			var topn = +sbody[nx].getAttribute('data-top'); 
			var leftn = +sbody[nx].getAttribute('data-right'); 
			var calcn = {top:topn,left:leftn};
		}

		//Deal with first item differently
		if(x == t){
			//if already going right..continue..else change direction			 
			left += 100; 
			sbody[x].setAttribute('data-right',left);
			sbody[x].style.left = left + "px";
			sbody[x].setAttribute('data-pos',"l");
			sbody[x].setAttribute('data-old-pos',dir); 
		}
		else{
			console.log(nx,x);
			if(nx) {
				//if next fragmaent is in same position..continue in same position as next fragment
				if(topn == top){
					left += 100; 
					sbody[x].setAttribute('data-right',left);
					sbody[x].style.left = left + "px";
					sbody[x].setAttribute('data-pos',"l"); 
					sbody[x].setAttribute('data-old-pos',dir);
				}
				//Else switch to direction of next object
				else{
					console.log(oldposn); 
					var disnis = dirposs[oldposn]; 
					calc[disnis.calc] += 100; 
					sbody[x].setAttribute(disnis.data,calc[disnis.calc]);
					sbody[x].style[disnis.calc] = calc[disnis.calc] + "px";
					sbody[x].setAttribute('data-pos',oldposn);
					sbody[x].setAttribute('data-old-pos',dir);  
				}
			}
		}  
    }
}

 
function moveDown(){
	var t = sbody.length - 1;
	var dirchange = false;
	for(var x = t; x >= 0; x--){
		var dir = sbody[x].getAttribute('data-pos'); 
		var top = +sbody[x].getAttribute('data-top'); 
		var left = +sbody[x].getAttribute('data-right'); 
		var calc = {top:top,left:left};

		//GetNextFragment
		var nx,dirn,topn,leftn;
		if(x + 1 <= t && x !== t){
			var nx = x + 1;
			var dirn = sbody[nx].getAttribute('data-pos'); 
			var oldposn = sbody[nx].getAttribute('data-old-pos'); 
			var topn = +sbody[nx].getAttribute('data-top'); 
			var leftn = +sbody[nx].getAttribute('data-right'); 
			var calcn = {top:topn,left:leftn};
		}

		//Deal with first item differently
		if(x == t){
			//if already going right..continue..else change direction			 
			top += 100; 
			sbody[x].setAttribute('data-top',top);
			sbody[x].style.top = top + "px";
			sbody[x].setAttribute('data-pos',"d");
			sbody[x].setAttribute('data-old-pos',dir); 
		}
		else{
			console.log(nx,x);
			if(nx) {
				//if next fragmaent is in same position..continue in same position as next fragment
				if(left == leftn){
					top += 100; 
					sbody[x].setAttribute('data-top',top);
					sbody[x].style.top = top + "px";
					sbody[x].setAttribute('data-pos',"d"); 
					sbody[x].setAttribute('data-old-pos',dir);
				}
				//Else switch to direction of next object
				else{
					console.log(oldposn); 
					var disnis = dirposs[oldposn]; 
					calc[disnis.calc] += 100; 
					sbody[x].setAttribute(disnis.data,calc[disnis.calc]);
					sbody[x].style[disnis.calc] = calc[disnis.calc] + "px";
					sbody[x].setAttribute('data-pos',oldposn);
					sbody[x].setAttribute('data-old-pos',dir);  
				}
			}
		}  
    }
}


function move(d){
	var dobjt = dirposs[d];
	var t = sbody.length - 1;
	var dirchange = false;
	for(var x = t; x >= 0; x--){
		var dir = sbody[x].getAttribute('data-pos'); 
		var top = +sbody[x].getAttribute('data-top'); 
		var left = +sbody[x].getAttribute('data-right'); 
		var calc = {top:top,left:left};

		//GetNextFragment
		var nx,dirn,topn,leftn;
		if(x + 1 <= t && x !== t){
			var nx = x + 1;
			var dirn = sbody[nx].getAttribute('data-pos'); 
			var oldposn = sbody[nx].getAttribute('data-old-pos'); 
			var topn = +sbody[nx].getAttribute('data-top'); 
			var leftn = +sbody[nx].getAttribute('data-right'); 
			var calcn = {top:topn,left:leftn};
		}

		//Deal with first item differently
		if(x == t){
			//if already going right..continue..else change direction
			if(dobjt.decr)
				calc[dobjt.calc] -= 100;	
			else
				calc[dobjt.calc] += 100;	

			sbody[x].setAttribute(dobjt.data,calc[dobjt.calc]);
			sbody[x].style[dobjt.calc] = calc[dobjt.calc] + "px";
			sbody[x].setAttribute('data-pos',d);
			sbody[x].setAttribute('data-old-pos',dir); 
		}
		else{
			console.log(nx,x);
			if(nx) {
				//if next fragmaent is in same position..continue in same position as next fragment
				if(calc[dobjt.horizon] == calcn[dobjt.horizon]){
					if(dobjt.decr)
						calc[dobjt.calc] -= 100;	
					else
						calc[dobjt.calc] += 100; 

					sbody[x].setAttribute(dobjt.data,top);
					sbody[x].setAttribute(dobjt.data,calc[dobjt.calc]);
					sbody[x].style[dobjt.calc] = calc[dobjt.calc] + "px";
					sbody[x].setAttribute('data-pos',d);
					sbody[x].setAttribute('data-old-pos',dir); 
				}
				//Else switch to direction of next object
				else{
					console.log(oldposn); 
					var disnis = dirposs[oldposn]; 
					calc[disnis.calc] += 100; 
					sbody[x].setAttribute(disnis.data,calc[disnis.calc]);
					sbody[x].style[disnis.calc] = calc[disnis.calc] + "px";
					sbody[x].setAttribute('data-pos',oldposn);
					sbody[x].setAttribute('data-old-pos',dir);  
				}
			}
		}  
    }
}
</script>
</body>
</html>