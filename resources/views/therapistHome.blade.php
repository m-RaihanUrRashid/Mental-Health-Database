@extends('layout')
@section('title' , 'Therapist Appointment')
@section('content')

<head>
    <style>h1, h2, p{color: darkblue; font-family: "Georgia";}</style>
    <link rel="icon" href="/img/diamond.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/img/diamond.ico" type="image/x-icon">
</head>

<body>
<!-- Navbar aesthetic properties -->
<style>
    .navbar {
    background-color: navy;
    padding: 15px;
    color: white;
    text-align: center;
    transition: 0.3s; /* Add smooth transition effect */
    overflow: hidden;
    }

    .navbar a{
        font-family: 'Georgia';
        text-decoration: none;
        color: white;
        padding: 5px;
        margin: 5px;
    }
    .navbar a:hover{
        color: blue!important; cursor: pointer!important; transition: 0.2s!important;
        text-decoration: none;
    }
    .navb{
        width: 2px; /* Adjust border width */
        height: 100%; /* Adjust border height */
        background-color: black; /* Adjust border color */
    }
</style>

<!--Navbar Overflow Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('navbar');

        navbar.addEventListener('mouseenter', function () {
            navbar.style.overflow = 'visible';
        });

        navbar.addEventListener('mouseleave', function () {
            navbar.style.overflow = 'hidden';
        });
    });
</script>

<!-- Dropdown aesthetics -->
<style>
    .dropdown {
        display: inline-block;
        position: relative;
    }

    .dropbtn {
        font-family: 'Georgia';
        text-decoration: none;
        color: white;
        padding: 5px;
        margin: 5px;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: navy;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        right: 0;
    }

    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        z-index: 1;
    }

    .dropdown-content a:hover {
        background-color: navy;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: navy; /* Change to the desired hover color */
        color: white; /* Change to the desired text color */
    }
</style>

<!-- Navbar script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');

    document.addEventListener('mousemove', function(e) {
        // Check if the cursor is outside the navbar
        if (!navbar.contains(e.target)) {
            navbar.style.height = '0';
        } else {
            navbar.style.height = '70px';
        }
        });
    });
</script>

<!-- Navbar -->
<div class="navbar" id="navbar">
        <a style= "margin-left: 20px" href="http://127.0.0.1:8000/therapistdb">HOME</a>
        <span class="navb"></span>
        <section style= "display: flex;">
            <div style= "padding-top: 6.5px;"> <img src="/img/profile logo inv.png" width="20" height="20" alt="pl"></div>
            <a href = "http://127.0.0.1:8000/therapistprofile">Profile</a> 
        </section>
        <span class="navb"></span>
        <section style= "display: flex;">
            <div style= "padding-top: 6.5px;"> <img src="/img/notebook.png" width="30" height="30" alt="nb"></div>
            <a href="http://127.0.0.1:8000/thnotes/create">Notes</a> 
        </section>
        <span class="navb"></span>
        <section style= "display: flex;">
            <div style= "padding-top: 2.5px;"> <img src="/img/lines.png" width="15" height="15" alt="nb"></div>
            <div class="dropdown">
            <a class="dropbtn">More</a> 
            <div class="dropdown-content">
                <a href="http://127.0.0.1:8000/">Log Out</a>
            </div>
            </div>
        </section>
</div>

<div style="padding: 20px"></div>

<h1 style="text-align: center;">Appointment Section</h1> <br> <br> <br>

<section style="display: flex; margin: 0 auto;">
    <p style="font-size: 1.5em; margin-left: 170px; padding-right: 40px">Appointment Chart</p>
    <a href="http://127.0.0.1:8000/therapistpa"><button class="eb">See Past Appointments</button></a>
</section>

<!-- Appointment table properties -->
<style>
    /* Add a border to all cells */
    table{
        width: 80%; /* Set the width of the table */
        border-collapse: collapse; /* Collapse the borders */
        margin: 20px; /* Add margin for spacing */
        margin: 0 auto;
        margin-bottom: 80px;
    }
    th, td{
        border: 1.5px solid darkblue;
        border-collapse: collapse; /* Optional, for better styling */
        margin: 0 auto;}
    td{
        padding-left: 20px;
    }
    
    .buttonbox{
        border-radius:  10px;
        width: 80%;
        height: auto;
        margin: 20px; /* Add margin for spacing */
        margin: 0 auto;
        margin-bottom: 80px;
        background-color: azure;
    }
</style>

<!-- Appointment table -->
<div class="buttonbox"; style="width: 95%;">
    <table id="prescriptionsTable" style="width: 70%; table-layout: fixed; border-collapse: collapse;">
        <thead style="background-color: #3498db; color: #fff; border-bottom: 2px solid lightblue;">
            <tr>
                <th style="padding: 6px;">Patient ID</th>
                <th style="padding: 6px;">psych ID</th>
                <th style="padding: 6px;">Date</th>
                <th style="padding: 6px;">Time</th>
                <th style="padding: 6px;">Actions</th>
            </tr>
        </thead>
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->cpUserID }}</td>
            <td>{{ $appointment->csUserID }}</td>
            <td>{{ $appointment->dappDate }}</td>
            <td>{{ $appointment->cappTime }}</td>

            <td>
                <form method="post" action="{{ route('therapistHome.toggle', [
                    'cpUserID' => $appointment->cpUserID,
                    'csUserID' => $appointment->csUserID,
                    'dappDate' => $appointment->dappDate,
                    'cappTime' => $appointment->cappTime,
                ]) }}">
                    @csrf
                    @method('post')
                    <button class = "eb" type="submit" name="markasdone">Mark As Done</button>
                </form>

                <form method="post" action="{{ route('therapistHome.delete', [
                    'cpUserID' => $appointment->cpUserID,
                    'csUserID' => $appointment->csUserID,
                    'dappDate' => $appointment->dappDate,
                    'cappTime' => $appointment->cappTime,
                    ]) }}" style="margin-top: 5px;">
                    @csrf
                    @method('delete')
                    <button class = "eb" type="submit" name="delete">Delete</button>
                </form>
                </td>
        </tr>
        @endforeach
    </tbody>    
    </table>
</div>

<!-- Edit Button properties -->
<style>
    .eb{
        margin: 0 auto;
        padding: 5px 10px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        border-radius: 10px; /* Adjust the radius to control the roundness */
        background-color: cadetblue; /* Change the background color */
        color: white; /* Change the text color */
        cursor: pointer;
    }
    .eb:hover{
        background-color: #095151!important;
        color: black;
        transition: 0.2s!important;
    }
    .a{
        text-decoration: none;
    }
</style>

</body>

@endsection