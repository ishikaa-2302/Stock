var xmlhttp = new XMLHttpRequest();
var url = "http://localhost/NORTHERN TRUST/js/stock.json";
xmlhttp.open("GET",url,true);
xmlhttp.send();
xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    var data = JSON.parse(this.responseText);
    //console.log(data);
    var close = data.stock_data.map(function(element){
      return element.close;
    });
    //console.log(months)
    var high = data.stock_data.map(function(element){
      return element.high;
    });

    var low = data.stock_data.map(function(element){
      return element.open;
    });

    var open = data.stock_data.map(function(element){
      return element.open;
    });

    var symbol = data.stock_data.map(function(element){
      return element.symbol;
    });

    var volume = data.stock_data.map(function(element){
      return element.volume;
    });

    var date = data.stock_data.map(function(element){
      return element.date;
    });

    var ctx = document.getElementById('canvas').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: date,
            datasets: [{
                label: 'close',
                data: close,
                backgroundColor: 'transparent',
                borderColor: 'red',
                borderWidth: 4
            },
            {
              label: 'high',
              data: high,
              backgroundColor: 'transparent',
              borderColor: 'yellow',
              borderWidth: 4
            },
            {
              label: 'low',
              data: low,
              backgroundColor: 'transparent',
              borderColor: 'blue',
              borderWidth: 4
            },
            {
              label: 'open',
              data: open,
              backgroundColor: 'transparent',
              borderColor: 'orange',
              borderWidth: 4
            },
            //{
              //label: 'symbol',
              //data: symbol,
              //backgroundColor: 'transparent',
              //borderColor: 'purple',
              //borderWidth: 4
            //},
            {
                label: 'volume',
                data: volume,
                backgroundColor: 'transparent',
                borderColor: 'green',
                borderWidth: 4
            },
          ]
        },
        options: {
          elements:{
            line:{
              tension:0
            }
          },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  }
}

//delete here
