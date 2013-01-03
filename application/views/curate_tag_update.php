 
            <div class="span9">
                <h4>Tag Update</h4>
                
                

                <form action="<?php echo base_url(); ?>curate/process_update_tag/<?php echo $tag_id; ?>" method="post">
                    <fieldset>
                        <input type="text" name="Tag_Text" class="input-xlarge" value="<?php echo $tag_text; ?>"><br>
                        <button type="submit" class="btn">Submit</button>
                    </fieldset>
                </form>

                
                
                
            </div>
</div>
