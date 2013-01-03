 
            <div class="span9">
                <h4>Tag List</h4>
                <?php
                if($this->bitauth->has_role('can_edit_tags'))
                {
                    echo '<a class="btn btn-mini" href="#ModalTag" data-toggle="modal"><i class="icon-plus-sign"></i> Add New Tag</a>';
                }
                ?>
                <br><br>
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th width="70%">Tag Text</th>
                    <th width="30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($tags->num_rows())
                    {
                        $result = $tags->result();
                        foreach($result AS $row)
                        {
                            echo '<tr>';
                            echo '<td>';
                            echo ucwords($row->Tag_Text);
                            echo '</td>';
                            echo '<td>';
                            if($this->bitauth->has_role('can_edit_tags'))
                            {
                                echo '<a href="'.base_url().'curate/update_tag/'.$row->PK_Tag_Id.'">update</a>&nbsp;|&nbsp;';
                                $deleteText = "return confirm('Confirm tag delete (this cannot be undone!): ".ucwords($row->Tag_Text)."')";
                                echo anchor(base_url().'curate/delete_tag/'.$row->PK_Tag_Id,'delete',array('class'=>'delete','onclick'=>$deleteText));
                            } else {
                                echo 'no edit permission';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
                </table>
                <br>
                
                <div id="ModalTag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal hide fade in" style="display: none;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Add New Tag</h3>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>curate/add_tag" method="post">
                            <fieldset>
                                <label>Tag Text</label>
                                <input type="text" name="Tag_Text" class="input-xlarge"><br>
                                <button type="submit" class="btn">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
</div>
