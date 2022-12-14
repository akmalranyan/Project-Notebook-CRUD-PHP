<?php 
$conn = mysqli_connect("localhost","root","","notebook");
$notes = mysqli_query($conn, "SELECT * FROM notes");
$reads = mysqli_query($conn, "SELECT * FROM readlist");
$wishes = mysqli_query($conn, "SELECT * FROM wishlist");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/110c64d119.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>

        <div class="fs-1 mt-5 ms-5" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
            Hey, Akmal</div>
        <div class="fs-4 mt-1 ms-5" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
            Organize your life here, enjoy!</div>


        <div class="fs-2 ms-5" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 200px;"><i
                class="fa-solid fa-note-sticky"></i> Notes</div>


        <button type="button" class="btn ms-5 mt-5" data-bs-toggle="modal" data-bs-target="#btnTambahModal"
            style="background-color: #8B7E74; color:white;">
            <i class="fa-solid fa-plus"></i>
        </button>


        <!-- modal tambah -->
        <div class="modal fade" id="btnTambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Note</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="header" class="form-label">Title</label>
                                <input type="text" name="header" class="form-control" id="header"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="main" class="form-label">Main</label>
                                <textarea type="text" name="main" class="form-control text-area" id="main"
                                    aria-describedby="emailHelp">
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="writer" class="form-label">Writer</label>
                                <input type="text" name="writer" class="form-control" id="writer"
                                    aria-describedby="emailHelp">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnTambah">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-evenly flex-wrap">
            <?php foreach ($notes as $note): ?>

            <div class="card shadow-lg m-5 " style="width: 30rem; height: 20rem;">
                <div class="card-body rounded" style="background-color: #495579;">
                    <h3 class=" text-white"><?= $note["id"]; ?></h3>
                    <h5 class="card-title fs-1 text-white"><?= $note["header"]; ?></h5>
                    <p class="card-text text-secondary text-white"><?= $note["main"]; ?></p>
                    <a href="#" class="text-secondary text-white" style="display:block"><?= $note["writer"]; ?></a>
                    <button style="background-color: #E6DDC4;" type="button" class="btn ms-4 mt-5"
                        data-bs-toggle="modal" data-bs-target="#btnModalHapus<?= $note["id"]; ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <button style="background-color: #E6DDC4;" type="button" class="btn ms-4 mt-5"
                        data-bs-toggle="modal" data-bs-target="#btnModalEdit<?= $note["id"]; ?>">
                        <i class="fa-solid fa-pen-clip"></i>
                    </button>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal hapus -->
                <div class="modal fade" id="btnModalHapus<?= $note["id"]; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Note</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this note?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="" method="POST">
                                    <input name="id" type="hidden" value="<?= $note["id"]; ?>">
                                    <button type="submit" class="btn btn-danger" name="btnHapus">Yes, delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal edit -->
            <div class="modal fade" id="btnModalEdit<?= $note["id"]; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <input type="hidden" value="<?= $note["id"]; ?>" name="id" id="id">
                                <div class="mb-3">
                                    <label for="header" class="form-label">Title</label>
                                    <input type="text" name="header" class="form-control" id="header"
                                        aria-describedby="emailHelp" value="<?= $note["header"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="main" class="form-label">Main</label>
                                    <textarea type="text" name="main" class="form-control text-area" id="main"
                                        aria-describedby="emailHelp" value="<?= $note["main"]; ?>">
                                </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="writer" class="form-label">Writer</label>
                                    <input type="text" name="writer" class="form-control" id="writer"
                                        aria-describedby="emailHelp" value="<?= $note["writer"]; ?>">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnUbah">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
        </div>
    </section>
    <hr>
    <section>
        <div class="fs-2 m-5" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><i
                class="fa-solid fa-book"></i></i> Read-List</div>


        <button type="button" class="btn ms-5" data-bs-toggle="modal" data-bs-target="#btnTambahModalRead"
            style="background-color: #8B7E74; color:white;">
            <i class="fa-solid fa-plus"></i>
        </button>
        <div class="d-flex justify-content-evenly flex-wrap m-3">
            <?php foreach ($reads as $read): ?>


            <div class="card shadow" style="width: 18rem; margin-top: 50px;background-color: #181D31;">
                <img src="img/<?= $read["picture"]; ?>" class="card-img-top" alt="..." height="200px">
                <div class="card-body">
                    <h5 class="card-title text-white"><?= $read["title"]; ?></h5>
                    <p class="card-text text-secondary"><?= $read["descript"]; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $read["author"]; ?></li>
                    <li class="list-group-item"><?= $read["yr_published"]; ?></li>
                    <li class="list-group-item"><?= $read["price"]; ?></li>
                    <li class="list-group-item">
                        <button style="background-color: #E6DDC4;" type="button" class="btn ms-4 mt-2"
                            data-bs-toggle="modal" data-bs-target="#btnModalHapusBuku<?= $read["id"]; ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button style="background-color: #E6DDC4;" type="button" class="btn ms-4 mt-2"
                            data-bs-toggle="modal" data-bs-target="#btnModalEditBuku<?= $read["id"]; ?>">
                            <i class="fa-solid fa-pen-clip"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- modal tambah -->
            <div class="modal fade" id="btnTambahModalRead" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book to Readlist</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="header" class="form-label">image</label>
                                    <input type="file" name="header" class="form-control" id="header"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control text-area" id="title"
                                        aria-describedby="emailHelp">
                                    </input>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Description</label>
                                    <textarea type="text" name="deskripsi" class="form-control" id="deskripsi"
                                        aria-describedby="emailHelp" rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" name="author" class="form-control text-area" id="author"
                                        aria-describedby="emailHelp">
                                    </input>
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year Published</label>
                                    <input type="text" name="year" class="form-control text-area" id="year"
                                        aria-describedby="emailHelp">
                                    </input>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control text-area" id="price"
                                        aria-describedby="emailHelp">
                                    </input>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnTambahBuku">Create List</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal hapus -->
            <div class="modal fade" id="btnModalHapusBuku<?= $read["id"]; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Readlist</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Are you sure you want to delete <span
                                    style="text-decoration: underline;"><?= $read["title"]; ?></span> from Readlist?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="" method="POST">
                                <input name="id" type="hidden" value="<?= $read["id"]; ?>">
                                <button type="submit" class="btn btn-danger" name="btnHapusBuku">Yes, delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal edit -->
            <div class="modal fade" id="btnModalEditBuku<?= $read["id"]; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Readlist</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $read["id"]; ?>" name="id" id="id">
                                <div class="mb-3">
                                    <label for="pict" class="form-label">image</label>
                                    <input type="file" name="pict" class="form-control" id="pict"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        aria-describedby="emailHelp" value="<?= $read["title"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Description</label>
                                    <textarea type="text" name="deskripsi" class="form-control text-area" id="deskripsi"
                                        aria-describedby="emailHelp" value="<?= $read["descript"]; ?>">
                                </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" name="author" class="form-control" id="author"
                                        aria-describedby="emailHelp" value="<?= $read["author"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="text" name="year" class="form-control" id="year"
                                        aria-describedby="emailHelp" value="<?= $read["yr_published"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                        aria-describedby="emailHelp" value="<?= $read["price"]; ?>">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnUbahBuku">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <hr class="mt-5">
    <section>
        <div class="fs-2 m-5" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><i
                class="fa-regular fa-square-check"></i> Wishlist</div>

        <!-- Card wishlist -->

        <button type="button" class="btn ms-5" data-bs-toggle="modal" data-bs-target="#btnTambahModalWish"
            style="background-color: #8B7E74; color:white;">
            <i class="fa-solid fa-plus"></i>
        </button>

        <!-- Modal tambah wish -->
        <div class="modal fade" id="btnTambahModalWish" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Wishlist</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="user" class="form-label">Writer</label>
                                <input type="text" name="user" class="form-control" id="user"
                                    aria-describedby="emailHelp" placeholder="your name">
                            </div>
                            <div class="mb-3">
                                <label for="badge" class="form-label">Occasion</label>
                                <input type="text" name="badge" class="form-control" id="badge"
                                    aria-describedby="emailHelp" placeholder="the event">
                            </div>
                            <div class="mb-3">
                                <label for="created" class="form-label">Created at</label>
                                <input type="datetime-local" name="created" class="form-control" id="created"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Title</label>
                                <input type="text" name="judul" class="form-control text-area" id="judul"
                                    aria-describedby="emailHelp" placeholder="title of your wish">
                            </div>
                            <div class="mb-3">
                                <label for="target" class="form-label">Target</label>
                                <input type="text" name="target" class="form-control" id="target"
                                    aria-describedby="emailHelp" placeholder="when you want this wish to be reached">
                            </div>
                            <div class="mb-3">
                                <label for="image2" class="form-label">Description Image</label>
                                <input type="file" name="image2" class="form-control" id="image2"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="judul2" class="form-label">Description Title</label>
                                <input type="text" name="judul2" class="form-control text-area" id="judul2"
                                    aria-describedby="emailHelp" placeholder="title of your wish">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                    aria-describedby="emailHelp" placeholder="Your wish description">
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnTambahWish">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-3">
            <div class="">
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach ($wishes as $wish): ?>
                    <div class="card p-3 mx-3 mb-2">

                        <div class="d-flex flex-col justify-content-between">
                            <div class="d-flex flex-row">
                                <div class="icon overflow-hidden" style="border-radius: 200px;"> <img src="img/<?= $wish["image"]; ?>" alt="" width="50px" height="50px"> </div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0"><?= $wish["user"]; ?></h6> <span><?= $wish["created"]; ?></span>
                                </div>
                            </div>
                            <div class="badge"> <span><?= $wish["badge"]; ?></span> </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="heading"><?= $wish["judul"]; ?></h3>
                            <div class="mt-5">
                                <div class="mt-3"> <span class="text1">Target reached<span class="text2"> in</span>
                                        <?= $wish["target"]; ?></span> </div>
                            </div>
                        </div>
                        <div class="inline">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-5 px-5" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop<?= $wish["id"]; ?>">
                                Details
                            </button>
                            <button style="background-color: #E6DDC4; margin-left:120px;" type="button" class="btn mt-5"
                                data-bs-toggle="modal" data-bs-target="#btnModalHapusWish<?= $wish["id"]; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button style="background-color: #E6DDC4;" type="button" class="btn ms-4 mt-5"
                                data-bs-toggle="modal" data-bs-target="#btnModalEditWish<?= $wish["id"]; ?>">
                                <i class="fa-solid fa-pen-clip"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Modal detalis -->
                    <div class="modal fade" id="staticBackdrop<?= $wish["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Wish Detail</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex center">
                                        <div class=""><img src="img/<?= $wish["image2"]; ?>" alt="" class="ikon block"
                                                height="250px" height="250px">
                                        </div>
                                    </div>
                                    <br>
                                    <span class="mt-4 fs-2 text-bold"><?= $wish["judul2"]; ?></span>
                                    <br>
                                    <span class="mt-4 fs-6 text-secondary"><?= $wish["deskripsi"]; ?></span>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <span class="text-secondary"
                                        style="text-decoration: underline;"><?= $wish["user"]; ?></span>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="btnModalHapusWish<?= $wish["id"]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Wishlist</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are you sure you want to delete <span
                                            style="text-decoration: underline;"><?= $wish["judul"]; ?></span> from
                                        Wishlist?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="" method="POST">
                                        <input name="idWish" type="hidden" value="<?= $wish["id"]; ?>">
                                        <button type="submit" class="btn btn-danger" name="btnHapusWish">Yes,
                                            delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal edit wish -->
                    <div class="modal fade" id="btnModalEditWish<?= $wish["id"]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Wishlist</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" value="<?= $wish["id"]; ?>" name="id" id="id">
                                        <div class="mb-3">
                                            <label for="uimage" class="form-label">Image</label>
                                            <input type="file" name="uimage" class="form-control" id="uimage"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="uuser" class="form-label">Writer</label>
                                            <input type="text" name="uuser" class="form-control" id="uuser"
                                                aria-describedby="emailHelp" placeholder="your name"
                                                value="<?= $wish["user"]; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ubadge" class="form-label">Occasion</label>
                                            <input type="text" name="ubadge" class="form-control" id="ubadge"
                                                aria-describedby="emailHelp" placeholder="the event"
                                                value="<?= $wish["badge"]; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ucreated" class="form-label">Created at</label>
                                            <input type="datetime-local" name="ucreated" class="form-control"
                                                id="ucreated" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ujudul" class="form-label">Title</label>
                                            <input type="text" name="ujudul" class="form-control text-area" id="ujudul"
                                                aria-describedby="emailHelp" placeholder="title of your wish"
                                                value="<?= $wish["judul"]; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="utarget" class="form-label">Target</label>
                                            <input type="text" name="utarget" class="form-control" id="utarget"
                                                aria-describedby="emailHelp"
                                                placeholder="when you want this wish to be reached"
                                                value="<?= $wish["target"]; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="uimage2" class="form-label">Description Image</label>
                                            <input type="file" name="uimage2" class="form-control" id="uimage2"
                                                aria-describedby="emailHelp"">
                                        </div>
                                        <div class=" mb-3">
                                            <label for="ujudul2" class="form-label">Description Title</label>
                                            <input type="text" name="ujudul2" class="form-control text-area"
                                                id="ujudul2" aria-describedby="emailHelp"
                                                placeholder="title of your wish" value="<?= $wish["judul2"]; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="udeskripsi" class="form-label">Description</label>
                                            <textarea type="text" name="udeskripsi" class="form-control" id="udeskripsi"
                                                aria-describedby="emailHelp" placeholder="Your wish description"
                                                value="<?= $wish["deskripsi"]; ?>" rows="5">
                                            </textarea>
                                        </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="btnEditWish">Edit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Akhir card wishlist -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 


