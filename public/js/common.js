const emailSelect = document.getElementsByName('emailSelect')[0];
emailSelect.addEventListener('change', function (e){
    let value = e.target.value;
    if (e.target.value == 'user') {
        value = '';
    }
    document.getElementsByName('emailE')[0].value = value;
})
