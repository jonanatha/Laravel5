<html>
<header>
    <title>Student Form</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</header>
<body>
<div class="container bs-docs-containe">
        <div class="form-group">
            <h1>Registration Form</h1><hr>
            <h3>Please insert the informations bellow:</h3>
            <p style="color: red">{{ $errors->first('name') }}</p>
            <p style="color: red">{{ $errors->first('phone') }}</p>
            <?php
                $row = DB::table('student')->where('id', $id)->first();
            ?>
                <div class="bs-example" data-example-id="horizontal-static-form-control">
                    <form class="form-inline" action="<?= URL::to('/updateStudent') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $row ->id ?>"/>
                        <input type="text" class="form-control" name="name" value="<?= $row ->name ?>"><br><br>
                        <select class="form-control" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select><br><br>
                        <input type="text" class="form-control" name="phone" value="<?= $row ->phone ?>"><br><br>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input type="submit" class="btn btn-default" value="UPDATE NOW!">
                        <a class="btn btn-default" href="<?= URL::to('/Student') ?>" role="button">Back</a>
                    </form>
                </div>
        </div>
        <center><h1>*** Student List ***</h1></center>
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $student_row = DB::table('student')->get();
            foreach($student_row as $row){
            ?>
            <tr>
                <td><?= $row-> id ?></td>
                <td><?= $row-> name ?></td>
                <td><?= $row-> gender ?></td>
                <td><?= $row-> phone ?></td>
                <td>
                    <a href="<?= URL::to('EditRow', array($row->id)) ?>">Edit</a> |
                    <a href="<?= URL::to('DeleteRow', array($row->id)) ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
