<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		<title>Time Control Dashboard</title>
		
		<!-- Fav Icon -->
		<link rel="icon" href="{{ asset('img/favicon.png') }}">
		
		<!-- NFTMax Stylesheet -->
        @vite([
            'resources/css/bootstrap.css',
            'resources/css/font-awesome.css',
            'resources/css/reset.css',
            'resources/css/style.css',
            ])
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">


		{{-- <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
		{{-- <link rel="stylesheet" href="css/font-awesome-all.min.css"> --}}
		{{-- <link rel="stylesheet" href="css/charts.min.css"> --}}
		{{-- <link rel="stylesheet" href="css/slickslider.min.css"> --}}
		{{-- <link rel="stylesheet" href="css/reset.css"> --}}
		{{-- <link rel="stylesheet" href="style.css"> --}}

        @yield('styles')
		
	</head>
	<body>
	
        <div class="body-bg" style="background-image:url('{{ asset('img/body-bg.jpg') }}')">
            @include('layouts.sidebar-menu')
            @include('layouts.header')
            <section class="nftmax-adashboard nftmax-show">
                <div class="container">
                    <div class="row">	
                        <div class="col-xxl-9 col-12 nftmax-main__column">
                            <div class="nftmax-body">
                                <!-- Dashboard Inner -->
                                <div class="nftmax-dsinner">
                                    @yield('content')
                                </div>
                                <!-- End Dashboard Inner -->
                            </div>
                        </div>
                        @include('layouts.sidebar')
                    </div>	
                </div>	
            </section>	

        </div>

		
    <!-- Jquery JS -->
    
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate.js') }}"></script>
    <script src="{{ asset('js/slickslider.min.js') }}"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/countdown.min.js') }}"></script>
    <script src="{{ asset('js/final-countdown.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>


    document.addEventListener('DOMContentLoaded', function() {
        
        
        
        
        const ctx_side_two = document.getElementById('myChart_Side_One').getContext('2d');
        const myChart_Side_One = new Chart(ctx_side_two, {
            type: 'doughnut',
            
            data: {
                labels: [
                    'Total Sold',
                    'Total Cancel',
                    'Total Cancel',
                    'Total Planding'
                  ],
                  datasets: [{
                    label: 'My First Dataset',
                    data: [16, 16, 16, 30],
                    backgroundColor: [
                      '#5356FB',
                      '#F539F8',
                      '#FFC210',
                      '#E3E4FE'
                    ],
                    hoverOffset: 2,
                    borderWidth: 0,
                  }]
            },
            
             options: {
             
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                    display: false,
                  },
                  title: {
                    display: false,
                    text: 'Sell History'
                  }
                }
            }
            
        });
        
        

    });
    </script>
   

    @yield('scripts')
	
    @include('layouts.notifications')
    
</body>
</html>