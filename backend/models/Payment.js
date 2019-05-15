const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const PaymentSchema = new Schema({
	method:{ 
		type: String,
		required: true
	}	
});

module.exports = mongoose.model('User', PaymentSchema);