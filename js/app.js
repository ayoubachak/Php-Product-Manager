// product forms handlers
$('#add-product-form').submit(function(e) {
  e.preventDefault();
  var data = getFormData($(this));
  var formData = new FormData();
  formData.append('product-add-picture', $('#product-add-picture')[0].files[0]);
  for(key in data) {
      formData.append(key,data[key])
  }
  formData.append('action', 'add_product');
  $.ajax({
         url : 'api.php',
         type : 'POST',
         data : formData,
         processData: false,  // tell jQuery not to process the data
         contentType: false,  // tell jQuery not to set contentType
         success : function(data) {
             data = JSON.parse(data);
             if(data.correct) {
                 window.location.href = "/";
             }
         }
  });
})
// when the user uploads a file it will show a small preview
$("#product-add-picture").change(function (e){
  const [file] = $('#product-add-picture')[0].files
  if (file) {
    $("#add-product-picture").attr("src", URL.createObjectURL(file))
  }
})

$("#edit-product-form").submit(function(e) {
  e.preventDefault();
  var data = getFormData($(this));
  var formData = new FormData();
  formData.append('product-edit-picture', $('#product-edit-picture')[0].files[0]);
  for(key in data) {
      formData.append(key,data[key])
  }
  formData.append('action', 'edit_product');
  formData.append('id', $("#product-edit-reference").html());
  $.ajax({
         url : 'api.php',
         type : 'POST',
         data : formData,
         processData: false,  // tell jQuery not to process the data
         contentType: false,  // tell jQuery not to set contentType
         success : function(data) {
             data = JSON.parse(data);
             if(data.correct) {
                 window.location.href = "/";
             }
         }
  });
});
$("#product-edit-picture").change(function (e){
  const [file] = $('#product-edit-picture')[0].files
  if (file) {
    $("#edit-product-picture").attr("src", URL.createObjectURL(file))
  }
})

$("#delete-product-form").submit(function(e){
  e.preventDefault();
  var data = {
    action:"delete_product",
    id:$("#delete-product-reference").html()
  }
  $.ajax('api.php', {
      type: 'POST',  // http method
      data: data,  // data to submit
      success: function (data, status, xhr) {
          var data=JSON.parse(data);
          if(data.correct) {
              window.location.href = "/";
          }
      },
      error: function (jqXhr, textStatus, errorMessage) {
              console.log('Error' + errorMessage);
      }
  });
})

function getFormData(form){
    var unindexed_array = form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function logout(){
  var data = {
    action:"logout"
  }
  $.ajax('api.php', {
      type: 'POST',  // http method
      data: data,  // data to submit
      success: function (data, status, xhr) {
          var data=JSON.parse(data);
          console.log(data);
          if(data.correct) {
              window.location.href = "/";
          }
      },
      error: function (jqXhr, textStatus, errorMessage) {
              console.log('Error' + errorMessage);
      }
  });
}


function delete_product(id){
  var data = {
    id: id,
    action:"product_by_id"
  }
  $.ajax('api.php', {
      type: 'POST',  // http method
      data: data,  // data to submit
      success: function (data, status, xhr) {
        console.log(data)
          var data=JSON.parse(data);
          let product = data.product;
          if (data.correct){
            let label = product.label;
            $("#delete-product-label").html(label);
            $("#delete-product-reference").html(id);
          }

      },
      error: function (jqXhr, textStatus, errorMessage) {
              console.log('Error' + errorMessage);
      }
  });
}

function edit_product(id){
  var data = {
    id: id,
    action:"product_by_id"
  }
  $.ajax('api.php', {
      type: 'POST',  // http method
      data: data,  // data to submit
      success: function (data, status, xhr) {
        console.log(data)
          var data=JSON.parse(data);
          if (data.correct){
            var product = data.product;
            let key = "product-edit-";
            let label = product.label;
            let price = product.price;
            let pdata = product.pdate;
            let picture = product.picture;
            let id_category = product.id_category;
            $("#"+key+"label").val(label);
            $("#"+key+"price").val(price);
            $("#"+key+"pdate").val(pdata);
            $("#edit-product-picture").attr('src',picture);
            console.log(picture)
            $("#"+key+"category").val(id_category);
            $("#product-edit-reference").html(id);
          }

      },
      error: function (jqXhr, textStatus, errorMessage) {
              console.log('Error' + errorMessage);
      }
  });
}
