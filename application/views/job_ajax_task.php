<?php
$a = 1;

$GLOBALS['b'] = 1;
if($jenis=="display")
{
    
foreach($job_task as $value)
{
    $this->session->set_userdata('num', $a);
    ?>
<tr>
                                            <td>
                                              
                                                   <?php echo $a++;?>
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
                                              <?php 
                                              $b = $this->session->userdata('num')+1;
                                              $this->session->set_userdata('num', $b);
                                              echo $b;

                                              ?>
                                                   
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
                                                <?php echo (@$value['job_task_percentage']==1) ? '100 %' : '0 %';?>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>