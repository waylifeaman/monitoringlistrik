// GRAFIK INDOR BARU
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("myChart").getContext("2d");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                backgroundColor: 'rgba(0, 0, 255, 0.5)', // Warna biru dengan transparansi
                fill: true
            },
            {
                label: 'Kelembaban',
                data: [],
                backgroundColor: 'rgba(215, 157, 24, 1)', // Warna oranye tanpa transparansi
                fill: true
            }
            ]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data.labels[tooltipItem[0].index];
                    }
                }
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [
                    {
                        display: false, // Menyembunyikan sumbu x
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }
                ],
                yAxes: [
                    {
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }
                ]
            }
        }
    });

    function fetchData() {
        $.ajax({
            url: '/home/fetch-data',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response && Array.isArray(response)) {
                    myChart.data.labels = response.map(function (item) {
                        return item.datetime;
                    });

                    myChart.data.datasets[0].data = response.map(function (item) {
                        return item.suhu_ind;
                    });

                    myChart.data.datasets[1].data = response.map(function (item) {
                        return item.kelembaban_ind;
                    });

                    myChart.update();
                }
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Fetch data initially
    fetchData();

    // Set interval for periodic data updates
    setInterval(fetchData, 10000); // Update every 10 seconds
});



// Cart Pie
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
            window.pieChart = new Chart(document.getElementById("chartjs-dashboard-pie"), {
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



// Grafik Outdor
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("outChart").getContext("2d");
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
    gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

    var gradient1 = ctx.createLinearGradient(0, 0, 0, 225);
    gradient1.addColorStop(0, "rgba(215, 157, 24, 1)");
    gradient1.addColorStop(1, "rgba(215, 227, 24, 0)");

    var gradient2 = ctx.createLinearGradient(0, 0, 0, 225);
    gradient2.addColorStop(0, "#cc0000");
    gradient2.addColorStop(1, "rgba(215, 227, 24, 0)");

    var gradient3 = ctx.createLinearGradient(0, 0, 0, 225);
    gradient3.addColorStop(0, "#99FFCC");
    gradient3.addColorStop(1, "rgba(215, 227, 24, 0)");
    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [],
            datasets: [
                {
                    label: "Suhu",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: "#004c99",
                    data: []
                },
                {
                    label: "Kelembaban",
                    fill: true,
                    backgroundColor: gradient1,
                    borderColor: "#ff8000",
                    data: []
                },
                {
                    label: "Intensitas cahaya",
                    fill: true,
                    backgroundColor: gradient2,
                    borderColor: "#cc0000",
                    data: []
                },
                {
                    label: "Hujan",
                    fill: true,
                    backgroundColor: gradient3,
                    borderColor: "#00ffff",
                    data: []
                },
            ]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data.labels[tooltipItem[0].index];
                    }
                }
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [
                    {
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }
                ],
                yAxes: [
                    {
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }
                ]
            }
        }
    });

    function fetchData() {
        $.ajax({
            url: '/home/fetch-data-outdor',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response && Array.isArray(response)) {
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
                }
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Fetch data initially
    fetchData();

    // Set interval for periodic data updates
    setInterval(fetchData, 10000); // Update every 10 seconds
});