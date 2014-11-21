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
                                                         <input type="text" value="<?php echo $id_table_row;?>" name="<?php echo $id_table_row.$current_no;?>" id="<?php echo $id_table_row.$current_no;?>">
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
                                                        <div class="col-xs-13">
                                                        <select class="form-control product_id" name="product_id" required="">
                                                            <option value="">Please select</option>                                 
                                                        </select>
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

                                                            <option value="">Please select</option>
                                                                                                                    
                                                            <?php 
                                                            foreach($product as $value){
                                                            ?>
                                                                <option value="<?php echo $value['product_id'];?>"><?php echo $value['product_name'];?></option>
<?php
                                                            }
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
                                                product_id    = $('.product_id');

                                            var id_table_row = '<?php echo $id_table_row; ?>';
                                            var current_no = '<?php echo $id_table_row; ?>';


                                                
                                            $.ajax({

                                                type : 'POST',
                                                url  : "<?php echo base_url();?>quotes/ajax_product",
                                                data :{ 
                                                        jenis : "get_product",
                                                        catproduct_id : catproduct_id
                                                      },
                                                success : function(a){
                                                    product_id.html(a);
                                                     }
                                            });
                                         });

                                    /*-------------------------------------------------------------
                                    /   Insert into description
                                    /--------------------------------------------------------------*/
    
                                        $('.product_id').on('change', function(){

                                            
                                                var product_id       = $('.product_id'),
                                                catproduct_id        = $(this).val();

                                                var item_name = $('#<?php echo $id_table_row;?>'+'<?php echo $current_no;?>').find('input').attr('id');

                                                alert(item_name);
                                                //pro_id.val(product_id.val());
                                            


                                           

                                              
                                                    /*$.ajax({

                                                    type : 'POST',
                                                    url  : "<?php echo base_url();?>jobs/ajax_product",
                                                    dataType : 'json',
                                                    data :{ 
                                                            jenis : "assign_product",
                                                            catproduct_id : catproduct_id,
                                                            product_id : product_id.val()
                                                          },
                                                    dataType : 'json',
                                                    success : function(a){
                                                        
                                                        job_task_description.val("[" + a.product[0].catproduct_name + "] " + a.product[0].product_name);
                                                        job_task_hour.val(a.product[0].product_quantity);
                                                        job_task_amount.val(a.product[0].product_amount);
                                                      
                                                    }
                                                });*/

                                               
                                           

                                        });
 });
 </script>