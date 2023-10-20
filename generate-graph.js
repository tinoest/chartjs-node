const { ChartJSNodeCanvas, ChartCallback } = require("chartjs-node-canvas");
const fs = require("fs");

const width = 600;
const height = 400;
const canvasRenderService = new ChartJSNodeCanvas({ width, height });

exports.renderChartWithChartJS = async (chartOption) => {
  var options = chartOption.options;
  var data = chartOption.data;
  let configuration = {
    type: chartOption.type,
    data,
    options,
  };

  //console.log(JSON.stringify(configuration, null, 2));
  const chartCallback = (ChartJS) => {
    ChartJS.defaults.responsive = true;
    ChartJS.defaults.maintainAspectRatio = false;
  };

  return await canvasRenderService.renderToBuffer(configuration);
};
