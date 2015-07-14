<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Account Management </title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/freelancer.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        $(document).ready(function() {
            var income = document.getElementById("income").value;
            var expend = document.getElementById("expend").value;
            var total = income - expend;
            document.getElementById("total").appendChild(document.createTextNode(total + ' $'));
        });
    </script>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top">Welcome, {{ Auth::user()->name }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="/addIncome">Income</a>
                </li>
                <li class="page-scroll">
                    <a href="/addExpend">Expend</a>
                </li>
                <li class="page-scroll">
                    <a href="/logout">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="intro-text">
                <span class="name">Your Current Money For This Month</span>
                <hr class="star-light">
            </div>
            <div class="table-responsive col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                   </thead>
                    <tbody>
                    <?php
                    $income_row = DB::table('income')->where('userID',  Auth::user()->id  )->sum('income.amount');
                    $expend_row = DB::table('expend')->where('userID', Auth::user()->id )->sum('expend.amount');
                    //foreach($income_row as $row){
                    ?>
                    <!-- FOR INCOME TABLE ONLY -->
                    <tr class="myrow">
                        <td>1</td>
                        <td>Total Income</td>
                        <td><?= $income_row ?>  $</td>
                        <input type="hidden"  id="income" value="<?= $income_row ?>">
                    </tr>
                    <!-- FOR EXPEND TABLE ONLY -->
                    <tr class="myrow">
                        <td>2</td>
                        <td>Total Expend</td>
                        <td><?= $expend_row ?>  $</td>
                        <input type="hidden"  id="expend" value="<?= $expend_row ?>">
                    </tr>
                    <!-- GET SUM TOTAL FROM TWO TABLE  -->
                    <tr class="myrow">
                        <td>3</td>
                        <td>Grand Total</td>
                        <td id="total"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</header>

<!-- jQuery
<img class="img-responsive" src="img/profile.png" alt="">
-->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>

</html>
