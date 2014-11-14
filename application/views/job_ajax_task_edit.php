 <td>
 <span class="num">
                                               
                                                  <?php //echo $num_display;?>
                                                  </span>
                                            </td>
                                            <td>
                                            <?php 
                                            if($jenis=="edit")
                                            {?>

                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_description" id="job_task_description1" value="<?php echo $jobs['job_task_description'];?>">
                                           <?php }
                                            else{
                                                echo $jobs['job_task_description'];
                                            }
                                            ?>
                                                
                                            </td>
                                            <td>
                                            <?php 
                                            if($jenis=="edit")
                                            {?>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_hour" id="job_task_hour1" style="width:40px;" value="<?php echo $jobs['job_task_hour'];?>">
                                            <?php }
                                            else{
                                                echo $jobs['job_task_hour'];
                                            }
                                            ?>
                                            </td>
                                            <td>
                                            <?php 
                                            if($jenis=="edit")
                                            {?>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" id="job_task_amount1" style="width:40px;" value="<?php echo $jobs['job_task_amount'];?>">
                                            <?php }
                                            else{
                                                echo $jobs['job_task_amount'];
                                            }
                                            ?>
                                            </td>
                                            <td>
                                            <?php 
                                            if($jenis=="edit")
                                            {?>   
                                                <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_task_due_date1" id="job_task_due_date1" style="width:150px" value="<?php echo $jobs['job_task_due_date'];?>">
                                            <?php }
                                            else{
                                                echo $jobs['job_task_due_date'];
                                            }
                                            ?>
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                            <?php 
                                            if($jenis=="edit")
                                            {?>
                                                <select class="form-control" name="user_id" id="user_id1" style="width:100px">
                                                        <?php 
                                                        foreach ($groupData['staff'] as $key => $value) {?>
                                                            <option value="<?php echo $value['user_id']; ?>" <?php if($jobs['user_id']== $value['user_id']) echo 'selected';?>><?php echo $value['first_name'].' '.$value['last_name'];?></option>
                                                      <?php  } ?>
                                                        
                                               </select>
                                            <?php }
                                            else{
                                                echo $jobs['first_name'];
                                            }
                                            ?>
                                            </td>
                                            <td style="width:30px">
                                            <?php 
                                            if($jenis=="edit")
                                            {?>       
                                                 <input type="checkbox"  name="job_task_percentage" id="job_task_percentage1" value="0" <?php echo ($jobs['job_task_percentage']==1) ? 'checked' : "";?>>
                                           <?php }
                                            else{
                                                echo (@$jobs['job_task_percentage']==1) ? '100 %' : '0 %';
                                            }
                                            ?>
                                            </td>
                                            <td>
                                           <?php 
                                            if($jenis=="edit")
                                            {?>  
                                                <input type="button" class="btn btn-info btn-sm button_save_task" value="Save Task" name="save_task" data-job_task_id="<?php echo @$jobs['job_task_id'];?>" data-num_display= "<?php echo $num_display;?>">

                                            <?php }
                                            else{ ?>
                                                <input type="button" class="btn btn-warning btn-sm button_edit_task" value="Edit" name="edit_task" data-job_task_id="<?php echo @$jobs['job_task_id'];?>" data-num_display= "<?php echo $num_display;?>">
                                                <button type="button" class="btn btn-danger btn-sm button_delete_task"><i class="fa fa-trash-o"></i></button>
                                            <?php }
                                            ?>
                                            
                                            </td>