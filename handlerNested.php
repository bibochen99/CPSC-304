<html>
<!-- <h2>Show all the Movies in List</h2> -->
        <!-- <form method="GET" action="handlerinsert.php">
            <input type="hidden" id="countTupleRequest1" name="countTupleRequest1">
            <input type="submit" name="AllTuples"></p>
        </form> -->
        

<script>
function goBack() {
  window.history.back();
}
</script>
<?php
        $success = True;
        $db_conn = NULL; 
        $show_debug_alert_messages = False;

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { 
            global $db_conn, $success;
            $result = $db_conn-> query($cmdstr);
            return $result;
        }

        function executeBoundSQL($cmdstr, $list, $types) {
            global $db_conn, $success;
            $stmt = $db_conn->prepare($cmdstr);
            $stmt->bind_param($types, $list[0], $list[1],$list[2],$list[3]);
            $result = $stmt->execute();
            return $result;
        }

        function printResult($result, $att) {
            // echo "<br>The $att in the list:<br>";
            echo "<table>";
            // echo "<tr><th>$att</th>";
            // echo ($att=="count");
            // count is not work good here
            
            if ($att == "count"){
            echo "<tr>
            <th>Director</th>
            <th>Box_office</th>";}
            else{
                echo "<tr>
                <th>Director</th>
                <th>Rating</th>";
            }

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

                
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . 
                "</td><td>" . $row[3] .
                "</td><td>" . $row[4] .
                "</td><td>" . $row[5] .
                "</td><td>" . $row[6] .
                "</td><td>" . $row[7] 

                ; 
            }

            echo "</table>";
        }

        function console_log( $data ){
          echo '<script>';
          echo 'console.log('. json_encode( $data ) .')';
          echo '</script>';
        }


        function connectToDB() {
            global $db_conn;

            // echo "before";
            $db_conn= new mysqli("dbserver.students.cs.ubc.ca", "rzhong01", "a38917878", "rzhong01");
            if ($db_conn->connect_error) {
                debugAlertMessage('Connect Failed' . $db_conn->connect_error);
                // echo "false";
                return false;
            } else {
                debugAlertMessage('Successfully Connected to MYSQL');
                // echo "true";
                return true;
            }

            

        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            $db_conn->close();
        }

        function handleInsertRequest() {
            global $db_conn;
            // $att = $_POST['insJoinTable'];
            // <!-- find the att(rating) for movie that after year 200 and its director, for each director have at least 2 movie of any year -->
            $att = $_POST['insNestedTable'];
            // echo gettype($att);
            $result = executePlainSQL("            SELECT m2.Director , $att(Rating) 
            FROM (select Director from Movie_1 as m1 WHERE m1.Year >2000 group by Director having count(*)>1)
            as Temp, Movie_1 as m2, Evaluates as e2
            where  Temp.Director =m2.Director and m2.ID = e2.MID
            Group by Director 
            ");
            // echo"120";
            // SELECT m2.Director , min(Rating) 
            // FROM (select Director from Movie_1 as m1 WHERE m1.Year >2000 group by Director having count(*)>1)
            // as Temp, Movie_1 as m2, Evaluates as e2
            // where  Temp.Director =m2.Director and m2.ID = e2.MID
            // Group by Director 

        //     if ($att == "morethan100"){
        //     $result = executePlainSQL("SELECT * FROM Movie_1 as m,Peripheral_Merchandise_Sell_Own as p WHERE m.ID = p.MID and Price >100");
        // } else{
        //     $result = executePlainSQL("SELECT * FROM Movie_1 as m,Peripheral_Merchandise_Sell_Own as p WHERE m.ID = p.MID and Price <100");
        // }
            echo printResult($result,$att);
        //     if ($att == 'Name'){
        //     $result = executePlainSQL("SELECT $att FROM Movie_2");
        // }
        // else{
        //     $result = executePlainSQL("SELECT DISTINCT $att FROM Movie_2");
        // }
        //     echo printResult($result,$att);
        }


        function handlePOSTRequest() {
            if (connectToDB()) {



                    handleInsertRequest();

                    
                disconnectFromDB();
            }
        }

        function handleGETRequest() {
            if (connectToDB()) {
                if(array_key_exists('AllTuples', $_GET)) {
                    handleCountRequest1();
                }

                disconnectFromDB();
            }
        }

        // echo "check";
        // echo $_POST['insTableAll'];
		if (isset($_POST['insertSubmit'])){
            // echo'in150';
            handlePOSTRequest(); //insert
            // echo 'afterHandle';
        } else if (isset($_GET['countTupleRequest1'])) {

            handleGETRequest(); // show table
        }

		?>
        <button onclick="goBack()">Back</button>
</html>