function redirectFormData() {
  let form = document.getElementById("linkerForm");
  form.style.display = "none";
  window.onload=function(){
    var auto = setTimeout(function(){ autoRefresh(); }, 100);

    function submitform(){
      alert("Confirmer l'envoi ?");
      form.submit();
    }

    function autoRefresh(){
        clearTimeout(auto);
        auto = setTimeout(function(){ submitform(); autoRefresh(); }, 1000);
    }
  }
}