
window.addEventListener('load',main,false);

function main(){
    document.getElementById('createform').addEventListener('submit',checkvalues,false);
}

function checkvalues(e){
    var pass = document.getElementById('password').value;
    var rpass = document.getElementById('rpassword');
    var c = true;
    if(rpass){
        rpass = rpass.value;
        if(pass !== rpass){
            c = false;
        }
    }
    var l = document.getElementsByTagName('input');
    
    for(var i=0; i<l.length; i++){
        if(l[i].value === ''){
            c = false;
        }
    }
    if(c===false){
        e.preventDefault();
        alert('Los campos no están correctos');
    }
}

