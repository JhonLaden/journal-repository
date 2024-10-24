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
    
        if(isset($_GET['journal_id'])){
            $journal->id = $_GET['journal_id'];
            $selected_journal = $journal->select_journal();
           
        }else if(isset($_GET['delete_id'])){
            $journal->id = $_GET['delete_id'];
            if($journal->delete_journal()){
                header('index.php');
            }
        }
    ?>
        
    <div class ="bg-full bg-light d-flex justify-content-center align-items-center ">
        <div class="journal-container bg-primary rounded-2 p-half " style = "height: 700px; width: 450px; overflow:scroll;">
            <section class = "mb-1"> 
                <a style = "font-size: 2rem;"  href = "index.php" > <i class="fa-solid fa-chevron-left"></i> </a>

             </section>
            <section class = "mb-2">
                <div class ="mb-little">
                    <p class = "text-blue"><?php $date = new DateTime($selected_journal['create_at']); echo $date->format('d F Y');?></p>
                    <p class = "" style = "width: 200px; font-weight:bold; font-size: 1rem;" >
                        <?php echo $selected_journal['title']?>
                    </p>
                </div>
                <div class ="d-flex" style = "font-size:0.9rem; opacity: 90%;" >
                    <div style = "margin-right: 1em; ">
                        <i class="fa-regular fa-clock" ></i>
                        <?php $time = new DateTime($selected_journal['create_at']); echo $time->format('H:i')?>
                    </div>
                    <div>
                        <i class="fa-regular fa-bookmark"></i>

                        <?php echo $selected_journal['type']?>
                    </div>
                </div>
            </section>
            <section class = "w-100 mb-2">
                <div class="img-container " style = "height: 250px; width: 100%;">
                    <img class = "rounded-3 card-shadow"  src="<?php echo $selected_journal['img_url'] ?>" style = "height:100%; width: 100%; object-fit:cover;" alt="journal-image">
                </div>
            </section>
            <section>
                <p class = "preserve-format mb-2"><?php echo $selected_journal['content']?></p>
            </section >
                
            <section class = "d-flex justify-content-end w-100"> 
                 <a href = "delete.php?delete_id=<?php echo $_GET['journal_id'];?>"> 
                    <button class = "button-delete button-customized bg-light-brown p-1 rounded-2" style = "margin-right: 1em;" ><i class="fa-regular fa-pen-to-square"></i> Delete Entry</button>
                </a>
                <a href = "edit.php?journal_id=<?php echo $selected_journal['id']?>"> 
                    <button class = "button-customized bg-light-brown p-1 rounded-2" ><i class="fa-regular fa-pen-to-square"></i> Edit Entry</button>
                </a>
            </section>
        </div>
    </div>
    
    
</body>
</html>