let filmElements=document.getElementsByClassName("film");

for (const filmElement of filmElements) {
    filmElement.onclick=function(){
        var actorListDiv = filmElement.nextElementSibling;
                if (actorListDiv && actorListDiv.classList.contains('actor_list')) {
                    if (actorListDiv.hidden==true) {
                        actorListDiv.hidden=false;
                    } else {
                        actorListDiv.hidden=true;
                    }
                }
    }
}