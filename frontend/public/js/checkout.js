document.getElementById('inputGroupSelectBranch').addEventListener('change',function(){
		let s = document.getElementsByName('branch')[0];

		let theatre_id = s.options[s.selectedIndex].value;

		let movie_id = document.getElementById('inputMovieId').value;

		let url ='/checkout/' + theatre_id + '/' + movie_id;
		// console.log(url);
		// let url = 'http://localhost:3000/api/theatres/' + theatre_id + '/schedule';
	
		let form = document.createElement('form');
	    document.body.appendChild(form);
	    form.method = 'get';
	    form.action = url;
	    
	    form.submit();
		
		
});


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
