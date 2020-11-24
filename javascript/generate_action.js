$(document).ready(function() {
    $('#generate1').click(function(){
        event.preventDefault();
        $.ajax({
            url: "inputKodeAbsen.php",
            method: "POST",
            data:$('#generate_kodeabsen1').serialize(),
            dataType:"json",
            success:function(data){
                if(data.success)
                {
                    $('#generate_code1').val(data.kode);
                }
            }
        });
    });
});