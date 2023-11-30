// Data untuk masing-masing chart (sesuai persentase yang diinginkan)
var data1 = {
    labels: ["Suhu"],
    datasets: [{
      data: [75, 25], // 75 untuk yang ditampilkan, 25 untuk bagian dalam
      backgroundColor: ["#3AB46A", "transparent"]
    }]
  };

  var data2 = {
    labels: ["Kelembaban"],
    datasets: [{
      data: [60, 40], // 60 untuk yang ditampilkan, 40 untuk bagian dalam
      backgroundColor: ["#3AB46A", "transparent"]
    }]
  };

  var data3 = {
    labels: ["Amonia"],
    datasets: [{
      data: [45, 55], // 45 untuk yang ditampilkan, 55 untuk bagian dalam
      backgroundColor: ["#3AB46A", "transparent"]
    }]
  };

  // Opsi untuk semua chart tanpa cutoutPercentage
  var options = {
    responsive: true,
    maintainAspectRatio: false
  };

  // Seleksi canvas untuk masing-masing chart
  var ctx1 = document.getElementById("forecasting-chart-1").getContext("2d");
  var ctx2 = document.getElementById("forecasting-chart-2").getContext("2d");
  var ctx3 = document.getElementById("forecasting-chart-3").getContext("2d");

  // Buat doughnut chart untuk masing-masing canvas tanpa cutoutPercentage
  var myDoughnutChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data1,
    options: options
  });

  var myDoughnutChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: data2,
    options: options
  });

  var myDoughnutChart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: data3,
    options: options
  });