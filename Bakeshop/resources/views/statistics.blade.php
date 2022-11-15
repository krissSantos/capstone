<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>JS CRASH COURSE</title>
    <script src=""></script>
    
    
</head>
<body>
    <header>
        
        <div style="width: 1000px ">
            <canvas id="myChart"></canvas>
        </div>
        <script>
           
           let labels = [@foreach($products as $product) "{{$product->product_name}}",
            @endforeach]
            let data = {
            labels: labels,
            datasets: [{
                label: 'Entries',
                data : [@foreach($products as $product){{$product->stock}},@endforeach],
                
                                    backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                
                };
                const config = {
                    type: 'bar',
                    data,
                    options: {
                        indexAxis: 'y',
                    }
                    };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            </script>
           
    </header>
</body>
</html>