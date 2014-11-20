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
                                                <?php //echo $a++;?>
                                            </span>
                                            </td>
                                            <td>
                                                    <?php echo @$value['job_task_description'];?>
                                                
                                            </td>
                                            <td>
                                                
                                                <?php echo @$value['job_task_hour'];?>&nbsp;Hour
                                            </td>
                                            <td>RM <?php echo @$value['job_task_amount'];?>
                                            </td>
                                            <td>
                                                <?php echo @$value['job_task_due_date'];?>
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                 <?php echo @$value['first_name'];?>
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
    else if($jenis=="add")
    {
  ?>

  <tr >
                                            <td>
                                            <span class="num">
                                              <?php 
                                              //$b = $this->session->userdata('num')+1;
                                              //$this->session->set_userdata('num', $b);
                                              //echo $b;

                                              ?>
                                            </span>       
                                            </td>
                                            <td>
                                                    <?php echo @$job['job_task_description'];?>

                                                
                                            </td>
                                            <td>
                                                
                                                <?php echo @$job['job_task_hour'];?>&nbsp;Hour
                                            </td>
                                            <td>RM <?php echo @$job['job_task_amount'];?>
                                            </td>
                                            <td>
                                                <?php echo @$job['job_task_due_date'];?>
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                <?php echo @$job['first_name'];?>
                                            </td>
                                            <td>
                                                <?php echo (@$job['job_task_percentage']==1) ? '100 %' : '0 %';?>
                                            </td>
                                            <td>
                                                <input type="button" class="btn btn-warning btn-sm button_edit_task" value="Edit" name="edit_task" data-job_task_id="<?php echo @$job['job_task_id'];?>">
                                                <button type="button" class="btn btn-danger btn-sm button_delete_task" data-job_task_id="<?php echo @$job['job_task_id'];?>"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>

                                        <?php
     }
     else if($jenis=="total")
     {
        $subTotal = 0;
        foreach($total as $newValue)
        {
             $subTotal = $newValue['job_task_amount'] + $subTotal;

        }
?>
                                            <table class="table no-border" style="border:none">
                                                <tbody><tr>
                                                    <th style="width:40px">Subtotal</th>
                                                    <td style="width:10px">:</td>
                                                    <td><?php echo ($subTotal!="") ? "RM ".$subTotal : "-";?></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>:</td>
                                                    <td><?php echo (@$total[0]['job_discount_amount']!="") ? "RM ".$total[0]['job_discount_amount'] : "-";?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>:</td>
                                                    <td> <?php 
                                                    $tot = $subTotal - @$total[0]['job_discount_amount'];
                                                    echo ($tot!="") ? "RM ".$tot : "-";
                                                    ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
<?php
    }
    ?>