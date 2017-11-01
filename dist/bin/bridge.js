function ajaxkota(id) {
    $.get("http://localhost/project/dist/bin/webservice.php", {
        ajx: "GetKota",
        id_kota: id
    }, function (result) {
        $("#reg_kota").html(result);
    });
    changeValue('hid_prop','reg_prop');
}


 //--FUNGSI2 DASAR JAVASCRIPT--//
 function checkField(fieldname, minlength) {
     var datafield = $("#" + fieldname).val();
     var lengthdata = datafield.length;
     if (lengthdata >= minlength) {
         $("#validator" + fieldname).css("display", "none");
         validasiinsert = true;
     } else {
         $("#validator" + fieldname).css("display", "block");
         validasiinsert = false;
     }
 }

 function changeValue(yangdirubah,diambildari) {
    var returnval = "";
    returnval = $('#'+diambildari+' option:selected').text()
    document.getElementById(yangdirubah).value = returnval;
 }
