function reset() {
    fields = document.getElementsByTagName('input');
    for (let index = 0; index < fields.length; index++) {
        const field = fields[index];
        field.value = '';
    }
}
function createDiv(i) {
    var div = document.getElementById('addons');
    var div2 = document.createElement('div');
    div2.classList.add('form-item', 'box-item');
    div2.id = i;
    div.appendChild(div2);
}

function i() {
    this.c();
    this.createDiv('div1');
    this.createDiv('div2');
    var div = document.getElementById('div1');
    var div2 = document.getElementById('div2');
    var input = document.createElement('input');
    input.id = 'desc';
    input.placeholder = "Description";
    input.type = "text";
    input.name = "description";
    input.required = true;
    input.style.margin = 0;
    div.appendChild(input);
    var input2 = document.createElement('input');
    input2.id = 'fond';
    input2.placeholder = "Fond mobilisé";
    input2.type = "number";
    input2.name = "fonds";
    input2.step = ".001"
    input2.required = true;
    input2.style.margin = 0;
    div2.appendChild(input2);
}
function c() {
    var d = document.getElementById('addons');
    if (document.getElementById('div1')) {
        var div1 = document.getElementById('div1');
        d.removeChild(div1);
    }
    if (document.getElementById('div2')) {
        var div2 = document.getElementById('div2');
        d.removeChild(div2);
    }
}
function e() {
    this.c();
    this.createDiv('div1');
    var div = document.getElementById('div1');
    var input = document.createElement('input');
    input.id = "service"
    input.placeholder = "Service";
    input.type = "text";
    input.name = "service";
    input.required = true;
    input.style.margin = 0;
    div.appendChild(input);
}

function t(){
    document.getElementById('pp').remove();
    var divp = document.getElementById('p');
    var p = document.createElement('p');
    p.style.color = '#fdc541',
    p.style.cursor = 'pointer';
    p.onclick = pass;
    p.innerHTML = 'Cliquer ici pour modifier le mot de passe';
    p.id = 'ppp';
    divp.appendChild(p);

    var myNode = document.getElementById('pass');
    while (myNode.firstChild) {
        myNode.removeChild(myNode.lastChild);
      }
}

function pass() {
    document.getElementById('ppp').remove();
    var divp = document.getElementById('p');
    var p = document.createElement('p');
    p.style.color = '#fdc541',
    p.style.cursor = 'pointer';
    p.onclick = t;
    p.innerHTML = 'Annuler';
    p.id = 'pp';
    divp.appendChild(p);

    var div0 = document.getElementById('pass');
    var div1 = document.createElement('div');
    var div2 = document.createElement('div');
    var div3 = document.createElement('div');
    var div4 = document.createElement('div');
    var input0 = document.createElement('input');
    var input1 = document.createElement('input');
    var input2 = document.createElement('input');

    div4.classList.add('form-item', 'box-item');
    input2.type = 'password';
    input2.name = 'opwd';
    input2.placeholder = 'Ancien mot de passe';
    input2.required = true;

    div1.classList.add('form-item-double', 'box-item')
    div2.classList.add('form-item');
    div3.classList.add('form-item');
    input0.type = 'password';
    input0.name = 'pwd';
    input0.placeholder = 'Nouveau mot de passe';
    input0.required = true;
    input1.type = 'password';
    input1.name = 'rePwd';
    input1.placeholder = 'Confirmer votre nouveau mot de passe';
    input1.required = true;

    div0.appendChild(div4);
    div0.appendChild(div1);
    div1.appendChild(div2);
    div1.appendChild(div3);
    div2.appendChild(input0);
    div3.appendChild(input1);
    div4.appendChild(input2);

}
