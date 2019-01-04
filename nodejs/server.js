// let app = require('express')();
// let http = require('http');
// let server = http.createServer(app);
// let io = require('socket.io');
// let redis = require('redis');
//
// server.listen(3000);
// console.log("Redis listening....");
//
// io.listen(server).on('connection', function (socket) {
//     console.log("Redis server running....." + ': ' + new Date());
//
//     const redisClient = redis.createClient();
//     redisClient.subscribe('send-message');
//
//     redisClient.on("send-message", function (channel, data) {
//         data = JSON.parse(data);
//         console.log("New message added in '" + data.message + "' channel");
//         socket.emit(channel, data);
//     });
//
//     socket.on('disconnect', function () {
//         redisClient.quit();
//     });
//
// }).on('connect_failed', function () {
//     console.log('Connection Failed');
// }).on('connect', function () {
//     console.log('Connected');
// }).on('disconnect', function () {
//     console.log('Disconnected');
// });

let express = require('express');
let app = express();
let server = require('http').Server(app);
let io = require('socket.io')(server);
let dateFormat = require('dateformat');

app.set('port', (process.env.PORT || 3000));
app.use('/npm', express.static('node_modules'));
app.use(express.static('app'));

app.get('/', function (request, response) {
    response.sendFile(__dirname + '/app/index.html');
});

server.listen(app.get('port'), function () {
    console.log('Node app is running on port', app.get('port'), '.');
});

// let messages = [];
let users = [];

io.on('connection', function (socket) {

    //users.push(socket.id);
    console.log('Client connected.');

    // socket.emit('update-users', users);

    socket.on(`send-message`, function (data) {
        console.log("New message added in 'send-message' channel.");
        let newMessage = {text: data.message, user: data.user, date: dateFormat(new Date(), 'HH:MM:ss')};
        // messages.push(newMessage);
        io.emit("receiveMessage", newMessage);
    });

    // socket.on('add-user', function(user){
    //     users.push({ id: socket.id, name: user });
    //     io.emit('update-users', users);
    // });

    socket.on('disconnect', function () {
        users = users.filter(function (user) {
            return user.id != socket.id;
        });
        io.emit('update-users', users);
    });
});
