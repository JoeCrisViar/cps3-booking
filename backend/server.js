
// Configs includes
const config = require('./config');
// Models includes
const movies = require('./routes/movies.js');
const theatres = require('./routes/theatres.js');
const users = require('./routes/users.js');
const auth = require('./routes/auth.js');
// Node Module 
const mongoose = require('mongoose');
const express = require('express'); /*returns a function*/
const app = express();

mongoose.connect("mongodb+srv://root:admin1234@cluster0-koyaf.mongodb.net/movie_reservation?retryWrites=true", {useNewUrlParser: true}).then(() => {
	console.log("Connected to db");
});



// This is a middleware that parse the body request
app.use(express.json());

// Passing auth/login routes to server.js
app.use('/api/auth', auth);

// Passing user routes to server.js
app.use('/api/users', users);

// Passing theatres routes to server.js
app.use('/api/theatres', theatres);

// Passing movie routes to server.js
app.use('/api/movies', movies);
app.listen (config.port,() =>{
	console.log(`listen on port ${config.port}`);
});