<?php
if($jenis=="display")
{
foreach($job_task as $value)
{
    ?>
<tr>
                                            <td>
                                              
                                                   <?php //echo print_r($job_task);?>
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
                                            <?php echo @$value['job_task_percentage'];?>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

 <?php
      }
    }
    else
    {
  ?>
  <tr>
                                            <td>
                                              
                                                   <?php //echo print_r($job_task);?>
                                            </td>
                                            <td>
                                                    <?php echo @$job_task['job_task_description'];?>
                                                
                                            </td>
                                            <td>
                                                
                                                <?php echo @$job_task['job_task_hour'];?>&nbsp;Hour
                                            </td>
                                            <td>
                                                
                                                <?php echo @$job_task['job_task_amount'];?>
                                            </td>
                                            <td>
                                                <?php echo @$job_task['job_task_due_date'];?>
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                
                                            </td>
                                            <td>
                                            <?php echo @$job_task['job_task_percentage'];?>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>