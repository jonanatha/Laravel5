<html>
<head>
    <title>Add New Student</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<p style="color: red">{{ $errors->first('name') }}</p>
<body>
    <a href="<?= URL::to('/Student') ?>">Back</a>
</body>
    <form action="<?= URL::to('/saveStudent') ?>" method="post">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>
                            <input type="text" name="name">
                        </td>
                    </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type="text" name="gender"></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Save"></td>
                </tr>
                </tbody>
            </table>
<!--
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th><a href="#" id="addrow">Add</a></th>
                </thead>
                <tbody class="tbody">
                    <tr class="tr">
                        <td>1</td>
                        <td><input type="text" name="name[]" class="name"></td>
                        <td><input type="text" name="qty[]" class="qty"></td>
                        <td><input type="text" name="price[]" class="price"></td>
                        <td><a href="#" class="delete">Delete</a> </td>
                    </tr>
                </tbody>
            </table>
-->

    </form>
</html>
<!--
<script type="text/javascript">
    $(function () {
        $('#addrow').click(function(){
           var n = ($('.tbody tr').length-0) + 1;
            var tr = '<tr class="tr">' +
                    '<td>' + n + '</td>' +
                    '<td><input type="text" name="name[]" class="name"></td>' +
                    '<td><input type="text" name="qty[]" class="qty"></td>' +
                    '<td><input type="text" name="price[]" class="price"></td>' +
                    '<td><a href="#" class="delete">Delete</a> </td>' +
                    '</tr>';
            $('.tbody').append(tr);
        });

        $( document ).on( "click", "a.delete", function() {
            $(this).parent().parent().remove();
        });

    })
</script>