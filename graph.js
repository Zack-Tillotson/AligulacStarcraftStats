function makeGraphRaceOverTime(container, chartName, chartSubtitle, dataUrl, fullAxis) {
  $.getJSON(dataUrl, function(data) {
    yaxis = {title: {text: 'Wins (%)'}}
    if(fullAxis) {
      yaxis.min = 0;
      yaxis.max = 100;
    }
          
    chart = new Highcharts.Chart({
      chart: {
          renderTo: container,
          type: 'spline',
          marginRight: 50,
          marginLeft: 50,
          marginBottom: 50,
          marginTop: 50
      },
      title: {
          text: chartName,
          x: -20,
          y: 10
      },
      subtitle: {
          text: chartSubtitle,
          x: -20
      },
      xAxis: {
          categories: data.whens
      },
      yAxis: yaxis,
      colors: [
          '#d81417',
          '#0099FF',
          '#2a9c3b'
      ],
      tooltip: {
          formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  this.x +': '+ this.y +'%';
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -10,
          y: 10,
          borderWidth: 0
      },
      series: [{
          name: 'Zerg',
          data: data.z
      }, {
          name: 'Terran',
          data: data.t
      }, {
          name: 'Protoss',
          data: data.p
      }]
    });
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-03-04", data.whens)-.3, id: 'hots', width: 50, color: '#ccc', label: {text: "HotS Release", style: {color: "#666"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-03-04", data.whens), id: 'iem7', width: 2, color: '#0099FF', label: {text: "IEM VII Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-03-11", data.whens), id: 'mlgwint', width: 2, color: '#d81417', label: {text: "MLG Winter Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-04-22", data.whens), id: 'dhst', width: 2, color: '#d81417', label: {text: "DreamHack Stockholm", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-05-20", data.whens), id: 'iem7', width: 2, color: '#0099FF', label: {text: "WCS S1 EU", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-05-27", data.whens)+.2, id: 'wcs1kr', width: 2, color: '#d81417', label: {text: "WCS S1 KR", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-05-27", data.whens)+.5, id: 'wcs1am', width: 2, color: '#2a9c3b', label: {text: "WCS S1 AM", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-06-03", data.whens), id: 'wcs1', width: 2, color: '#0099FF', label: {text: "WCS S1 Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-06-17", data.whens), id: 'dhsum', width: 2, color: '#2a9c3b', label: {text: "DreamHack Summer", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-06-17", data.whens)+.5, id: 'hsc7', width: 2, color: '#0099FF', label: {text: "HomeStory Cup VII", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("2013-06-24", data.whens)+.7, id: 'mlgspring', width: 2, color: '#0099FF', label: {text: "MLG Spring Championship", style: {color: "#999"}}});
  });
}
