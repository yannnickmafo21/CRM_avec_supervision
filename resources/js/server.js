import express from 'express';
import { Server } from 'http';
import { Server as SocketIOServer } from 'socket.io';
import jwt from 'jsonwebtoken';

const app = express();
app.use(express.json());
const http = new Server(app);
const io = new SocketIOServer(http, {
    cors: {
        origin: "*", // autorise toutes les origines (pour le test)
        methods: ["GET", "POST"]
    }
});


const user = {
    name : "yannick",
    password : "1234"
}

const clePrivee = `-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEAm4iWSlqI1wOxxhX2i+bFZiFM560XTgvz7mkX0QV67BkCaKzv
6w5G+FpsU3ofzCS4fG6fR1uwCXK2onNv6au1KtaVdfMZCNLRLgO7XHJWt1cJTBJJ
mZrByXPr3BXxLAILwhJGMku6DA1UedoSFO0+1YktmLtgY0ADuVT4P/9dufkPH+ij
N3cke+nEy/aWC8rxV4UhLNMJVx+nHRs+y6rkGwIUN6J6aNeprr6uuv8gqvIPiVOV
oFAXJBXK9Cqm96My8AdvyrP+lvQJTweMGfn6SW/NZZ8T+kQEyviAaHi7A3PanFEd
8PLUbGcEgrjbgU12Y1UcNRTSHgjrIy+MyMge9wIDAQABAoIBAQCCWfELk+EHw1Lk
31doXRqnw9T+fjT/9kiUUYPibKNe6H76V6Yj7C1SzAXp2Hp5z3TG5LedSJy67mde
szziLESECJ/u4LTkjjs+Q2Ztzm4a7lkeZl1E3Uz4l6zfIYylA3nzRvmKAamFnE5m
aXuqCkQVFwkd7jyUMfxtAWely1I0H9WstnvDQxVUe8ZmjArhm4rJTeXGGXnOlsY9
2VKRue2kjuxqOfsQAS4xF79kw8yLci8Rm2gJSXsSORee7+S8bioF57W6apff9j2r
TgOcv+gibVdC5gV6pb44tCW3+ip9zoJqNVm//XFS95nW57KV2cvGpwa8YhR5AKaO
FCtcgDyBAoGBAOGYgO1znEuChWzhkoR4VRirJK9/ikrsEIOFtP1vfIuNEhU0gW6Z
6PtaX3UGCYiMvtarrUgKo9Yv1IDvA7zHzx805Vemtrh/8I6zbUWjlVAlPpezuY2X
VUv/8g3vQrzAtIJYrrFx9sjko/Xqtaq3MuiaoxXSKt+9PXAoPjolovOXAoGBALB+
zO5xF+3wyG9bpYvlZ6NsmrCd13ojDl7rsm4D3/j6O8uNK9psIZhF+GfRj9etJztr
wXVpqu2qrbp55f27l8Eyaf5nKNd8c3iDN/40+eshV53HdfsD/swwdiMSPEFSGHMB
LoAL7A1kil5PXwLTnCnfY8z3xsp5+gZ+ZJjCxBuhAoGBAMjMMi2oUryPL22Llhtc
8/liE+Q1tIUde1FlyIQwIH4iEa9YLcChM9POS9rghcnJ5O80naba+ZtitVYR6JS2
kG/paB1NYaP1FMwffqqWgQd2LzFeIlGaGqzr4qpuhUt2hvTiNJPyqUOE5z+zKwIJ
0EFjqrd4evrs+OuElmaxK0p/AoGAFEHZf5yXZIX4W1+ndpET/hve/VqAetI/OgHP
bvUe5dLCvjAr0lwK1xFg23mgCt8i250YjUNdjP3EBt0q2p6HYnNI2xw4AdOU5UYa
TSEDdktTZRaZof/pZMJDLO9Q3yZvC/QcxDGaHEdn4j815nsnN18ec04VEPRDEC+9
mBLys0ECgYBAbASClD8HMxqKF94E6klLXMYMtSirfrQ/QvIjoi5naiwuszz8yM91
Fqm7+nCYhqNIY+rrqsci4vexTCt86tb5Iz3LPcmlc+nx0pdIBQBrTCCqPjzr8Ivl
YTojNztunbaBrlGnHqlfTJJrJ4dm3Pl7wpwinimfb3u08XK0CcDwtQ==
-----END RSA PRIVATE KEY-----`;

const clePublique = `-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAm4iWSlqI1wOxxhX2i+bF
ZiFM560XTgvz7mkX0QV67BkCaKzv6w5G+FpsU3ofzCS4fG6fR1uwCXK2onNv6au1
KtaVdfMZCNLRLgO7XHJWt1cJTBJJmZrByXPr3BXxLAILwhJGMku6DA1UedoSFO0+
1YktmLtgY0ADuVT4P/9dufkPH+ijN3cke+nEy/aWC8rxV4UhLNMJVx+nHRs+y6rk
GwIUN6J6aNeprr6uuv8gqvIPiVOVoFAXJBXK9Cqm96My8AdvyrP+lvQJTweMGfn6
SW/NZZ8T+kQEyviAaHi7A3PanFEd8PLUbGcEgrjbgU12Y1UcNRTSHgjrIy+MyMge
9wIDAQAB
-----END PUBLIC KEY-----`;

app.get('/', (req, res) =>{
    res.send("hello world");
});

app.post('/auth', (req, res) => {
    const { username, password } = req.body;

    const valid = user.name === username && user.password === password;
    if (valid) {
        const token = jwt.sign({ username }, clePrivee, { algorithm: 'RS256' });
        res.send(token);
    } else {
        console.log(valid);
        res.status(404).send("NOT FOUND");
    }
 })

 //les route des sockets
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
