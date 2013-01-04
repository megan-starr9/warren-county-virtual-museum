 
      

            <div class="span9">
                <h4>Welcome to the Warren County Virtual Museum Curator's Desk</h4>
                <dl>
                    <dt>Username</dt>
                    <dd><?php echo $this->bitauth->fullname; ?></dd>
                    <dt>Email</dt>
                    <dd><?php echo $this->bitauth->email; ?></dd>
                    <dt>Permissions</dt>
                        <?php 
                            if($this->bitauth->has_role('admin'))
                            {
                                echo '<dd>';
                                echo 'Administrator'; 
                                echo '</dd>';
                            }
                            if($this->bitauth->has_role('can_edit_all'))
                            {
                                echo '<dd>';
                                echo 'Can Edit All VM Items'; 
                                echo '</dd>';
                            }
                            if($this->bitauth->has_role('can_edit_tags'))
                            {
                                echo '<dd>';
                                echo 'Can Edit Muesum Tags'; 
                                echo '</dd>';
                            }
                            if($this->bitauth->has_role('can_edit_artifacts'))
                            {
                                echo '<dd>';
                                echo 'Can Edit Muesum Artifacts'; 
                                echo '</dd>';
                            }
                            if($this->bitauth->has_role('can_edit_media'))
                            {
                                echo '<dd>';
                                echo 'Can Edit Muesum Media Objects'; 
                                echo '</dd>';
                            }
                        ?>
                </dl>
                <br>
            </div>
</div>
