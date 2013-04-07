document.write("<script src='https://cdn.firebase.com/v0/firebase.js' type='text/javascript'></script>");
document.write("<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js' type='text/javascript'></script>");

function maze(x,y) {
	var n=x*y-1;
	if (n<0) {alert("illegal maze dimensions");return;}
	var horiz=[]; for (var j= 0; j<Math.max(x,y)+1; j++) horiz[j]= [];
	var verti=[]; for (var j= 0; j<Math.max(x,y)+1; j++) verti[j]= [];
	var here= [Math.floor(Math.random()*x), Math.floor(Math.random()*y)];
	var path= [here];
	var unvisited= [];
	for (var j= 0; j<x+2; j++) {
		unvisited[j]= [];
		for (var k= 0; k<y+1; k++)
			unvisited[j].push(j>0 && j<x+1 && k>0 && (j != here[0]+1 || k != here[1]+1));
	}
	while (0<n) {
		var potential= [[here[0]+1, here[1]], [here[0],here[1]+1],
		    [here[0]-1, here[1]], [here[0],here[1]-1]];
		var neighbors= [];
		for (var j= 0; j < 4; j++)
			if (unvisited[potential[j][0]+1][potential[j][1]+1])
				neighbors.push(potential[j]);
		if (neighbors.length) {
			n= n-1;
			next= neighbors[Math.floor(Math.random()*neighbors.length)];
			unvisited[next[0]+1][next[1]+1]= false;
			if (next[0] == here[0])
				horiz[next[0]][(next[1]+here[1]-1)/2]= true;
			else 
				verti[(next[0]+here[0]-1)/2][next[1]]= true;
			path.push(here= next);
		} else 
			here= path.pop();
	}
	return ({x: x, y: y, horiz: horiz, verti: verti});
}

function bitmap(m) {
	var map= [];
	for (var j= 0; j<m.x*2+1; j++) {
		var line= [];
		if (0 == j%2)
			for (var k=0; k<m.y*2+1; k++)
				if (0 == k%2) 
					line[k]= 1;
				else
					if (j>0 && m.verti[j/2-1][Math.floor(k/2)])
						line[k]= 0;
					else
						line[k]= 1;
		else
			for (var k=0; k<m.y*2+1; k++)
				if (0 == k%2)
					if (k>0 && m.horiz[(j-1)/2][k/2-1])
						line[k]= 0;
					else
						line[k]= 1;
				else
					line[k]= 0;
		if (0 == j) line[1] = 0;
		if (m.x*2-1 == j) line[2*m.y]= 0;
		map.push(line);
	}
	return map;
}

function requestMultiplayerGame(url, maze, scale){
    var d = new Date();
	var n = d.getTime();
	var randToken = n;
	var myDataRef = new Firebase('https://z.firebaseio.com/'+randToken);
	myDataRef.set({url: url, maze: JSON.stringify(maze), scale: scale, player1: false, player2: false});
	return randToken;
}

function loadMaze(token){
	var myDataRef = new Firebase('https://z.firebaseio.com/'+token);
	myDataRef.on('child_added', function (snapshot) {
	   var message = JSON.parse(snapshot.val());
	});
	var obj = jQuery.parseJSON(message);
	return obj;
}

function isReady(token){
	var myDataRef1 = new Firebase('https://z.firebaseio.com/'+token);
	var player1 = false;
	var player2 = false;
	myDataRef1.on('value', function(snapshot) {
	  player1 = snapshot.val().player1;
	  player2 = snapshot.val().player2;
	});
	if (player1 && player2)
		return true;
	return false;
}

function scale(bitmap, scale) {
  var scaled = [];
  if (bitmap.length == 0)
    return scaled;
    
  var width = bitmap[0].length;
  var height = bitmap.length;
  for (var y=0; y<height; y++) {
    var line = [];
    for (var x=0; x<width; x++) {
      for (var i=0; i<scale; i++) {
        line[x*scale+i] = bitmap[y][x];
      }
    }
    for (var j=0; j<scale; j++) {
      scaled.push(line);
    }  
  }
  return scaled;
}

function display(m) {
	var text= [];
	for (var j= 0; j<m.x*2+1; j++) {
		var line= [];
		if (0 == j%2)
			for (var k=0; k<m.y*4+1; k++)
				if (0 == k%4) 
					line[k]= '+';
				else
					if (j>0 && m.verti[j/2-1][Math.floor(k/4)])
						line[k]= ' ';
					else
						line[k]= '-';
		else
			for (var k=0; k<m.y*4+1; k++)
				if (0 == k%4)
					if (k>0 && m.horiz[(j-1)/2][k/4-1])
						line[k]= ' ';
					else
						line[k]= '|';
				else
					line[k]= ' ';
		if (0 == j) line[1]= line[2]= line[3]= ' ';
		if (m.x*2-1 == j) line[4*m.y]= ' ';
		text.push(line.join('')+'\r\n');
	}
	return text.join('');
}

function _isColor(pixel, color) {
  return pixel[0] == color[0] && pixel[1] == color[1] && pixel[2] == color[2] && pixel[3] == color[3];
}

function canMove(ctx, x, y, scale, myColor) {
  var c = ctx.getImageData(x*scale, y*scale, 1, 1).data;
  // can move on white squere
  if (_isColor(c, [255,255,255,255])) {
    // is neighbour pixel of myColour
    var eq = 0;
    // top
    c = ctx.getImageData(x*scale, (y-1)*scale, 1, 1).data;    
    if (_isColor(c, myColor)) {
      eq++;
    }
    // right
    c = ctx.getImageData((x+1)*scale, y*scale, 1, 1).data;    
    if (_isColor(c, myColor)) {
      eq++;
    }
    // bottom
    c = ctx.getImageData(x*scale, (y+1)*scale, 1, 1).data;    
    if (_isColor(c, myColor)) {
      eq++;
    }
    // left
    c = ctx.getImageData((x-1)*scale, y*scale, 1, 1).data;    
    if (_isColor(c, myColor)) {
      eq++;
    }
    return eq;
  }
  return 0;
}

function pixelsToRemove(ctx, fromPixel, toPixel, scale) {
  var removePixels = [];
  if (fromPixel == null || toPixel == null) {
    return removePixels;
  }
  
  while (fromPixel[0] != toPixel[0] && fromPixel[1] != toPixel[1]) {
    var x = fromPixel[0], y = fromPixel[1];
    var t = ctx.getImageData(toPixel[0]*scale, toPixel[1]*scale, 1, 1).data;
    removePixels.push(fromPixel);
    // top
    c = ctx.getImageData(x*scale, (y-1)*scale, 1, 1).data;    
    if (_isColor(c, t)) {
      fromPixel[0] = x;
      fromPixel[1] = y-1;
      continue;
    }
    // right
    c = ctx.getImageData((x+1)*scale, y*scale, 1, 1).data;    
    if (_isColor(c, t)) {
      fromPixel[0] = x+1;
      fromPixel[1] = y;
      continue;
    }
    // bottom
    c = ctx.getImageData(x*scale, (y+1)*scale, 1, 1).data;    
    if (_isColor(c, t)) {
      fromPixel[0] = x;
      fromPixel[1] = y+1;
      continue;
    }
    // left
    c = ctx.getImageData((x-1)*scale, y*scale, 1, 1).data;    
    if (_isColor(c, t)) {
      fromPixel[0] = x-1;
      fromPixel[1] = y;
      continue;
    }
  }
  return removePixels;
}


