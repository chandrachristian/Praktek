<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url('https://source.unsplash.com/u27Rrbs9Dwc');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-bottom: 80px;
            margin: 0;
        }

        .btn-container {
            text-align: center;
        }

        .btn-container .btn {
            margin-bottom: 10px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 14px;
        }

        .footer-icon {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="btn-container">
            <a href="./lib/krs/index.php" class="btn btn-primary btn-lg">KRS</a>
            <a href="./lib/mhs/index.php" class="btn btn-primary btn-lg">Mahasiswa</a>
            <a href="./lib/mk/index.php" class="btn btn-primary btn-lg">Matakuliah</a>
        </div>
    </div>

    <footer class="footer">
        created by <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
        </svg> CK

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>