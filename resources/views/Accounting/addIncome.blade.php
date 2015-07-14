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
    <link rel="stylesheet" href="{{ URL::asset('css/mystyle.css') }}" />
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
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var dat = dd+'/'+mm+'/'+yyyy;
            document.getElementById("date").value = dat;
            document.getElementById("month").value = mm;
            document.getElementById("year").value = yyyy;
            document.getElementById("selectMonth").value = mm;
            document.getElementById("selectYear").value = yyyy;
            $('#selectMonth').on('change', function(e){
               // $(this).closest('form').submit();
            });
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
            <div class="col-lg-12 form-group">
                <h2>Add new income to your account.</h2>
                <p style="color: red">{{ $errors->first('name') }}</p>
                <p style="color: red">{{ $errors->first('amount') }}</p>
                <div class="bs-example" data-example-id="horizontal-static-form-control">
                    <form class="form-inline" action="<?= URL::to('/registerIncome') ?>" method="post">
                        <input type="text" class="form-control" id="formGroupInputLarge" name="name" placeholder="Income name">
                        <input type="text" class="form-control" id="formGroupInputLarge" name="amount" placeholder="Amount $">
                        <input type="hidden" class="form-control"  name="userID" value="{{ Auth::user()->id }}" />
                        <input type="hidden" class="form-control" id="month" name="month" value="" />
                        <input type="hidden" class="form-control" id="year" name="year" value="" />
                        <input type="hidden" class="form-control" id="date" name="date" value="" />
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input type="submit" class="btn btn-default" value="OK">

                        <select id="selectMonth" name="selectMonth" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <select id="selectYear" name="selectYear" class="form-control">
                            <option value="0" id="year0"></option>
                        </select>
                        <script>
                            year = [];
                            var num = 2100;
                            for(j=2000; j<=num; j++){
                                year[j] =j;
                            }
                            var arr = new Array();
                            var x;
                            arr = year//.split(",");
                            var oSelField = document.getElementById("selectYear");
                            for( x in arr) 	{
                                var oOption = document.createElement("OPTION");
                                oSelField.options.add(oOption);
                                oOption.text = arr[x] + "";
                                oOption.value = arr[x];
                                oOption.id = "year" + arr[x];
                            }
                        </script>
                        <a class="btn btn-default goback" href="<?= URL::to('/income') ?>" role="button">Back</a>
                    </form>
                </div>
            </div> <!-- end form-group-->

            <table class="table">
                <thead class="th">
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
                </thead>
              <tbody>
                <?php
                $income_row = DB::table('income')->where('userID', Auth::user()->id )->paginate(10);
                foreach($income_row as $row){
                ?>
                <tr>
                    <td><?= $row-> id ?></td>
                    <td><?= $row-> name ?></td>
                    <td><?= $row-> amount ?> $ </td>
                    <td><?= $row-> date ?></td>
                    <td>
                        <a class="btn btn-success" href="<?= URL::to('EditIncome', array($row->id)) ?>">Edit</a> |
                        <a class="btn btn-danger" href="<?= URL::to('DeleteIncome', array($row->id)) ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="pagination"> {!! $income_row->render() !!} </div>
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
