document.getElementById('inputGroupSelectBranch').addEventListener('change',function(){
		
		let s = document.getElementsByName('branch')[0];

		let theatre_id = s.options[s.selectedIndex].value;

		let movie_id = document.getElementById('inputMovieId').value;

		let url ='/checkout/' + theatre_id + '/movie/' + movie_id + '/screen/' + 1;
		// console.log("URL 1: " + url);
		// let url = 'http://localhost:3000/api/theatres/' + theatre_id + '/schedule';
	
		let form = document.createElement('form');

	    document.body.appendChild(form);
	    
	    form.method = 'get';
	    
	    form.action = url;
	    
	    form.submit();
		
		
});

document.getElementById('inputGroupSelectScreen').addEventListener('change',function(){
		
		let b = document.getElementsByName('branch')[0];

		let theatre_id = b.options[b.selectedIndex].value;

		 	// console.log("Theatre ID: " + theatre_id);
		
		let movie_id = document.getElementById('inputMovieId').value;
			console.log("Movie ID: " + movie_id);

		let s = document.getElementsByName('screen_type')[0];

		let screen_id = s.options[s.selectedIndex].value;

			// console.log("Screen ID: " + screen_id);	

		let url ='/checkout/' + theatre_id + '/movie/' + movie_id + '/screen/' + screen_id;
		
		// console.log("URL 2: " + url);
		// let url = 'http://localhost:3000/api/theatres/' + theatre_id + '/schedule';
	
		let form = document.createElement('form');

	    document.body.appendChild(form);
	    
	    form.method = 'get';
	    
	    form.action = url;
	    
	    form.submit();
		
		
});


document.getElementById('inputGroupSelectDate').addEventListener('change',function(){
	 let timeEL = document.getElementById("timeDiv");
	  if (timeEL.style.display === "none") {
	    timeEL.style.display = "inline-block";
	  }
});


document.getElementById('inputGroupSelectTime').addEventListener('change',function(){
	
	let seatEL = document.getElementById("seatDiv");
		if (seatEL.style.display === "none") {
	    seatEL.style.display = "inline-block";
	  }

	let summaryEL = document.getElementById("summaryDiv");
		if (summaryEL.style.display === "none") {
    	summaryEL.style.display = "inline-block";
  }
	
	  let seatCount = document.getElementById("seatCount").innerHTML;

	  let seatId = [];

	  let selectedSeats = [];
	  
	  console.log(selectedSeats.length);
	for (let i = 1; i <= seatCount; i++) {
			
		seatId[i] = document.getElementById("seatPosition" + i).value;

		let seat = document.getElementById("seatPosition" + i);
		// console.log(seat);
		seat.addEventListener('change',function(){
			
			
			if(this.checked) {
	        	for (let i = 1; i <= seatId.length; i++) {

					if (seatId[i] == this.value) {

						selectedSeats.push(this.value);

					}	        		

	        		// console.log(seatId[i]);
	        	}
	        	// console.log(this.value);
		    } else {
		        for (let i = 1; i <= seatId.length; i++) {

					if (seatId[i] == this.value) {

						// console.log(selectedSeats);
						let index = selectedSeats.indexOf(this.value);

						if (index > -1) {

						  selectedSeats.splice(index, 1);

						}
						// console.log(selectedSeats);
					}	        		
	        	}
		    }

		    console.log(selectedSeats.length);
		});
	}	

});


// 		function check() {
//     document.getElementById("myCheck").checked = true;
// }

// function uncheck() {
//     document.getElementById("myCheck").checked = false;
// }
	




// function redirectPost(url, data) {
//     var form = document.createElement('form');
//     document.body.appendChild(form);
//     form.method = 'post';
//     form.action = url;
//     for (var name in data) {
//         var input = document.createElement('input');
//         input.type = 'hidden';
//         input.name = name;
//         input.value = data[name];
//         form.appendChild(input);
//     }
//     form.submit();
// }
