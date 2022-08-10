function controlLab() {
    setInterval(function(){
        var inputFields = document.getElementsByClassName('border-effect');
        for (let i = 0; i < inputFields.length; i++) {
            const inputField = inputFields[i];
            if ( (inputField.value).localeCompare('')!=0 ) {
                inputField.style.backgroundColor = 'white';
            }
            else{
                inputField.style.backgroundColor = 'transparent';
            }
        }
    }, 20);  
}

