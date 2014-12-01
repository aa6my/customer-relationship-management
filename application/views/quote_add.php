<!DOCTYPE html>
<html>
    <?php $this->load->view('header'); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view('top'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <?php $this->load->view('sidebar-userpanel'); ?>
                    <!-- search form -->
                    <?php $this->load->view('sidebar-search'); ?>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $this->load->view('sidebar-menu'); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $top_title;?>
                        <small><?php echo $top_desc;?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $top_title;?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                <form action="<?php echo base_url('quotes/index/add'); ?>" method="post">
                <div class="row">


                        <div class="col-md-5">
                            <div class="box">

                                <!-- <div class="box-header">

                                    <h3 class="box-title">Add Quote</h3>
                                </div> --><!-- /.box-header -->
                                <div class="box-body">

                                <table class="table table-striped">
                                        <tbody>

                                         <tr>

                                            <td align="right">Quote Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="quote_date_created">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                         <tr>

                                            <td align="right">Valid Until</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="quote_valid_until">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td align="right">Status</td>
                                            <td>
                                                <div class="col-xs-5">
                                                    <select class="form-control" name="quote_status">
                                                        <option value="0">DRAFT</option>
                                                        <option value="1">ACCEPTED</option>
                                                        <option value="2">REJECTED</option>
                                                        <option value="3">CANCEL</option>

                                                    </select>
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td align="right">Customer</td>
                                            <td>
                                                <div class="col-xs-5">
                                                    <input id="country_name" class="form-control txt-auto"/>
                                                    <input type="hidden" id="customer_id" name="customer_id">
                                                </div>
                                            </td>

                                        </tr>
                                        <script>
                                        $(function(){


                                        $('#country_name').autocomplete({
                                            source: function( request, response ) {
                                                $.ajax({
                                                    type : 'POST',
                                                    url : '<?php echo base_url();?>quotes/ajax_quote_customer',
                                                    dataType: "json",
                                                    data: {
                                                       name_startsWith: request.term
                                                       //type: 'country'
                                                    },
                                                     success: function( data ) {

                                                         response( $.map( data, function( item ) {
                                                                
                                                            var d = {
                                                                label: item.customer_name,
                                                                value: item.customer_name,
                                                                id : item.customer_id
                                                            }

                                                                return d;
                                                            
                                                           
                                                        }));
                                                    }
                                                });
                                            },
                                            select : function(event, ui){
                                                $('#customer_id').val(ui.item.id);
                                                //console.log(ui);
                                            },
                                            autoFocus: true,
                                            minLength: 0,
                                            delay : 0        
                                          });

                                        });
                                        </script>




                                        <!--  <tr>

                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>

                                        </tr> -->

                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div><!-- /.column -->













                        <div class="col-md-7">
                            <div class="box">

                                <!-- <div class="box-header">

                                    <h3 class="box-title">Add Quote</h3>
                                </div> --><!-- /.box-header -->
                                <div class="box-body">

                                <table class="table table-striped">
                                        <tbody>

                                         <tr>


                                            <td>


                                                               <div class="col-xs-12">
                                                               <strong>Quote Subject</strong><br/>
                                                                    <textarea class="form-control" rows="3" placeholder="" name="quote_subject"></textarea>
                                                                </div>

                                              </td>
                                        </tr>

                                        <tr>


                                            <td>


                                                               <div class="col-xs-12">
                                                              <strong>Quote Terms</strong><br/>
                                                                    <textarea class="form-control" rows="3" placeholder="" name="quote_customer_notes"></textarea>
                                                                </div>

                                              </td>
                                        </tr>




                                        <!--  <tr>

                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>

                                        </tr> -->

                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div><!-- /.column -->
                     </div><!-- /.row -->


<div class="row">


                        <div class="col-md-12">
                            <!-- Primary box -->
                            <div class="box box-primary">
                                <div class="box-header" data-toggle="tooltip" title="" data-original-title="Item from task job or products">
                                    <h3 class="box-title"><strong>Quote Items</strong> <!-- <button class="btn btn-success btn-sm">Add Item From Products</button> --></h3>

                                </div>
                                <div class="box-body">

                                    <table class="table table-bordered" id="quote">
                                        <tbody>
                                            <tr>
                                                <th width="300">Item</th>
                                                <th width="400">Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Discount</th>
                                                <th>Subtotal</th>
                                            </tr>
                                             <tr class="toclone" id="current_row"><!-- form template -->
                                                <td>
                                                    <input type="text" class="form-control input-sm" placeholder="" id="item_name" name="item_name[]">
                                                    <br/>
                                                    <a class='buttonProduct' href="#inline_content" id="papar_product"><!-- <button class="btn btn-success btn-sm buttonProduct">Add Item From Products</button> -->Fetch data from product</a>
                                                    <script>
                                                    $(function(){


                                                        $('a.buttonProduct').on('click',function(){

                                                            var current_id = $(this);
                                                            var id_table_row = current_id.closest('tr').attr('id');
                                                            var current_no = id_table_row.replace(/\D/g,'');
                                                            //alert(current_no);


                                                           $('#'+current_id.attr('id')).colorbox({
                                                                        href : "<?php echo base_url();?>quotes/ajax_product",
                                                                        data :{ jenis       : 'display',
                                                                                id_table_row : id_table_row,
                                                                                current_no  : current_no}

                                                                    });

                                                        });


                                                    });
                                                    </script>
                                                    </td>
                                               <td>
                                                    <textarea class="form-control" rows="3" placeholder="" id="item_description" name="item_description[]"></textarea>
                                                    <input type="hidden" name="quote_product_id[]" id="quote_product_id">
                                                </td>
                                                  <td align="center">
                                                   <input type="text" class="form-control input-sm" placeholder="" name="item_quantity[]" id="item_quantity" data-calculate="a">

                                                </td>
                                                <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="item_price[]" id="item_price" data-calculate="a">
                                                </td>

                                                <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="item_discount[]" id="item_discount" data-calculate="a">
                                                </td>
                                                <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="item_subtotal[]" id="item_subtotal" readonly="readonly">
                                                    <br/>
                                                    <a href="#" class="clone" data-subTotal="subtotal">
                                                        <button type="button" class="btn btn-default" >
                                                        <i class="fa fa-copy"></i>
                                                        </button>
                                                    </a>
                                                    <a href="#" class="delete">
                                                    <button type="button" class="btn btn-default" >
                                                        <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr> <!-- end form template -->

                                        </tbody>
                                    </table>
                                    <br />
                                    <table class="table table-bordered">
                                        <tbody>

                                             <tr class="toclone" id="current_row"><!-- form template -->


                                                <td align="right" width="88.5%" >
                                                    <strong>Total :</strong>
                                                </td>
                                                <td align="center">
                                                   <?php if($this->config->item("currencyposition")=="left") echo $this->config->item("currency");?> <span id="subtotal"></span> <?php if($this->config->item("currencyposition")=="right") echo $this->config->item("currency");?>
                                                   <!-- <input type="text" id="subtotal_temp" value="0">
                                                   <input type="text" id="subtotal_temp_2" value="0"> -->
                                                </td>
                                            </tr>
                                            <!-- <tr class="toclone" id="current_row">


                                                <td align="right" width="88.5%">
                                                    Discount :
                                                </td>
                                                <td align="center">
                                                   RM <span id="copy_discount"></span>
                                                </td>
                                            </tr>
                                            <tr class="toclone" id="current_row">


                                                <td align="right" width="88.5%">
                                                    New Sub Total :
                                                </td>
                                                <td align="center">
                                                   RM <span id="newsubtotal"></span>
                                                </td>
                                            </tr>
                                            <tr class="toclone" id="current_row">


                                                <td align="right" width="88.5%">
                                                    Total :
                                                </td>
                                                <td align="center">
                                                   RM <span id="total"></span>
                                                </td>
                                            </tr> -->

                                        </tbody>
                                    </table>

                                </div><!-- /.box-body -->

                            </div><!-- /.box --> <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>

                        </div><!-- /.col -->


                    </div>
                    </form>

<script>
$(function(){

    var  jum = 0;
    

    /****************************************************
    *   clone row table
    *   
    ****************************************************/
    $('#quote').cloneya({
            limit           : 999,
            cloneThis       : '.toclone',
            valueClone      : false,
            dataClone       : false,
            deepClone       : false,
            cloneButton     : '.clone',
            deleteButton    : '.delete',
            clonePosition   : 'after',
            serializeID     : true
    });


    /****************************************************
    * Trigered when delete button was clicked
    * 
    ****************************************************/
     $('#quote').on( 'clone_after_delete', function(e,newclone){
        
        calculateGrandTotal();
        
    });



    $('input[type=text]').on('keyup', function(){

            var current = $(this);



            if(current.data('calculate')){

                var currentId = current.attr('id'),
                    num = currentId.replace(/\D/g,'');


                    num = (num == "") ? "" : num;


                var  price = ($('#'+ 'item_price' + num)!= "") ? $('#'+ 'item_price' + num).val() : "",
                     qtty = ($('#'+ 'item_quantity' + num)!= "") ? $('#'+ 'item_quantity' + num).val() : "",
                     disc = ($('#'+ 'item_discount' + num)!= "") ? $('#'+ 'item_discount' + num).val() : "",
                     subtot = $('#'+ 'item_subtotal' + num),
                     subtotal_temp = $('#subtotal_temp'),
                     subtotal_temp_2 = $('#subtotal_temp_2');
                     //table_quote =$('#quote');


                     if(qtty || price || disc){
                       subtot.val((Number(qtty) * Number(price)) - Number(disc)); //subtotal in rows
                      calculateGrandTotal();


                    }

            }
            else{
                // do nothing
            }

    })


    function calculateGrandTotal() {
        var grandTotal = 0;
        $('#quote [id *=item_subtotal]').each(function(x,y){
            grandTotal += +Number($(this).val());
        });
        $('#subtotal').html(grandTotal);
    }


});


</script>










                    </div>
</form>



                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



    </body>
</html>
