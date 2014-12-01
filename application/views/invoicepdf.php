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
.header_invoices{
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
<h3 >Invoice</h3>
<hr style="width:100%;border:1px solid #D7DEF0">
<div style="width:100%">

<div style="width:100%;background:#4A4A4A">
    <span class="details_header header_to">To</span>
    <span class="details_header header_invoices" >Invoices Details</span>
</div>  
<br>
<br>

<table border="0" class="table_border">
               
                <tr>
                    
                    <td width="70%" style="border-right:1px dashed #3C8DBC">
                        <?php echo $invoice['customer_name'];?><br/>
                        <?php echo $invoice['customer_address'];?><br/>
                        <?php echo $invoice['customer_postcode'];?><br/>
                        <?php echo $invoice['customer_state'];?><br/>
                        <br>
                        Tel :<?php echo $invoice['customer_phone']; ?><br/>
                        Fax:<?php echo $invoice['customer_fax']; ?><br/>
                        Email:<?php echo $invoice['customer_email']; ?><br/>
                    </td>
                    <td align="right" valign="top">Invoice No :#<?php echo $invoice['invoice_number']; ?><br/>
                            Date Issued :<?php echo $invoice['invoice_date_created']; ?><br/>
                            Valid Until :<?php echo $invoice['invoice_valid_until']; ?><br/>
                           
                    </td>
                   
                </tr>
</table>
<!-- <div style="display:block">
<fieldset style="width:30%;margin:3px;float:left;position:relative;left:0">
    <legend>To</legend>
    <?php echo $invoice['customer_name'];?><br/>
                        <?php echo $invoice['customer_address'];?><br/>
                        <?php echo $invoice['customer_postcode'];?><br/>
                        <?php echo $invoice['customer_state'];?><br/>
                        <br>
                        Tel :<?php echo $invoice['customer_phone']; ?><br/>
                        Fax:<?php echo $invoice['customer_fax']; ?><br/>
                        Email:<?php echo $invoice['customer_email']; ?><br/>
</fieldset>
<fieldset style="width:40%;height:160px;margin:3px;float:right;position:relative;right:0">
    <legend>Invoices Detail</legend>
    Invoice No :#<?php echo $invoice['invoice_number']; ?><br/>
                            Date Issued :<?php echo $invoice['invoice_date_created']; ?><br/>
                            Valid Until :<?php echo $invoice['invoice_valid_until']; ?><br/>
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
                                        <th><div align = "center">Price (<?php echo $this->config->item("currency");?>)</div></th>
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
                            <table align="center" border="0">
                                    <tbody>
                                        <tr>
                                        <td style="width:20%"><span class="text_color">Subtotal</span></td>
                                        <td> : <?php echo ($this->config->item("currencyposition")=="left") ? $this->config->item("currency") : "";?> <?php echo $sum ?> <?php echo ($this->config->item("currencyposition")=="right") ? $this->config->item("currency") : "";?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td><span class="text_color">Tax (9.3%)</span></th>
                                        <td> : </td>
                                    </tr>

                                    <tr>
                                        <td><span class="text_color">Shipping</span></th>
                                        <td> : </td>
                                    </tr>
                                    <tr>
                                        <td><span class="text_color">Total</span></th>
                                        <td> : </td>
                                    </tr> -->
                                     <tr>
                                        <td><span class="text_color">Amount Paid</span></th>
                                        <td> : <?php echo ($this->config->item("currencyposition")=="left") ? $this->config->item("currency") : "";?> <?php 
                                        $tot = 0;
                                        //print_r($invoice_payments);
                                            foreach($invoice_payments as $key => $value){
                                                $tot = $tot + $value['invoice_payment_amount'];
                                            }
                                            echo  $tot;
                                            ?> <?php echo ($this->config->item("currencyposition")=="right") ? $this->config->item("currency") : "";?>
                                          </td>
                                    </tr>
                                    <tr>
                                        <td><span class="text_color">Balance</span></th>
                                        <td> : <?php 
                                        $c= $sum - $tot ?>
                                        <?php echo ($this->config->item("currencyposition")=="left") ? $this->config->item("currency") : "";?> <?php echo $c ?> <?php echo ($this->config->item("currencyposition")=="right") ? $this->config->item("currency") : "";?></td>
                                    </tr> 
                                </tbody></table>
</div>

</body>
</html>