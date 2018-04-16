<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<section>


    <form action="upload.php" enctype="multipart/form-data" method="post">

        <div>
            <label for='upload'>telechargement fichier:</label>
            <input id='upload' name="upload[]" type="file" multiple="multiple" />
        </div>

        <p><input type="submit" name="submit" value="Submit"></p>

    </form>

</section>

<section>



    <div class="row">
        <?php
        $allImages = scandir('upload/');
        $images = array_diff($allImages, array('.','..'));
        ?>

        <?php
        if (!empty($_GET['image'])) {
            if (file_exists('upload/'.$_GET['image'])) {
                $deleteResult = unlink('upload/'.$_GET['image']);
                header('Location: index.php');
            }
        }
        ?>

        <?php foreach ($images as $image): ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?= 'upload/'.$image ?>" alt="<?= $image ?>">
                    <div class="caption">
                        <h3><?= $image ?></h3>
                        <p><a href="?image=<?= $image ?>" class="btn btn-danger" role="button">Supprimer</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
