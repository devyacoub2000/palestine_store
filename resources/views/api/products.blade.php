<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> APi Products </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

 
    <div class="container">
    	<h2 class="mt-5"> Products From APi</h2>
   
    <table class="table mt-5">
    	 <tr>
    	 	<th>#</th>
    	 	<th>Name</th>
    	 	<th>Price</th>
    	 	<th>Rating</th>
    	 	<th>Photo</th>
    	 </tr>
    	  @foreach($products as $product) 
    	    <tr>
    	    	<td> {{ $product['id']}}</td>
    	    	<td> {{ $product['title']}}</td>
    	    	<td> {{ $product['price']}} $</td>
    	    	<td> {{ $product['rating']}} </td>
    	    	<td> <img width="90px" src="{{ $product['thumbnail']}}"></td>
    	    </tr>
    	  @endforeach
    	 
    </table>
    </div>

</body>
</html>