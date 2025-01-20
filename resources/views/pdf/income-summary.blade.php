<!DOCTYPE html>
<html>
<head>
    <title>Income Summary Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Income Summary Report</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalIncome as $income)
                <tr>
                    <td>{{ $income->date }}</td>
                    <td>{{ number_format($income->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
