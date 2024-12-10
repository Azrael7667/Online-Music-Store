<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="login-container bg-white shadow p-4 border rounded mt-5">
                    <form action="login1.php" method="POST">
                        <div class="mb-4">
                            <h2 class="login-heading">Admin Login</h2>
                        </div>
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control"
                                placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="userpassword" class="form-label">Password</label>
                            <input type="password" id="userpassword" name="userpassword" class="form-control"
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-login btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
