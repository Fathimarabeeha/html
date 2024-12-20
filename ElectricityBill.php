<html lang="en">
<head>
    <title>KSEB Bill</title>
    <style>
        body { font-family: sans-serif; background-color: #f5f5f5; }
        .form-container { width: 350px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; background-color: #fff; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"] { width: 90%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 4px; }
        input[type="submit"]:hover { background-color: #45a049; }
        .bill-container { width: 500px; margin: 20px auto; padding: 15px; border: 1px solid #ccc; background-color: #fff; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 6px; text-align: left; border: 1px solid #ccc; }
        .header { text-align: center; margin-bottom: 10px; }
        .right-align { text-align: right; }
        .center-align { text-align: center; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>

<div class="form-container">
  <h2>KSEB Bill</h2>
  <form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="consumerId">Consumer ID:</label>
    <input type="text" name="consumerId" id="consumerId" required>

    <label for="currentReading">Unit consumed:</label>
    <input type="number" name="currentReading" id="currentReading" required>

    <input type="submit" value="Generate">
  </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unit = $_POST["currentReading"];
    $name = $_POST["name"];
    $consumerId = $_POST["consumerId"];
    if ($unit <= 300) {
        $energyCharges = $unit * 6.40;
    } elseif ($unit <= 350) {
        $energyCharges = $unit * 7.25;
    } elseif ($unit <= 400) {
        $energyCharges = $unit * 7.60;
    } elseif ($unit <= 500) {
        $energyCharges = $unit * 7.90;
    } else {
        $energyCharges = $unit * 8.80;
    }
    $otherCharges = 60.00;
  
    $totalAmount = $energyCharges + $otherCharges;

    echo "
    <div class='bill-container'>
        <div class='header'>
            <h2>KSEB</h2>
            <h3>Electricity Bill</h3>
        </div>
        <table>
            <tr><td>Bill No. 1</td></tr>
            <tr><td>Consumer No: C#$consumerId</td></tr>
            <tr><td>Name: $name</td></tr>
            <tr><td>Address: VENGAYIL</td></tr>
            <tr><td>Bill Date: " . date("d/m/Y") . "</td></tr>
            <tr><td>Due Date: " . date("d/m/Y", strtotime("+15 days")) . "</td></tr>
            <tr><td>Disconnection Date: " . date("d/m/Y", strtotime("+30 days")) . "</td></tr>
        </table>

        <table>
            <tr><th class='center-align'>Unit</th><th class='center-align'>Current</th><th class='center-align'>Consumption</th></tr>
            <tr><td class='center-align'>KWH/A/I</td><td class='center-align'>$unit</td><td class='center-align'>$unit</td></tr>
        </table>

        <table>
            <tr><td>Energy Charges:</td><td class='right-align'>" . number_format($energyCharges, 2) . "</td></tr>
            <tr><td>Other Charges:</td><td class='right-align'>" . number_format($otherCharges, 2) . "</td></tr>
            <tr><td>Payable:</td><td class='right-align'>" . number_format($totalAmount, 2) . "</td></tr>
        </table>

        
    </div>";
}
?>

</body>
</html>

