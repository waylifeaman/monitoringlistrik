$(document).ready(function () {
    $('#example').DataTable({
        pageLength: 15,
        pagingType: 'full_numbers',
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});


$(document).ready(function () {
    var ctx = document.getElementById('indorChart-lasthour').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function indorlasthour() {
        $.get('home/indor-last-hour', function (response) {
            myChart.data.labels = response.map(function (item) {
                // Mengubah format waktu menjadi jam saja
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.suhu_ind;
            });

            myChart.data.datasets[1].data = response.map(function (item) {
                return item.kelembaban_ind;
            });

            myChart.update();
        });
    }

    setInterval(indorlasthour, 1000);

    indorlasthour();
});
$(document).ready(function () {
    var ctx = document.getElementById('indorChart-lastday').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function indorlastday() {
        $.get('home/indor-last-day', function (response) {
            myChart.data.labels = response.map(function (item) {
                // Mengubah format waktu menjadi jam saja
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.suhu_ind;
            });

            myChart.data.datasets[1].data = response.map(function (item) {
                return item.kelembaban_ind;
            });

            myChart.update();
        });
    }

    setInterval(indorlastday, 1000);

    indorlastday();
});
$(document).ready(function () {
    var ctx = document.getElementById('indorChart-lastmoun').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function indorlastmoun() {
        $.get('home/indor-last-moun', function (response) {
            myChart.data.labels = response.map(function (item) {
                // Mengubah format waktu menjadi jam saja
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.suhu_ind;
            });

            myChart.data.datasets[1].data = response.map(function (item) {
                return item.kelembaban_ind;
            });

            myChart.update();
        });
    }

    setInterval(indorlastmoun, 1000);

    indorlastmoun();
});
document.addEventListener("DOMContentLoaded", function () {
    // Function to create or update the chart
    function createOrUpdateChart(suhu, kelembaban) {
        // Check if the chart exists
        if (window.pieChart) {
            // Update the existing chart
            window.pieChart.data.datasets[0].data = [kelembaban, suhu];
            window.pieChart.update();
        } else {
            // Create a new chart
            window.pieChart = new Chart(document.getElementById("pie-indor"), {
                type: "pie",
                data: {
                    labels: ["Kelembaban", "Suhu"],
                    datasets: [{
                        data: [kelembaban, suhu],
                        backgroundColor: [
                            window.theme.warning,
                            window.theme.primary
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        }
    }

    // Function to fetch and update data periodically
    function fetchDataPie() {
        $.ajax({
            url: '/home/fetch-data-pie',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response) {
                    const suhu = response.suhu_ind;
                    const kelembaban = response.kelembaban_ind;
                    createOrUpdateChart(suhu, kelembaban);
                }
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Fetch data initially
    fetchDataPie();

    // Set interval for periodic data updates
    setInterval(fetchDataPie, 10000);
});

// END INDOR

// OUTDOR
$(document).ready(function () {
    var ctx = document.getElementById('outChart-lasthour').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            },
            {
                label: 'Intensitas Cahaya',
                data: [],
                backgroundColor: '#e0301e',
                fill: true
            },
            {
                label: 'Kondisi Cuaca',
                data: [],
                backgroundColor: '#339900',

                fill: true
            },
                // {
                //     label: 'Kecepatan Angin',
                //     data: [],
                //     backgroundColor: '#232457',

                //     fill: true
                // },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataOutdorlasthour() {
        $.get('/home/fetch-data-outdor-lasthour', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.suhu_out;
            });

            myChart.data.datasets[1].data = response.map(function (item) {
                return item.kelembaban_out;
            });

            myChart.data.datasets[2].data = response.map(function (item) {
                return item.intens_cahaya;
            });

            myChart.data.datasets[3].data = response.map(function (item) {
                return item.hujan;
            });
            // myChart.data.datasets[4].data = response.map(function (item) {
            //     return item.kec_angin;
            // });

            myChart.update();
        });
    }
    // function fetchDataOutdorlasthour() {
    //     $.get('/home/fetch-data-outdor-lasthour', function (response) {
    //         myChart.data.labels = response.map(item => item.datetime);
    //         myChart.data.datasets[0].data = response.map(item => item.suhu_out);
    //         myChart.data.datasets[1].data = response.map(item => item.kelembaban_out);
    //         myChart.data.datasets[2].data = response.map(item => item.intens_cahaya);
    //         myChart.data.datasets[3].data = response.map(item => item.dataAngin.kec_angin);
    //         myChart.update();
    //     });
    // }

    setInterval(fetchDataOutdorlasthour, 1000);

    fetchDataOutdorlasthour();
});
$(document).ready(function () {
    var ctx = document.getElementById('outChart-lastday').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            },
            {
                label: 'Intensitas Cahaya',
                data: [],
                backgroundColor: '#e0301e',
                fill: true
            },
            {
                label: 'Kecepatan Angin',
                data: [],
                backgroundColor: '#339900',

                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataOutdorlastday() {
        $.get('/home/fetch-data-outdor-lastday', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.suhu_out;
            });

            myChart.data.datasets[1].data = response.map(function (item) {
                return item.kelembaban_out;
            });

            myChart.data.datasets[2].data = response.map(function (item) {
                return item.intens_cahaya;
            });

            myChart.data.datasets[3].data = response.map(function (item) {
                return item.hujan;
            });

            myChart.update();
        });
    }

    setInterval(fetchDataOutdorlastday, 1000);

    fetchDataOutdorlastday();
});
$(document).ready(function () {
    var ctx = document.getElementById('outChart-lastmoun').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            },
            {
                label: 'Intensitas Cahaya',
                data: [],
                backgroundColor: '#e0301e',
                fill: true
            },
            {
                label: 'Kecepatan Angin',
                data: [],
                backgroundColor: '#339900',

                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataOutdorlastmoun() {
        $.get('/home/fetch-data-outdor-lastmoun', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.suhu_out;
            });

            myChart.data.datasets[1].data = response.map(function (item) {
                return item.kelembaban_out;
            });

            myChart.data.datasets[2].data = response.map(function (item) {
                return item.intens_cahaya;
            });

            myChart.data.datasets[3].data = response.map(function (item) {
                return item.hujan;
            });

            myChart.update();
        });
    }

    setInterval(fetchDataOutdorlastmoun, 1000);

    fetchDataOutdorlastmoun();
});
// END OUTDOR

