function logout(event){
  event.preventDefault();
  var check = confirm("Do you really want to logout?");
  if(check){
    window.location.href = "/login"; 
  }
}