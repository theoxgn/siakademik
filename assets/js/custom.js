
/*
* Name:        Oscar
* Written by: 	Unifato - (http://unifato.com)
* Version:     1.0.0
*/

(function($) {
  'use strict';

  var Custom = {
    init: function() {
      // UI Notifications
      this.warningModal();
      this.cancelModal();
      this.warningModal();
      this.infoModal();
      this.imageModal();

      // Charts Flot Page
      this.lineFlotChart();
      this.movingLineFlotChart();
      this.barFlotChart();
      this.salesBarFlotChart();

      // Charts Morris Page
      this.lineMorrisChart();
      this.donuteMorrisChart();
      this.productLineMorrisChart();
      this.barMorrisChart();
      this.siteVisitMorrisChart();

      // Knob
      this.knobChart();

      // Charts Sparkline Page
      this.sparklineChart();

      // Chart Js Page
      this.barMiddleAxesChartJs();
      this.lineSingleChartJs();
      this.lineMultiChartJs();
      this.lineMultiSmallChartJs();
      this.doughnutSlimChartJs();
      this.doughnutLegendChartJs();
      this.doughnutSmallChartJs();
      this.areaChartJs();
      this.barChartJs();
      this.pieChartJs();
      this.doughnutChartJs();
      this.polarAreaChartJs();
      this.radarChartJs();
      this.barhorizontalChartJs();
      this.lineSingleGradientChartJs();
      this.lineChartJs();
      this.areaMultiChartJs();

      //Dashboards
      this.dailyVisitsChartJs();
      this.siteVisitsChartJs();
      this.visitorsCountChartJs();
      this.siteStatisticsChartJs();
      this.trafficSourcesChartJs();

      //Toastr
      this.enableToastr();

      //Animations
      this.testAnimation();
      
      this.templateSwitcher();
    },

    /*************** UI Nofitications ****************/
    warningModal: function() {
      var el = $('.modal-alert-warning');
      if ( !el.length ) return;
      el.on('click', function () {
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonClass: 'btn btn-warning',
          confirmButtonText: 'Yes, delete it!'
        }).then(function () {
          swal({
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            type: 'success',
            confirmButtonClass: 'btn btn-success'
          });
        });
      });
    },

    cancelModal: function() {
      var el = $('.modal-alert-cancel');
      if ( !el.length ) return;
      el.on('click', function () {
        swal({
          title: 'Are you sure?',
          text: "You won't be able to recover this imaginary file!",
          type: 'error',
          showCancelButton: true,
          confirmButtonClass: 'btn btn-danger',
          confirmButtonText: 'Yes, delete it!'
        }).then(function () {
          swal({
            title: 'Deleted!',
            text: 'Your imaginary file has been deleted.',
            type: 'success',
            confirmButtonClass: 'btn btn-success'
          });
        });
      });
    },

    infoModal: function() {
      var el = $('.modal-alert-info');
      if ( !el.length ) return;
      el.on('click', function () {
        swal({
          title: 'Are you sure?',
          text: "You won't be able to recover this imaginary file!",
          type: 'info',
          showCancelButton: true,
          confirmButtonText: 'Info'
        });
      });
    },

    imageModal: function () {
      var el = $('.modal-alert-image');
      if ( !el.length ) return;
      el.on('click', function () {
        swal({
          title: 'Sweet!',
          text: "Here's a custom image.",
          confirmButtonClass: 'btn btn-success',
          imageUrl: 'https://unsplash.it/400/200',
          imageWidth: 400,
          imageHeight: 200
        });
      });
    },


    /*************** Charts Flot Page ****************/
    lineFlotChart: function(){
      var ctx = document.getElementById("lineFlot");
      if ( ctx === null ) return;

      var offset = 0;
      plot();

      function plot() {
        var sin = [],
        cos = [];
        for (var i = 0; i < 7; i += 0.2) {
          sin.push([i, Math.sin(i + offset)]);
          cos.push([i, Math.cos(i + offset)]);
        }

        var options = {
          series: {
            lines: {
              show: true
            },
            points: {
              show: true
            }
          },
          grid: {
            hoverable: true, //IMPORTANT! this is needed for tooltip to work
            color: "#AFAFAF",
            borderWidth: 0,
            backgroundColor: '#FFF'
          },
          yaxis: {
            min: -1.2,
            max: 1.2
          },
          colors: ["#007bb6", "#f0ad4e"],
          tooltip: true,
          tooltipOpts: {
            content: "'%s' of %x.1 is %y.4",
            shifts: {
              x: -60,
              y: 25
            }
          }
        };

        var plotObj = function() {
          $.plot($("#lineFlot"), [{
            data: sin,
            label: "&nbsp; sin(x)",
          }, {
            data: cos,
            label: "&nbsp; cos(x)"
          }],
          options);
        }

        plotObj();
        $(document).on('SIDEBAR_CHANGED_WIDTH', plotObj);
        $(window).on('resize', plotObj);
      }
    },

    movingLineFlotChart: function() {
      var ctx = document.getElementById("movingLineFlot");
      if ( ctx === null ) return;

      var container = $("#movingLineFlot");
      // Determine how many data points to keep based on the placeholder's initial size;
      // this gives us a nice high-res plot while avoiding more than one point per pixel.
      var maximum = container.outerWidth() / 2 || 300;
      var data = [];
      function getRandomData() {
        if (data.length) {
          data = data.slice(1);
        }
        while (data.length < maximum) {
          var previous = data.length ? data[data.length - 1] : 50;
          var y = previous + Math.random() * 10 - 5;
          data.push(y < 0 ? 0 : y > 100 ? 100 : y);
        }
        // zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i) {
          res.push([i, data[i]]);
        }
        return res;
      }
      var series = [{
        data: getRandomData(),
        lines: {
          fill: true
        }
      }];

      var plot = null;

      var FlotFunc = function() {
        plot = $.plot(container, series, {
          colors: ["#e6614f"],
          grid: {
            borderWidth: 0,
            minBorderMargin: 20,
            labelMargin: 10,
            backgroundColor: {
              colors: ["#fff", "#fff"]
            },
            margin: {
              top: 8,
              bottom: 20,
              left: 0
            },

            markings: function(axes) {
              var markings = [];
              var xaxis = axes.xaxis;
              for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 1) {
                markings.push({
                  xaxis: {
                    from: x,
                    to: x + xaxis.tickSize
                  },
                  color: "#fff"
                });
              }
              return markings;
            }
          },
          xaxis: {
            show: false,
            tickFormatter: function() {
              return "";
            }
          },
          yaxis: {
            min: 0,
            max: 110
          },
          legend: {
            show: true
          }
        });

      }

      FlotFunc();

      // Update the random dataset at 25FPS for a smoothly-animating chart
      setInterval(function updateRandom() {
        series[0].data = getRandomData();
        plot.setData(series);
        plot.draw();
      }, 40);

      $(document).on('SIDEBAR_CHANGED_WIDTH', FlotFunc);
      $(window).on('resize', FlotFunc);
    },

    barFlotChart: function() {
      var ctx = document.getElementById("barFlot");
      if ( ctx === null ) return;

      var barOptions = {
        series: {
          bars: {
            show: true,
            barWidth: 0.5
          }
        },
        xaxis: {
          mode: "time",
          timeformat: "%m/%d",
          minTickSize: [2, "day"]
        },
        grid: {
          hoverable: true,
          color: "#AFAFAF",
          borderWidth: 0,
          backgroundColor: '#FFF'
        },
        legend: {
          show: false
        },
        tooltip: true,
        tooltipOpts: {
          content: "x: %x, y: %y"
        }
      };
      var barData = {
        label: "bar",
        color: "#51d2b7",
        data: [
          [1, 5000],
          [2, 3000],
          [3, 6000],
          [4, 2000],
          [5, 4000],
          [6, 7000]
        ]
      };
      var FlotFunc = function() {
        $.plot($("#barFlot"), [barData], barOptions);
      }
      FlotFunc();
      $(document).on('SIDEBAR_CHANGED_WIDTH', FlotFunc);
      $(window).on('resize', FlotFunc);
    },

    salesBarFlotChart: function() {
      var ctx = document.getElementById("salesBarFlot");
      if ( ctx === null ) return;

      var d1 = [];
      var i = 0;
      // for (i = 0; i <= 5; i += 1)
      // d1.push([i, parseInt(Math.random() * 60)]);

      var d2 = [];
      for (i = 0; i <= 5; i += 1)
      d2.push([i, parseInt(Math.random() * 60)]);

      var d3 = [];
      for (i = 0; i <= 5; i += 1)
      d3.push([i, parseInt(Math.random() * 40)]);

      var ds = [];

      ds.push({
        label : "Data One",
        data : d2,
        bars : {
          order : 2
        }
      });
      ds.push({
        label : "Data Two",
        data : d3,
        bars : {
          order : 3
        }
      });

      var stack = 0,
      bars = true,
      lines = true,
      steps = true;

      var options = {
        bars : {
          show : true,
          barWidth : 0.4,
          fill : 1
        },
        grid : {
          show : true,
          aboveData : false,
          labelMargin : 5,
          axisMargin : 0,
          borderWidth : 1,
          minBorderMargin : 5,
          clickable : true,
          hoverable : true,
          autoHighlight : false,
          mouseActiveRadius : 20,
          borderColor : '#f5f5f5'
        },
        series : {
          stack : stack
        },
        legend : {
          position : "ne",
          margin : [0, 0],
          noColumns : 0,
          labelBoxBorderColor : null,
          labelFormatter : function(label, series) {
            // just add some space to labes
            return '&nbsp;' + label + '&nbsp;&nbsp;&nbsp;';
          },
          width : 30,
          height : 5
        },
        yaxis : {
          tickColor : '#f5f5f5',
          font : {
            color : '#bdbdbd'
          }
        },
        xaxis : {
          tickColor : '#f5f5f5',
          font : {
            color : '#bdbdbd'
          }
        },
        colors : ["#5867c3", "#00c5dc"],
        tooltip : true, //activate tooltip
        tooltipOpts : {
          content : "%s : %y.0",
          shifts : {
            x : -30,
            y : -50
          },
        }
      };

      var FlotFunc = function() {
        $.plot($("#salesBarFlot"), ds, options);
      }

      FlotFunc();
      $(document).on('SIDEBAR_CHANGED_WIDTH', FlotFunc);
      $(window).on('resize', FlotFunc);
    },


    /*************** Charts Morris Page ****************/
    lineMorrisChart: function() {
      var ctx = document.getElementById("lineMorris");
      if ( ctx === null ) return;

      var line = new Morris.Line({
        element: 'lineMorris',
        resize: true,
        data: [
          {y: '2011 Q1', item1: 5666},
          {y: '2011 Q2', item1: 3778},
          {y: '2011 Q3', item1: 4912},
          {y: '2011 Q4', item1: 1767},
          {y: '2012 Q1', item1: 9810},
          {y: '2012 Q2', item1: 6670},
          {y: '2012 Q3', item1: 9820},
          {y: '2012 Q4', item1: 8073},
          {y: '2013 Q1', item1: 4687},
          {y: '2013 Q2', item1: 9432}
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        gridLineColor: '#eef0f2',
        lineColors: ['#1d7c2a'],
        lineWidth: 1,
        hideHover: 'auto'
      });

      $(document).on('SIDEBAR_CHANGED_WIDTH', line.resizeHandler);
    },

    donuteMorrisChart: function() {
      var ctx = document.getElementById("donuteMorris");
      if ( ctx === null ) return;

      var chart = Morris.Donut({
        element: 'donuteMorris',
        data: [{
          label: "Dell",
          value: 12,

        }, {
          label: "Samsung",
          value: 30
        }, {
          label: "Apple",
          value: 20
        },{
          label: "Lenovo",
          value: 24,

        },{
          label: "Sony",
          value: 37,
        }],
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1', '#ffb600', '#ff6261']
      });

      $(document).on('SIDEBAR_CHANGED_WIDTH', chart.resizeHandler);
    },

    productLineMorrisChart: function() {
      var ctx = document.getElementById("productLineMorris");
      if ( ctx === null ) return;

      var chart = Morris.Area({
        element: 'productLineMorris',
        data: [{
          period: '2010',
          dell: 70,
          lenovo: 110,
          sony: 80
        }, {
          period: '2011',
          dell: 75,
          lenovo: 95,
          sony: 90
        }, {
          period: '2012',
          dell: 85,
          lenovo: 102,
          sony: 75
        }, {
          period: '2013',
          dell: 75,
          lenovo: 90,
          sony: 104
        }, {
          period: '2014',
          dell: 95,
          lenovo: 105,
          sony: 75
        }, {
          period: '2015',
          dell: 87,
          lenovo: 95,
          sony: 80
        },
        {
          period: '2016',
          dell: 92,
          lenovo: 108,
          sony: 70
        }],
        xkey: 'period',
        ykeys: ['dell', 'lenovo', 'sony'],
        labels: ['Dell', 'Lenovo', 'Sony'],
        ymax: 'auto[110]',
        ymin: 'auto[70]',
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#00bfc7', '#fb9678', '#9675ce'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 1,
        hideHover: 'auto',
        lineColors: ['#00bfc7', '#fb9678', '#9675ce'],
        resize: true
      });

      $(document).on('SIDEBAR_CHANGED_WIDTH', chart.resizeHandler);
    },

    barMorrisChart: function() {
      var ctx = document.getElementById("barMorris");
      if ( ctx === null ) return;

      var chart = Morris.Bar({
        element: 'barMorris',
        data: [{
          y: '2006',
          a: 100,
          b: 90
        }, {
          y: '2007',
          a: 75,
          b: 65
        }, {
          y: '2008',
          a: 50,
          b: 40
        }, {
          y: '2009',
          a: 75,
          b: 65
        }, {
          y: '2010',
          a: 50,
          b: 40
        }, {
          y: '2011',
          a: 75,
          b: 65
        }, {
          y: '2012',
          a: 100,
          b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['A', 'B'],
        barColors:['#00a9ff', '#5867c3'],
        barOpacity: 0.5,
        barSizeRatio: 0.5,
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
      });

      $(document).on('SIDEBAR_CHANGED_WIDTH', chart.resizeHandler);
    },

    extraAreaMorrisChart: function() {
      var ctx = document.getElementById("extraAreaMorris");
      if ( ctx === null ) return;

      function generateData() {
        var ele = null;
        var data = [];
        for( var i=0; i<10; i++) {
          ele = {
            period: (2010 + i) + '',
            lenovo: Math.ceil( Math.random() * 200 ),
            dell: Math.ceil( Math.random() * 200 ),
            hp: Math.ceil( Math.random() * 200 ),
          }
          data.push( ele );
        }
        return data;
      }

      var chart = Morris.Area({
        element: 'extraAreaMorris',
        data: generateData(),
        lineColors: ['#1cb160','#57e998', '#c7ffdb'],
        xkey: 'period',
        ykeys: ['lenovo','dell','hp'],
        labels: ['Lenovo','Dell','HP'],
        lineWidth: 0,
        fillOpacity: 1.0,
        pointSize: 0,
        pointFillColors: ['#fff','#fff','#fff'],
        pointStrokeColors: ["#1cb160","#57e998","#deffe3"],
        behaveLikeLine: false,
        smooth: true,
        gridLineColor: '#e0e0e0',
        resize: true,
        hideHover: 'auto'
      });

      $(document).on('SIDEBAR_CHANGED_WIDTH', chart.resizeHandler);
    },

    siteVisitMorrisChart: function() {
      var ctx = document.getElementById("siteVisitMorris");
      if ( ctx === null ) return;

      var chart = Morris.Area({
        element: 'siteVisitMorris',
        data: [{
          period: '2010',
          SiteA: 0,
          SiteB: 0,

        }, {
          period: '2011',
          SiteA: 130,
          SiteB: 100,

        }, {
          period: '2012',
          SiteA: 60,
          SiteB: 80,

        }, {
          period: '2013',
          SiteA: 180,
          SiteB: 200,

        }, {
          period: '2014',
          SiteA: 280,
          SiteB: 100,

        }, {
          period: '2015',
          SiteA: 170,
          SiteB: 150,
        },
        {
          period: '2016',
          SiteA: 200,
          SiteB: 80,

        },{
          period: '2017',
          SiteA: 0,
          SiteB: 0,

        }],
        xkey: 'period',
        ykeys: ['SiteA', 'SiteB'],
        labels: ['Site A', 'Site B'],
        pointSize: 0,
        fillOpacity: 1,
        pointStrokeColors:['#5867c3', '#00c5dc'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        lineColors: ['#5867c3', '#00c5dc'],
        resize: true
      });
      $(document).on('SIDEBAR_CHANGED_WIDTH', chart.resizeHandler);
    },


    /************** Knob Charts ****************/
    knobChart: function() {
      var el = $('[data-plugin="knob"]');
      if ( !el.length ) return;
      el.knob();
    },


    /************** Sparkline Charts ****************/
    sparklineChart: function() {
      var el = $(".sparklineChart");
      if ( !el.length ) return;

      $(document).ready(function(){
        var sparklineLogin = function() {

          $("#sparkline1").sparkline([5,6,2,8,9,4,7,10,11,12,10], {
            type: 'bar',
            height: '45',
            barWidth: 7,
            barSpacing: 4,
            barColor: '#99d683'
          });

          $('#sparkline2').sparkline([20, 40, 30], {
            type: 'pie',
            width: '50',
            height: '45',
            resize: true,
            sliceColors: ['#13dafe', '#6164c1', '#f1f2f7']
          });

          $('#sparkline3').sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
            type: 'bar',
            height: '164',
            barWidth: '7',
            resize: true,
            barSpacing: '5',
            barColor: '#f96262'
          });

          $("#sparkline4").sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 7, 10], {
            type: 'line',
            width: '120',
            height: '45',
            lineColor: '#fb6d9d',
            fillColor: 'transparent',
            spotColor: '#fb6d9d',
            minSpotColor: undefined,
            maxSpotColor: undefined,
            highlightSpotColor: undefined,
            highlightLineColor: undefined
          });

          $('#sparkline5').sparkline([15, 23, 55, 35, 54, 45, 66, 47, 30], {
            type: 'line',
            width: '100%',
            height: '160',
            chartRangeMax: 50,
            resize: true,
            lineColor: '#13dafe',
            fillColor: 'rgba(19, 218, 254, 0.3)',
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
          });

          $('#sparkline5').sparkline([0, 13, 10, 14, 15, 10, 18, 20, 0], {
            type: 'line',
            width: '100%',
            height: '160',
            chartRangeMax: 40,
            lineColor: '#6164c1',
            fillColor: 'rgba(97, 100, 193, 0.3)',
            composite: true,
            resize: true,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
          });

          $('#sparkline6').sparkline([5, 6, 2, 8, 9, 4, 7, 10, 11, 12, 10], {
            type: 'bar',
            height: '45',
            barWidth: '7',
            barSpacing: '4',
            barColor: '#13dafe'
          });

          $("#sparkline7").sparkline([0,2,8,6,8,5,6,4,8,6,4,2 ], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#ffca4a',
            fillColor: '#ffca4a',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#4f4f4f'
          });

          $("#sparkline8").sparkline([0,6,8,10,7,4,6,8,4,3,1,0 ], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#ff7676',
            fillColor: '#ff7676',
            maxSpotColor: '#ff7676',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#ff7676'
          });

          $("#sparkline9").sparkline([0,6,8,10,7,4,6,8,4,3,1,0 ], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#2cabe3',
            fillColor: '#2cabe3',
            minSpotColor:'#2cabe3',
            maxSpotColor: '#2cabe3',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#2cabe3'
          });

          $("#sparkline10").sparkline([0,6,8,10,7,4,6,8,4,3,1,0 ], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#6164c1',
            fillColor: '#6164c1',
            maxSpotColor: '#6164c1',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#6164c1'
          });

          $('#sparkline11').sparkline([20, 40, 30, 50, 70], {
            type: 'pie',
            height: '200',
            resize: true,
            sliceColors: ['#38d57a','#9c27b0', '#e6614f', '#03a9f3', '#007bb6' ]
          });

          $("#sparkline12").sparkline([10,4,6,12,5,9,3,17,20,10,15,9,4,11], {
            type: 'bar',
            height: '200',
            barWidth: 10,
            barSpacing: 7,
            barColor: '#007bb6'
          });

          $('#sparkline13').sparkline([10,4,6,12,5,9,3,17,20,10,15,9,4,11], {
            type: 'bar',
            height: '200',
            barWidth: '10',
            resize: true,
            barSpacing: '7',
            barColor: '#51d2b7'
          });

          $('#sparkline13').sparkline([10,4,6,12,5,9,3,17,20,10,15,9,4,11], {
            type: 'line',
            height: '200',
            lineColor: '#51d2b7',
            spotRadius: 0,
            fillColor: 'transparent',
            composite: true,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)'
          });

          $("#sparkline14").sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 7, 10], {
            type: 'line',
            width: '100%',
            height: '200',
            lineColor: '#fff',
            fillColor: 'transparent',
            spotColor: '#fff',
            minSpotColor: undefined,
            maxSpotColor: undefined,
            highlightSpotColor: undefined,
            highlightLineColor: undefined
          });

          $('#sparkline15').sparkline([5, 6, 2, 8, 9, 4, 7, 10, 11, 12, 10, 9, 4, 7], {
            type: 'bar',
            height: '200',
            barWidth: '10',
            barSpacing: '10',
            barColor: '#13dafe'
          });

          $('#sparkline16').sparkline([25, 55, 35, 75, 64, 55, 86, 47, 50], {
            type: 'line',
            width: '100%',
            height: '200',
            chartRangeMax: 50,
            resize: true,
            lineColor: '#e6614f',
            fillColor: 'rgba(255,170,170,0.3)',
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
          });

          $('#sparkline16').sparkline([0, 23, 30, 55, 43, 80, 38, 40, 0], {
            type: 'line',
            width: '100%',
            height: '200',
            chartRangeMax: 40,
            lineColor: '#007f3f',
            fillColor: 'rgba(86, 255, 170, 0.3)',
            composite: true,
            resize: true,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
          });

          $('#sparklinedash').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12], {
            type: 'line',
            width: '100%',
            height: '50',
            lineWidth: 2,
            spotRadius: 0,
            lineColor: '#03a9f3',
            fillColor: '#03a9f3',
            highlightLineColor: 0
          });

          $('#sparklinedash2').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12], {
            type: 'line',
            width: '100%',
            height: '50',
            lineWidth: 2,
            spotRadius: 0,
            lineColor: '#e6614f',
            fillColor: '#e6614f',
            highlightLineColor: 0
          });

          $('#sparklinedash3').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12], {
            type: 'line',
            width: '100%',
            height: '50',
            lineWidth: 2,
            spotRadius: 0,
            lineColor: '#51d2b7',
            fillColor: '#51d2b7',
            highlightLineColor: 0
          });

          $('#sparklinedash4').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12], {
            type: 'line',
            width: '100%',
            height: '50',
            lineWidth: 2,
            spotRadius: 0,
            lineColor: '#fb9678',
            fillColor: '#fb9678',
            highlightLineColor: 0
          });

          $('#sparklinedashbar').sparkline([ 12, 11,10, 9, 8, 7, 6, 5, 6, 7, 8, 9, 10,11, 12,11, 10, 9, 8, 7, 6, 5, 6, 7, 8,9, 10, 12 ], {
            type: 'line',
            height: '50',
            width: '100%',
            chartRangeMin: 3,
            lineColor: "#03a9f3",
            fillColor: "#03a9f3"
          });

          $('#sparklinedashbar2').sparkline([ 12, 11,10, 9, 8, 7, 6, 5, 6, 7, 8, 9, 10,11, 12,11, 10, 9, 8, 7, 6, 5, 6, 7, 8,9, 10, 12 ], {
            type: 'line',
            height: '50',
            width: '100%',
            chartRangeMin: 3,
            lineColor: "#e6614f",
            fillColor: "#e6614f"
          });

          $('#sparklinedashbar3').sparkline([ 12, 11,10, 9, 8, 7, 6, 5, 6, 7, 8, 9, 10,11, 12,11, 10, 9, 8, 7, 6, 5, 6, 7, 8,9, 10, 12 ], {
            type: 'line',
            height: '50',
            width: '100%',
            chartRangeMin: 3,
            fillColor: "#51d2b7",
            lineColor: "#51d2b7"
          });

          $('#sparklinedashbar4').sparkline([ 12, 11,10, 9, 8, 7, 6, 5, 6, 7, 8, 9, 10,11, 12,11, 10, 9, 8, 7, 6, 5, 6, 7, 8,9, 10, 12 ], {
            type: 'line',
            height: '50',
            width: '100%',
            chartRangeMin: 3,
            lineColor: "#fb9678",
            fillColor: "#fb9678"
          });

          $('#sparklinedashbar5').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12,6, 5, 6, 8, 10, 9 ], {
            type: 'bar',
            height: '50',
            barSpacing: 5,
            chartRangeMin: 1,
            barColor: "#03a9f3"
          });

          $('#sparklinedashbar6').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12,6, 5, 6, 8, 10, 9 ], {
            type: 'bar',
            height: '50',
            barSpacing: 5,
            chartRangeMin: 1,
            barColor: "#e6614f"
          });

          $('#sparklinedashbar7').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12,6, 5, 6, 8, 10, 9], {
            type: 'bar',
            height: '50',
            barSpacing: 5,
            chartRangeMin: 1,
            barColor: "#51d2b7"
          });

          $('#sparklinedashbar8').sparkline([ 8, 6, 4, 4, 3, 5, 6, 8, 10, 9, 10, 8, 9, 8, 10, 9, 12,6, 5, 6, 8, 10, 9], {
            type: 'bar',
            height: '50',
            barSpacing: 5,
            chartRangeMin: 1,
            barColor: "#fb9678"
          });

          $('#sparklineWidget1').sparkline('html', {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '1',
            barColor: '#ccc',
            zeroAxis: true,
          });

        };
        sparklineLogin();
        $(window).on('resize',sparklineLogin);
        $(document).on('SIDEBAR_CHANGED_WIDTH',sparklineLogin);
      });
    },


    /*************** Chart Js ******************/
    barMiddleAxesChartJs: function() {
      var ctx = document.getElementById("chartJsBarMiddleAxes");
      if ( ctx === null ) return;

      var ctx2 = document.getElementById("chartJsBarMiddleAxes").getContext("2d");
      var data2 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
          {
            label: "My First dataset",
            backgroundColor: "#5867c3",
            strokeColor: "#5867c3",
            data: [16, -60, 30, -50, 26, -55, 55]
          },
          {
            label: "My Second dataset",
            backgroundColor: "#00cedc",
            strokeColor: "#00cedc",
            data: [-28, 48, -40, 19, -55, 27, -50]
          }
        ]
      };

      var chartJsBar = new Chart(ctx2, {
        type: "bar",
        data: data2,
        responsive: true,
        maintainAspectRatio: false,
        options: {
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 3,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              gridLines: {
                display:true
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }]
          }
        },
      });
    },

    lineSingleChartJs: function() {
      var ctx = document.getElementById("chartJsLineSingle");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsLineSingle").getContext("2d");
      var data1 = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
          {
            label: "First",
            backgroundColor: "rgba(22, 161, 22, 0.4)",
            borderColor: "#16A116",
            pointBackgroundColor: "#16A116",
            pointBorderColor: "#fff",
            pointBorderWidth: "1",
            pointRadius: "5",
            pointHoverBackgroundColor: "#fff",
            borderWidth: "2",
            lineTension: "0",
            pointHoverBorderColor: "#16A116",
            data: [40, 30, 60, 50, 80]
          }
        ]
      };

      var chartJsLine = new Chart(ctx1, {
        type: "line",
        data: data1,
        responsive: true,
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              display: false,
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              display: false,
              gridLines: {
                drawBorder: false,
                borderDash: [5, 10],
                display:true,
              },
              ticks: {
                fontColor: "#9ca0a8",
                 beginAtZero: true,
                 min: 10
              }
            }]
          }
        }
      });
    },

    lineMultiChartJs: function() {
      var ctx = document.getElementById("chartJsLineMulti");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsLineMulti").getContext("2d");
      var data1 = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
          {
            label: "First",
            fill: false,
            borderColor: "#16A116",
            pointBackgroundColor: "#16A116",
            pointBorderColor: "#fff",
            pointBorderWidth: "4",
            pointHoverBorderWidth: "2",
            pointRadius: "6",
            pointHoverBackgroundColor: "#fff",
            borderWidth: "1",
            lineTension: "0",
            pointHoverBorderColor: "rgba(88, 103, 195, 0.4)",
            data: [15, 25, 60, 56, 70]
          },
          {
            label: "Second",
            fill: false,
            borderColor: "#56d5ff",
            pointBackgroundColor: "#56d5ff",
            pointBorderColor: "#fff",
            pointBorderWidth: "4",
            pointHoverBorderWidth: "2",
            pointRadius: "6",
            pointHoverBackgroundColor: "#fff",
            borderWidth: "1",
            lineTension: "0",
            pointHoverBorderColor: "rgba(88, 103, 195, 0.4)",
            data: [55, 50, 10, 75, 60]
          }
        ]
      };

      var chartJsLine = new Chart(ctx1, {
        type: "line",
        data: data1,
        responsive: true,
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              display: false,
              gridLines: {
                drawBorder: false,
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              display: false,
              gridLines: {
                drawBorder: false,
                borderDash: [5, 10],
                display:true,
              },
              ticks: {
                fontColor: "#9ca0a8",
                beginAtZero: true,
                min: 10
              }
            }]
          }
        }
      });
    },

    lineMultiSmallChartJs: function() {
      var ctx = document.getElementById("chartJsAreaMultiSmall");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsAreaMultiSmall").getContext("2d");
      var data1 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
          {
            label: "First",
            backgroundColor: "#91ded3",
            borderColor: "#91ded3",
            pointStrokeColor: "#fff",
            pointRadius: 0,
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "#91ded3",
            data: [0, 80, 40, 58, 20, 55, 10]
          },
          {
            label: "Second",
            backgroundColor: "#f6d54a",
            borderColor: "#f6d54a",
            pointStrokeColor: "#fff",
            pointRadius: 0,
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "#f6d54a",
            data: [0, 48, 60, 19, 86, 27, 90]
          }
        ]
      };

      var chartJsLine = new Chart(ctx1, {
        type: "line",
        data: data1,
        responsive: true,
        options: {
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              display:false,
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              display:false,
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }]
          }
        }
      });
    },

    doughnutSlimChartJs: function() {
      var ctx = document.getElementById("chartJsDoughnutSlim");
      if ( ctx === null ) return;

      var ctx4 = document.getElementById("chartJsDoughnutSlim").getContext("2d");
      var data4 = {
        labels: [
        "Green",
        "Orange",
        "Blue",

        ],
        datasets: [
        {
          data: [100,140,300],
          backgroundColor: [
          "#05d05b",
          "#ffb701",
          "#00c1dd",

          ],
          hoverBackgroundColor: [
          "#05d05b",
          "#ffb701",
          "#00c1dd",

          ]
        }]
      };
      var chartJsDoughnut = new Chart(ctx4, {
        type: "doughnut",
        data: data4,
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 90,
          legend: {
            display: false,
            position: 'right',
            labels: {
              usePointStyle: true,
              padding: 40,
            }
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
        }
      });
    },

    doughnutLegendChartJs: function() {
        var ctx = document.getElementById("chartJsDoughnutLegend");
        if ( ctx === null ) return;

        var ctx4 = document.getElementById("chartJsDoughnutLegend").getContext("2d");
        var data4 = {
          labels: [
            "Google",
            "Facebook",
            "Youtube",
            "Other",
            "Twitter",
          ],
          datasets: [
            {
              data: [39.4,22,33,12,12],
              backgroundColor: [
                "#4671bd",
                "#199bfc",
                "#54c273",
                '#c4fa5e',
                "#25d7fb",
              ],
              hoverBackgroundColor: [
                "#4671bd",
                "#199bfc",
                "#54c273",
                '#c4fa5e',
                "#25d7fb",
              ]
            }
          ]
        };
          var chartJsDoughnut = new Chart(ctx4, {
            type: "doughnut",
            data: data4,
            options: {
              maintainAspectRatio: false,
              responsive: true,
              cutoutPercentage: 75,
              elements: {
                arc: {
                  borderWidth: 0
                },
              },
              legend: {
                display: false,
                position: 'right',
                labels: {
                  usePointStyle: true,
                  padding: 40,
                }
              },
              tooltips: {
                mode: 'index',
                intersect: false,
                titleFontColor: "#000",
                titleMarginBottom: 10,
                backgroundColor: "rgba(255,255,255,.9)",
                bodyFontColor: "#000",
                borderColor: "#e9e9e9",
                bodySpacing: 10,
                borderWidth: 2,
                xPadding: 10,
                yPadding: 10,
              },
            }
          }
        );
    },

    doughnutSmallChartJs: function() {
      var ctx = document.getElementById("chartJsDoughnutSmall");
      if ( ctx === null ) return;

      var ctx4 = document.getElementById("chartJsDoughnutSmall").getContext("2d");
      var data4 = {
        labels: [
        "Green",
        "Orange",
        "Blue",
        ],
        datasets: [
        {
          data: [40,50,10],
          backgroundColor: [
          "#1d222f",
          "#ffffff",
          "#f5d54a",
          ],
          hoverBackgroundColor: [
          "#1d222f",
          "#ffffff",
          "#f5d54a",
          ],
          borderColor: "#474b5e",
        }]
      };
      var chartJsDoughnut = new Chart(ctx4, {
        type: "doughnut",
        data: data4,
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 75,
          legend: {
            display: false,
            position: 'right',
            labels: {
              usePointStyle: true,
              padding: 40,
            }
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
        }
      });
    },

    areaChartJs: function() {
      var ctx = document.getElementById("chartJsArea");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsArea").getContext("2d");
      var data1 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
          {
            label: "First",
            backgroundColor: "rgba(88, 103, 195, 0.4)",
            borderColor: "rgba(88, 103, 195, 0.4)",
            pointStrokeColor: "#fff",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(88, 103, 195, 0.4)",
            data: [0, 80, 40, 58, 20, 55, 10]
          },
          {
            label: "Second",
            backgroundColor: "rgba(255, 128, 111, 0.4)",
            borderColor: "rgba(255, 128, 111, 0.4)",
            pointStrokeColor: "#fff",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(255, 128, 111, 0.4)",
            data: [28, 48, 60, 19, 86, 27, 90]
          }
        ]
      };

      var chartJsArea = new Chart(ctx1, {
        type: "line",
        data: data1,
        responsive: true,
        options: {
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }]
          }
        }
      });
    },

    barChartJs: function() {
      var ctx = document.getElementById("chartJsBar");
      if ( ctx === null ) return;

      var ctx2 = document.getElementById("chartJsBar").getContext("2d");
      var data2 = {
        labels: ["Jan", "Feb", "Mar", "April", "May", "June", "July"],
        datasets: [
          {
            label: "My First dataset",
            backgroundColor: "#5867c3",
            strokeColor: "#5867c3",
            data: [16, 60, 30, 50, 26, 70, 40]
          },
          {
            label: "My Second dataset",
            backgroundColor: "#00cedc",
            strokeColor: "#00cedc",
            data: [28, 48, 40, 19, 80, 27, 50]
          }
        ]
      };

      var chartJsBar = new Chart(ctx2, {
        type: "bar",
        data: data2,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 3,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              gridLines: {
                display:false
              }
            }],
            yAxes: [{
              gridLines: {
                display:false
              }
            }]
          }
        },
        responsive: true
      });
    },

    pieChartJs: function() {
      var ctx = document.getElementById("chartJsPie");
      if ( ctx === null ) return;

      var ctx3 = document.getElementById("chartJsPie").getContext("2d");
      var data3 = {
        labels: [
        "Site A",
        "Site B",
        "Site C",
        "Site D",
        ],
        datasets: [
        {
          data: [25,10,25,40],
          backgroundColor: [
          "#51bcd4",
          "#d75151",
          "#eace52",
          "#dce5e7",
          ],
          hoverBackgroundColor: [
          "#51bcd4",
          "#d75151",
          "#eace52",
          "#dce5e7",
          ],
          hoverBorderColor: '#fff',
          borderWidth: 8,
        }]
      };
      var chartJsPie = new Chart(ctx3,{
        type: "pie",
        data: data3,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false,
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 0,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 0,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
        }
      });
    },

    doughnutChartJs: function() {
      var ctx = document.getElementById("chartJsDoughnut");
      if ( ctx === null ) return;

      var ctx4 = document.getElementById("chartJsDoughnut").getContext("2d");
      var data4 = {
        labels: [
        "Green",
        "Blue",
        "Orange",
        "Red",

        ],
        datasets: [
        {
          data: [300,90,100,170],
          backgroundColor: [
          "#05d05b",
          "#00c1dd",
          "#ffb701",
          "#ff6161",

          ],
          hoverBackgroundColor: [
          "#05d05b",
          "#00c1dd",
          "#ffb701",
          "#ff6161",

          ]
        }]
      };
      var chartJsDoughnut = new Chart(ctx4, {
        type: "doughnut",
        data: data4,
        responsive: true,
        options: {
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
        }
      });
    },

    polarAreaChartJs: function() {
      var ctx = document.getElementById("chartJsPolarArea");
      if ( ctx === null ) return;

      var ctx5 = document.getElementById("chartJsPolarArea").getContext("2d");
      var data5 =  {
        labels: [
        "Blue",
        "Megna",
        "Orange",
        "Grey"
        ],
        datasets: [
        {
          data: [300,250,200,100],
          backgroundColor: [
          "rgba(138,43,226,.6)",
          "rgba(0,250,154,.6)",
          "rgba(255,165,0,.6)",
          "rgba(169,169,169,.6)"
          ],
          hoverBackgroundColor: [
          "rgba(138,43,226,.6)",
          "rgba(0,250,154,.6)",
          "rgba(255,165,0,.6)",
          "rgba(169,169,169,.6)"
          ]
        }]
      };
      var chartJsPolarArea = new Chart(ctx5, {
        type: "polarArea",
        data: data5,
        options: {
          legend: {
            display: false
          },
          scale: {
            display:true,
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
        },
      });
    },

    radarChartJs: function() {
      var ctx = document.getElementById("chartJsRadar");
      if ( ctx === null ) return;

      var ctx6 = document.getElementById("chartJsRadar").getContext("2d");
      var data6 = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
          {

            label: "My Second dataset",
            backgroundColor: "rgba(255,118,118,0.8)",
            strokeColor: "rgba(255,118,118,1)",
            pointColor: "rgba(255,118,118,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(255,118,118,1)",
            data: [30, 38, 50, 29, 86, 37, 110]

          },
          {
            label: "My First dataset",
            backgroundColor: "rgba(44,171,227,0.8)",
            strokeColor: "rgba(44,171,227,1)",
            pointColor: "rgba(44,171,227,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(19,218,254,1)",
            data: [55, 99, 70, 91, 66, 35, 40]
          }
        ]
      };

      var chartJsRadar = new Chart(ctx6, {
        type: "radar",
        data: data6,
        options: {
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
            displayColors: true
          },
        },
        responsive: true
      });
    },

    barhorizontalChartJs: function() {
      var ctx = document.getElementById("chartJsHorizontalBar");
      if ( ctx === null ) return;

      var ctx2 = document.getElementById("chartJsHorizontalBar").getContext("2d");
      var data2 = {
        labels: ["Data 1", "Data 2", "Data 3", "Data 4", "Data 5", "Data 6", "Data 7", "Data 8", "Data 9", "Data 10"],
        datasets: [
          {
            label: "My First dataset",
            backgroundColor: "#0040ff",
            strokeColor: "#0040ff",
            data: [18, 25, 19, 23, 17, 20, 25, 13, 18, 21]
          },
          {
            label: "My Second dataset",
            backgroundColor: "#1aa3ff",
            strokeColor: "#1aa3ff",
            data: [28, 32, 23, 32, 30, 27, 33, 20, 25, 30]
          },
          {
            label: "My Third dataset",
            backgroundColor: "#99e6ff",
            strokeColor: "#99e6ff",
            data: [39, 43, 27, 38, 45, 35, 45, 28, 33, 40]
          },
        ]
      };

      var chartJsBar = new Chart(ctx2, {
        type: "bar",
        data: data2,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              display: true,
              stacked: true,
              barThickness: 20,
              gridLines: {
                tickMarkLength: 15,
                drawBorder: false,
                display:false,
                borderDash: [5, 10],
              },
              ticks: {
                fontColor: "#9ca0a8",
                beginAtZero: true,
                min: 10,
              }
            }],
            yAxes: [{
              display: true,
              stacked: true,
              gridLines: {
                display:true,
                drawBorder: false,
                borderDash: [5, 10],
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }]
          }
        },
      });
    },

    lineSingleGradientChartJs: function() {
      var ctx = document.getElementById("chartJsLineSingleGradient");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsLineSingleGradient").getContext("2d");
      var gradient = ctx1.createLinearGradient(0, 0, 0, 400);
      gradient.addColorStop(0, 'rgba(26, 163, 255,.4)');
      gradient.addColorStop(1, 'rgba(26, 163, 255,0)');

      var data1 = {
        labels: ["Jan", "Feb", "Mar", "April", "May"],
        datasets: [
          {
            label: "First",
            backgroundColor: gradient,
            borderColor: "#1aa3ff",
            pointBackgroundColor: "#1aa3ff",
            pointBorderColor: "#1aa3ff",
            pointBorderWidth: "1",
            pointRadius: "4",
            pointHoverBackgroundColor: "#1aa3ff",
            borderWidth: "2",
            pointHoverBorderColor: "#1aa3ff",
            data: [40, 30, 60, 50, 80]
          }
        ]
      };

      var chartJsLine = new Chart(ctx1, {
        type: "line",
        data: data1,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                drawBorder: false,
                borderDash: [5, 10],
                display:true,
              },
              ticks: {
                fontColor: "#9ca0a8",
                 beginAtZero: true,
              }
            }]
          }
        }
      });
    },

    lineChartJs: function() {
      var ctx = document.getElementById("chartJsLine");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsLine").getContext("2d");
      var data1 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
          {
            label: "First",
            fill: false,
            backgroundColor: "transparent",
            lineTension: "0",
            borderWidth: "2",
            borderColor: "#99ebff",
            pointColor: "#99ebff",
            pointBackgroundColor: "#99ebff",
            pointBorderColor: "#fff",
            pointBorderWidth: "4",
            pointRadius: "7",
            pointHoverRadius: "9" ,
            pointHoverBorderColor: "#fff",
            data: [20, 30, 80, 20, 40, 10, 60]
          },
          {
            label: "Second",
            fill: false,
            lineTension: "0",
            borderWidth: "2",
            backgroundColor: "transparent",
            borderColor: "#ffcc66",
            pointBorderColor: "#ffcc66",
            pointBackgroundColor: "#ffcc66",
            pointBorderColor: "#fff",
            pointBorderWidth: "4",
            pointRadius: "7",
            pointHoverRadius: "9" ,
            pointHoverBorderColor: "#fff",
            data: [60, 10, 40, 30, 80, 30, 20]
          },
          {
            label: "Third",
            fill: false,
            lineTension: "0",
            borderWidth: "2",
            backgroundColor: "transparent",
            borderColor: "#d580ff",
            pointBorderColor: "#d580ff",
            pointBackgroundColor: "#d580ff",
            pointBorderColor: "#fff",
            pointBorderWidth: "4",
            pointRadius: "7",
            pointHoverRadius: "9" ,
            pointHoverBorderColor: "#fff",
            data: [32, 50, 20, 65, 50, 55, 30]
          }
        ]
      };

      var chartJsLine = new Chart(ctx1, {
        type: "line",
        data: data1,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }]
          }
        }
      });
    },

    areaMultiChartJs: function() {
      var ctx = document.getElementById("chartJsAreaMulti");
      if ( ctx === null ) return;

      var ctx1 = document.getElementById("chartJsAreaMulti").getContext("2d");
      var data1 = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
          {
            label: "First",
            backgroundColor: "rgba(51, 153, 255, 0.4)",
            borderColor: "#3399ff",
            borderDash: [5, 5],
            pointBackgroundColor: "#3399ff",
            pointBorderColor: "#fff",
            pointBorderWidth: "1",
            pointRadius: "5",
            pointHoverBackgroundColor: "#fff",
            borderWidth: "2",
            lineTension: "0",
            pointHoverBorderColor: "#3399ff",
            data: [20, 10, 30, 20, 50]
          },
          {
            label: "Second",
            backgroundColor: "rgba(229, 200, 16, 0.4)",
            borderColor: "#e5c810",
            borderDash: [5, 5],
            pointBackgroundColor: "#e5c810",
            pointBorderColor: "#fff",
            pointBorderWidth: "1",
            pointRadius: "5",
            pointHoverBackgroundColor: "#fff",
            borderWidth: "2",
            lineTension: "0",
            pointHoverBorderColor: "#e5c810",
            data: [30, 20, 40, 30, 60]
          }
        ]
      };

      var chartJsLine = new Chart(ctx1, {
        type: "line",
        data: data1,
        responsive: true,
        options: {
          legend: {
            display: false
          },
          tooltips: {
            mode: 'index',
            intersect: false,
            titleFontColor: "#000",
            titleMarginBottom: 10,
            backgroundColor: "rgba(255,255,255,.9)",
            bodyFontColor: "#000",
            borderColor: "#e9e9e9",
            bodySpacing: 10,
            borderWidth: 2,
            xPadding: 10,
            yPadding: 10,
          },
          scales: {
            xAxes: [{
              display: false,
              gridLines: {
                display:false
              },
              ticks: {
                fontColor: "#9ca0a8",
              }
            }],
            yAxes: [{
              display: false,
              gridLines: {
                borderDash: [5, 10],
                display:true,
              },
              ticks: {
                fontColor: "#9ca0a8",
                beginAtZero: true,
                max: 60
              }
            }]
          }
        }
      });
    },


    /*********************** Dashboards **************************/
    visitorsCountChartJs: function() {
      var ctx = document.getElementById("chartsJsVisitorsCount");
      if( ctx === null ) return;
      ctx = ctx.getContext('2d');

      var gradient = ctx.createLinearGradient(0,0,0,200);
      gradient.addColorStop(0,'rgba(25,118,210,0.1)');
      gradient.addColorStop(1,'rgba(25,118,210,0)');
      
      document.gradient = gradient;

      var data = {
        labels: [
          '',
          moment().subtract(7,'months').format("MMM").toUpperCase(),
          moment().subtract(6,'months').format("MMM").toUpperCase(),
          moment().subtract(5,'months').format("MMM").toUpperCase(),
          moment().subtract(4,'months').format("MMM").toUpperCase(),
          moment().subtract(3,'months').format("MMM").toUpperCase(),
          moment().subtract(2,'months').format("MMM").toUpperCase(),
          moment().subtract(1,'months').format("MMM").toUpperCase(),
          '',
        ],
        datasets: [{
          label: 'Organic Traffic',
          data: [870,1315,743,537,1430,1670,1223,1023,1328],
          borderColor: '#06d7a0',
          backgroundColor: gradient,
          hoverBackgroundColor: gradient,
          pointRadius: 0,
          pointHoverRadius: 5,
          pointHoverBorderWidth: 3,
          pointHoverBackgroundColor: 'rgba(255,255,255,1)',
        },{
          label: 'Organic Traffic',
          data: [1670,843,1430,1223,737,1023,870,1315,1328],
          borderColor: '#2780d4',
          backgroundColor: gradient,
          hoverBackgroundColor: gradient,
          pointRadius: 0,
          pointHoverRadius: 5,
          pointHoverBorderWidth: 3,
          pointHoverBackgroundColor: 'rgba(255,255,255,1)',
        }]
      };

      var chart = new Chart( ctx, {
        type: 'line',
        data: data,
        responsive: true,
        options: {
          maintainAspectRatio: false,
          hover: {
            intersect: false,
          },
          legend: {
            display: false,
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                drawTicks: false,
                zeroLineColor: 'rgba(187,187,187,.2)',
                color: 'rgba(187,187,187,.2)',
              },
              ticks: {
                min: 0,
                beginAtZero: true,
                stepSize: 500,
                display: false,
              },
            }],
            xAxes: [{
              gridLines: {
                drawBorder: false,
                zeroLineColor: 'rgba(187,187,187,.2)',
                color: 'rgba(187,187,187,.2)',
                drawTicks: true,
                tickMarkLength: 10,
              },
              ticks: {
                fontSize: 12,
                fontFamily: 'Poppins',
                fontColor: 'rgba(0,0,0,0.3)',
              },
            }]
          }
        }
      });
    },

    siteVisitsChartJs: function() {
      var ctx = document.getElementById('chartJsSiteVisits');
      if( ctx === null ) return;
      ctx = ctx.getContext('2d');

      var data = {
        labels: [
          moment().subtract(12,'months').format("MMM"),
          moment().subtract(11,'months').format("MMM"),
          moment().subtract(10,'months').format("MMM"),
          moment().subtract(9,'months').format("MMM"),
          moment().subtract(8,'months').format("MMM"),
          moment().subtract(7,'months').format("MMM"),
          moment().subtract(6,'months').format("MMM"),
          moment().subtract(5,'months').format("MMM"),
          moment().subtract(4,'months').format("MMM"),
          moment().subtract(3,'months').format("MMM"),
          moment().subtract(2,'months').format("MMM"),
          moment().subtract(1,'months').format("MMM"),
        ],
        datasets: [{
          label: 'Visits 1',
          data: [320, 540, 1284, 899, 1670, 413, 756, 980, 678, 556, 349, 1342],
          fill: true, 
          backgroundColor: 'rgba(17,126,255,.3)',
          hoverBackgroundColor: 'rgba(17,126,255,1)'
        },{
          label: 'Visits 2',
          data: [556, 349, 1342, 895, 320, 540, 1284, 899, 1670, 413, 756, 980],
          fill: true, 
          backgroundColor: 'rgba(75,225,171,.3)',
          hoverBackgroundColor: 'rgba(75,225,171,1)'
        }],
      };

      var chart = new Chart(ctx, {
        type: 'bar',
        data: data,
        responsive: true,
        options: {
          maintainAspectRatio: false,
          hover: {
            intersect: false,
          },
          legend: {
            display: false,
          },
          scales: {
            xAxes: [{
              categoryPercentage: .5,
              barPercentage: .6,
              gridLines: {
                color: 'rgba(0,0,0,0)',
                drawBorder: false,
                zeroLineColor: 'rgba(0,0,0,0)',
                tickMarkLength: 0,
              },
              ticks: {
                beginAtZero: true,
                padding: 10,
              }
            }],
            yAxes: [{
              gridLines: {
                color: 'rgba(0,0,0,0)',
                drawBorder: false,
                zeroLineColor: 'rgba(0,0,0,0)',
                tickMarkLength: 0,
              },
              ticks: {
                beginAtZero: true,
                display: false,
              }
            }]
          }
        },
      });
    },

    dailyVisitsChartJs: function() {
      var ctx = document.getElementById('chartsJsDailyVisits');
      if( ctx === null ) return;
      ctx = ctx.getContext('2d');

      var data = {
        labels: [
          moment().subtract(7,'months').format("MMM"),
          moment().subtract(6,'months').format("MMM"),
          moment().subtract(5,'months').format("MMM"),
          moment().subtract(4,'months').format("MMM"),
          moment().subtract(3,'months').format("MMM"),
          moment().subtract(2,'months').format("MMM"),
          moment().subtract(1,'months').format("MMM"),
          moment().format("MMM"),
        ],
        datasets: [{
          label: 'Visits',
          data: [320, 540, 1284, 899, 1670, 413, 756, 980],
          fill: true, 
          backgroundColor: 'rgba(106,85,238,0.1)',
          borderColor: '#6a55ee',
          pointRadius: 0,
          pointHoverRadius: 5,
          pointHoverBorderWidth: 3,
          pointHoverBorderColor: '#6a55ee',
          pointHoverBackgroundColor: '#fff'
        }]
      };

      var chart = new Chart(ctx, {
        type: 'line',
        data: data,
        responsive: true,
        options: {
          maintainAspectRatio: false,
          hover: {
            intersect: false,
          },
          legend: {
            display: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'rgba(0,0,0,0)',
                drawBorder: false,
                zeroLineColor: 'rgba(0,0,0,0)',
                tickMarkLength: 0,
              },
              ticks: {
                beginAtZero: true,
                display: false,
              }
            }],
            yAxes: [{
              gridLines: {
                color: 'rgba(0,0,0,0)',
                drawBorder: false,
                zeroLineColor: 'rgba(0,0,0,0)',
                tickMarkLength: 0,
              },
              ticks: {
                beginAtZero: true,
                display: false,
              }
            }]
          }
        },
      });
    },

    siteStatisticsChartJs: function() {
      var ctx = document.getElementById('chartsJsSiteStatistics');
      if( ctx === null ) return;
      ctx = ctx.getContext('2d');

      var gradient1 = ctx.createLinearGradient(0,0,0,200);
      gradient1.addColorStop(0,'rgba(75, 225, 171, 0.1)');
      gradient1.addColorStop(1,'rgba(75, 225, 171, 0)');

      var gradient2 = ctx.createLinearGradient(0,0,0,200);
      gradient2.addColorStop(0,'rgba(42, 70, 164, 0.1)');
      gradient2.addColorStop(1,'rgba(42, 70, 164, 0)');

      var data = {
        labels: [
          '',
          moment().subtract(7,'days').format("D MMM").toUpperCase(),
          moment().subtract(6,'days').format("D MMM").toUpperCase(),
          moment().subtract(5,'days').format("D MMM").toUpperCase(),
          moment().subtract(4,'days').format("D MMM").toUpperCase(),
          moment().subtract(3,'days').format("D MMM").toUpperCase(),
          moment().subtract(2,'days').format("D MMM").toUpperCase(),
          moment().subtract(1,'days').format("D MMM").toUpperCase(),
          '',
        ],
        datasets: [{
          label: 'Organic Traffic',
          data: [870,1315,743,537,1430,1670,1223,1023,1328],
          borderColor: 'rgb(75, 225, 171)',
          borderWidth: 2,
          backgroundColor: gradient1,
          hoverBackgroundColor: gradient1,
          pointRadius: 0,
          pointHoverRadius: 5,
          pointHoverBorderWidth: 2,
          pointHoverBackgroundColor: 'rgba(255,255,255,1)',
        },{
          label: 'Organic Traffic',
          data: [1670,843,1430,1223,737,1023,870,1315,1328],
          borderColor: 'rgb(42, 70, 164)',
          borderWidth: 2,
          backgroundColor: gradient2,
          hoverBackgroundColor: gradient2,
          pointRadius: 0,
          pointHoverRadius: 5,
          pointHoverBorderWidth: 2,
          pointHoverBackgroundColor: 'rgba(255,255,255,1)',
        }]
      };

      var chart = new Chart( ctx, {
        type: 'line',
        data: data,
        responsive: true,
        options: {
          maintainAspectRatio: false,
          hover: {
            intersect: false,
          },
          legend: {
            display: false,
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                drawTicks: false,
                zeroLineColor: 'rgba(187,187,187,.2)',
                color: 'rgba(187,187,187,.2)',
              },
              ticks: {
                min: 0,
                beginAtZero: true,
                stepSize: 500,
                display: false,
              },
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                zeroLineColor: 'rgba(187,187,187,.2)',
                color: 'rgba(187,187,187,.2)',
                drawTicks: true,
                tickMarkLength: 10,
              },
              ticks: {
                fontSize: 12,
                fontFamily: 'Karla, Arial, sans-serif',
                fontColor: 'rgba(0,0,0,0.3)',
              },
            }]
          }
        }
      });
    },

    trafficSourcesChartJs: function() {
      var ctx = document.getElementById("chartJsTrafficSources");
      if ( ctx === null ) return;

      var ctx4 = document.getElementById("chartJsTrafficSources").getContext("2d");
      var data4 = {
        labels: [
          "Google",
          "Others",
          "Facebook",
          "Organic Traffic",
        ],
        datasets: [
          {
            data: [39,22,33,12],
            backgroundColor: [
              "#f4364c",
              "#ffe483",
              "#405189",
              '#7fd7d9',
            ],
            hoverBackgroundColor: [
              "#f4364c",
              "#ffe483",
              "#405189",
              '#7fd7d9',
            ],
          }
        ]
      };
        var chartJsDoughnut = new Chart(ctx4, {
          type: "doughnut",
          data: data4,
          options: {
            maintainAspectRatio: false,
            responsive: true,
            cutoutPercentage: 85,
            elements: {
              arc: {
                borderWidth: 0
              },
            },
            legend: {
              display: false,
              position: 'right',
              labels: {
                usePointStyle: true,
                padding: 40,
              }
            },
            tooltips: {
              mode: 'index',
              intersect: false,
              titleFontColor: "#000",
              titleMarginBottom: 10,
              backgroundColor: "rgba(255,255,255,.9)",
              bodyFontColor: "#000",
              borderColor: "#e9e9e9",
              bodySpacing: 10,
              borderWidth: 2,
              xPadding: 10,
              yPadding: 10,
            },
          }
        }
      );
    },


    /*********************** Animations **************************/
    testAnimation: function() {
      var ctx = document.getElementById("animationSandbox");
      if ( ctx === null ) return;

      function testAnim(x) {
        $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
          $(this).removeClass();
        });
      }

      $(document).ready(function () {
        $('.js--triggerAnimation').click(function (e) {
          e.preventDefault();
          var anim = $('.js--animations').val();
          testAnim(anim);
        });
        $('.js--animations').change(function () {
          var anim = $(this).val();
          testAnim(anim);
        });
      });
    },


    /*********************** Toastr **************************/
    enableToastr: function() {
      var toastInfo = $('.toast-info');
      if( toastInfo.length ) {
        toastInfo.click(function(){
          $.toast({
            heading: 'Welcome to Oscar Admin',
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-right',
            icon: 'info',
            stack: false
          });
        });
      }

      var toastSuccess = $('.toast-success');
      if( toastSuccess.length ) {
        toastSuccess.click(function(){
          $.toast({
            heading: 'Welcome to Oscar Admin',
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-right',
            icon: 'success',
            stack: false
          });
        });
      }


      var toastDanger = $('.toast-danger');
      if( toastDanger.length ) {
        toastDanger.click(function(){
          $.toast({
            heading: 'Welcome to Oscar Admin',
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-right',
            icon: 'error',
            stack: false
          });
        });
      }


      var toastWarning = $('.toast-warning');
      if( toastWarning.length ) {
        toastWarning.click(function(){
          $.toast({
            heading: 'Welcome to Oscar Admin',
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-right',
            icon: 'warning',
            stack: false
          });
        });
      }

      var toastBasic = $('.toast-basic');
      if( toastBasic.length ) {
        toastBasic.click(function(){
          $.toast({
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-right',
            stack: false
          });
        });
      }

      var toastArray = $('.toast-array');
      if( toastArray.length ) {
        toastArray.click(function(){
          $.toast({
            heading: 'Read documentation and check:',
            text:["Connections","Cables & accessories","Display & Touch"],
            position: 'top-right',
            stack: false
          });
        });
      }


      var toastHtml = $('.toast-html');
      if( toastHtml.length ) {
        toastHtml.click(function(){
          $.toast({
            heading: 'Welcome to <i>Oscar Admin</i>',
            text: 'This alert needs your attention. <a href="#">Check this out</a>.',
            position: 'top-right',
            stack: false
          });
        });
      }


      var toastTransitions = $('.toast-transitions');
      if( toastTransitions.length ) {
        toastTransitions.click(function(){
          $.toast({
            heading: 'Slide Transitions',
            text: 'Set the `showHideTransition` property to fade|plain|slide to achieve different transitions',
            position: 'top-right',
            showHideTransition:"slide",
            stack: false
          });
        });
      }

      var toastTopCenter = $('.toast-top-center');
      if( toastTopCenter.length ) {
        toastTopCenter.click(function(){
          $.toast({
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-center',
            stack: false
          });
        });
      }

      var toastBottomRight = $('.toat-bottom-right');
      if( toastBottomRight.length ) {
        toastBottomRight.click(function(){
          $.toast({
            text: 'This alert needs your attention, but it is not super important.',
            position: 'bottom-right',
            stack: false
          });
        });
      }

      var toastBottomCenter = $('.toast-bottom-center');
      if( toastBottomCenter.length ) {
        toastBottomCenter.click(function(){
          $.toast({
            text: 'This alert needs your attention, but it is not super important.',
            position: 'bottom-center',
            stack: false
          });
        });
      }

      var toastSticky = $('.toast-sticky');
      if( toastSticky.length ) {
        toastSticky.click(function(){
          $.toast({
            text: 'This alert needs your attention, but it is not super important.',
            position: 'top-right',
            hideAfter: false,
            stack: false
          });
        });
      }
    },

    getRandomInt: function(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min)) + min;
    },

    templateSwitcher: function() {
      var styles = document.createElement('link');
      styles.classList.add('tempate-switcher__css');
      styles.rel = 'stylesheet';
      styles.href = 'assets/vendors/template-switcher/switcher-style.css';
      document.head.appendChild(styles);

      var form = document.createElement('form');
      form.classList.add('template-switcher');
      form.dataset.state = 'collapse';
      form.expand     = function() { this.dataset.state = 'expand' };
      form.collapse   = function() { this.dataset.state = 'collapse' };
      form.toggle     = function() {
        if(this.dataset.state === 'expand') this.collapse();
        else this.expand();
      };
      document.body.appendChild(form);

      var switcher = document.createElement('div');
      form.appendChild(switcher);

      // Switcher Container Styles 
      form.addEventListener('submit', function(e) { e.preventDefault() });

      // Toggle
      var toggle = document.createElement('button');
      toggle.classList.add('template-switcher__toggle');
      toggle.addEventListener('click',function() {
        form.toggle();
      });
      form.appendChild(toggle);

      // Logo
      var logoFigure = document.createElement('figure');
      logoFigure.classList.add('template-switcher__figure');
      var logo = document.createElement('img');
      logo.src = 'assets/img/logo-dark.png';
      logoFigure.appendChild(logo);
      switcher.appendChild(logoFigure);

      // Toggle Icon
      var toggleIcon = document.createElement('i');
      toggleIcon.className = 'feather feather-settings template-switcher__toggle-icon';
      toggle.appendChild(toggleIcon);

      var labelStyles = function(el, title) {
        el.innerHTML = title;
        el.classList.add('template-switcher__label');
      }

      var optionStyles = function(el, value, title, target) {
        el.value = value;
        el.innerHTML = title;
        el.selected = target === value ? true : false;
      };

      var radioStyles = function(radio, changeFunc) {
        radio.addEventListener('change', function(e) {
          changeFunc(radio);
        });
      };

      // Sidebar State
      var sidebarStateTitle = document.createElement('h6');
      sidebarStateTitle.classList.add('template-switcher__title');
      sidebarStateTitle.innerHTML = 'Sidebar State';
      switcher.appendChild(sidebarStateTitle);

      var sidebarStateChange = function(radio) {
        if( radio.value === 'rtl' && radio.checked ) {
          document.body.classList.add('rtl');
          return;
        }
        
        document.body.classList.remove('rtl');
        document.body.dataset.sidebarState = radio.value;
      };

      var sidebarStateDiv = document.createElement('div');
      sidebarStateDiv.classList.add('template-switcher__layouts');
      switcher.appendChild(sidebarStateDiv)

      // Sidebar State Expand
      var sidebarStateOptionExpandLabel = document.createElement('label');
      sidebarStateOptionExpandLabel.classList.add('template-switcher__img-radio-label');
      var sidebarStateOptionExpandRadio = document.createElement('input');
      sidebarStateOptionExpandRadio.classList.add('template-switcher__radio');
      sidebarStateOptionExpandRadio.type = 'radio';
      sidebarStateOptionExpandRadio.name = 'sidebar-state';
      sidebarStateOptionExpandRadio.value = 'expand';
      sidebarStateOptionExpandRadio.checked = document.body.dataset.sidebarState === 'expand';
      radioStyles(sidebarStateOptionExpandRadio, sidebarStateChange);
      var sidebarStateOptionExpandSpan = document.createElement('span');
      sidebarStateOptionExpandSpan.classList.add('template-switcher__img-radio-span');
      var sidebarStateOptionExpandImg = document.createElement('img');
      sidebarStateOptionExpandImg.src = "assets/vendors/template-switcher/demo-thumb-default.jpg";
      sidebarStateOptionExpandSpan.appendChild(sidebarStateOptionExpandImg);
      sidebarStateOptionExpandLabel.appendChild(sidebarStateOptionExpandRadio);
      sidebarStateOptionExpandLabel.appendChild(sidebarStateOptionExpandSpan);
      sidebarStateDiv.appendChild(sidebarStateOptionExpandLabel);

      // Sidebar State Collapse
      var sidebarStateOptionCollapseLabel = document.createElement('label');
      sidebarStateOptionCollapseLabel.classList.add('template-switcher__img-radio-label');
      var sidebarStateOptionCollapseRadio = document.createElement('input');
      sidebarStateOptionCollapseRadio.classList.add('template-switcher__radio');
      sidebarStateOptionCollapseRadio.type = 'radio';
      sidebarStateOptionCollapseRadio.name = 'sidebar-state';
      sidebarStateOptionCollapseRadio.value = 'collapse';
      sidebarStateOptionCollapseRadio.checked = document.body.dataset.sidebarState === 'collapse';
      radioStyles(sidebarStateOptionCollapseRadio, sidebarStateChange);
      var sidebarStateOptionCollapseSpan = document.createElement('span');
      sidebarStateOptionCollapseSpan.classList.add('template-switcher__img-radio-span');
      var sidebarStateOptionCollapseImg = document.createElement('img');
      sidebarStateOptionCollapseImg.src = "assets/vendors/template-switcher/demo-thumb-collapse.jpg";
      sidebarStateOptionCollapseSpan.appendChild(sidebarStateOptionCollapseImg);
      sidebarStateOptionCollapseLabel.appendChild(sidebarStateOptionCollapseRadio);
      sidebarStateOptionCollapseLabel.appendChild(sidebarStateOptionCollapseSpan);
      sidebarStateDiv.appendChild(sidebarStateOptionCollapseLabel);

      // Sidebar State RTL
      var sidebarStateOptionRtlLabel = document.createElement('label');
      sidebarStateOptionRtlLabel.classList.add('template-switcher__img-radio-label');
      var sidebarStateOptionRtlRadio = document.createElement('input');
      sidebarStateOptionRtlRadio.classList.add('template-switcher__radio');
      sidebarStateOptionRtlRadio.type = 'radio';
      sidebarStateOptionRtlRadio.name = 'sidebar-state';
      sidebarStateOptionRtlRadio.value = 'rtl';
      sidebarStateOptionRtlRadio.checked = document.body.classList.contains('rtl');
      radioStyles(sidebarStateOptionRtlRadio, sidebarStateChange);
      var sidebarStateOptionRtlSpan = document.createElement('span');
      sidebarStateOptionRtlSpan.classList.add('template-switcher__img-radio-span');
      var sidebarStateOptionRtlImg = document.createElement('img');
      sidebarStateOptionRtlImg.src = "assets/vendors/template-switcher/demo-thumb-rtl.jpg";
      sidebarStateOptionRtlSpan.appendChild(sidebarStateOptionRtlImg);
      sidebarStateOptionRtlLabel.appendChild(sidebarStateOptionRtlRadio);
      sidebarStateOptionRtlLabel.appendChild(sidebarStateOptionRtlSpan);
      sidebarStateDiv.appendChild(sidebarStateOptionRtlLabel);


      // Header Skin
      // switcher.appendChild(document.createElement('hr'));
      var headerSkinTitle = document.createElement('h6');
      headerSkinTitle.classList.add('template-switcher__title');
      headerSkinTitle.innerHTML = 'Header Skin';
      switcher.appendChild(headerSkinTitle);

      var headerSkinChange = function(radio) {
        document.body.dataset.headerSkin = radio.value;
      };

      // Header Skin Dark Option
      var headerSkinOptionDarkLabel = document.createElement('label');
      headerSkinOptionDarkLabel.classList.add('template-switcher__radio-label');
      var headerSkinOptionDarkRadio = document.createElement('input');
      headerSkinOptionDarkRadio.classList.add('template-switcher__radio');
      headerSkinOptionDarkRadio.type = 'radio';
      headerSkinOptionDarkRadio.name = 'header-skin';
      headerSkinOptionDarkRadio.value = 'dark';
      headerSkinOptionDarkRadio.checked = document.body.dataset.headerSkin === 'dark';
      radioStyles(headerSkinOptionDarkRadio, headerSkinChange);
      var headerSkinOptionDarkSpan = document.createElement('span');
      headerSkinOptionDarkSpan.classList.add('template-switcher__radio-span');
      headerSkinOptionDarkSpan.innerHTML = 'Dark';
      var headerSkinOptionDarkIcon = document.createElement('i');
      headerSkinOptionDarkIcon.className = "template-switcher__span-icon feather feather-moon";
      headerSkinOptionDarkSpan.insertBefore(headerSkinOptionDarkIcon, headerSkinOptionDarkSpan.firstChild);
      headerSkinOptionDarkLabel.appendChild(headerSkinOptionDarkRadio);
      headerSkinOptionDarkLabel.appendChild(headerSkinOptionDarkSpan);
      switcher.appendChild(headerSkinOptionDarkLabel);


      // Header Skin Light Option
      var headerSkinOptionLightLabel = document.createElement('label');
      headerSkinOptionLightLabel.classList.add('template-switcher__radio-label');
      var headerSkinOptionLightRadio = document.createElement('input');
      headerSkinOptionLightRadio.classList.add('template-switcher__radio');
      headerSkinOptionLightRadio.type = 'radio';
      headerSkinOptionLightRadio.name = 'header-skin';
      headerSkinOptionLightRadio.value = 'light';
      headerSkinOptionLightRadio.checked = document.body.dataset.headerSkin === 'light';
      radioStyles(headerSkinOptionLightRadio, headerSkinChange);
      var headerSkinOptionLightSpan = document.createElement('span');
      headerSkinOptionLightSpan.classList.add('template-switcher__radio-span');
      headerSkinOptionLightSpan.innerHTML = 'Light';
      var headerSkinOptionLightIcon = document.createElement('i');
      headerSkinOptionLightIcon.className = "template-switcher__span-icon feather feather-sun";
      headerSkinOptionLightSpan.insertBefore(headerSkinOptionLightIcon, headerSkinOptionLightSpan.firstChild);
      headerSkinOptionLightLabel.appendChild(headerSkinOptionLightRadio);
      headerSkinOptionLightLabel.appendChild(headerSkinOptionLightSpan);
      switcher.appendChild(headerSkinOptionLightLabel);


      // Sidebar Skin
      // switcher.appendChild(document.createElement('hr'));
      var sidebarSkinTitle = document.createElement('h6');
      sidebarSkinTitle.classList.add('template-switcher__title');
      sidebarSkinTitle.innerHTML = 'Sidebar Skin';
      switcher.appendChild(sidebarSkinTitle);

      var sidebarSkinChange = function(radio) {
        document.body.dataset.sidebarSkin = radio.value;
      };

      // Sidebar Skin Dark Option
      var sidebarSkinOptionDarkLabel = document.createElement('label');
      sidebarSkinOptionDarkLabel.classList.add('template-switcher__radio-label');
      var sidebarSkinOptionDarkRadio = document.createElement('input');
      sidebarSkinOptionDarkRadio.classList.add('template-switcher__radio');
      sidebarSkinOptionDarkRadio.type = 'radio';
      sidebarSkinOptionDarkRadio.name = 'sidebar-skin';
      sidebarSkinOptionDarkRadio.value = 'dark';
      sidebarSkinOptionDarkRadio.checked = document.body.dataset.sidebarSkin === 'dark';
      radioStyles(sidebarSkinOptionDarkRadio, sidebarSkinChange);
      var sidebarSkinOptionDarkSpan = document.createElement('span');
      sidebarSkinOptionDarkSpan.classList.add('template-switcher__radio-span');
      sidebarSkinOptionDarkSpan.innerHTML = 'Dark';
      var sidebarSkinOptionDarkIcon = document.createElement('i');
      sidebarSkinOptionDarkIcon.className = "template-switcher__span-icon feather feather-moon";
      sidebarSkinOptionDarkSpan.insertBefore(sidebarSkinOptionDarkIcon, sidebarSkinOptionDarkSpan.firstChild);
      sidebarSkinOptionDarkLabel.appendChild(sidebarSkinOptionDarkRadio);
      sidebarSkinOptionDarkLabel.appendChild(sidebarSkinOptionDarkSpan);
      switcher.appendChild(sidebarSkinOptionDarkLabel);

      // Sidebar Skin Light Option
      var sidebarSkinOptionLightLabel = document.createElement('label');
      sidebarSkinOptionLightLabel.classList.add('template-switcher__radio-label');
      var sidebarSkinOptionLightRadio = document.createElement('input');
      sidebarSkinOptionLightRadio.classList.add('template-switcher__radio');
      sidebarSkinOptionLightRadio.type = 'radio';
      sidebarSkinOptionLightRadio.name = 'sidebar-skin';
      sidebarSkinOptionLightRadio.value = 'light';
      sidebarSkinOptionLightRadio.checked = document.body.dataset.sidebarSkin === 'light';
      radioStyles(sidebarSkinOptionLightRadio, sidebarSkinChange);
      var sidebarSkinOptionLightSpan = document.createElement('span');
      sidebarSkinOptionLightSpan.classList.add('template-switcher__radio-span');
      sidebarSkinOptionLightSpan.innerHTML = 'Light';
      var sidebarSkinOptionLightIcon = document.createElement('i');
      sidebarSkinOptionLightIcon.className = "template-switcher__span-icon feather feather-sun";
      sidebarSkinOptionLightSpan.insertBefore(sidebarSkinOptionLightIcon, sidebarSkinOptionLightSpan.firstChild);
      sidebarSkinOptionLightLabel.appendChild(sidebarSkinOptionLightRadio);
      sidebarSkinOptionLightLabel.appendChild(sidebarSkinOptionLightSpan);
      switcher.appendChild(sidebarSkinOptionLightLabel);

      // Navbar Brand Skin
      // switcher.appendChild(document.createElement('hr'));
      var navbarBrandSkinTitle = document.createElement('h6');
      navbarBrandSkinTitle.classList.add('template-switcher__title');
      navbarBrandSkinTitle.innerHTML = 'Navbar Brand Skin';
      switcher.appendChild(navbarBrandSkinTitle);

      var navbarBrandSkinChange = function(radio) {
        document.body.dataset.navbarBrandSkin = radio.value;
        var src = 'assets/img/logo-dark.png';
        switch(radio.value) {
          case 'dark':
            src = 'assets/img/logo-white.png';
            break;
          case 'light':
            src = 'assets/img/logo-dark.png';
            break;
        }
        document.getElementsByClassName('logo-expand')[0].src = src;
      };

      // Navbar Brand Skin Dark Option
      var navbarBrandSkinOptionDarkLabel = document.createElement('label');
      navbarBrandSkinOptionDarkLabel.classList.add('template-switcher__radio-label');
      var navbarBrandSkinOptionDarkRadio = document.createElement('input');
      navbarBrandSkinOptionDarkRadio.classList.add('template-switcher__radio');
      navbarBrandSkinOptionDarkRadio.type = 'radio';
      navbarBrandSkinOptionDarkRadio.name = 'navbar-brand-skin';
      navbarBrandSkinOptionDarkRadio.value = 'dark';
      navbarBrandSkinOptionDarkRadio.checked = document.body.dataset.navbarBrandSkin === 'dark';
      radioStyles(navbarBrandSkinOptionDarkRadio, navbarBrandSkinChange);
      var navbarBrandSkinOptionDarkSpan = document.createElement('span');
      navbarBrandSkinOptionDarkSpan.classList.add('template-switcher__radio-span');
      navbarBrandSkinOptionDarkSpan.innerHTML = 'Dark';
      var navbarBrandSkinOptionDarkIcon = document.createElement('i');
      navbarBrandSkinOptionDarkIcon.className = "template-switcher__span-icon feather feather-moon";
      navbarBrandSkinOptionDarkSpan.insertBefore(navbarBrandSkinOptionDarkIcon, navbarBrandSkinOptionDarkSpan.firstChild);
      navbarBrandSkinOptionDarkLabel.appendChild(navbarBrandSkinOptionDarkRadio);
      navbarBrandSkinOptionDarkLabel.appendChild(navbarBrandSkinOptionDarkSpan);
      switcher.appendChild(navbarBrandSkinOptionDarkLabel);

      // Navbar Brand Skin Dark Option
      var navbarBrandSkinOptionLightLabel = document.createElement('label');
      navbarBrandSkinOptionLightLabel.classList.add('template-switcher__radio-label');
      var navbarBrandSkinOptionLightRadio = document.createElement('input');
      navbarBrandSkinOptionLightRadio.classList.add('template-switcher__radio');
      navbarBrandSkinOptionLightRadio.type = 'radio';
      navbarBrandSkinOptionLightRadio.name = 'navbar-brand-skin';
      navbarBrandSkinOptionLightRadio.value = 'light';
      navbarBrandSkinOptionLightRadio.checked = document.body.dataset.navbarBrandSkin === 'light';
      radioStyles(navbarBrandSkinOptionLightRadio, navbarBrandSkinChange);
      var navbarBrandSkinOptionLightSpan = document.createElement('span');
      navbarBrandSkinOptionLightSpan.classList.add('template-switcher__radio-span');
      navbarBrandSkinOptionLightSpan.innerHTML = 'Light';
      var navbarBrandSkinOptionLightIcon = document.createElement('i');
      navbarBrandSkinOptionLightIcon.className = "template-switcher__span-icon feather feather-sun";
      navbarBrandSkinOptionLightSpan.insertBefore(navbarBrandSkinOptionLightIcon, navbarBrandSkinOptionLightSpan.firstChild);
      navbarBrandSkinOptionLightLabel.appendChild(navbarBrandSkinOptionLightRadio);
      navbarBrandSkinOptionLightLabel.appendChild(navbarBrandSkinOptionLightSpan);
      switcher.appendChild(navbarBrandSkinOptionLightLabel);
      
      // Purchase Btn
      // switcher.appendChild(document.createElement('hr'));
      var purchaseBtn = document.createElement('a');
      purchaseBtn.href = 'https://themeforest.net/item/horizon-bootstrap-4-laravel-admin-dashboard-template/23394515';
      purchaseBtn.target = '_blank';
      purchaseBtn.innerHTML = 'Purchase';
      purchaseBtn.classList.add('template-switcher__btn');
      purchaseBtn.classList.add('template-switcher__purchase-btn');
      switcher.appendChild(purchaseBtn);

      
    },
  };
  $(document).ready( function() {
    Custom.init();
  });
})(jQuery);
