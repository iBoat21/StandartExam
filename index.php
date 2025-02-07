<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>

<body?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-center"> <a class="navbar-brand mx-auto" href="#">NVC - Library</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?menu=main">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=br_his">Borrow Book History</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=books" class="nav-link">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact US</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="conatiner">
    <?php
        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
        }else{
            $menu = "";
        }
        switch ($menu) {
            case 'main': {
                $page = "main.php";
                break;
                }
            case 'br_his': {
                $page = "borrowHistory.php";
                break;
                }
            case 'summarize' : {
                $page = "summarize.php";
                break;
            }
            case 'books' : {
                $page = "books.php";
                break;
            }
            case 'bookId' : {
                $page = "books_id.php";
                break;
            }
            case 'bookName' : {
                $page = "books_name.php";
                break;
            }
            case 'bookAuthor' : {
                $page = "books_auth.php";
                break;
            }
            default : {
                $page = "main.php";
                break;
            }
        }
        include($page);
        ?>
    </div>


    <!-- bs5 library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>