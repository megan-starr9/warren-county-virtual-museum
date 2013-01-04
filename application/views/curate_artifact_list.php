 
            <div class="span9">
                <h4>Artifact List</h4>
                <?php
                if($this->bitauth->has_role('can_edit_artifacts'))
                {
                    echo '<a class="btn btn-mini" href="#ModalArtifact" data-toggle="modal"><i class="icon-plus-sign"></i> Add New Artifact</a>';
                }
                ?>
                <br><br>
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th width="70%">Artifact Title</th>
                    <th width="30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($artifacts->num_rows())
                    {
                        $result = $artifacts->result();
                        foreach($result AS $row)
                        {
                            echo '<tr>';
                            echo '<td>';
                            echo $row->Title;
                            echo '</td>';
                            echo '<td>';
                            if($this->bitauth->has_role('can_edit_artifacts'))
                            {
                                echo '<a href="'.base_url().'curate/update_artifact/'.$row->PK_Artifact_Id.'">update</a>&nbsp;|&nbsp;';
                                $deleteText = "return confirm('Confirm artifact delete (this cannot be undone!): ".$row->Title."')";
                                echo anchor(base_url().'curate/delete_artifact/'.$row->PK_Artifact_Id,'delete',array('class'=>'delete','onclick'=>$deleteText));
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
                
                <div id="ModalArtifact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal hide fade in" style="display: none;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Add New Artifact</h3>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>curate/add_tag" method="post">
                            <fieldset>
                                <label>Title</label>
                                <input type="text" name="Tag_Text" class="input-xlarge"><br>
                                <label>Organization</label>
                                <?php echo form_dropdown('Source', $this->config->item('orgs')); ?>
                                <br>
                                <button type="submit" class="btn">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
</div>
