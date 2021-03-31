<html>
<h2>Show all the Movies in List</h2>
        <form method="GET" action="handlerinsert.php">
            <input type="hidden" id="countTupleRequest1" name="countTupleRequest1">
            <input type="submit" name="AllTuples"></p>
        </form>
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

        function printResult($result) {
            echo "<br>The movies in your list:<br>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Type</th><th>Director</th><th>Language";

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Director"] . "</td><td>" . $row["Language"]; 
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

            $db_conn= new mysqli("dbserver.students.cs.ubc.ca", "rzhong01", "a38917878", "rzhong01");
            if ($db_conn->connect_error) {
                debugAlertMessage('Connect Failed' . $db_conn->connect_error);
                return false;
            } else {
                debugAlertMessage('Successfully Connected to MYSQL');
                return true;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            $db_conn->close();
        }

        //Insert Query
        function handleInsertRequest() {

            global $db_conn;

            $stmt = $db_conn->prepare ("INSERT INTO Movie_2 VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $name, $type, $dir,$lan);   

            $name = $_POST['insName'];
            $type = $_POST['insType'];
            $dir = $_POST['insDir'];
            $lan = $_POST['insLan'];
            $temp = $stmt->execute();
            if($temp === TRUE) {
                echo "Adding successfully";
            } else{
                echo "Some error encounter (eg. already have one)";
            }
            $db_conn->commit();
        }


        function handleCountRequest1() {
            global $db_conn;

            $result = executePlainSQL("SELECT* FROM Movie_2");
            echo printResult($result);
        }

        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                }

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


		if (isset($_POST['insertSubmit'])){
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest1'])) {
            handleGETRequest();
        }

		?>
</html>