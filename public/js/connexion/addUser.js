function reset(){
    fields = document.getElementsByTagName('input');
    for (let index = 0; index < fields.length; index++) {
        const field = fields[index];
        field.value = '';
    }
}