let classCards = document.getElementsByClassName("card_id");

for (let i = 0; i < classCards.length; i++) {
    classCards[i].addEventListener("click", function() 
    {
    let id = this.id.substr(5);
    console.log(id);  

    let mapId = "map_" + id;

    let map = document.getElementById(mapId);

    map.classList.toggle("d-none");
    console.log(map);
    })
}



