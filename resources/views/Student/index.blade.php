<html>
<head>
    <title>Laravel App</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

</head>
<body>

  <div class="col-md-3">
    <ul class="nav nav-pills">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Menu 1</a></li>
      <li><a href="#">Menu 2</a></li>
      <li><a href="#">Menu 3</a></li>
    </ul>
  </div>

  <div class="panel panel-default">
      <!-- Default panel contents -->
    <table class="table">
        <thead>
            <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <a href="logout">Logout</a>
        <a href="<?= URL::to('/newstudent') ?>">Add NewRecord</a>
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