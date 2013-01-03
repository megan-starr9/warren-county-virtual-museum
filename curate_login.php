 
      
    <div class="container">
        <div class="top-unit">
        </div>
        
        <div class="row">
            <div class="span6 offset4">
                <?php 
                    echo ( ! empty($error) ? '<font color="red">'.$error.'</font>' : '' );
                    echo '<br>';
                ?>
                <form action="<?php echo current_url(); ?>" method="post">
                    <fieldset>
                        <label>Username:</label>
                        <input type="text" name="username">
                        <label>Password:</label>
                        <input type="password" name="password">
                        <br>
                        <button type="submit" class="btn">Submit</button>
                    </fieldset>
                </form>
                
            </div>
        </div>
