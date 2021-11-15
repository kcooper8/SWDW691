<html>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "membership";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $query="SELECT ID FROM MyGuests";
    $result = mysqli_query($dbConnection, $query);
    if(empty($result)) {
        $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
        } else {
        echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    }

    ?>
    <head>
        <title>
            Where Did All the money go
        </title>
        <link href="main.css" rel="stylesheet"/>
        <script src="app.php" type="application/javascript"></script>
       
    </head>

    <body>
        <header>
            <h1>Please Send us your information</h1>
    
        </header>

        <div id="leftsidebar">
            <h2>
                Site Navigation
            </h2>
            <ol id="orderedlist">
                <li><a href="index.php"> Dashboard </a></li>
                <li><a href="accounts.php"> Manage Accounts </a></li>
                <li><a href="graphing.php"> Graphing </a></li>
                <li><a href="budgeting.php"> Bugeting </a></li>
                <li><a href="user.php"> User Management </a></li>
            </ol>
        </div>
        <div id="maincontainer">
            <article>
                <h2>
                    Information Request
                </h2>
            <p id="loginMessage">
                <?php 
                   if(!empty($_GET['message'])) {
                        $message = $_GET['message'];
                        echo $message; 
                   }
                   else {
                       echo "Please enter your information so we can contact you.";
                   }
                ?>
                
            </p>
                <form method="get" name="form" action="data_enter.php"> 
                    <input type="text" placeholder="First Name" name="firstname">
                    <input type="text" placeholder="Last Name" name="lastname">
                    <input type="text" placeholder="Email Address" name="email"> 
                    <input type="submit" value="Submit"> 
                </form>  
            
            </p>
        </div>

        <footer>
            Copyright &copy; Where Did the Money Go 2021.  All rights reserved.
        </footer>
    </body>