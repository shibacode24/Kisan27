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
        <div class="col-md-4">
            <label>From Date: {{$from_date}}</label>
        </div>
        <div class="col-md-4">
            <label>To Date: {{$to_date}}</label>
        </div>
        <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Distance</th>
                <!-- <th scope="col">Handle</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($tracking_query as $tracking_query)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$tracking_query->created_at}}</td>
                <td>{{$tracking_query->distance}}</td>
                <!-- <td>@mdo</td> -->
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