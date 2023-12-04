var data1 = {
    datasets: [{
      data: [75, 25],
      backgroundColor: ["transparent", "#FFF"]
    }]
  };

  var data2 = {
    datasets: [{
      data: [60, 40],
      backgroundColor: ["transparent", "#FFF"]
    }]
  };

  var data3 = {
    datasets: [{
      data: [45, 55],
      backgroundColor: ["transparent", "#FFF"]
    }]
  };


  var options = {
    responsive: true,
    maintainAspectRatio: false
  };


  var ctx1 = document.getElementById("forecasting-chart-1").getContext("2d");
  var ctx2 = document.getElementById("forecasting-chart-2").getContext("2d");
  var ctx3 = document.getElementById("forecasting-chart-3").getContext("2d");


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