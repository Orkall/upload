



<?php
if(isset($_POST['submit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            $types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
            if ($_FILES['upload']['size'][$i] > 1000000) {
                $errors['size'] = 'fichier trop volumineux';
            }
            elseif (!in_array($_FILES['upload']['type'][$i], $types)) {
                $errors['type'] = 'ce n\'est pas le bon format';
            }
            else {
                $fileName = 'image' . rand() . '.' . pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
                $moveResult [] = move_uploaded_file($_FILES['upload']['tmp_name'][$i], 'upload/' . $fileName);
            }
        }
    }
    $images = array_diff(scandir('upload'), array('.', '..'));
}
header('Location: index.php');
