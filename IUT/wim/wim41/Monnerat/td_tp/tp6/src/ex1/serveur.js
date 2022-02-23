let express = require('express');
let app = express();



app.get('/', function(req, res){
	res.sendFile(__dirname+"/html/contacts.html");
});

//app.use('/html',express.static('html'));
app.use('/css',express.static('css'));
app.use('/js',express.static('js'));
app.use('/img',express.static('img'));
app.use('/tags',express.static('tags'));


app.listen( 3000,()=>{
	console.log('listening on *:3000');
})

