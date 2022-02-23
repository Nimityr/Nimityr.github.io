var express = require('express');
var allowedOrigins = "http://localhost:* http://127.0.0.1:*";
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var users=[];

/*app.get('/', function(req, res){
	res.sendfile("./chat.html");
});
*/
app.use(express.static('html'));
app.use('/css',express.static('css'));
app.use('/js',express.static('js'));
app.use('/img',express.static('img'));


io.on('connection', function(socket){
	console.log('a user connected');
	var user=null;
	socket.on('whoami',function(data){
		users.push({"name":data.name});
		user=data.name;
		console.log("name = "+data.name);
		io.emit("new_user",{
			"users":users
		});
	});
	socket.on('message',function(data){
		io.emit("new_message",
			{
				"user":user,
				"message":data.m
			});
		console.log(user+":"+data.m);
	});
	socket.on('disconnect',function(){
		if (user){
			users=users.filter(el => el.name != user);
		}			console.log(users);
		user=null;
		io.emit("new_user",{
			"users":users         
		});   
	});
});

http.listen(3000, function(){
	console.log('listening on *:3000');
});
