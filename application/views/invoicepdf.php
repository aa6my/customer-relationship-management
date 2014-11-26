<!DOCTYPE html>
<html>
<body>
<style type="text/css">
.item th{
    border-bottom:1px solid #000;
}
</style>
<center><h3 style="border:1px solid #000;padding:3px">Invoice</h3>
<hr style="width:100%">
<div style="width:100%">

    
<table  style="width:100%;border:1px solid #000" align="center" border="0" width="100">
               
                <tr>
                    
                    <td width="70%" style="border-right:1px solid #000">
                        <?php echo $invoice['customer_name'];?><br/>
                        <?php echo $invoice['customer_address'];?><br/>
                        <?php echo $invoice['customer_postcode'];?><br/>
                        <?php echo $invoice['customer_state'];?><br/>
                        <br>
                        Tel :<?php echo $invoice['customer_phone']; ?><br/>
                        Fax:<?php echo $invoice['customer_fax']; ?><br/>
                        Email:<?php echo $invoice['customer_email']; ?><br/>
                    </td>
                    <td align="right" valign="top">Invoice No :<?php echo $invoice['invoice_number']; ?><br/>
                            Date Issued :<?php echo $invoice['invoice_date_created']; ?><br/>
                            Valid Until :<?php echo $invoice['invoice_valid_until']; ?><br/>
                           Amount Due
                    </td>
                   
                </tr>
</table>
<br>
<br>


<table border="0" style="width:100%;border:1px solid #000" align="center" cellpadding="5" cellspacing="0" class="item">
                                <thead>
                                    <tr >
                                        <th>No</th>
                                        <th>Product</th>
                                       
                                        <th><div align ="center">Quantity</div></th>
                                        <th><div align = "center">Price</div></th>
                                        <th><div align = "center">Discount(%)</div></th>
                                        <th><div align = "center">Subtotal</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $a=1; 
                                    $sum = 0;
                                foreach($invoice_items as $key => $val)
                                    /*foreach ($invoice_payments as $key => $value) {
                                        
                                    }*/{
                                ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $val['invoice_item_name'];?></td>
                                        
                                        <td><div align ="center"><?php echo $val['invoice_item_quantity']; ?></div></td>
                                        <td><div align ="center"><?php echo $val['invoice_item_price'];?></div></td>
                                        <td><div align = "center"><?php echo $val['invoice_item_discount']; ?></div></td>
                                        <td><div align = "center"><?php 

                                        $sum += $val['invoice_item_subtotal'];
                                        echo $val['invoice_item_subtotal'];?></div></td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                            </table>
<br>
                            <table style="width:100%;border:1px solid #000" align="center" border="0">
                                    <tbody>
                                        <tr>
                                        <td style="width:20%">Subtotal</td>
                                        <td> : <?php echo $sum ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tax (9.3%)</th>
                                        <td> : </td>
                                    </tr>

                                    <tr>
                                        <td>Shipping</th>
                                        <td> : </td>
                                    </tr>
                                    <tr>
                                        <td>Total</th>
                                        <td> : </td>
                                    </tr>
                                     <tr>
                                        <td>Amount Paid</th>
                                        <td> : <?php 
                                        $tot = 0;
                                        //print_r($invoice_payments);
                                            foreach($invoice_payments as $key => $value){
                                                $tot = $tot + $value['invoice_payment_amount'];
                                            }
                                            echo  $tot;
                                            ?>
                                          </td>
                                    </tr>
                                    <tr>
                                        <td>Balance</th>
                                        <td> : <?php 
                                        $c= $sum - $tot ?>
                                        <?php echo $c ?></td>
                                    </tr> 
                                </tbody></table>
</div>
</center>
</body>
</html>