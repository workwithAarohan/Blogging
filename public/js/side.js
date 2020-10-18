let toggleNavStatus = false;

    let toggleNav =function(){
    let getSidebar = document.querySelector(".sidebar");
    let getSidebarUl = document.querySelector(".sidebar ul");
    let getSidebarLink = document.querySelectorAll(".sidebar ul li a");

    if(toggleNavStatus === false){
        getSidebarUl.style.visibility= "visible";
        getSidebar.style.width= "200px";
        getSidebar.style.opacity = "1";

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "block";
        }
        toggleNavStatus = true;
    }else if(toggleNavStatus === true){
        getSidebar.style.width= "0px";
        getSidebar.style.opacity = "0";

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "none";
        }
        getSidebarUl.style.visibility= "hidden";
        toggleNavStatus = false;
    }
}
    window.addEventListener("resize", onresize);
    function onresize(){
        var x = window.innerWidth;
        if(x >= 992){
        document.querySelector(".sidebar ul").style.visibility= "visible";
        document.querySelector(".sidebar").style.width= "200px";
        document.querySelector(".sidebar").style.opacity = "1";
        let getSidebarLink = document.querySelectorAll(".sidebar ul li a");

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "block";
        }
        }else{
        document.querySelector(".sidebar ul").style.visibility= "hidden";
        document.querySelector(".sidebar").style.width= "0px";
        document.querySelector(".sidebar").style.opacity = "0";
        let getSidebarLink = document.querySelectorAll(".sidebar ul li a");

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "none";
        }
        }
    }