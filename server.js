'use strict';

const { ChartJSNodeCanvas, ChartCallback } = require("chartjs-node-canvas");
const { renderChartWithChartJS } = require("./generate-graph");

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

app.post('/', (req, res) => {
	const json = req.body;
	var imgBuff = '';

	renderChartWithChartJS(req.body).then(result => {
		imgBuff = result.toString("base64");
		res.send(`data:image/png;base64,${imgBuff}`);
	}).catch(err => {
		console.error("Failed to generate chart", err);
  	});
});

app.listen(PORT, HOST, () => {
  console.log(`Running on http://${HOST}:${PORT}`);
});
