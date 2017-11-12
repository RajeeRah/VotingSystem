<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
        <?php print $title; ?>
        </title>
        <link rel="stylesheet" href="assets/css/main.css"
    </head>
    <body>
        <?php
        if ( $errors ) {
            print '<ul class="errors">';
            foreach ( $errors as $field => $error ) {
                print '<li>'.$error.'</li>';
            }
            print '</ul>';
        }
        ?>
        <form method="POST" action="">
            <label for="name"><?php print $title; ?></label><br/>
            <br/>
            
                    <div class="poll-options">

                        <?php foreach($polls as $poll): ?>
                        <div class="poll-option">
                            <input type="radio" name="poll" value="<?php echo $poll->option_id; ?>">
                            <label > <?php echo $poll->name; ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
            
            <input type="hidden" name="form-submitted" value="1" />
            <input type="submit" value="Submit" />
        </form>
        
    </body>
</html>
