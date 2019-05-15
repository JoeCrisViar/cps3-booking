const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const TransactionSchema = new Schema({
	transaction_code: String,
	schedule: obj_id,
	seats:[String],
	user: {
    	type: Schema.Types.ObjectId,
    	ref: 'users'
  	},
	payment[{	
		name: String
	}]
});


module.exports = mongoose.model('User', TransactionSchema);