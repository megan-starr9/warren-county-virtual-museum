 
      
    <div class="container">
        
        <div class="row">
            <div class="span5 offset1">
                <?php 
                    echo ( ! empty($error) ? '<font color="red">'.$error.'</font>' : '' );
                    echo '<br>';
                ?>
                <h4>Curator Login</h4>
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
