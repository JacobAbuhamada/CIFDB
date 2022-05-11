window.addEventListener("resize", function(){
  resizeNavbar()
}, false);

window.addEventListener("load", function(){
  resizeNavbar();

  document.getElementById("hamburger").addEventListener("click", function(){
    if(window.getComputedStyle(document.getElementsByClassName("dropdown")[0]).getPropertyValue("display") == "block"){
      document.getElementsByClassName("dropdown")[0].style.display = "none";
    }
    else{
      document.getElementsByClassName("dropdown")[0].style.display = "block";
    }
  }, false);
}, false);

function resizeNavbar(){
  console.log(window.innerWidth)
  if(window.innerWidth < 600){
    document.getElementsByClassName("more")[0].style.display = "block";

    let itemsToHide = document.getElementsByClassName("item-to-hide");
    console.log(itemsToHide)
    for(let i = 0; i < itemsToHide.length; i++){
      itemsToHide[i].style.display = "none";
    }
  }
  else{
    document.getElementsByClassName("more")[0].style.display = "none";

    let itemsToHide = document.getElementsByClassName("item-to-hide")
    for(let i = 0; i < itemsToHide.length; i++){
      itemsToHide[i].style.display = "block";
    }
  }
}