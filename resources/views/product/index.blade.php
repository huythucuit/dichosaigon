<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>RaoVat.Com</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('resources/css/bootstrap.min.css')}}">
  <!-- FontAwsome -->
  <link rel="stylesheet" href="{{asset('resources/css/font-awesome.min.css')}}">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
    body {
      font-family: 'Roboto';
    }

    #left-sidebar,
    #main-content {
      height: 500px;
      border: 1px solid red;
      margin-bottom: 50px;
    }

    #footer {
      text-align: center;
    }

    .navbar-inverse {
      background-color: #ED7D31;
    }

    .navbar-inverse .navbar-nav>li>a {
      color: #222;
    }
  </style>


</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:#222;" class="navbar-brand" href="index">RaoVat.Com</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{route('managepost')}}">Đăng Tin</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{route('managepost')}}">Quản Lý Tin Đăng</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Place your code at here! -->
  <div id="main">
    <div class="container">
      <!-- <form action = "javascript:void(0);" method = "GET"> -->
      <input type="hidden" name="action" value="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm..." name="searchInput" id="searchInput">
        <div class="input-group-btn">
          <button class="btn btn-default" type="button" id="searchButton"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      <!-- </form>	 -->
      <br />
      <!-- Grid system -->
      <div id="search-result" class="row">
        @foreach($products as $product)
        <div class='col-md-4 col-sm-6 col-xs-12 thumbnail'>
          <img class='img-responsive' src="{{asset($product->ImageLink)}}" alt="{{ $product->productName }}">
          <p class='product-name'>{{ $product->ProductName }}</p>
          <p class='product-price'>{{ $product->SalePrice }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div id="footer">
    <div class="container">
      <p>All rights reserved by RaoVat.Com</p>

    </div>
  </div>

  <!-- DO NOT REMOVE THE 2 LINES -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#searchButton").click(function() {
        var searchValue = $("#searchInput").val();

        // Log to the console for debugging
        console.log("Search button clicked. Search value:", searchValue);

        // Nếu người dùng nhấn "OK", thực hiện chuyển hướng
        window.location.href = "{{ route('search') }}?q=" + searchValue;
      });
    });
  </script>
</body>

</html>