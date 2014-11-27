<!DOCTYPE html>
<html>
<body>
<style type="text/css">
body{
-webkit-print-color-adjust:exact;
}

.details_header{
    font-weight: lighter;
    border-top:1px solid #357CA5;
    border-left:1px solid #357CA5;
    border-right:1px solid #357CA5;
    padding:5px;
    background-color: #3C8DBC;
    
    color:#fff;
}



.item th{
    border-bottom:1px solid #357CA5;
    background-color: #357CA5;
    color:#fff;
}

.header_to{
    float:left;
    width:40px;
    /*position : relative;
    width
    left:0;*/
}
.header_quotes{
    float:right;
    width:120px;
    /*position : relative;
    right:0;*/
}

h3{
    /*border:1px solid #4862A3;*/
    padding:3px;
    background-color:#357CA5;
    color:#fff;
    text-align: center;
    border-radius:3px;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    -o-border-radius:3px;
}

table{
    width:100%;
}
.table_border{
    
    border:1px solid #00;
}
.text_color{
    color:#357CA5;
    font-weight: bold;
}
fieldset{

}

</style>
<h3 >Quote</h3>
<hr style="width:100%;border:1px solid #D7DEF0">
<div style="width:100%">

<div style="width:100%;background:#4A4A4A">
    <span class="details_header header_to">To</span>
    <span class="details_header header_quotes" >Quote Details</span>
</div>  
<br>
<br>

<table border="0" class="table_border">
               
                <tr>
                    
                    <td width="70%" style="border-right:1px dashed #3C8DBC">
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
                           
                    </td>
                   
                </tr>
</table>
<!-- <div style="display:block">
<fieldset style="width:30%;margin:3px;float:left;position:relative;left:0">
    <legend>To</legend>
    <?php echo $quote['customer_name'];?><br/>
                        <?php echo $quote['customer_address'];?><br/>
                        <?php echo $quote['customer_postcode'];?><br/>
                        <?php echo $quote['customer_state'];?><br/>
                        <br>
                        Tel :<?php echo $quote['customer_phone']; ?><br/>
                        Fax:<?php echo $quote['customer_fax']; ?><br/>
                        Email:<?php echo $quote['customer_email']; ?><br/>
</fieldset>
<fieldset style="width:40%;height:160px;margin:3px;float:right;position:relative;right:0">
    <legend>quotes Detail</legend>
    quote No :#<?php echo $quote['quote_number']; ?><br/>
                            Date Issued :<?php echo $quote['quote_date_created']; ?><br/>
                            Valid Until :<?php echo $quote['quote_valid_until']; ?><br/>
</fieldset>
</div> -->
<br>
<br><br>
<br>




<table border="0" align="center" cellpadding="5" cellspacing="0" class="item table_border">
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
                            <table align="center" border="0">
                                    <tbody>
                                        <tr>
                                        <td style="width:20%"><span class="text_color">Subtotal</span></td>
                                        <td> : <?php echo $sum ?></td>
                                    </tr>
                                    
                                </tbody></table>
</div>

</body>
</html>