// Start Listrik
$(document).ready(function () {
    var ctx = document.getElementById('listrikChart-lasthour').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Daya Terpakai',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Sisa Daya',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataListriklasthour() {
        $.get('/home/fetch-data-listrik-lasthour', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.daya_total;
            });
            myChart.data.datasets[1].data = response.map(function (item) {
                return item.sisa_daya;
            });
            myChart.update();
        });
    }

    setInterval(fetchDataListriklasthour, 1000);

    fetchDataListriklasthour();
});
$(document).ready(function () {
    var ctx = document.getElementById('listrikChart-lastday').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Daya Terpakai',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Sisa Daya',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataListriklastday() {
        $.get('/home/fetch-data-listrik-lastday', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.daya_total;
            });
            myChart.data.datasets[1].data = response.map(function (item) {
                return item.sisa_daya;
            });
            myChart.update();
        });
    }

    setInterval(fetchDataListriklastday, 1000);

    fetchDataListriklastday();
});
$(document).ready(function () {
    var ctx = document.getElementById('listrikChart-lastmoun').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Daya Terpakai',
                data: [],
                backgroundColor: '#ffcc00', // Warna merah dengan transparansi
                fill: true
            },
            {
                label: 'Sisa Daya',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataListriklastmoun() {
        $.get('/home/fetch-data-listrik-lastmoun', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.daya_total;
            });
            myChart.data.datasets[1].data = response.map(function (item) {
                return item.sisa_daya;
            });
            myChart.update();
        });
    }

    setInterval(fetchDataListriklastmoun, 1000);

    fetchDataListriklastmoun();
});

document.addEventListener("DOMContentLoaded", function () {
    // Function to create or update the chart
    function createOrUpdateChart(dayaTerpakai, sisaDaya) {
        // Check if the chart exists
        if (window.pieChartsatu) {
            // Update the existing chart
            window.pieChartsatu.data.datasets[0].data = [sisaDaya, dayaTerpakai];
            window.pieChartsatu.update();
        } else {
            // Create a new chart
            window.pieChartsatu = new Chart(document.getElementById("pielistrik"), {
                type: "pie",
                data: {
                    labels: ["Sisa Daya", "Daya Terpakai"],
                    datasets: [{
                        data: [sisaDaya, dayaTerpakai],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        }
    }

    // Function to fetch and update data periodically
    function fetchDataPieListrik() {
        $.ajax({
            url: '/home/fetch-data-pielistrik',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response) {
                    const dayaTerpakai = response.daya_total;
                    const sisaDaya = response.sisa_daya;
                    createOrUpdateChart(dayaTerpakai, sisaDaya);
                }
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Fetch data initially
    fetchDataPieListrik();

    // Set interval for periodic data updates
    setInterval(fetchDataPieListrik, 10000);
});

// End Listrik

//Start Angin

$(document).ready(function () {
    var ctx = document.getElementById('anginChart-lasthour').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Kecepatan Angin',
                data: [],
                backgroundColor: '#232457', // Warna merah dengan transparansi
                fill: true
            },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataanginlasthour() {
        $.get('/home/fetch-data-angin-lasthour', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.kec_angin;
            });
            myChart.update();
        });
    }

    setInterval(fetchDataanginlasthour, 1000);

    fetchDataanginlasthour();
});
$(document).ready(function () {
    var ctx = document.getElementById('anginChart-lastday').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Kecepatan Angin',
                data: [],
                backgroundColor: '#232457', // Warna merah dengan transparansi
                fill: true
            },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataanginlastday() {
        $.get('/home/fetch-data-angin-lastday', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.kec_angin;
            });
            myChart.update();
        });
    }

    setInterval(fetchDataanginlastday, 1000);

    fetchDataanginlastday();
});
$(document).ready(function () {
    var ctx = document.getElementById('anginChart-lastmoun').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Kecepatan Angin',
                data: [],
                backgroundColor: '#232457', // Warna merah dengan transparansi
                fill: true
            },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            animation: {
                duration: 5
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                    }
                ],
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function fetchDataanginlastmoun() {
        $.get('/home/fetch-data-angin-lastmoun', function (response) {
            myChart.data.labels = response.map(function (item) {
                return item.datetime;
            });

            myChart.data.datasets[0].data = response.map(function (item) {
                return item.kec_angin;
            });
            myChart.update();
        });
    }

    setInterval(fetchDataanginlastmoun, 1000);

    fetchDataanginlastmoun();
});





