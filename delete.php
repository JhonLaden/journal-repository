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

       
    <?php  session_start(); 
        include_once 'classes/journal.class.php';
        $journal = new Journal();
    
        if(isset($_GET['delete_id'])){
            $journal->id = $_GET['delete_id'];
            echo $journal->id;
            if($journal->delete_journal()){
                header('Location: index.php');
                exit();
            }
        }
    ?>
    
    
</body>
</html>