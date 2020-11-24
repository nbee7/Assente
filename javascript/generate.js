var btnSet = document.getElementById("generate1");
var btnGet = document.getElementById("generate1");
var valueDisplay = document.getElementById("generate_code1");
var input = document.getElementById("y");

         btnSet.addEventListener("click", () => {
                    var token = makeid(5);
                    valueDisplay.value = token;
                    
                })
            
        

 function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
     var charactersLength = characters.length;
     for ( var i = 0; i < length; i++ ) {
         result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
