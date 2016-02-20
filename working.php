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

<div class="s">
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">1
	</div>
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">2
	</div>
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">3
	</div>
	<div class="sbody-fragment" data-pos="l" data-right="0" data-top="0">4
	</div>
</div>

<script type="text/javascript">
var dirposs = {
	l:{calc:"left",data:"data-right"},
	r:{calc:"right",data:"data-right",decr:true},
	d:{calc:"bottom",data:"data-top"},
	u:{calc:"top",data:"data-top",decr:true}
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

		if(dir == "l" && !dirchange){
			left += 90; 
			sbody[x].setAttribute('data-right',left);
			sbody[x].style.left = left + "px";			
		}
		else{
			if(!dirchange){
				left += 90; 
				sbody[x].setAttribute('data-right',left);
				sbody[x].style.left = left + "px";
				dirchange = true;
				//Change fragment orientation
				sbody[x].setAttribute('data-pos',"l");
			}else{
				top += 100;
				sbody[x].setAttribute('data-top',top);
				sbody[x].style.top = top + "px";
			}
		} 
    }
}

//Move down
//change color insidehere
function moveDown(){
	var t = sbody.length - 1;
	var dirchange = false;
	for(var x = t; x >= 0; x--){
		var dir = sbody[x].getAttribute('data-pos'); 
		var top = +sbody[x].getAttribute('data-top'); 
		var left = +sbody[x].getAttribute('data-right'); 
		var calc = {top:top,left:left};
		
	    
		if(dir == "d" && !dirchange){
			top += 100; 
			sbody[x].setAttribute('data-top',top);
			sbody[x].style.top = top + "px";			
		}
		else{
			if(!dirchange){
				top += 100; 
				sbody[x].setAttribute('data-top',top);
				sbody[x].style.top = top + "px";
				dirchange = true;
				//Change fragment orientation
				sbody[x].setAttribute('data-pos',"d");
			}else{
				left += 90;
				sbody[x].setAttribute('data-right',left);
				sbody[x].style.left = left + "px";
			}
		} 
    }
}

</script>
</body>
</html>