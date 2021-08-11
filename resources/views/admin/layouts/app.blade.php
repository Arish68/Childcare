<!DOCTYPE html>
<html>
<head>
	<title>Child Care</title>
	
	@include('admin.layouts.css-files')

</head>
<body style="background-color: #F1F1F1;">

	@include('admin.layouts.sidebar')

	@include('admin.layouts.navbar')

	@section('main-content')
        
	@show

	@include('admin.layouts.js-files')
    
</body>
</html>