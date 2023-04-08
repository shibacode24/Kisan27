<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body id="contentss">
    <h4 align="center">Kisan 27</h4>
    <div class="row">
        <div class="col-md-4">
            <label>Employee: {{$user_name}}</label>
        </div>
       <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Document</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($document as $document)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$document->document}}</td>
                <td>{{$document->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<script>
        $(document).ready(function() {
            var printContents = document.getElementById('contentss').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>
</html>