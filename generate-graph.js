const { ChartJSNodeCanvas, ChartCallback } = require("chartjs-node-canvas");
const fs = require("fs");

const width = 600;
const height = 400;
const canvasRenderService = new ChartJSNodeCanvas({ width, height });

exports.renderChartWithChartJS = async (chartOption) => {
  let configuration = {
    type: chartOption.type,
    data: {
      labels: chartOption.labels,
      datasets: [],
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: chartOption.title,
        },
      },
      responsive: true,
      scales: {
        x: {
          stacked: chartOption.stacked.x,
        },
        y: {
          stacked: chartOption.stacked.y,
        },
      },
    },
  };
  chartOption.data.forEach((item) => {
    configuration.data.datasets.push({
      label: item.label,
      backgroundColor: item.backgroundColor,
      borderColor: item.borderColor,
      borderWidth: 1,
      data: item.data,
    });
  });

  //console.log(JSON.stringify(configuration, null, 2));
  const chartCallback = (ChartJS) => {
    ChartJS.defaults.responsive = true;
    ChartJS.defaults.maintainAspectRatio = false;
  };

  return await canvasRenderService.renderToBuffer(configuration);
};
