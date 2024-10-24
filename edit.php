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

        include_once 'classes/journal.class.php';
        $journal = new Journal();

        $journal->id = htmlentities($_GET['journal_id']);
        $selected_journal = $journal->select_journal();

        var_dump($selected_journal['title']);
        if(isset($_POST['form-submit'])){
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

            if(isset($_FILES['imgurl']) && !($_FILES['imgurl']['error'] === UPLOAD_ERR_NO_FILE)){
                if (move_uploaded_file($_FILES["imgurl"]["tmp_name"], $target_file)) {
        
                    // Prepare the image URL for database insertion
                    $journal->imgurl = $target_file; // URL to save in the database
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }else{
                $journal->imgurl = $selected_journal['img_url'];
            }
            
            if($journal->update_journal()){
                unset($_POST['form-submit']);
                unset($_FILES['imgrul']);
                $selected_journal = $journal->select_journal();
            }else{
                echo 'something went wrong';
            }
        }else{
            
            
        }
    ?>

    <div class ="bg-full bg-light d-flex justify-content-center align-items-center ">
        <!-- main container -->
        <div class="journal-container bg-primary rounded-2 p-1" style = "height: 700px; width: 450px; overflow: scroll;">
            <a href = "view.php?journal_id=<?php echo $_GET['journal_id'] ?>" > 
                <button class ="border-style-none" style = "font-size: 2rem">
                    <i class="fa-solid fa-chevron-left"></i>
                </button> </a>
            <div class = "text-center">
                <h2>Edit Entry</h2>
            </div>
            <form class = "d-flex column" action="edit.php?journal_id=<?php echo $_GET['journal_id']; ?>" method = "POST" enctype="multipart/form-data">
                <label class = "mb-little" for="title">Title</label>
                <input class = "mb-1 rounded-1 p-little bg-light-brown" style = "font-size: 1.2rem;" type="text" name = "title" id = "title" placeholder = "Title" value = "<?php echo($selected_journal['title']) ?>">


                <label class = "mb-little"for="journal-type ">Journal Type</label>
                <select class = "mb-1 rounded-1 p-little bg-light-brown" style = "font-size: 1.2rem;" name="type" id="type" value = "<?php echo $selected_journal['type'] ?>">
                    <option value="">-- Please select an option --</option>
                    <option value="home"  <?php echo($selected_journal['type'] == 'home') ? 'selected' : '';?>>Home</option>
                    <option value="travel" <?php echo($selected_journal['type'] == 'travel') ? 'selected' : '';?>>Travel</option>
                    <option value="friends" <?php echo($selected_journal['type'] == 'friends') ? 'selected' : '';?>>Friends</option>
                    <option value="business" <?php echo($selected_journal['type'] == 'business') ? 'selected' : '';?>>Business</option>
                    <option value="family" <?php echo($selected_journal['type'] == 'family') ? 'selected' : '';?>>Family</option>

                </select>

                <label class = "mb-little" for="content">Content</label>
                <textarea  style = "font-size: 1rem" class = "preserve-format resize-none mb-1 p-little bg-light-brown" id="w3review" name="content" rows="15" cols="50" placeholder =" Content" ><?php echo $selected_journal['content']; ?></textarea>


                <div><p>Current Image</p></div>
                <div class="img-container mb-2" style = "height: 250px; width: 100%;">
                    <img class = "rounded-3 card-shadow"  src="<?php echo $selected_journal['img_url'] ?>" style = "height:100%; width: 100%; object-fit:cover;" alt="journal-image">
                </div>
                <label class = "mb-little" for="imageUpload">Upload new Image:</label>
                <input class = "mb-2" type="file" id="imageUpload" name="imgurl" accept="image/*" ?>

                <button class = "button-customized bg-light-brown p-1 rounded-2" type = "submit" name= "form-submit" ><i class="fa-regular fa-pen-to-square"></i> Submit</button>
            </form>
        </div>
    </div>


   
</body>
</html>