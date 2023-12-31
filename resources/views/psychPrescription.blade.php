<!DOCTYPE html>
<html lang="en">

<head>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
            margin-bottom: 40px;
            margin-top: 72px;
            text-align: center;
        }

        form {
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

       
        .medicine-container {
            margin: 20px;
           
        }

       
        .medicine-input-container {
            margin-bottom: 20px;
          
        }
    </style>
</head>

<body>

    <h1 id="heading">Prescriptions</h1>

    <form id="prescriptionForm" action="{{ route('psychPrescription.store') }}" method="post">
        @csrf
        <div class="medicine-container">
            <label for="patientID">Patient ID:</label>
            <input type="text" id="cpUserID" name="cpUserID">

           
            <div id="medicinesContainer" class="medicine-input-container">
                <label for="medicine1">Medicine:</label>
                <input type="text" class="medicineInput" name="medicines[]">
            </div>

            <button type="button" onclick="addMedicine()">Add Medicine</button>
        </div>

        <div class="container" style="justify-items: center;">
            <div style="margin: 10px">
                <button type="submit">Create Prescription</button>
            </div>
        </div>
    </form>


    <button onclick="goHome()" style="position: absolute; left: 0; top: 0; margin: 30px;">Back to Home Page</button>

    <script>
        function goHome() {
            window.location.href = "/psychiatristHome";
        }
        
        function addMedicine() {
            var medicinesContainer = document.getElementById('medicinesContainer');
            var newMedicineInput = document.createElement('div');
            newMedicineInput.classList.add('medicine-input-container');
            newMedicineInput.innerHTML = `
            <label for="medicine">Medicine:</label>
            <input type="text" class="medicineInput" name="medicines[]">
        `;
            medicinesContainer.appendChild(newMedicineInput);
        }
    </script>


</body>

</html>