//isset note section
if(isset($_POST["btnHapus"])){
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        mysqli_query($conn,"DELETE FROM notes WHERE id = $id");
        echo"<script>document.location.href = 'index.php'</script>";
    }
}



if(isset($_POST["btnTambah"])){
    $header = htmlspecialchars($_POST["header"]);
    $main = htmlspecialchars($_POST["main"]);
    $writer = htmlspecialchars($_POST["writer"]);
    mysqli_query($conn, "INSERT INTO notes (header, main, writer) VALUES ('$header','$main','$writer')");
    echo "<script>
    document.location.href='index.php'
    </script>";
}

if(isset($_POST["btnUbah"])){
    $id = $_POST["id"];
    $header = htmlspecialchars($_POST["header"]);
    $main = htmlspecialchars($_POST["main"]);
    $author = htmlspecialchars($_POST["author"]);
    mysqli_query($conn, "UPDATE `readlist` SET `header` = '$header', `main` = '$main', `writer` = '$writer' WHERE `id` = $id;");
    echo "<script>
    document.location.href='index.php'
    </script>";
}

//isset buku section
if(isset($_POST["btnHapusBuku"])){
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        mysqli_query($conn,"DELETE FROM readlist WHERE id = $id");
        echo"<script>document.location.href = 'index.php'</script>";
    }
}

