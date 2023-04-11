<?php

// $conn is the connection string tha is used to make the connection to the database.
$conn=mysqli_connect('localhost','root','','test1');

if (!$conn){
   die("Connection failed: " . mysqli_connect_error());
} else {
//    echo "connection successful";
}

?>

<!--  This is the HTML code for the UI part of the code... -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Page</title>
    <!-- This is the CSS for the code for the tables, button... -->
    <style>
        #a1:hover {
            transition-delay: 350;
            background-color: #87bdff;
        }
       

        #t1 th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
            border-color: #000;
            
            
        }
        #t1{
            width: 100%;
            
        } 
    </style>
  </head>
  <body>
 
<!-- This is the Navbar of the page... -->
<div style="height:15vh; width:100%; display:flex; padding-top:2vh; padding-left:2vw; background-color:#e3e3e3">
    <div style="float: left">
        <img src="./PHP.png" alt="SSTPL" height="85" width="160"/>
    </div>
    <div style="float: right; margin-left:45vw; margin-top:2.5vh; font-family: Pussycat, Algerian, Broadway, fantasy;">
        <h1>Fetch Data from Database</h1>
    </div>
</div>


<!-- This is the form input, where the start time and the end time with the table name selection is used... -->
<div style="margin-top:3vh;">
<center>
    <div class="container" >
        <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="col-md-3" id="a1">
                <h3>Start Time</h3>
                <input type="datetime-local" id="time1" name="time1"/>
            </div>
            <div class="col-md-3" id="a1">
                <h3>End Time</h3>
                <input type="datetime-local" id="time2" name="time2"/>
            </div>

            <!-- This is the select option, you can add more option in the selection column... -->
            <div class="col-md-3" id="a1">
                <h3>Table Name</h3>
                <select id="dbname" name="dbname" style="height:3.2vh; width:15vw">
                    <option value="data1">Employee Data</option>      
                </select>
            </div>
            <div class="col-md-3" >
                <button class="btn btn-primary" style="margin-top: 5vh; width:13vw; height: 5vh; font-size:large;">Get Data</button>
            </div>
        </form>

        <?php
    
    if (isset($_POST)) {
      $time1 = $_POST['time1'];  //This is the start time for time range
      $time2 = $_POST['time2'];  //This is the end time for time range
      $tablename1 = $_POST['dbname'];  //This is the table name that will be used
      echo "<br><br><br>";
      
      // This is the sql query, that will be shown so that we can check whether the query is is correct or not...
      echo " The Query is --->     SELECT * FROM `".$tablename1."` WHERE `date` BETWEEN '".$time1."' AND '".$time2."';";
     
      
      
      // echo "<br><br>";
      // echo "".$time2."<br><br>";
      // echo "".$tablename1."<br><br>";
    }

    

   
     
      // This is the fetch data, as per columns for the table...
      $db= $conn;
      $tableName="neev";
      $columns= ['id', 'name','age','date'];
      $fetchData = fetch_data($db, $tableName, $columns);

      //   echo $time1."<br><br>";
      //   echo $time2."<br><br>";
      //   echo $tablename1."<br><br>";
      


      // This is the fetch data function that checks if there is any error in database or table...
      function fetch_data($db, $tableName, $columns){
      if(empty($db)){
        $msg= "Database connection error";
      }elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
      }elseif(empty($tableName)){
        $msg= "Table Name is empty";
      }else{
        if (isset($_POST)) {
          $time1 = $_POST['time1'];
          $time2 = $_POST['time2'];
          $tablename1 = $_POST['dbname'];
          
          
        }
        

    //   $columnName = implode(", ", $columns);
      $query = "SELECT * FROM ".$tablename1." WHERE `date` BETWEEN '".$time1."' AND '".$time2."'";
      // SELECT * FROM `test1` WHERE `date` BETWEEN '2023-02-10 09:00:00' AND '2023-03-10 09:00:00';
      $result = $db->query($query);

      // echo $time1."<br><br>";
      // echo $time2."<br><br>";
      // echo $tabelname1."<br><br>";
      


      // This is the data that is fetched and then It is stroed in a variable...
      if($result== true){ 
      if ($result->num_rows > 0) {
          $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
          $msg= $row;
      } else {
          $msg= "No Data Found"; 
      }
      }else{
        $msg= mysqli_error($db);
      }
      }
      return $msg;
      }
      
      
      ?>

    <!-- This is the JavaScript fuction that is used for the expoting the table to the excel file... -->
    <script type="text/javascript">
        function exportData(){
            /* Get the HTML data using Element by Id */
            var table = document.getElementById("t1");
        
            /* Declaring array variable */
            var rows =[];
        
            //iterate through rows of table
            for(var i=0,row; row = table.rows[i];i++){
                //rows would be accessed using the "row" variable assigned in the for loop
                //Get each cell value/column from the row
                column1 = row.cells[0].innerText;
                column2 = row.cells[1].innerText;
                column3 = row.cells[2].innerText;
                column4 = row.cells[3].innerText;
        
            /* add a new records in the array */
                rows.push(
                    [
                        column1,
                        column2,
                        column3,
                        column4
                    ]
                );
        
                }
                csvContent = "data:text/csv;charset=utf-8,";
                /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
                rows.forEach(function(rowArray){
                    row = rowArray.join(",");
                    csvContent += row + "\r\n";
                });
        
                /* create a hidden <a> DOM node and set its download attribute */
                var encodedUri = encodeURI(csvContent);
                var link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "employee_<?php echo 'data_from_'.$time1.'_to_'.$time2;?>.csv");
                document.body.appendChild(link);
                /* download the data file named "Stock_Price_Report.csv" */
                link.click();
        }
    </script>


    </div>

    <!-- This is the HTML code for displaying the data in the UI... -->
    <div style="margin-top:2vh; ">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script type="text/javascript" src="downloadFile.js"></script>
        <button onclick="exportData()" class="btn btn-primary" style="width:13vw; height: 5vh; font-size:large;">
            <span class="glyphicon glyphicon-download" ></span>
            Download list
        </button>
    </div>
    <div class="table" style="width:auto; margin-top: 5vh;">
      <table class="table-bordered" style="width:98vw; margin-left: -0.5vw; text-align:center;" id="t1" >
       <thead style="text-align: center;"><tr><th>S.N</th>

         <!-- <th>ID</th> -->
         <th>Name</th>
         <th>Age</th>
         <th>Date Of Joining</th>

    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name']??''; ?></td>
      <td><?php echo $data['age']??''; ?></td>
      <td><?php echo $data['date']??''; ?></td>

     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }
  
    ?>
    </tbody>
    <!-- <button id="btnExport" onclick="exportReportToExcel(this)">Export HTML Table</button> -->
     </table>
   </div>
</center>
</div>






    <!-- This is the bootstrap link.. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>