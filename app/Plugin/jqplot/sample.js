/**
 * Created by suguruoki on 2017/02/14.
 */
$(document).ready(function() {
    //パーセンテージを表す積み重ね棒グラフの変数
    var p1 = [67, 50, 58, 40, 35, 33, 38, 2.76497];　//0%
    var p2 = [7, 5, 3, 9, 12, 12, 10, 7.83410];　　　　//1～10%
    var p3 = [2, 3, 5, 6, 8, 6, 8, 9.67741];　　　　　　　//11～20%
    var p4 = [1, 7, 2, 7, 10, 8, 10, 12.90322];　　　　//21～30%
    var p5 = [2, 6, 7, 12, 11, 14, 9, 16.12903];　　　//31～40%
    var p6 = [7, 5, 3, 4, 5, 2, 4, 13.82488];　　　　　　//41～50%
    var p7 = [2, 3, 5, 3, 3, 4, 4, 11.98156];　　　　　　//51～60%
    var p8 = [1, 7, 2, 4, 4, 3, 6, 9.67741];　　　　　　　//61～70%
    var p9 = [2, 6, 7, 9, 7, 9, 4, 6.45161];　　　　　　　//71～80%
    var p10 = [7, 5, 3, 5, 4, 4, 4, 5.52995];　　　　　　//81～90%
    var p11 = [2, 3, 5, 1, 1, 5, 3, 3.22580];　　　　　　//91～100%
    //日付ごとのユーザー数を表す線グラフの変数
    var sumUser = [
        [1, 40],
        [2, 21],
        [3, 820],
        [4, 60],
        [5, 80],
        [6, 90],
        [7, 100],
        [8, 110]
    ];

    // chart data 積み重ね棒グラフの継続率分布
    var dataArray = [
        p1,
        p2,
        p3,
        p4,
        p5,
        p6,
        p7,
        p8,
        p9,
        p10,
        p11,
        sumUser
    ];

    // x-axis ticks 登録日
    var xticks = [
        '12月',
        '1月',
        '02-01',
        '02-02',
        '02-03',
        '02-04',
        '02-05',
        '02-06'
    ];
    // x2-axis ticks 登録日ごとの継続率
    var x2ticks = [
        '12.65%',
        '9.82%',
        '7.65%',
        '9.2%',
        '8.4675%',
        '11.2525%',
        '12.5678%',
        '14.5432%'
    ];

    // chart rendering options
    var options = {
        stackSeries: true,
        title: '継続率',
        cursor: {
            show: true,
            zoom: false,
            looseZoom: false,
            showTooltip: false
        },
        legend: {
            show: true,
            location: 'ne',
            placement: 'outsideGrid'
        },
        series: [
            {label: '0%', useNegativeColors: false},
            {label: '1～10%', useNegativeColors: false},
            {label: '11～20%', useNegativeColors: false},
            {label: '21～30%', useNegativeColors: false},
            {label: '31～40%', useNegativeColors: false},
            {label: '41～50%', useNegativeColors: false},
            {label: '51～60%', useNegativeColors: false},
            {label: '61～70%', useNegativeColors: false},
            {label: '71～80%', useNegativeColors: false},
            {label: '81～90%', useNegativeColors: false},
            {label: '91～100%', useNegativeColors: false},
            {
                label: '登録者数',
                disableStack : true,
                renderer: jQuery.jqplot.LineRenderer,
                lineWidth: 2,
                pointLabels: {
                    show: false
                },
                color: '#FF7D7D',
                markerOptions: {
                    size: 5, color: 'red'
                },
                xaxis: 'x2axis', yaxis: 'y2axis'
            }
        ],
        seriesDefaults: {
            renderer:jQuery.jqplot.BarRenderer,
            rendererOptions: {
                barWidth: 35,
                shadowAlpha: 0.03,
                fillToZero: true,
                highlightMouseOver: false
            },
            pointLabels: {show: true}
        },
        axes: {
            xaxis: {
                label:"日付",
                renderer: jQuery.jqplot.CategoryAxisRenderer,
                labelOptions: {
                    fontSize: '20pt'
                },
                ticks: xticks
            },
            x2axis: {
                label:"継続率(%)",
                renderer: jQuery.jqplot.CategoryAxisRenderer,
                labelOptions: {
                    fontSize: '20pt'
                },
                ticks: x2ticks
            },
            yaxis: {
                label:"継\n続\n率\n分\n布\n(%)",
                labelOptions: {
                    fontSize: '20pt'
                },
                tickOptions: {
                    formatString: '%.2f%'
                },
                min: 0,
                max: 100,
                numberTicks:11
            },
            y2axis: {
                label:"登\n録\n者\n数",
                labelOptions: {
                    fontSize: '20pt'
                },
                tickOptions: {
                    formatString: '%d人'
                },
                min: 0
            }
        },
        highlighter: {
            show: true,
            showLabel: true,
            tooltipAxes: 'y',
            sizeAdjust: 7.5 ,
            tooltipLocation : 'ne'
        }
    };

    jQuery.jqplot('graph', dataArray, options);
});