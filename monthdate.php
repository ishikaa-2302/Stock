<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `stock2` WHERE MONTH(dated)='$valueToSearch'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `stock2`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "testing");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Data</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body class="w3-padding">
        <div class="w3-container w3-light-grey">
          <p class="w3-xxlarge w3-text-mediumseagreen w3-center">STOCK MARKET RATES <i class='fas fa-chart-line' style='font-size:48px;color:mediumseagreen'></i></p>
        </div><br>
        <form action="monthdate.php" method="post">
          <select name="valueToSearch" class="w3-input" placeholder="select month">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
          </select>
            <input type="submit" name="search" value="Filter" class="w3-button w3-orange">
            <a href="search2.php" class="w3-button w3-green w3-text-white"><i class='fas fa-arrow-left'></i> Back</a>
            <a href="bar.htm" class="w3-button w3-green w3-text-white">View Bar Graphs <i class='fas fa-external-link-alt' style='font-size:20px; color:white'></i></a>
            <a href="bar.htm" class="w3-button w3-green w3-text-white">View Line Graphs <i class='fas fa-external-link-alt' style='font-size:20px; color:white'></i></a><br><br>

            <table class="w3-table-all">
                <tr>
                    <th>Close</th>
                    <th>High</th>
                    <th>Low</th>
                    <th>Open</th>
                    <th>Symbol</th>
                    <th>Volume</th>
                    <th>Dated</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['close'];?></td>
                    <td><?php echo $row['high'];?></td>
                    <td><?php echo $row['low'];?></td>
                    <td><?php echo $row['open'];?></td>
                    <td><?php echo $row['symbol'];?></td>
                    <td><?php echo $row['volume'];?></td>
                    <td><?php echo $row['dated'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

    </body>
</html>
