window.onload = function() {
	var canvas = document.getElementById('myCanvas');
	var c = canvas.getContext('2d');

	var State = {
		_current: 0,
		INTRO: 0,
		LOADING: 1,
		LOADED: 2
	}

	window.addEventListener('click', handleClick, false);
	window.addEventListener('resize', doResize, false);

	doResize();

	// functions
	function handleClick()
	{
		State._current = State.LOADING;
		fadeToWhite();
	}

	function doResize()
	{
		// force canvas to dynamically change its size to the same width/height as a browser window
		canvas.width = document.body.clientWidth;
		canvas.height = document.body.clientHeight;

		switch(State._current)
		{
			case State.INTRO:
				showIntro();
				break;
		}
	}

	function fadeToWhite(alphaVal)
	{
		// if the function has not received any parameters, start with 0.02
		var alphaVal = (alphaVal == undefined) ? 0.02 : parseFloat(alphaVal) + 0.02;

		// set the color to white
		c.fillStyle = '#FFFFFF';
		// set the global alpha
		c.globalAlpha = alphaVal;

		// make the rectangle as big as the canvas
		c.fillRect(0, 0, canvas.width, canvas.height);

		if(alphaVal < 1.0) {
			setTimeout(function() {
				fadeToWhite(alphaVal);
			}, 30);
		}
	}

	function showIntro()
	{
		var phrase = "Click or tap the screen to start the game";

		// clear the canvas
		c.clearRect(0, 0, canvas.width, canvas.height);

		// make a blue gradient
		var grd = c.createLinearGradient(0, canvas.height, canvas.width, 0);
		grd.addColorStop(0, '#c33fff');
		grd.addColorStop(1, '#53bcff');

		c.fillStyle = grd;
		c.fillRect(0, 0, canvas.width, canvas.height);

		var logoImg = new Image();
		logoImg.src = 'img/logo.png';

		// store the original width value so that we can keep the same width/height ratio later
		var originalWidth = logoImg.width;

		// compute the new width and height values
		logoImg.width = Math.round((50 * document.body.clientWidth) / 100);
		logoImg.height = Math.round((logoImg.width * logoImg.height) / originalWidth);

		// create a small utility object
		var logo = {
			img: logoImg,
			x: (canvas.width/2) - (logoImg.width/2),
			y: (canvas.height/2) - (logoImg.height/2)
		}

		// present the image
		c.drawImage(logo.img, logo.x, logo.y, logo.img.width, logo.img.height);

		// change the color to black
		c.fillStyle = '#000000';
		c.font = 'bold 16px Arial, sans-serif';

		var textSize = c.measureText(phrase);
		var xCoord = (canvas.width / 2) - (textSize.width / 2);

		c.fillText(phrase, xCoord, (logo.y + logo.img.height) + 50);
	}
}