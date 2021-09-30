<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pdf</title>

{{--    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">--}}


    <!-- Styles -->
    <style>

        body {
            font-family: 'iranSans', sans-serif;
            direction: rtl!important;
        }
        table{
            border: 3px solid #000000;
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }
        table td, table th {
            text-align: center;
            border: 1px solid #000000;
            padding: 5px 4px;
        }
        table tbody td {
            text-align: center;
            font-size: 13px;
        }
        table. thead {
            text-align: center;
            background: #CFCFCF;
            background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
            border-bottom: 3px solid #000000;
        }
        table thead th {
            text-align: center!important;
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            /*text-align: left;*/
        }
        table tfoot {
            font-size: 14px;
            font-weight: bold;
            color: #000000;
            border-top: 3px solid #000000;
        }
        table tfoot td {
            font-size: 14px;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <table class="table table-striped tableFontSmall table-bordered">
        <thead>
        <tr>
            @php
            $cols = explode('|', $cols);
            @endphp
            @foreach( $cols as $col )
                <th>{{ $col }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>

            @php
                $rows = explode('|', $rows);
            @endphp
            @foreach( $rows as $row )
                <tr>
                    @php
                        $cells = explode(',', $row);
                    @endphp
                    @foreach( $cells as $cell )
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach


        </tbody>
    </table>


</div>
</body>


</html>
