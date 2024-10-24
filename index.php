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
        $journals = $journal->show();
        $recent_journals = $journal->select_recent_journal();
    
    ?>
    

    <div class ="bg-full bg-light d-flex justify-content-center align-items-center ">
        <!-- main container -->
        <div class="journal-container bg-primary rounded-2 p-half relative" style = "height: 700px; width: 450px;">
            
            <section class = "search-container mb-1" >
                <form class = "d-flex align-items-center" action="search.php?" method = "GET">
                    <a href="index.php">
                        <button type="button"><i class="fa-solid fa-house"></i></button>
                    </a>
                    <input class = "w-100 rounded-2 p-1 bg-light-brown border-none" style = "margin-right: 2em; margin-left: 2em;"  type="text" name="search" id="search" placeholder = "Search...">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </section>

            <section class ="mb-2" >
                <h2 class= "text-secondary">Recent Entries</h2>
                <ul class = "journal-images d-flex justify-content-between"> 
                    <?php 
                    if(!empty($recent_journals)){
                    foreach($recent_journals as $value){
                    ?>

                    <li class="img-container " style = "height: 170px; width: 120px;">
                        <a href = "view.php?journal_id=<?php echo $value['id'] ?>"> 
                            <img class = "rounded-2 card-shadow "  src="<?php echo $value['img_url']; ?>" style = "height:100%; width: 100%; object-fit:cover;" alt="journal-image">
                        </a>
                    </li>
                    <?php } 
                    }else{
                        ?>
                        <li class="img-container " style = "height: 170px; width: 100%;">
                            <p class = "text-center">No Record Yet.</p>
                        </li>
                    <?php
                    } ?>
                </ul>
            </section>

            <section class = "recent-entries mb-1 " >
                <h2 class= "text-secondary" >Your Journal</h2>
                <ul class="recent-entries-container " style = "max-height: 310px; overflow-y: scroll">
                    <?php 
                        foreach($journals as $value){
                            
                    ?>
                    
                    <li class="entry-journal" style = "font-size: 0.9rem;">
                        <a class = "entry-container d-flex align-items-center p-1" href = "view.php?journal_id=<?php echo $value['id'] ?>" > 
                            <div class="img-container " style = "height: 100px; width: 70px; margin-right: 1em" >
                                <img class ="rounded-2 card-shadow" src="<?php echo $value['img_url']?>" style = "min-height: 100px; min-width: 70px;  height:100%; width: 100%; object-fit: cover; " alt="journal-list">
                            </div>
                            <div class="d-flex column justify-content-center">
                                <div class ="mb-little">
                                    <p class = "text-blue"><?php $date = new DateTime($value['create_at']); echo $date->format('d F Y');?></p>
                                    <p class = "truncate" style = "width: 200px; font-weight:bold; font-size: 0.8rem;" ><?php echo $value['title']?></p>
                                </div>  
                                <div class ="d-flex" style = "font-size:0.8rem; opacity: 90%;" >
                                    <div style = "margin-right: 1em; ">
                                        <i class="fa-regular fa-clock" ></i>
                                        <?php $time = new DateTime($value['create_at']); echo $time->format('H:i')?>
                                    </div>
                                    <div>
                                        <i class="fa-regular fa-bookmark"></i>
                                        <?php echo $value['type']?>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </li>
                    
                    <?php } ?>
                </ul>
            </section>

            <section class = "add-container absolute" style = "right: 0; bottom: 0; margin-bottom: 2em; margin-right: 2em;"> 
            <a href="add.php">
                <button class="bg-dark rounded-full p-1 d-flex justify-content-center align-items-center" style="height: 50px; width: 50px; border: none;">
                    <i class="text-light fa-solid fa-plus"></i>
                </button>
            </a>


            </section>
        </div>
    </div>
</body>
</html>