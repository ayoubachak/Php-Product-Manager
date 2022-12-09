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
             console.log(data);
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

}

function edit_product(id){

}
