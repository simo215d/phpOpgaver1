<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container border-left border-right min-vh-100">
        <div class="row justify-content-center text-center border-bottom">
            <div class="col-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Select image to upload:</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="fileToUpload" id="customFile">
                        <label class="custom-file-label text-left" for="customFile">Choose file</label>
                    </div>
                    <input type="submit" value="Upload Image" name="submit" class="btn btn-light">
                </form>
                <div class="mt-3">
                    <?php
                        //denne kode håndtere filupload og fejlhåndtering echos
                        if(isset($_POST["submit"])) {
                            $target_dir = "uploadedImages/";
                            //specifies the path of the file to be uploaded
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            //the file extension of the file (in lower case)
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            //Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check == true) {
                                echo "File is an image - " . $check["mime"] . ".<br>";
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk==0) {
                                echo "Sorry, there was an error uploading your file.<br>";
                            }
                            else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
                            } else {
                                echo "Sorry, there was an error uploading your file.<br>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-8 float-right text-center">
                <?php
                    //min mappe med billeder
                    $dirname = "uploadedImages/";
                    //glob laver en liste med alle navne og alle filtyper fra min mappe
                    $images = glob($dirname."*.*");
                    //iterer gennem listen og echo dem ud som html billeder
                    foreach($images as $image) {
                        echo '<img class="mr-4 ml-4 mb-5" src="'.$image.'" height=100px width=100px>';
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        //dette script gør så man kan se filnavnet som man vil uploade
        $('#customFile').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
</body>
</html>