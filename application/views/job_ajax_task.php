<tr>
                                            <td>
                                               
                                                    <!-- <input type="text" class="form-control input-sm" placeholder="" name="job_discount_name" style="width:40px;">
                                                 -->
                                            </td>
                                            <td>
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_description">
                                                
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_hour" style="width:40px;">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" style="width:40px;">
                                            </td>
                                            <td>
                                               
                                                  
                                                        
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_task_due_date" style="width:150px">
                                                  
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                <select class="form-control" name="user_id" style="width:100px">
                                                        <?php 
                                                        foreach ($staff as $key => $value) {?>
                                                            <option value="<?php echo $value['user_id']; ?>"><?php echo $value['first_name'].' '.$value['last_name'];?></option>
                                                      <?php  } ?>
                                                        
                                               </select>
                                            </td>
                                            <td>
                                                
                                       
                                            
                                            <input type="checkbox" style="position: absolute; opacity: 0;" name="job_task_percentage" value="1">
                                           
                                        
                                       
                                   
                                                   
                                               
                                           
                                            </td>
                                            <td>
                                            <!-- <input type="submit" class="btn btn-success btn-sm" value="New Task" name="save_task"> -->
                                            <input type="button" class="btn btn-success btn-sm button_task" value="New Task" name="save_task">
                                            </td>
                                        </tr>