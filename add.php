<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Journal</title>
</head>
<body>

    <?php 
        session_start();

        if(isset($_POST['form-submit'])){
            include_once 'classes/journal.class.php';

            $journal = new Journal();

            $title = htmlentities($_POST['title']);
            $type = htmlentities($_POST['type']);
            $content = htmlentities($_POST['content']);

            $journal->title = $title;
            $journal->type = $type ;
            $journal->content = $content;

            // get image url then add the uploaded file to image
            $target_dir = "images/";

            $file_name = basename($_FILES["imgurl"]["name"]);
            $target_file = $target_dir . $file_name;


            // add img entry
            if(isset($_FILES['imgurl']) && !($_FILES['imgurl']['error'] === UPLOAD_ERR_NO_FILE)){
                if (move_uploaded_file($_FILES["imgurl"]["tmp_name"], $target_file)) {
            
                    // Prepare the image URL for database insertion
                    $journal->imgurl = $target_file; // URL to save in the database
            
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }else{
                $defaultImg = 'images/default.jpg';
                $journal->imgurl = $defaultImg;
            }


            if($journal->add_journal()){
                unset($_POST['form-submit']);
                header('add.php');
            }else{
                echo 'something went wrong';
            }
        }
    ?>

    <div class ="bg-full bg-light d-flex justify-content-center align-items-center ">
        <!-- main container -->
        <div class="journal-container bg-primary rounded-2 p-1" style = "height: 700px; width: 450px;">
            <a href = "index.php" > <button class ="border-style-none" style = "font-size: 2rem"><</button> </a>
            <div class = "text-center">
                <h2>Add Entry</h2>
            </div>
            <form class = "d-flex column" action="add.php" method = "POST" enctype="multipart/form-data">
                <label class = "mb-little" for="title">Title</label>
                <input class = "mb-1 rounded-1 p-little bg-light-brown" style = "font-size: 1.2rem;" type="text" name = "title" id = "title" placeholder = "Title">


                <label class = "mb-little"for="journal-type ">Journal Type</label>
                <select class = "mb-1 rounded-1 p-little bg-light-brown" style = "font-size: 1.2rem;" name="type" id="type" >
                    <option value="">-- Please select an option --</option>
                    <option value="home">Home</option>
                    <option value="travel">Travel</option>
                    <option value="friends">Friends</option>
                    <option value="business">Business</option>
                    <option value="business">Family</option>

                </select>

                <label class = "mb-little" for="content">Content</label>
                <textarea  style = "font-size: 1rem" class = "resize-none mb-1 p-little bg-light-brown" id="w3review" name="content" rows="15" cols="50" placeholder ="Content"></textarea>

                <label class = "mb-little" for="imageUpload">Upload an Image:</label>
                <input class = "mb-1" type="file" id="imageUpload" name="imgurl" accept="image/*">
                <button  type="submit" name = "form-submit">Submit</button>
            </form>
        </div>
    </div>


   
</body>
</html>