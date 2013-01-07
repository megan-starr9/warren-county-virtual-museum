 
            <div class="span9">
                
                <?php
                echo '<h4>'.$page.'</h4>';
                if($this->bitauth->has_role('can_edit_artifacts'))
                {
                    ?>
                
                        <form action="<?php echo current_url(); ?>" method="post">
                            <fieldset>
                                <label>Title</label>
                                <input type="text" name="Title" class="input-xlarge"><br>
                                <label>Organization</label>
                                <?php echo form_dropdown('Org', $this->config->item('orgs')); ?>
                                <br>
                                <button type="submit" class="btn">Submit</button>
                            </fieldset>
                        </form>
                
                    <?php
                } else {
                    echo '<p>You do not have permission to ann or edit artifacts.</p>';
                }
                ?>

                
            </div>
</div>
