
var sidebar = document.getElementById("mySidebar");
var link__name = document.querySelectorAll(".link__name");
var links = document.querySelectorAll(".links");
var content = document.getElementById("content");
var title = document.getElementById("title");
var burger = document.getElementById("burger");

function toggleSidebar() {
    // sidebar.classList.toggle("toggleSidebar"); 
    // console.log(link__name)
    for(var i = 0; i < link__name.length; i++){
        link__name[i].classList.toggle("hide")
        links[i].classList.toggle("links__toggle")
    } 
//    main__content.classList.toggle("main__content__toggle");
    content.classList.toggle("content__toggle")
    sidebar.classList.toggle("sidebar__toggle");
    title.classList.toggle("hide")
    burger.classList.toggle('burger__toggle');
} 