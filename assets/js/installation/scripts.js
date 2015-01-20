var current_table;

function delete_row(entity_id)
{ 
    var row = $(current_table.selector+' tbody tr[entity_id='+entity_id+']').get(0);
    current_table.fnDeleteRow(current_table.fnGetPosition(row));    
}

function change_validation_position(form_selector)
{
    $(form_selector).validate({
        errorPlacement:function(error, element){
            element.parent().find('.help-block').remove();
            element.parent().toggleClass('has-error',error.html().length!=0);
            element.parent().toggleClass('has-success',error.html().length==0);
            if (error.html().length!=0){
                element.after('<span class="help-block"><span class="glyphicon glyphicon-remove form-control-feedback"></span><label class="has-error">'+error.html()+'</label></span>');
            }
            else if (element.hasClass('required') || element.hasClass('email'))
            {
                element.after('<span class="help-block"><span class="glyphicon glyphicon-ok form-control-feedback"></span></span>');
            }
        },
        success:function(element){}
    });
}

function submit_form(form_selector,target,base_url)
{
    target= target || "#save_result";
    
    $(target).html('<img src="'+base_url+'" />');
    change_validation_position(form_selector);
        
    $(form_selector).ajaxSubmit({
        beforeSubmit:function(arr,$form){
            if ($($form).valid()==true)
            {
                return true;
            }
            $(target).html('');
            return false;
        },
        target:target
    }); 
}

function submit_form_with_files(form_selector,target)
{
    target= target || "#save_result";
    
    $(target).html('<img src="images/ajax-loader.gif" />');
    change_validation_position(form_selector);
    $(form_selector).ajaxSubmit({
        beforeSubmit:function(arr,$form){
            if ($($form).valid()==true)
            {
                return true;
            }
            $(target).html('');
            return false;
        },
        dataType:'json',
        success:function(data){
            if (data.error_message)
            {
               $(target).html('<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>'+data.error_message+'</div>');
               return ;
            }
            
            $(target).html('<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>'+data.message+'</div>');
            
            if (data.new_url)
            {
                setTimeout(function(){
                    location.href=data.new_url;
                },1500);
                return ;
            }
            
            if (data.html)
            {
                $(target).html(data.html);
            }
            
            if (data.files.success!=undefined)
            {
                link=(data.files.block_link==undefined)?true:false;
                for(var file in data.files.success)
                {
                    file_txt='<li id="attachment_'+data.files.success[file].id+'"><button type="button" onclick="remove_attachment('+data.files.success[file].id+')" class="btn btn-mini margin_right_10"><i class="icon-remove"></i></button>';
                    
                    if (link)
                    {
                        file_txt+=('<a target="_blank" href="attachments/download/'+data.files.success[file].id+'">')
                    }
                    
                    file_txt+=('<img src="images/files/'+data.files.success[file].ext+'.png" class="hidden-phone"/><span class="wrapword">'+data.files.success[file].name+'</span>');
                    
                    if (link)
                    {
                        file_txt+='</a>';
                    }
                    
                    file_txt+='</li>';
                    
                    $('#attachments_area').append(file_txt);
                }
            }
            
            if (data.files.failed!=undefined)
            {
                $(target).html('<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a></div>');
                for(var file in data.files.failed)
                {
                    $(target+' .alert-error').append('<div>'+data.files.failed[file]+'</div>');
                }
            }
            
            $("#attachments_input").val('');
            
            return data;
        }
    });
}

function init_icheck()
{
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
}