if(isset($_POST["btnTambahBuku"])){
    $namafile = $_FILES["header"]["name"];
    $ukuranfile = $_FILES["header"]["size"];
    $error = $_FILES["header"]["error"];
    $tmp_name = $_FILES["header"]["tmp_name"];
    $title = $_POST["title"];
    $deskripsi = $_POST["deskripsi"];
    $author = $_POST["author"];
    $year = $_POST["year"];
    $price = $_POST["price"];
    
    //cek apa yang terjadi apabila gambar tidak dimasukan
    if($error === 4){
        echo "<script>
        alert('Please insert a file')
    </script>";
    return false;
    }
    //cek apakah file yang diupload merupakan gambar
    $extensivalid = ['jpg', 'jpeg', 'png'];
    $extensi = explode('.',$namafile);
    $extensi = strtolower(end($extensi));

    //cek apakah isinya ada atau tidak
    if(!in_array($extensi, $extensivalid)){
        echo "<script>
        alert('Only picture that can be tolerated')
    </script>";
    return false;
    }

    //cek ukuran file
    if($ukuranfile > 1000000){
        echo "<script>
        alert('What is this? an asteroid? its too big')
    </script>";
    return false;
    }

    //buat nama file baru, biar file dengan nama yang sama gak ke replace
    $namafilebaru = uniqid().".".$extensi;

    //pindahkan file ke penyimpanan
    move_uploaded_file($tmp_name, 'img/'.$namafilebaru);

    //buat variabel yang akan dikirim ke database
    $namagambar = $namafilebaru;
    
    $conn = mysqli_connect("localhost","root","","notebook");
    mysqli_query($conn, "INSERT INTO `readlist` (`id`, `picture`, `title`, `descript`, `author`, `yr_published`, `price`) VALUES (NULL, '$namagambar', '$title', '$deskripsi', '$author', '$year', '$price');");
    echo "<script>
    document.location.href='index.php'
    </script>";


    
}
if(isset($_POST["btnUbahBuku"])){
    $id = $_POST["id"];
    $namafile = $_FILES["pict"]["name"];
    $ukuranfile = $_FILES["pict"]["size"];
    $error = $_FILES["pict"]["error"];
    $tmp_name = $_FILES["pict"]["tmp_name"];
    $title = htmlspecialchars($_POST["title"]);
    $descpt = htmlspecialchars($_POST["deskripsi"]);
    $author = htmlspecialchars($_POST["author"]);
    $year = htmlspecialchars($_POST["year"]);
    $price = htmlspecialchars($_POST["price"]);
    
    //cek apakah file yang diupload merupakan gambar
    $extensivalid = ['jpg', 'jpeg', 'png'];
    $extensi = explode('.',$namafile);
    $extensi = strtolower(end($extensi));

    //cek apakah isinya ada atau tidak
    if(!in_array($extensi, $extensivalid)){
        echo "<script>
        alert('Only picture that can be tolerated')
    </script>";
    return false;
    }

    //cek ukuran file
    if($ukuranfile > 1000000){
        echo "<script>
        alert('What is this? an asteroid? its too big')
    </script>";
    return false;
    }

    //buat nama file baru, biar file dengan nama yang sama gak ke replace
    $namafilebaru = uniqid().".".$extensi;

    //pindahkan file ke penyimpanan
    move_uploaded_file($tmp_name, 'img/'.$namafilebaru);

    //buat variabel yang akan dikirim ke database
    $namagambar = $namafilebaru;
    
    $conn = mysqli_connect("localhost","root","","notebook");


    mysqli_query($conn, "UPDATE `readlist` SET `picture` = '$namagambar', `title` = '$title', `descript` = '$descpt', `author` = '$author', `yr_published` = '$year', `price` = '$price' WHERE `id` = $id;");
    echo "<script>
    document.location.href='index.php'
    </script>";
}

