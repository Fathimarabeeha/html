<?php
$players = array(
    "Virat Kohli" => "Batsman",
    "Rohit Sharma" => "Batsman",
    "Hardik Pandya" => "All-rounder",
    "Jasprit Bumrah" => "Bowler",
    "Rishabh Pant" => "Wicketkeeper"
    
);
?>

<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
           
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1><center><u>List of Indian Cricket Players</h1></center></u>

<table class="center">
    <tr>
        <th>Serial No</th>
        <th>Player Name</th>
        <th>Position</th>
        
    </tr>
    <?php
    $serialNo = 1;
    foreach ($players as $player => $position) {
        echo "<tr>
                <td>" . $serialNo . "</td>
                <td>" . $player . "</td>
                <td>" . $position . "</td>
              </tr>";
        $serialNo++;
    }
    ?>

</table>
</body>
</html>
