<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> APi Weather </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer" />
</head>

 <style type="text/css">
 	 #weather-app {
 	 	position: relative;
 	 }
 	 #weather-app i {
 	 	position: absolute;
 	 	right: 10px;
 	 	top: 17px;
 	 	display: none;
 	 }
 </style>
<body>

 
    <div class="container my-5 text-center">
    	<h2 style="letter-spacing: 2px; font-weight: bold; font-size: 50px;"> Weather App </h2>
    	<form onsubmit="getCity(event)" class="w-50 mx-auto mt-5" id="weather-app">
    		<input type="text" name="weather" id="weather" class="form-control form-control-lg"
    		placeholder="Type City Name ...">

    		<i class="fas fa-spinner fa-spin"></i>
    	
    	</form>
         <h2 class="display-3 text-center" id="temp"></h2>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

     <script type="text/javascript">
     	function getCity(e) {
     		e.preventDefault();
     		let city = document.querySelector('#weather-app input');
     		let url = 'https://api.openweathermap.org/data/2.5/weather?q='+city.value+'&appid=ace66e2223f370a722c60ff544999442&units=metric';
             
             axios.get(url)
             .then((res) => {
                 document.querySelector('#temp').innerHTML = res.data.main.temp;
              }).catch((err) => {
                 document.querySelector('#temp').innerHTML = city.value + 'not Found ';


             });
     		
     	}
     </script>

</body>
</html>