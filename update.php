<html>
    <head>

    </head>

    <body>
        <h2>Update Customer Information in Customer List</h2>
        <form method="POST" action="mysql_test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            CustomerID: <input type="text" name="id"> <br /><br />
            CustomerEmail: <input type="text" name="email"> <br /><br />
            CustomerPhone: <input type="text" name="phone"> <br /><br />
            CustomerName: <input type="text" name="name"> <br /><br />
            CustomerStaffID: <input type="text" name="staffId"> <br /><br />

        <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <hr/>

	</body>
</html>
