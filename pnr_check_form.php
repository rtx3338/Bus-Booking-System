<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>PNR Check</title>
    <style>
        body    
        {
            background-image: url(https://okcredit-blog-images-prod.storage.googleapis.com/2021/01/bus1.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>PNR Check</h2>
    <form action="pnr_check.php" method="post">
        <div class="form-group">
            <label for="pnr">Enter PNR:</label>
            <input type="text" class="form-control" id="pnr" name="pnr" required>
        </div>
        <button type="submit" class="btn btn-primary">Check PNR</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
