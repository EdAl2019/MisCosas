$.getJSON('https://api.ipify.org?format=json', function(data){
    alert(data.ip);
});
