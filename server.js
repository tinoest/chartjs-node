'use strict';

const { ChartJSNodeCanvas } = require('chartjs-node-canvas');

const express = require('express');
const basicAuth = require('express-basic-auth');

// Constants
const PORT = 8080;
const HOST = '0.0.0.0';
 
// App
const app = express();

app.use(express.json()) // for parsing application/json
app.use(express.urlencoded({ extended: true })) // for parsing application/x-www-form-urlencoded
app.use(basicAuth({
    users: { 'admin': 'supersecret' }
}))

app.post('/', async (req, res) => {
	const json = req.body;

	try {
		const width = json.width;
		const height = json.height;
		const canvasRenderService = new ChartJSNodeCanvas({ width, height });

		var options = json.options;
		var data = json.data;

		const image = await canvasRenderService.renderToBuffer({
			type: json.type,
			data,
			options,
		});
		res.type('image/png');
		res.send(image);
	} catch (err) {
		console.error("Failed to generate chart", err);
  	};
});

app.listen(PORT, HOST, () => {
  console.log(`Running on http://${HOST}:${PORT}`);
});
