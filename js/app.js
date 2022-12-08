function getFormData(form){
    var unindexed_array = form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}
$.ajax('api/login.php', {
    type: 'POST',  // http method

    data: { myData: 'This is my data.'},  // data to submit
    action:'test',
    success: function (data, status, xhr) {
        console.log('status: ' + status + ', data: ' + data);
    },
    error: function (jqXhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage);
    }
});
