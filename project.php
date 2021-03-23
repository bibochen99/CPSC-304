<html>
    <head>

    </head>

    <body>
        <h2>Add Movies to your movies list</h2>
        <form method="POST" action="handlerinsert.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            
            Name: <input type="text" name="insName"> <br /><br />
            Type: <input type="text" name="insType"> <br /><br />
            Director: <input type="text" name="insDir"> <br /><br />
            Language: <input type="text" name="insLan"> <br /><br />

            <input type="submit" value="Add Movie" name="insertSubmit">
        </form>

        <hr/>

        <!-- <h2>Show all the Movies in List</h2>
        <form method="GET" action="handlerinsert.php">
            <input type="hidden" id="countTupleRequest1" name="countTupleRequest1">
            <input type="submit" name="AllTuples"></p>
        </form> -->

	</body>
</html>
