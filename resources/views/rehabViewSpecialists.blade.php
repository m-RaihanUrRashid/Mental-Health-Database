@extends('layout')
@section('title' , 'View Rehab Specialists')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: lightblue;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-align: center;
        }

        td {
            border-right: 1px solid lightgrey; 
            padding: 8px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

    </style>
</head>

<body>

    <h1>Rehab Specialists</h1>

    <table id="specialistTable" style="width: 70%; table-layout: fixed; border-collapse: collapse;">
        <thead style="background-color: #3498db; color: #fff; border-bottom: 2px solid lightblue;">
            <tr>
                <th style="padding: 6px;">Specialist ID</th>
                <th style="padding: 6px;">Qualifications</th>
                <th style="padding: 6px; width: 200px">Email</th>
                <th style="padding: 6px;">Contact</th>
                <th style="padding: 6px;">Specialty</th>
               
            </tr>
        </thead>
        <tbody>
            <tr onclick="markAsDone(1)" style="margin: 10px; background-color: #fff; border-bottom: 1px solid lightgrey;">
                <td>4321</td>
                <td>Masters degree, PhD, medical license</td>
                <td>doc1@mspaint.rehab.com</td>
                <td>01569836930</td>
                <td>Personality Disorders</td>

                
            </tr>
            <tr onclick="markAsDone(2)" style="margin: 10px; background-color: #fff;">
                <td>6543</td>
                <td>Masters degree, PhD, medical license</td>
                <td>doc2@mspaint.rehab.com</td>
                <td>01589345603</td>
                <td>Addiction Psychiatry</td>
               
            </tr>
        </tbody>
    </table>

    <button onclick="goHome()" style="position: absolute; left: 0; top: 0; margin: 30px;">Back to Home Page</button>

    <script>
        function markAsDone(x) {
            //update DBMS here
            alert('You clicked me!');
        }

        function goHome() {
            window.location.href = "/rehabSupervisorHome";
        }
    </script>

</body>

</html>

@endsection