//isset section wishlist

if(isset($_POST["btnHapusWish"])){
    if(isset($_POST["idWish"])){
        $id = $_POST["idWish"];
        mysqli_query($conn,"DELETE FROM wishlist WHERE id = $id");
        echo"<script>document.location.href = 'index.php'</script>";
    }
}

if(isset($_POST["btnEditWish"])){
    $id = $_POST["id"];
    $namafile = $_FILES["uimage"]["name"];
    $ukuranfile = $_FILES["uimage"]["size"];
    $error = $_FILES["uimage"]["error"];
    $tmp_name = $_FILES["uimage"]["tmp_name"];
    $uname = htmlspecialchars($_POST["uuser"]);
    $ucreated = htmlspecialchars($_POST["ucreated"]);
    $ubadge = htmlspecialchars($_POST["ubadge"]);
    $ujudul = htmlspecialchars($_POST["ujudul"]);
    $ujudul2 = htmlspecialchars($_POST["ujudul2"]);
    $utarget = htmlspecialchars($_POST["utarget"]);
    $namafile2 = $_FILES["uimage2"]["name"];
    $ukuranfile2 = $_FILES["uimage2"]["size"];
    $error2 = $_FILES["uimage2"]["error"];
    $tmp_name2 = $_FILES["uimage2"]["tmp_name"];
    $udeskripsi = htmlspecialchars($_POST["udeskripsi"]);

    //cek apa yang terjadi apabila gambar tidak dimasukan
    
    //cek apakah file yang diupload merupakan gambar
    $extensivalid = ['jpg', 'jpeg', 'png'];
    $extensi = explode('.',$namafile);
    $extensi2 = explode('.',$namafile2);
    $extensi = strtolower(end($extensi));
    $extensi2 = strtolower(end($extensi2));

    //cek apakah isinya ada atau tidak
    if(!in_array($extensi, $extensivalid)){
        echo "<script>
        alert('Only picture that can be tolerated')
    </script>";
    return false;
    }

    //cek ukuran file
    if($ukuranfile > 10000000){
        echo "<script>
        alert('What is this? an asteroid? this picture is too big')
    </script>";
    return false;
    }

    //buat nama file baru, biar file dengan nama yang sama gak ke replace
    $namafilebaru = uniqid().".".$extensi;
    $namafilebaru2 = uniqid().".".$extensi2;

    //pindahkan file ke penyimpanan
    move_uploaded_file($tmp_name, 'img/'.$namafilebaru);
    move_uploaded_file($tmp_name2, 'img/'.$namafilebaru2);

    //buat variabel yang akan dikirim ke database
    $namagambar = $namafilebaru;
    $namagambar2 = $namafilebaru2;
    
    $conn = mysqli_connect("localhost","root","","notebook");
    mysqli_query($conn, "UPDATE `wishlist` SET `image` = '$namagambar', `user` = '$uname', `judul` = '$ujudul', `badge` = '$ubadge', `target` = '$utarget', `image2` = '$namagambar2', `judul2` = '$ujudul2', `deskripsi` = '$udeskripsi' WHERE `id` = $id;");
    echo"<script>document.location.href = 'index.php'</script>";
}

