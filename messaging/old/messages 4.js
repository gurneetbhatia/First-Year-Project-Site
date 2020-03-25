var app = require('express')();
var http = require('http').createServer(app);
var path = require('path');
var io = require('socket.io')(http);
var port = process.env.PORT || 3000;
const nsp = io.of('/my-namespace'); // // //
var usersNumber = 0;
var username = 'Aissata The Queen'

nsp.on('connection', function(socket){
  console.log('someone connected');
});


app.get('/', function(req, res){
  res.sendFile(__dirname + '/messages.html');
});

io.on('connection', function(socket){
  var addedUser = false;

  socket.on('new message', (data) => {
    // we tell the client to execute 'new message'
    socket.broadcast.emit('new message', {
      username: socket.username,
      message: data
    });
  });


  socket.on('chat message', function(msg){
    console.log('message: ' + msg);
    io.emit('chat message', msg);
  });
  console.log('a user connected');

  socket.on('disconnect', function(){
    console.log('user disconnected');
  });

});

http.listen(3000, function(){
  console.log('listening on *:3000');
});
