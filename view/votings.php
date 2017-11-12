<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Votings</title>
        <link rel="stylesheet" href="assets/css/main.css"
    </head>
    <body>      
        
        <form action="index.php" method="get">
            <div class="poll-options">
                <div class="poll-option">
                    <?php if(!empty($votedUsers)): ?>
                        <label > You have already Voted! </label>
                    <?php else: ?>
                        <label > Are you going to vote? </label>
                        <input type="radio" name="op" value="new">
                        <input type="submit" value="Continue">
                    <?php endif; ?>
                </div>                      
            </div>        
            <br>
        </form>
        
        <label > Nationally Votes</label>
        <table class="votings" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><a>Name</a></th>
                    <th><a>Votes</a></th>                  
                </tr>
            </thead>
            <tbody>
            <?php foreach ($votings as $voting): ?>
                <tr>
                    <td><?php print $voting->name; ?></a></td>
                    <td><?php print number_format($voting->percentage, 2); ?> %</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <br>
        <?php if(empty($votingsForRegion)): ?>
            <label > There are no Voting for your Region! </label>
        <?php else: ?>
            <label > Votings in : <?php print $votingsForRegion[0]->region_name; ?> </label>
            <table class="votings" border="0" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th><a>Name</a></th>
                        <th><a>Votes</a></th>                  
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($votingsForRegion as $voting): ?>
                    <tr>
                        <td><?php print $voting->name; ?></a></td>
                        <td><?php print number_format($voting->percentage, 2); ?> %</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </body>
</html>
