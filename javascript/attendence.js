
$(document).ready(function(){
$(document).on('click','#checkAll', function() {          
$(".itemRow").prop("checked", this.checked);
});
$(document).on('click', '.itemRow', function() {  
if ($('.itemRow:checked').length == $('.itemRow').length) {
$('#checkAll').prop('checked', true);
} else {
$('#checkAll').prop('checked', false);
}
});  
var count = $(".itemRow").length;
$(document).on('click', '#addRows', function() {
count++; 
var htmlRows = '';
htmlRows += '<tr>';
htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_'+count+'"> <label class="custom-control-label" for="itemRow_'+count+'"></label> </div></td>';
htmlRows += '<td><input type="text" placeholder="ID" name="mem_name[]" id="mem_name_'+count+'" class="form-control" autocomplete="off" required></td>';          
htmlRows += '<td><input type="date" name="date[]" id="time_'+count+'" class="form-control" autocomplete="off" required></td>';
htmlRows += '<td><input type="time" name="time[]" id="date_'+count+'" class="form-control" autocomplete="off" required></td>';         
htmlRows += '</tr>';
$('#invoiceItem').append(htmlRows);
});


$(document).on('focusout',"[id^=quantity_]",function(){
	if($(this).val() < 0){
            $(this).val('0');
        }
});
$(document).on('click', '#removeRows', function(){
$(".itemRow:checked").each(function() {
$(this).closest('tr').remove();
});
$('#checkAll').prop('checked', false);
calculateTotal();
});


 
});