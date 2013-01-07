 
            <div class="span9">
                
                <?php
                echo '<h4>'.$page.'</h4>';
                if($this->bitauth->has_role('can_edit_artifacts'))
                {
                	// Set values for form if editing existing artifact
                	if(isset($artifact_info))
                	{
                		$form_title = $artifact_info['Title'];
                		$form_org = $artifact_info['Org'];
                		$form_desc = $artifact_info['Description'];
                	} else {
                		
						$form_title = '';
						$form_org = '';
						$form_desc = '';
					}
                    ?>
                
                        <form action="<?php echo current_url(); ?>" method="post">
                            <fieldset>
                                <label>Title</label>
                                <input type="text" name="Title" class="input-xlarge" value="<?php echo $form_title; ?>"><br>
                                <label>Organization</label>
                                <!-- Todo: Set existing artifact value -->
                                <?php echo form_dropdown('Org', $this->config->item('orgs')); ?>
         						<br>
                                <label>Description</label>
                                <textarea name="Description"><?php echo $form_desc; ?></textarea>
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
