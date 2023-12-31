@extends('layout')
@section('title' , 'My Information')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token -->
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: lightblue;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 105vh;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 0px;
            margin-top: 72px;
            text-align: center;
        }

        .pastform {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body>

    <h1 id="heading">My Information</h1>

    <!-- rehabUpdateMyInfo.blade.php -->
    <!-- <form method="post" action="{{ route('rehabUpdateMyInfo.post') }}"> new  -->
        <!-- @csrf -->
        <div class="">
            <div class="d-flex">
                <div style="margin-left: 42px; margin-top: 42px; margin-right: 42px;">
                    <label for="Fname">First Name:</label>
                    <input type="text" id="Fname" name="Fname" value="{{ $user->cFname }}" readonly>
                    <label for="Lname">Last Name:</label>
                    <input type="text" id="Lname" name="Lname" value="{{ $user->cLname }}" readonly>
                    <label for="DOB">Date of Birth:</label>
                    <input type="text" id="DOB" name="DOB" value="{{ $user->dDOB }}" readonly>
                </div>
                <div style="margin-left: 42px; margin-top: 42px; margin-right: 42px;">
                    <label for="Gender">Gender:</label>
                    <input type="text" id="Gender" name="Gender" value="{{ $user->cGender }}" readonly>
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" value="{{ $user->cAddress }}" readonly>
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" value="{{ $user->cEmail }}" readonly>
                </div>
            </div>
            <br>
            <div style="margin-left: 42px">
                <label>Medical History:</label>
                <textarea name="mHistory" id="" cols="58" rows="6" style= "resize: none;" readonly>{{ $patient->cMedicalHistory }}</textarea>
            </div>
            <div class="container" style="justify-items: center;">
                <div style="margin: 10px">
                    <button onclick="editInfo()" type="button">Edit Information</button>
                </div>
            </div>
        </div>
    <!-- </form> -->


    <button onclick="goHome()" style="position: absolute; left: 0; top: 0; margin: 30px;">Back to Home Page</button>

    <script>
        function saveChanges() {
            alert('Changes Saved');
        }

        function editInfo() {
            window.location.href = "/patientProfileEdit";
        }

        function goHome() {
            window.location.href = "/patientHome";
        }
    </script>

</body>

</html>

@endsection