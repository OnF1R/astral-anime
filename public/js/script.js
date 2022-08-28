// function onEntry(entry) {
//     entry.forEach(change => {
//       if (change.isIntersecting) {
//        change.target.classList.add('element-show');
//       }
//     });
//   }
  
//   let options = {
//     threshold: [0.5] };
//   let observer = new IntersectionObserver(onEntry, options);
//   let elements = document.querySelectorAll('.element-animation');
  
//   for (let elm of elements) {
//     observer.observe(elm);
//   }


function loadPopup(el) {

    animeId = el.name;
    const loader = document.querySelector("#loading");

    loader.classList.add("display");
    document.querySelector('#popupInfo_1').style.visibility = "hidden";
    document.querySelector('#popupInfo_2').style.visibility = "hidden";
    // to stop loading after some time
    setTimeout(() => {
        loader.classList.remove("display");
        document.querySelector('#popupInfo_1').style.visibility = "visible";
        document.querySelector('#popupInfo_2').style.visibility = "visible";
    }, 1250);

    var animeDetails =
        fetch("http://127.0.0.1:3000/anime-details/" + animeId)
        .then((response) => {
            return response.json();
        })
        .then((animelist) => {
            document.getElementById('popup-title').innerHTML = "Title: " + JSON.stringify(animelist.animeTitle).slice(1, -1);
            document.getElementById('popup-img').src = JSON.stringify(animelist.animeImg).slice(1, -1);
            document.getElementById('popup-other-names').innerHTML = "Other names: " + JSON.stringify(animelist.otherNames).slice(1, -1);
            document.getElementById('popup-type').innerHTML = "Type: " + JSON.stringify(animelist.type).slice(1, -1);
            document.getElementById('popup-release-date').innerHTML = "Released  date: " + JSON.stringify(animelist.releasedDate).slice(1, -1);
            document.getElementById('popup-genres').innerHTML = "Genres: ";
            var count = animelist.genres.length;
            while(count--) {
                var a = document.createElement('a');
                var linkText = document.createTextNode(animelist.genres[count]);
                a.appendChild(linkText);
                a.href = "http://127.0.0.1:3000/genre/" + animelist.genres[count];

                if (count === 0) {
                    document.getElementById('popup-genres').appendChild(a);

                } else {
                    document.getElementById('popup-genres').appendChild(a);
                    document.getElementById('popup-genres').innerHTML += ", ";
                }
                
            }
            document.getElementById('popup-episodes-avalible').innerHTML = "Episodes avalible: " + JSON.stringify(animelist.totalEpisodes).slice(1, -1);
            var text = JSON.stringify(animelist.synopsis).slice(1, -1);
            var newtext = text.replace(/\\n/g, ' ');
            newtext = newtext.replace(/\\/g,'');
            

            document.getElementById('popup-synopsis').innerHTML = newtext;
            document.getElementById('popupWatchLink').href = "anime-page?id=" + animeId;
        })
}