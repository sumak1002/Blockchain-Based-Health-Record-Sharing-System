 <input type="hidden" name="type" value="<?php echo $row['ID']; ?>" />
    <a href="#" style="padding:10px; background-color:#7CCAE7; color:white;" onclick="document.getElementById('myForm<?php echo $row['ID']; ?>').submit();">
    <?php echo $row['Project_name']; ?></a><br><br>