jQuery('.addButtonSubmit').click(function(){
    var confirmid = jQuery('#id').val();
    if( confirmid == ''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var post_author_name = jQuery('.post_author_name').val();
        var post_author_status = jQuery('.post_author_status').val();
        // alert(post_author_status);
        $.ajax({
            url:'storeauthor',
            type: 'POST',
            dataType: 'json',
            data:{
                'post_author_name':post_author_name,
                'post_author_status':post_author_status,
            },
            success:function(response){
                if(response.fails == '404'){
                    jQuery('.AuthorNameError').text(response.errors.post_author_name);
                    jQuery('.AuthorStatusError').text(response.errors.post_author_status);
                    
                }else{
                    toastr.success(response.message,response.success);
                    forshowallItem();
                    jQuery('.post_author_name').val('');
                    jQuery('.post_author_status').val('');
                    jQuery('.AuthorNameError').text('')
                    jQuery('.AuthorStatusError').text('');
                }
            } 
        });  
    }else{
        jQuery(".msg").append('<div class="alert alert-danger"> Are you GREDDY! &#x1f620; ONLY FOR UPDATE ONLY FOR UPDATE </div>');
        jQuery(".msg").fadeOut(3000);
    }
});
forshowallItem();
function forshowallItem(){
    $.ajax({
        url:'forshow',
        type:'get',
        dtatType:'json',
        success:function(response){
            var sl = 1;
            jQuery('.tbodyhereappend').html('');
            $.each(response.allauthor,function(key,author){
                if(author.post_author_status == 1){var status ='<span class="badge badge-info">Active</span>';}else{var status ='<span class="badge badge-warning">Inactive</span>';}
                jQuery('.tbodyhereappend').append('<tr>\
                <td>'+sl+'</td>\
                <td>'+author.post_author_name+'</td>\
                <td>'+status+'</td>\
                <td>\
                <button value="'+author.id+'" class="btn btn-success btn-sm EditButton"><i class="fa fa-edit"></i></button>\
                <button value="'+author.id+'" class="btn btn-danger btn-sm deleteButton"><i class="fa fa-trash"></i></button>\
            </td>\
            </tr>');
            sl++;})
        }
    });
}

jQuery(document).on('click','.EditButton',function(e){
    e.preventDefault();
    var id = jQuery(this).val();
    $.ajax({
        url:'editShowFrom/'+id,
        type:'get',
        dataType:'json',
        success:function(response){
          jQuery('#id').val(response.singleauthor.id);   
          jQuery('#post_author_name').val(response.singleauthor.post_author_name);   
          jQuery('#post_author_status').val(response.singleauthor.post_author_status);
        }
    });
});

jQuery('.UpdateButton').click(function(){
    let cinnnid = jQuery('#id').val();
    if(cinnnid !=''){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      var id = jQuery('#id').val();   
      var name = jQuery('#post_author_name').val();   
      var status = jQuery('#post_author_status').val();
      $.ajax({
        url:'updateauthor/'+id,
        type:'POST',
        dataType:'json',
        data:{
            'name':name,
            'status':status,
        },
        success:function(response){
            toastr.success(response.info,response.success);
            forshowallItem();
            jQuery('.post_author_name').val('');
            jQuery('.post_author_status').val('');
            jQuery('.AuthorNameError').text('')
            jQuery('.AuthorStatusError').text('');
        }
      });
    }else{
        
        jQuery(".msg").append('<div class="alert alert-danger"> HEY!&#x1f620; HEY!&#x1f620; HEY!&#x1f620; AUTHOR INSERTED FIRST </div>');
        jQuery(".msg").fadeOut(3000);
    }
});

jQuery(document).on('click','.deleteButton',function(e){
    e.preventDefault();
    confirm( "are You Sure Want To Delete");
    var val = jQuery(this).val();
    $.ajax({
        type: "get",
        url: "deleteauthor/"+val,
        dataType: "json",
        success: function (response) {
            toastr.success(response.warning,response.success);
            forshowallItem();
        }
    });
    
});
