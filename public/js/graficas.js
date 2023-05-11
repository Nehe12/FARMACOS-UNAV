var sampleChartClass;
(function ($) {
    $(document).ready(function () {
         var labels = [];
         var data = [];
         var datos = farmaM;
         console.log(datos);
         for (let i = 0; i < datos.length; i++) {
             var item = datos[i];
             labels.push(item.far);
             data.push(item.CAN) ;           
         }
       
         console.log("Nombre: "+labels+" Cantidad: "+data);

        const barChart = document.getElementById('myChart');
        sampleChartClass.ChartData(barChart, 'bar',labels,data);
        const pieChart = document.getElementById('myChart2');
        sampleChartClass.ChartData(pieChart, 'line',labels,data);
    });

    sampleChartClass = {
        ChartData: function (ctx, type, labels, data,item) {
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
                        data:data
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

