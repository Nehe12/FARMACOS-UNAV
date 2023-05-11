var barChartClass;
var interChartClass;
var grupChartClass;
(function ($) {
    $(document).ready(function () {
        /*-------------CANTIDAD DE BIBLIOGRAFIAS POR FARMACO */
        var labels = [];
        var data = [];
        var datos = farmaM;
        // console.log(datos);
        for (let i = 0; i < datos.length; i++) {
            var item = datos[i];
            labels.push(item.far);
            data.push(item.CAN);
        }
        //  console.log("Nombre: "+labels+" Cantidad: "+data);
        const barChart = document.getElementById('myChartbar');
        barChartClass.ChartData(barChart, 'bar', labels, data);
        /*--------------------CANTIDAD DE INTERACCIONES POR FARMACO --------------------- */
        const inter = interM;
        var intLabels = [];
        var intData = [];
        console.log(inter);
        for (let i = 0; i < inter.length; i++) {
            var itemIn = inter[i];
            intLabels.push(itemIn.far);
            intData.push(itemIn.int_can)
        }
        // console.log("Nombre: " + intLabels + " Cantidad: " + intData);
        const lineChart = document.getElementById('myChartline');
        interChartClass.ChartData(lineChart, 'line', intLabels, intData);

        /*---------------- CANTIDAD DE GRUPOS POR FARMACOS ----------------- */

        const grupo = grupoM;
        var grupLabels = [];
        var grupData = [];
        for (let i = 0; i < grupo.length; i++) {
            const itemG = grupo[i];
            grupLabels.push(itemG.grupo);
            grupData.push(itemG.cant_farm);

        }
        //  console.log("Nombre: " + grupLabels + " Cantidad: " + grupData);
        const pieChart = document.getElementById('myChartPie').getContext('2d');
        grupChartClass.ChartData(pieChart, 'pie', grupLabels, grupData)

    });


    barChartClass = {
        ChartData: function (ctx, type, labels, data, item) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,

                    datasets: [{
                        label: item,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                            'rgb(54, 162, 235)'
                        ],
                        data: data
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
    interChartClass = {
        ChartData: function (ctx, type, labels, data, item) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,

                    datasets: [{
                        label: item,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                            'rgb(54, 162, 235)'
                        ],
                        data: data
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
    grupChartClass = {
        ChartData: function (ctx, type, labels, data, item) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,

                    datasets: [{
                        label: labels,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        data: data
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
})(jQuery);
// const ctx = document.getElementById('myChart');

// new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: [
//                 <? php
//                 foreach($farma_repor as $report) {
//                 $report-> grupo;
//     }
//         ?>
//             ],
//     datasets: [{
//         label: 'My First Dataset',
//         data: [11, 16, 7, 3, 14],
//         backgroundColor: [
//             'rgb(255, 99, 132)',
//             'rgb(75, 192, 192)',
//             'rgb(255, 205, 86)',
//             'rgb(201, 203, 207)',
//             'rgb(54, 162, 235)'
//         ]
//     }]
// },
//     options: {
//     scales: {
//         y: {
//             beginAtZero: true
//         }
//     }
// }
//     });
// $.ajax({
//     url: '/obtener',
//     method: 'GET',
//     success: function (response) {
//         console.log(response);
//         var labels = [];
//         var data = [];

//         // Itera sobre los datos obtenidos y crea arrays para las etiquetas y los valores
//         for (var i = 0; i < response.length; i++) {
//             labels.push(response[i].grupo);
//             data.push(response[i].cantidad_farmacos);
//         }
//         console.log(labels);
//         console.log(data);

//         //Crea la grafica
//         const ctx = document.getElementById('myChart').getContext('2d');

//         new Chart(ctx, {
//             type: 'bar',
//             data: {
//                 labels: labels,
//                 datasets: [{
//                     label: 'Grupos',
//                     data: data,
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });

//     }
// });





/*const ctx2 = document.getElementById('myChart2');

new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
            ]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});*/

