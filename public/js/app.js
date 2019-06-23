$(document).on('click','#edit_cats',function(cat){
	cat.preventDefault();
	var cat_id = $(this).data('id');
     $.ajax({
      url: 'http://localhost/laravel/tnt_sneaker/api/category/'+cat_id,
      type:'GET',
      dataType: 'json',
      success:function(res){
        $('#modal_edit_cats #cat_tt').html('Chỉnh sửa danh mục: '+res[0]['name']);
        $('#modal_edit_cats #name').val(res[0]['name']);
        $('#modal_edit_cats').modal();
    	}   
	});
});
$(document).on('click','#btn_edit_cats',function(event){
		event.preventDefault();
    var cat_id = $('#edit_cats').data('id');
    var token = $('#heletoken').val();
    alert(token);
        $.ajax({
              url: 'http://localhost/laravel/tnt_sneaker/api/category-edit/'+cat_id,
              type: 'POST',
              dataType: 'json',
              data: {
                _token:token,
                id:cat_id,
                name:name,
                parent: $('#parent').val(),
                status: $('#status').val()
              },

              success:function(res){
    				      console.log(res);
              }   
            });
    	});







// $(document).ready(function($){
//      $.ajax({
//       url: 'http://localhost/laravel/tnt_sneaker/api/product',
//       type:'GET',
//       dataType: 'json',
//       success:function(res){
//         var html= '';
//         for (var i = 0; i <res.length; i++) {
//         console.log(res[i]);
//         html += '<tr>'
//           html += '<td>'+res[i].id+'</td>'
//           html += '<td>'+res[i].category_id+'</td>'
//           html += '<td>'+res[i].name+'</td>'
//           html += '<td>'+res[i].brand_id+'</td>'
//           html += '<td>'
//             html += '<a href="" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></a>'
//             html += '<a href="" class="btn btn-default btn-xs"><i class="fa fa-trash"></i></a>'
//             html += '<a href="" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>'
//           html += '</td>'
//          html += '</tr>'
//         }
//         $('#pro_ajax').html(html);
//       }   
//   });
// });