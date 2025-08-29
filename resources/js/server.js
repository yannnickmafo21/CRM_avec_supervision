import express from 'express';
import { Server } from 'http';
import { Server as SocketIOServer } from 'socket.io';

const users = [{
    name: 'Yannick',
    pass: '1234'
}];





const jwt = require('jsonwebtoken');
const app = express();
const http = new Server(app);
const io = new SocketIOServer(http, {
    cors: {
        origin: "*", // autorise toutes les origines (pour le test)
        methods: ["GET", "POST"]
    }
});

app.get('/', (req, res) =>{
    res.send("hello world");
});

io.on('connection', (socket) => {
    console.log('Un utilisateur connecté');

    socket.on('message_d_agent-technique', (msg) => {
        io.emit('message_d_agent-technique', msg); // renvoie le message à tous les clients
    });

    socket.on('message_d_agent-client', (msg) => {
        io.emit('message_d_agent-client', msg); // renvoie le message au service technique
    });

    socket.on('message_client', (msg) => {
        io.emit('message_client', msg); // renvoie le message à l'agent
    });

    socket.on('disconnect', () => {
        console.log('Utilisateur déconnecté');
    });
});

http.listen(2020, () => {
    console.log("Serveur Socket.io lancé sur http://localhost:2020");
});

export default http;
