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
