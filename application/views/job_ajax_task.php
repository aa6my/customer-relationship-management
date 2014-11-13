<?php
$a = 1;

$GLOBALS['b'] = 1;
if($jenis=="display")
{
    
foreach($job_task as $value)
{
    $this->session->set_userdata('num', $a);
    ?>
<tr data-current_tr="<?php echo @$value['job_task_id'];?>">
                                            <td>
                                            <span class="num">
                                                <?php echo $a++;?>
                                            </span>
                                            </td>
                                            <td>
                                                    <?php echo @$value['job_task_description'];?>
                                                
                                            </td>
                                            <td>
                                                
                                                <?php echo @$value['job_task_hour'];?>&nbsp;Hour
                                            </td>
                                            <td>
                                                
                                                <?php echo @$value['job_task_amount'];?>
                                            </td>
                                            <td>
                                                <?php echo @$value['job_task_due_date'];?>
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <?php echo (@$value['job_task_percentage']==1) ? '100 %' : '0 %';?>
                                            </td>
                                            <td>
                                                <input type="button" class="btn btn-warning btn-sm button_edit_task" value="Edit" name="edit_task" data-job_task_id="<?php echo @$value['job_task_id'];?>">
                                                <button type="button" class="btn btn-danger btn-sm button_delete_task" data-job_task_id="<?php echo @$value['job_task_id'];?>"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>

 <?php
        
      }
      
    }
    else
    {
  ?>

  <tr >
                                            <td>
                                            <span class="num">
                                              <?php 
                                              $b = $this->session->userdata('num')+1;
                                              $this->session->set_userdata('num', $b);
                                              echo $b;

                                              ?>
                                            </span>       
                                            </td>
                                            <td>
                                                    <?php echo @$job['job_task_description'];?>

                                                
                                            </td>
                                            <td>
                                                
                                                <?php echo @$job['job_task_hour'];?>&nbsp;Hour
                                            </td>
                                            <td>
                                                
                                                <?php echo @$job['job_task_amount'];?>
                                            </td>
                                            <td>
                                                <?php echo @$job['job_task_due_date'];?>
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <?php echo (@$job['job_task_percentage']==1) ? '100 %' : '0 %';?>
                                            </td>
                                            <td>
                                                <input type="button" class="btn btn-warning btn-sm button_edit_task" value="Edit" name="edit_task" data-job_task_id="<?php echo @$job['job_task_id'];?>">
                                                <button type="button" class="btn btn-danger btn-sm button_delete_task"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>