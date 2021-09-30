(function(window, document, $, undefined) {
    "use strict";
    $(function() {
        $('#morris_area').resize(function () { bar.redraw(); });

        if ($('#morris_area').length) {
            // Use Morris.Area instead of Morris.Line
            Morris.Area({
                element: 'morris_area',
                // behaveLikeLine: true,
                data: [
                    { x: '6', y: 1, z: 20 },
                    { x: '7', y: 2, z: 1 },
                    { x: '8', y: 3, z: 3 },
                    { x: '9', y: 4, z: 3 },
                    { x: '10', y: 5, z: 1 },
                    { x: '11', y: 6, z: 3 },
                    { x: '12', y: 7, z: 1 },
                    { x: '13', y: 8, z: 3 },
                    { x: '14', y: 9, z: 3 },
                    { x: '15', y: 10, z: 3 },
                    { x: '16', y: 11, z: 3 },
                    { x: '17', y: 12, z: 3 },
                    { x: '18', y: 13, z: 3 },
                    { x: '19', y: 14, z: 3 },
                    { x: '20', y: 15, z: 3 },
                    { x: '21', y: 16, z: 3 },
                    { x: '22', y: 17, z: 3 },
                ],
                xkey: 'x',
                ykeys: ['y', 'z'],
                labels: ['هدف اول', 'هدف دوم'],
                zeroLineBorderDash: ['1px'],
                lineColors: ['#ffa822', '#134e6f'],
                resize: true,
                gridTextSize: '14px'
            });
        }



        if ($('#morris_area2').length) {
            // Use Morris.Area instead of Morris.Line
            Morris.Area({
                element: 'morris_area2',
                // behaveLikeLine: true,
                data: [
                    { x: '1', y: 5, z: 7 },
                    { x: '2', y: 8, z: 10 },
                    { x: '3', y: 5, z: 7 },
                    { x: '4', y: 8, z: 10 },
                    { x: '5', y: 5, z: 7 },
                    { x: '6', y: 8, z: 10 },
                    { x: '7', y: 5, z: 7 },
                    { x: '8', y: 8, z: 10 }
                ],
                xkey: 'x',
                pointSize:0,
                hideHover:'always',
                ykeys: ['y', 'z'],
                labels: ['هدف اول', 'هدف دوم'],
                // zeroLineBorderDash: ['1px'],
                lineColors: ['rgba(94, 114, 228,0.4)', 'rgba(94, 114, 228,0.8)'],
                resize: true,
                axes: false,
                grid: false,
                gridTextSize: '14px'
            });
        }

        if ($('#chartNum1').length) {
            // Use Morris.Area instead of Morris.Line
            Morris.Area({
                element: 'chartNum1',
                // behaveLikeLine: true,
                data: [
                    { x: '1', y: 5, z: 6 },
                    { x: '2', y: 7, z: 8 },
                    { x: '3', y: 5, z: 6 },
                    { x: '4', y: 7, z: 8 },
                    { x: '5', y: 5, z: 6 },
                    { x: '6', y: 7, z: 8 },
                    { x: '7', y: 5, z: 6 },
                    { x: '8', y: 7, z: 8 }
                ],
                xkey: 'x',
                pointSize:0,
                hideHover:'always',
                ykeys: ['y', 'z'],
                labels: ['هدف اول', 'هدف دوم'],
                // zeroLineBorderDash: ['1px'],
                lineColors: ['#ffa822', '#134e6f'],
                resize: true,
                gridTextSize: '14px',
                // axis_x:false,
                // axis_y:false,
                axes: ['x','y']
            });
        }



        if ($('#morris_line').length) {
            // Use Morris.Area instead of Morris.Line
            Morris.Line({
                element: 'morris_line',
                behaveLikeLine: true,
                data: [
                    { y: '6', a: 10, b: 20, c: 29 },
                    { y: '7', a: 65, b: 45, c: 50 },
                    { y: '8', a: 50, b: 40, c: 44 },
                    { y: '9', a: 75, b: 65, c: 60 },
                    { y: '10', a: 50, b: 40, c: 24 },
                    { y: '11', a: 75, b: 65, c: 36 },
                    { y: '10', a: 50, b: 40, c: 24 },
                    { y: '11', a: 75, b: 65, c: 36 },
                    { y: '10', a: 50, b: 40, c: 24 },
                    { y: '11', a: 75, b: 65, c: 36 },
                    { y: '10', a: 50, b: 40, c: 24 },
                    { y: '11', a: 75, b: 65, c: 36 },
                    { y: '10', a: 50, b: 40, c: 24 },
                    { y: '11', a: 75, b: 65, c: 36 },
                    { y: '12', a: 100, b: 90, c: 80 }
                ],

                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['هدف اول', 'هدف دوم', 'هدف سوم'],
                lineColors: ['#ffa822', '#134e6f','#1ac0c6'],
                resize: true,
                gridTextSize: '14px'
            });

        }



        if ($('#morris_bar').length) {
            Morris.Bar({
                element: 'morris_bar',
                data: [
                    { x: '1-1398', y: 0 },
                    { x: '2-1398', y: 1 },
                    { x: '3-1398', y: 6 },
                    { x: '4-1398', y: 3 },
                    { x: 'َ5-1398', y: 4 },
                    { x: '6-1398', y: 3 },
                    { x: '7-1398', y: 9 },
                    { x: '8-1398', y: 5 },
                    { x: '9-1398', y: 9 }
                ],
                xkey: 'x',
                ykeys: ['y'],
                labels: ['خطوط فعال'],
                barColors: ['#ffa822'],
                resize: true,
                gridTextSize: '14px'

            });
        }



        if ($('#morris_bar2').length) {
            Morris.Bar({
                element: 'morris_bar2',
                data: [
                    { x: '1-1398', y: 0 },
                    { x: '2-1398', y: 1 },
                    { x: '3-1398', y: 6 },
                    { x: '4-1398', y: 3 },
                    { x: 'َ5-1398', y: 4 },
                    { x: '6-1398', y: 3 },
                    { x: '7-1398', y: 9 },
                    { x: '8-1398', y: 5 },
                    { x: '9-1398', y: 9 }
                ],
                xkey: 'x',
                ykeys: ['y'],
                labels: ['خطوط فعال'],
                barColors: ['rgba(255, 255, 255, 0.423)'],
                resize: true,
                gridTextSize: '14px'

            });
        }




        if ($('#morris_stacked').length) {
            // Use Morris.Bar
            Morris.Bar({
                element: 'morris_stacked',
                data: [
                    { x: '1398 اردیبهشت', y: 5, z: 2, a: 3 },
                    { x: '1398 خرداد', y: 1, z: 2, a: 1 },
                    { x: '1398 تیر', y: 8, z: null, a: 3 },
                    { x: '1398 مرداد', y: 3, z: 2, a: 1 },
                    { x: '1398 شهریور', y: 3, z: 2, a: 3 },
                    { x: '1398 مهر', y: 2, z: null, a: 1 },
                    { x: '1398 آبان', y: 0, z: 2, a: 4 },
                    { x: '1398 آذر', y: 2, z: 4, a: 3 }
                ],
                xkey: 'x',
                ykeys: ['y', 'z', 'a'],
                labels: ['هدف سوم', 'هدف دوم', 'هدف اول'],
                stacked: true,
                lineColors: ['#ffa822', '#134e6f','#1ac0c6'],
                barColors: ['#ffa822', '#134e6f','#1ac0c6'],
                resize: true,
                gridTextSize: '14px'
            });
        }


        if ($('#morris_stacked2').length) {
            // Use Morris.Bar
            Morris.Bar({
                element: 'morris_stacked2',
                data: [
                    { x: '1398 اردیبهشت', y: 5, z: 2, a: 3 },
                    { x: '1398 خرداد', y: 1, z: 2, a: 1 },
                    { x: '1398 تیر', y: 8, z: null, a: 3 },
                    { x: '1398 مرداد', y: 3, z: 2, a: 1 },
                    { x: '1398 شهریور', y: 3, z: 2, a: 3 },
                    { x: '1398 مهر', y: 2, z: null, a: 1 },
                    { x: '1398 آبان', y: 0, z: 2, a: 4 },
                    { x: '1398 آذر', y: 2, z: 4, a: 3 }
                ],
                xAxis:{visible:false},
                verticalGridType:"." ,
                xkey: 'x',
                ykeys: ['y', 'z', 'a'],
                labels: ['هدف سوم', 'هدف دوم', 'هدف اول'],
                stacked: true,
                lineColors: ['#ffa822', '#134e6f','#1ac0c6'],
                barColors: ['#ffa822', '#134e6f','#1ac0c6'],
                resize: true,
                gridTextSize: '14px'
            });
        }


        if ($('#morris_udateing').length) {
            let nReloads = 0;

            function data(offset) {
                let ret = [];
                for (let x = 0; x <= 360; x += 10) {
                    let v = (offset + x) % 360;
                    ret.push({
                        x: x,
                        y: Math.sin(Math.PI * v / 90).toFixed(4),
                        z: Math.cos(Math.PI * v / 180).toFixed(4)
                    });
                }
                return ret;
            }
            let graph = Morris.Line({
                element: 'morris_udateing',
                data: data(0),
                xkey: 'x',
                ykeys: ['y', 'z'],
                labels: ['حد پایین', 'حد بالا'],
                parseTime: false,
                ymin: -1.0,
                ymax: 1.0,
                hideHover: true,
                lineColors: ['#ffa822', '#1ac0c6'],
                resize: true
            });

            function update() {
                nReloads++;
                graph.setData(data(5 * nReloads));
                $('#reloadStatus').text(nReloads + ' reloads');
            }
            setInterval(update, 100);
        }


        if ($('#morris_donut').length) {
            Morris.Donut({
                element: 'morris_donut',
                data: [
                    { value: 70, label: 'انجام شده' },
                    { value: 15, label: 'با تاخیر انجام شده' },
                    { value: 10, label: 'انجام نشده' },
                    { value: 5, label: 'لغو شده' }
                ],

                labelColor: '#2e2f39',
                gridTextSize: '14px',
                colors: [
                    '#ffa822',
                    '#1ac0c6',
                    '#134e6f',
                    '#dee0e6'
                ],

                formatter: function(x) { return x + "%" },
                resize: true
            });
        }

        if ($('#chartNum2').length) {
            Morris.Donut({
                element: 'chartNum2',
                data: [
                    { value: 70, label: 'انجام شده' },
                    { value: 15, label: 'با تاخیر انجام شده' },
                    { value: 10, label: 'انجام نشده' },
                    { value: 5, label: 'لغو شده' }
                ],
                labelColor: '#2e2f39',
                gridTextSize: '14px',
                colors: [
                    '#ffa822',
                    '#1ac0c6',
                    '#134e6f',
                    '#dee0e6'
                ],

                formatter: function(x) { return x + "%" },
                resize: true
            });
        }





    });

})(window, document, window.jQuery);
