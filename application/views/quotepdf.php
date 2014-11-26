<!DOCTYPE html>
<html>
<body>
<style type="text/css">
.item th{
    border-bottom:1px solid #000;
}
</style>
<center><h3 style="border:1px solid #000;padding:3px">Quote</h3>
<hr style="width:100%">
<div style="width:100%">

    
<table  style="width:100%;border:1px solid #000" align="center" border="0" width="100">
               
                <tr>
                    
                    <td width="70%" style="border-right:1px solid #000">
                        <?php echo $quote['customer_name'];?><br/>
                        <?php echo $quote['customer_address'];?><br/>
                        <?php echo $quote['customer_postcode'];?><br/>
                        <?php echo $quote['customer_state'];?><br/>
                        <br>
                        Tel :<?php echo $quote['customer_phone']; ?><br/>
                        Fax:<?php echo $quote['customer_fax']; ?><br/>
                        Email:<?php echo $quote['customer_email']; ?><br/>
                    </td>
                    <td align="right" valign="top">
                            Date Issued :<?php echo $quote['quote_date_created']; ?><br/>
                            Valid Until :<?php echo $quote['quote_valid_until']; ?><br/>
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
                                foreach($quote_items as $key => $val)
                                    /*foreach ($quote_payments as $key => $value) {
                                        
                                    }*/{
                                ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $val['quote_item_name'];?></td>
                                        
                                        <td><div align ="center"><?php echo $val['quote_item_quantity']; ?></div></td>
                                        <td><div align ="center"><?php echo $val['quote_item_price'];?></div></td>
                                        <td><div align = "center"><?php echo $val['quote_item_discount']; ?></div></td>
                                        <td><div align = "center"><?php 

                                        $sum += $val['quote_item_subtotal'];
                                        echo $val['quote_item_subtotal'];?></div></td>
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
                                     
                                </tbody></table>
</div>
</center>
</body>
</html>