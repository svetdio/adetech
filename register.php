<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AllShirt Commercial Outlet</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src='js/jquery.min.js'> </script>
    <script src='js/register.js'> </script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <div id="headcontainer">
        <img id="favlogo" src="favicon.ico">
        <h1> ALLSHIRT COMMERCIAL OUTLET </h1>
    </div>

    <!--sign up box-->
    <div class="container">
        <form id="form" action="login.php">
            <h1 class="fonty">Create an Account</h1>
            <i class="errormsg">** All fields are required</i>

            <div class="input-control">
                <br>
                <label for="username" class="fonty"><b>First name</b></label>
                <span id="fname" class="errormsg"></span>
                <input type="text" class="fonty" id="fname" placeholder="Enter your first name">
            </div>
            <br>
            <div class="input-control">
                <label for="lastname" class="fonty"><b>Last name</b></label>
                <span id="lname" class="errormsg"></span>
                <input type="text" class="fonty" id="lname" placeholder="Enter your last name">
            </div>
            <br>
            <div class="input-control">
                <label for="acct_type" class="fonty"><b>Account Type</b></label>
                <span id="acct_type" class="errormsg"></span>
                <select id="acct_type" class="fonty">
                    <option value="0">--- Please select account type ---</option>
                    <option value="2">Cashier 1</option>
                    <option value="3">Cashier 2</option>
                    <option value="4">Human Resource</option>
                </select>
            </div>
            <br>
            <div class="input-control">
                <label for="username" class="fonty"><b>Username</b></label>
                <span id="uname" class="errormsg"></span>
                <input type="text" class="fonty" id="uname" placeholder="Create a username">
            </div>
            <br>
            <div class="input-control">
                <label for="password" class="fonty"><b>Password</b></label>
                <span id="pass" class="errormsg"></span>
                <input type="password" class="fonty" id="pass" placeholder="Create a password">
            </div>
            <br>
            <div class="input-control">
                <label for="password2" class="fonty"><b>Confirm Password</b></label>
                <span id="pass2" class="errormsg"></span>
                <input type="password" class="fonty" id="pass2" placeholder="Re-type your password">
            </div>
            <br>

            <br>
            <label for="checkbox" style="padding: 2%;">Show Password</label>
            <input class="cb" type="checkbox">

            <button class="button button1" id="save" type="submit"><b>Sign Up</b></button>

            <button class="button button2" id="cancel"><b>Cancel</b></button>

        </form>
    </div>
</body>

</html>