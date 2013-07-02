function makeGraphRaceOverTime(container, chartName, chartSubtitle, dataUrl) {
  $.getJSON(dataUrl, function(data) {
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
      yAxis: {
          title: {
              text: 'Wins (%)'
          },
      },
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
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 10<br/>(Mar 2013)", data.whens), id: 'iem7', width: 1, color: '#0099FF', label: {text: "IEM VII Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 11<br/>(Mar 2013)", data.whens)-.2, id: 'hots', width: 30, color: '#ccc', label: {text: "HotS Release", style: {color: "#666"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 11<br/>(Mar 2013)", data.whens), id: 'mlgwint', width: 1, color: '#d81417', label: {text: "MLG Winter Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 17<br/>(Apr 2013)", data.whens), id: 'dhst', width: 1, color: '#d81417', label: {text: "DreamHack Stockholm", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 21<br/>(May 2013)", data.whens), id: 'iem7', width: 1, color: '#0099FF', label: {text: "WCS S1 EU", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 22<br/>(May 2013)", data.whens)+.2, id: 'wcs1kr', width: 1, color: '#d81417', label: {text: "WCS S1 KR", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 22<br/>(May 2013)", data.whens)+.5, id: 'wcs1am', width: 1, color: '#2a9c3b', label: {text: "WCS S1 AM", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 23<br/>(Jun 2013)", data.whens), id: 'wcs1', width: 1, color: '#0099FF', label: {text: "WCS S1 Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 24<br/>(Jun 2013)", data.whens), id: 'dhsum', width: 1, color: '#2a9c3b', label: {text: "DreamHack Summer", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 25<br/>(Jun 2013)", data.whens), id: 'hsc7', width: 1, color: '#0099FF', label: {text: "HomeStory Cup VII", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 26<br/>(Jun 2013)", data.whens), id: 'mlgspring', width: 1, color: '#0099FF', label: {text: "MLG Spring Championship", style: {color: "#999"}}});
  });
}
function makeGraphMatchupsOverTime(container, chartName, chartSubtitle, dataUrl) {
  $.getJSON(dataUrl, function(data) {
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
      yAxis: {
          title: {
              text: 'Wins (%)'
          },
      },
      colors: [
          'rgb(199, 150, 47)',
          'rgb(199, 47, 181)',
          'rgb(11, 192, 156)'
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
          name: 'Zerg vs Protoss',
          data: data.z
      }, {
          name: 'Terran vs Zerg',
          data: data.t
      }, {
          name: 'Terran vs Protoss',
          data: data.p
      }]
    });
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 10<br/>(Mar 2013)", data.whens), id: 'iem7', width: 1, color: '#0099FF', label: {text: "IEM VII Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 11<br/>(Mar 2013)", data.whens)-.2, id: 'hots', width: 30, color: '#ccc', label: {text: "HotS Release", style: {color: "#666"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 11<br/>(Mar 2013)", data.whens), id: 'mlgwint', width: 1, color: '#d81417', label: {text: "MLG Winter Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 17<br/>(Apr 2013)", data.whens), id: 'dhst', width: 1, color: '#d81417', label: {text: "DreamHack Stockholm", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 21<br/>(May 2013)", data.whens), id: 'iem7', width: 1, color: '#0099FF', label: {text: "WCS S1 EU", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 22<br/>(May 2013)", data.whens)+.2, id: 'wcs1kr', width: 1, color: '#d81417', label: {text: "WCS S1 KR", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 22<br/>(May 2013)", data.whens)+.5, id: 'wcs1am', width: 1, color: '#2a9c3b', label: {text: "WCS S1 AM", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 23<br/>(Jun 2013)", data.whens), id: 'wcs1', width: 1, color: '#0099FF', label: {text: "WCS S1 Finals", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 24<br/>(Jun 2013)", data.whens), id: 'dhsum', width: 1, color: '#2a9c3b', label: {text: "DreamHack Summer", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 25<br/>(Jun 2013)", data.whens), id: 'hsc7', width: 1, color: '#0099FF', label: {text: "HomeStory Cup VII", style: {color: "#999"}}});
    chart.xAxis[0].addPlotLine({value: $.inArray("Week 26<br/>(Jun 2013)", data.whens), id: 'mlgspring', width: 1, color: '#0099FF', label: {text: "MLG Spring Championship", style: {color: "#999"}}});
  });
}
