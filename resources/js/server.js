import express from 'express';
import { Server } from 'http';
import { Server as SocketIOServer } from 'socket.io';

const app = express();
const http = new Server(app);
const io = new SocketIOServer(http);

app.get("/", (req, res) => {
    res.sendFile("/server.js");
});

http.listen(2020, () => {
    console.log("le serveur tourne sur http://localhost:2020");
});

export default http;
