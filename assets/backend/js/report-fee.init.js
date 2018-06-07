Morris.Area({
    element: 'deposit-area',
    behaveLikeLine: true,
    gridEnabled: false,
    gridLineColor: '#dddddd',
    axes: true,
    fillOpacity:.7,
    data: dataToShow, //var depositStat di page report-customer-deposit 
    lineColors:['#5abcdf'],
    xkey: 'period',
    ykeys: ['Rp'],
    labels: ['Rp'],
    pointSize: 4,
    lineWidth: 1,
    hideHover: 'auto',

});

var data7_1 = dataToShow2;
$(function() {
    $.plot($("#deposit-chart #deposit-container"), [{
        data: data7_1,
        label: "",
        lines: { fill: true }
    	}],
        {
            series: {
                lines: {
                    show: true,
                    fill: false
                },
                points: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: "#ffffff",
                    symbol: "circle",
                    radius: 5
                },
                shadowSize: 0
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#f9f9f9",
                borderWidth: 1,
                borderColor: "#eeeeee"
            },
            colors: ["#65CEA7", "#424F63"],
            tooltip: true,
            tooltipOpts: {
                defaultTheme: false
            },
            xaxis: {
                mode: "time"
			},
            yaxes: [{
                /* First y axis */
            }, {
                /* Second y axis */
                position: "right" /* left or right */
            }]
        }
    );
});