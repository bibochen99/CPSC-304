<html>
    <head>

    </head>

    <body>
        <h2>Add Movie to your movies list</h2>
        <form method="POST" action="handlerinsert.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            
            Name: <input type="text" name="insName"> <br /><br />
            Type: <input type="text" name="insType"> <br /><br />
            Director: <input type="text" name="insDir"> <br /><br />
            Language: <input type="text" name="insLan"> <br /><br />

            <input type="submit" value="Add Movie" name="insertSubmit">
        </form>

        <hr/>
        <h2>Delete Movie from your movies list</h2>
        <form method="POST" action="handlerdelete.php"> 
            <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
            
            Name: <input type="text" name="delName"> <br /><br />
            Director: <input type="text" name="delDir"> <br /><br />

            <input type="submit" value="Delete Movie" name="deleteSubmit">
        </form>

        <hr/>

        <h2>Update Customer Information in Customer List</h2>
        <form method="POST" action="handleUpdate.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            CustomerID: <input type="text" name="id"> <br /><br />
            CustomerEmail: <input type="text" name="email"> <br /><br />
            CustomerPhone: <input type="text" name="phone"> <br /><br />
            CustomerName: <input type="text" name="name"> <br /><br />
            CustomerStaffID: <input type="text" name="staffId"> <br /><br />

        <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <hr/>


        <!-- <h2>Show all the Movies in List</h2>
        <form method="GET" action="handlerinsert.php">
            <input type="hidden" id="countTupleRequest1" name="countTupleRequest1">
            <input type="submit" name="AllTuples"></p>
        </form> -->

	</body>
</html>
