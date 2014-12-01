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
                                            <td><?php echo ($this->config->item("currencyposition")=="left") ? $this->config->item("currency") : "";?> 
                                            <?php echo @$value['job_task_amount'];?>
                                            <?php echo ($this->config->item("currencyposition")=="right") ? $this->config->item("currency") : "";?>
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
                                            <td>
                                            <?php echo ($this->config->item("currencyposition")=="left") ? $this->config->item("currency") : "";?> 
                                            <?php echo @$job['job_task_amount'];?>
                                            <?php echo ($this->config->item("currencyposition")=="right") ? $this->config->item("currency") : "";?>
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
                                                    <td>
                                                    
                                                    <?php 
                                                    if($subTotal!="")
                                                    {
                                                        if($this->config->item("currencyposition")=="left")
                                                            echo $this->config->item("currency")." ".$subTotal;
                                                        else
                                                            echo $subTotal." ".$this->config->item("currency");
                                                    }
                                                    else{
                                                        echo "-";
                                                    }

                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>:</td>
                                                    <td>
                                                    <?php 
                                                    if($total[0]['job_discount_amount']!="")
                                                    {
                                                        if($this->config->item("currencyposition")=="left")
                                                            echo $this->config->item("currency")." ".$total[0]['job_discount_amount'];
                                                        else
                                                            echo $total[0]['job_discount_amount']." ".$this->config->item("currency");
                                                    }
                                                    else{
                                                        echo "-";
                                                    }

                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>:</td>
                                                    <td> <?php 
                                                    $tot = $subTotal - @$total[0]['job_discount_amount'];
                                                    //echo ($tot!="") ? "RM ".$tot : "-";
                                                    ?>
                                                    <?php 
                                                    if($tot!="")
                                                    {
                                                        if($this->config->item("currencyposition")=="left")
                                                            echo $this->config->item("currency")." ".$tot;
                                                        else
                                                            echo $tot." ".$this->config->item("currency");
                                                    }
                                                    else{
                                                        echo "-";
                                                    }

                                                    ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
<?php
    }
    ?>