if(isset($_POST["btnTambahWish"])){
    $namafile = $_FILES["image"]["name"];
    $ukuranfile = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $name = htmlspecialchars($_POST["user"]);
    $created = htmlspecialchars($_POST["created"]);
    $badge = htmlspecialchars($_POST["badge"]);
    $judul = htmlspecialchars($_POST["judul"]);
    $judul2 = htmlspecialchars($_POST["judul2"]);
    $target = htmlspecialchars($_POST["target"]);
    $namafile2 = $_FILES["image2"]["name"];
    $ukuranfile2 = $_FILES["image2"]["size"];
    $error2 = $_FILES["image2"]["error"];
    $tmp_name2 = $_FILES["image2"]["tmp_name"];
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    

    //cek apa yang terjadi apabila gambar tidak dimasukan
    if($error === 4){
        echo "<script>
        alert('Please insert a file')
    </script>";
    return false;
    }
    //cek apakah file yang diupload merupakan gambar
    $extensivalid = ['jpg', 'jpeg', 'png'];
    $extensi = explode('.',$namafile);
    $extensi2 = explode('.',$namafile2);
    $extensi = strtolower(end($extensi));
    $extensi2 = strtolower(end($extensi2));

    //cek apakah isinya ada atau tidak
    if(!in_array($extensi, $extensivalid)){
        echo "<script>
        alert('Only picture that can be tolerated')
    </script>";
    return false;
    }

    //cek ukuran file
    if($ukuranfile > 1000000){
        echo "<script>
        alert('What is this? an asteroid? its too big')
    </script>";
    return false;
    }

    //buat nama file baru, biar file dengan nama yang sama gak ke replace
    $namafilebaru = uniqid().".".$extensi;
    $namafilebaru2 = uniqid().".".$extensi2;

    //pindahkan file ke penyimpanan
    move_uploaded_file($tmp_name, 'img/'.$namafilebaru);
    move_uploaded_file($tmp_name2, 'img/'.$namafilebaru2);

    //buat variabel yang akan dikirim ke database
    $namagambar = $namafilebaru;
    $namagambar2 = $namafilebaru2;
    
    $conn = mysqli_connect("localhost","root","","notebook");
    mysqli_query($conn, "INSERT INTO `wishlist` (`id`, `image`, `user`, `created`, `judul`, `badge`, `target`, `image2`, `judul2`, `deskripsi`) VALUES (NULL, '$namagambar', '$name', '$created', '$judul', '$badge', '$target', '$namagambar2', '$judul2', '$deskripsi');");
    echo"<script>document.location.href = 'index.php'</script>";
}
?>