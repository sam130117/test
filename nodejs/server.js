let app = require('express')();
let http = require('http');
let server = http.createServer(app);
let io = require('socket.io');
let redis = require('redis');

server.listen(3005);
console.log("Redis listening....");

io.listen(server).on('connection', function (socket) {
    console.log("Redis server running....." + ': ' + new Date());

    const redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message", function (channel, data) {
        console.log("New message add in queue " + data['message'] + " channel");
        socket.emit(channel, data);
    });

    socket.on('disconnect', function () {
        redisClient.quit();
    });

}).on('connect_failed', function () {
    console.log('Connection Failed');
}).on('connect', function () {
    console.log('Connected');
}).on('disconnect', function () {
    console.log('Disconnected');
});
