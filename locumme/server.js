const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const webpack = require('webpack');
const webpackConfig = require('./webpack.config');
const webpackDevMiddleware = require('webpack-dev-middleware');
const webpackHotMiddleware = require('webpack-hot-middleware');

const app = express();
const server = http.createServer(app);
const io = new Server(server);

// Configure Webpack middleware
const compiler = webpack(webpackConfig);
app.use(webpackDevMiddleware(compiler));
app.use(webpackHotMiddleware(compiler));

// Serve the static HTML file
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/public/index.html');
});

// WebSocket connections
io.on('connection', (socket) => {
  console.log('A user connected');
  socket.on('disconnect', () => {
    console.log('A user disconnected');
  });
});

// Start the server
const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
