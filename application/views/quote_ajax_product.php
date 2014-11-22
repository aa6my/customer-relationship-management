<?php

if($jenis=="display") 
    { ?>
                                <div class="col-md-13">
                                    <!-- Primary box -->
                                    <div class="box box-solid box-danger">
                                        <div class="box-header">
                                            <h3 class="box-title">Browse product by category</h3>
                                            
                                        </div>
                                        <div class="box-body" id="view_product"> 
                                         <table class="table no-border" style="border:none">
                                                <tbody><tr>
                                                    <th style="width:40px">Category</th>
                                                    <td style="width:10px">:</td>
                                                    <td>
                                                        <div class="col-xs-13">
                                                         <!-- <input type="text" value="<?php echo $current_no;?>" name="<?php echo $id_table_row;?>" id="<?php echo $id_table_row;?>"> -->
                                                        <select class="form-control catproduct_id" name="catproduct_id" required="">
                                                            <option value="">Please select</option>
                                                                                                                    
                                                            <?php 
                                                            foreach($category as $value){
                                                            ?>
                                                                <option value="<?php echo $value['catproduct_id'];?>"><?php echo $value['catproduct_name'];?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                                                                                
                                                        </select>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Product</th>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="col-xs-13" id="o_product">
                                                        <!-- <select class="form-control product_id" name="product_id" required="">
                                                            <option value="">Please select</option>                                 
                                                        </select> -->
                                                        
                                                        </div>
                                                    </td>
                                                </tr>
                                               
                                                </tbody>
                                            </table>
                                    </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
<?php }
else if($jenis=="get_product") 
    { ?>
<!-- <input type="text" value="<?php echo $current_no;?>" name="<?php echo $id_table_row.$current_no;?>" id="<?php echo $id_table_row.$current_no;?>">  -->
                                                           <select class="form-control product_id" name="product_id" required="">
                                                           
                                                            <option value="">Please select</option>
                                                                                                                    
                                                            <?php 
                                                            foreach($product as $value){
                                                            ?>
                                                                <option value="<?php echo $value['product_id'];?>"><?php echo $value['product_name'];?>
                                                            </option>
<?php
                                                            }
                                                            echo '</select>';
   }
 ?>


 <script>
 $(function()
 {
    
    
                               
                                  /*-------------------------------------------------------------
                                    /   Change the product value 
                                    /--------------------------------------------------------------*/


                                         $('.catproduct_id').on('change',function(){


                                                var catproduct_id = $(this).val(),
                                                product_id        = $('.product_id'),
                                                o_product         = $('#o_product');
                                                
                                                var id_table_row  = '<?php echo $id_table_row; ?>';
                                                var current_no    = '<?php echo $current_no; ?>';

                                            //alert(current_no);
                                                
                                            $.ajax({

                                                type : 'POST',
                                                url  : "<?php echo base_url();?>quotes/ajax_product",
                                                data :{ 
                                                        jenis : "get_product",
                                                        catproduct_id : catproduct_id,
                                                        id_table : id_table_row,
                                                        no : current_no
                                                      },
                                                success : function(a){
                                                    o_product.html(a);
                                                     }
                                            });
                                         });

                                    /*-------------------------------------------------------------
                                    /   Insert into description
                                    /--------------------------------------------------------------*/
    
                                        $('.product_id').on('change', function(){

                                            
                                                    var product_id   = $('.product_id'),
                                                    catproduct_id    = $(this).val();
                                                    
                                                    var id_table_row = '<?php echo $id_table_row; ?>';
                                                    var current_no   = '<?php echo $current_no; ?>';
                                                    
                                                    var item_name    = $('#item_name'+current_no),
                                                    item_description = $('#item_description'+current_no),
                                                    item_quantity    = $('#item_quantity'+current_no),
                                                    item_price       = $('#item_price'+current_no),
                                                    item_subtotal    = $('#item_subtotal'+current_no),
                                                    quote_product_id = $('#quote_product_id'+current_no),
                                                    //subtotal_temp    = $('#subtotal_temp'), //subtotal_temp temporaray value for subtotal
                                                    subtotal         = $('#subtotal'), //display total for subtotal item
                                                    total            = $('#total'); /** display total for All **/
                                                    
                                                    
                                                    var sumtotal     = 0;
                                                                                       

                                                    $.ajax({

                                                    type : 'POST',
                                                    url  : "<?php echo base_url();?>quotes/ajax_product",
                                                    dataType : 'json',
                                                    data :{ 
                                                            jenis : "assign_product",
                                                            catproduct_id : catproduct_id,
                                                            product_id : product_id.val()
                                                          },
                                                    dataType : 'json',
                                                    success : function(a){
                                                        
                                                        item_name.val("[" + a.product[0].catproduct_name + "] " + a.product[0].product_name);
                                                        item_description.val(a.product[0].product_desc);
                                                        item_quantity.val(a.product[0].product_quantity);
                                                        item_price.val(a.product[0].product_amount);
                                                        quote_product_id.val(a.product[0].product_id);


                                                        var total_subtotal = item_quantity.val() * item_price.val();
                                                            item_subtotal.val(total_subtotal);


                                                        //sumtotal = total_subtotal + total.val();
                                                       // subtotal_temp.val(Number(subtotal_temp.val()) + Number(total_subtotal));
                                                        //subtotal.html(subtotal.val());
                                                        calculateGrandTotal_ajax();
                                                        
                                                    }
                                                });

                                               
                                           

                                        });


                                     function calculateGrandTotal_ajax() {
                                        var grandTotal = 0;
                                        $('#quote [id *=item_subtotal]').each(function(x,y){
                                            grandTotal += +Number($(this).val());
                                        });
                                        $('#subtotal').html(grandTotal);
                                    }
 });
 </script>