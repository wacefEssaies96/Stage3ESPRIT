function reset(){
    fields = document.getElementsByTagName('input');
    for (let index = 0; index < fields.length; index++) {
        const field = fields[index];
        field.value = '';
    }
}
function createDiv(i){
    var div = document.getElementById('addons');
    var div2 = document.createElement('div');
    div2.classList.add('form-item', 'box-item');
    div2.id = i;
    div.appendChild(div2);
}

function i(){
    this.c();
    this.createDiv('div1');
    this.createDiv('div2');
    var div = document.getElementById('div1');
    var div2 = document.getElementById('div2');
    var input = document.createElement('input');
    input.id = 'desc';
    input.placeholder="Description";
    input.type="text";
    input.name="description";
    input.required=true;
    div.appendChild(input);
    var input2 = document.createElement('input');
    input2.id = 'fond';
    input2.placeholder="Fond mobilisé";
    input2.type="number";
    input2.name="fonds";
    input2.step=".001"
    input2.required=true;
    div2.appendChild(input2);
}
function c(){
    var d = document.getElementById('addons');
    if(document.getElementById('div1')){
        var div1=document.getElementById('div1');
        d.removeChild(div1);
    }
    if(document.getElementById('div2')){
        var div2=document.getElementById('div2');
        d.removeChild(div2);
    }
}
function e(){
    this.c();
    this.createDiv('div1');
    var div = document.getElementById('div1');
    var input = document.createElement('input');
    input.id = "service"
    input.placeholder="Service";
    input.type="text";
    input.name="service";
    input.required=true;
    div.appendChild(input);
}