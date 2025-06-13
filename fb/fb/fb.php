<?php
include 'connect.php';

class login extends connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if ($this->db_found == true)
        {
            $s = "SELECT * FROM login";
            $r = mysqli_query($this->db_found, $s);
            $this->id = $_POST["t1"];
            $this->pwd = $_POST["t2"];
            $f = 0;
            $k = 0;

            while ($b = mysqli_fetch_assoc($r))
            {
                if ($this->id == $b['id'] && $this->pwd == $b['pwd'])
                {
                    $f = 1;
                    break;
                }
                else if ($b['id'] == $this->id)
                {
                    $k = 1;
                }
            }

            if ($f == 1)
            {
                echo "<script>alert('Login Successful!');</script>";
            }
            else if ($k == 1)
            {
                echo "<script>alert('Wrong Password!');</script>";
            }
            else
            {
                echo "<script>alert('User Not Found!');</script>";
            }
        }
        else
        {
            echo "<script>alert('Database connection failed.');</script>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $obj = new login();
    $obj->login();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facebook Login Page | CodingNepal</title>
    <link rel="stylesheet" href="fb.css">
</head>
<body>
<div class="container flex">
    <div class="facebook-page flex">
        <div class="text">
            <h1>facebook</h1>
            <p>Connect with friends and Enjoy New Friends</p>
            <p>around you on Facebook.</p>
        </div>
        <form name="f" method="POST" action="">
            <input type="text" name="t1" placeholder="Email or phone number" required>
            <input type="password" name="t2" placeholder="Password" required>
            <div class="link">
                <button type="submit" class="login">Login</button>
                <a href="#" class="forgot">Forgot password?</a>
            </div>
            <hr>
            <div class="button">
                <a href="https://">Create new account</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
