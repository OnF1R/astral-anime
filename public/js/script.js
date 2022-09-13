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
                var i = 0;
                while (count--) {
                    
                    var a = document.createElement('a');
                    var linkText = document.createTextNode(animelist.genres[i]);
                    a.appendChild(linkText);
                    a.href = "http://127.0.0.1:3000/genre/" + animelist.genres[i];

                    if (count === 0) {
                        document.getElementById('popup-genres').appendChild(a);

                    } else {
                        document.getElementById('popup-genres').appendChild(a);
                        document.getElementById('popup-genres').innerHTML += ", ";
                    }
                    i++;

                }
                document.getElementById('popup-episodes-avalible').innerHTML = "Episodes avalible: " + JSON.stringify(animelist.totalEpisodes).slice(1, -1);
                var text = JSON.stringify(animelist.synopsis).slice(1, -1);
                var newtext = text.replace(/\\n/g, ' ');
                newtext = newtext.replace(/\\/g, '');


                document.getElementById('popup-synopsis').innerHTML = newtext;
                document.getElementById('popupWatchLink').href = "anime-page?id=" + animeId;
            })
}

function searchAnime() {
    const loader = document.querySelector("#loadingResult");
    let resultContainer = document.getElementById('result-container');
    let resultInfoElement = document.createElement('div');
    resultInfoElement.setAttribute("id", "resultInfo");
    resultContainer.appendChild(resultInfoElement);
    loader.classList.add("display");
    let el = document.querySelectorAll('#resultInfo');
    if (el.length > 1) {
        document.querySelector('#resultInfo').remove();
    }


    document.addEventListener('click', (e) => {
        const withinBoundaries = e.composedPath().includes(resultContainer);

        if (!withinBoundaries) {
            resultContainer.style.display = 'none'; // скрываем элемент т к клик был за его пределами
        }
    })

    document.querySelector('#resultInfo').style.visibility = "hidden";
    // to stop loading after some time
    setTimeout(() => {
        loader.classList.remove("display");
        document.querySelector('#resultInfo').style.visibility = "visible";
    }, 1250);

    document.getElementById('result-container').style.display = "block";
    searchValue = document.getElementById('searchForm').value;
    fetch("http://127.0.0.1:3000/search?keyw=" + searchValue)
        .then((response) => {
            return response.json();
        })
        .then((animelist) => {
            console.log(animelist);
            if (animelist.length === 0) {
                let resultInfo = document.getElementById('resultInfo');
                let nothingFoundText = document.createTextNode("Nothing found");
                let nothingFoundP = document.createElement('p');
                nothingFoundP.setAttribute("class", "m-2")
                nothingFoundP.appendChild(nothingFoundText);
                resultInfo.appendChild(nothingFoundP);
                window.scrollBy(0, 0)
            } else {
                for (let i = 0; i < animelist.length; i++) {

                    let resultMain = document.getElementById('resultMain');
                    let resultInfo = document.getElementById('resultInfo');

                    let img = document.createElement('img');
                    img.setAttribute("class", "img_main_anime_display_hot works_image")
                    img.src = animelist[i].animeImg;
                    let resultAnime = document.createElement('div');
                    let animeName = document.createTextNode(animelist[i].animeTitle);

                    let p = document.createElement('p');
                    p.appendChild(animeName);

                    resultAnime.setAttribute("class", "rounded_main_popular position-relative popular_anime_main scale ms-5 me-5 mt-2 mb-2 p-0");
                    let inImageButtons = document.createElement('div');
                    inImageButtons.setAttribute("class", "position-absolute position-center-in-block");
                    let inImageOpenPopupButton = document.createElement('button');
                    let inImageAnimePageLinkButton = document.createElement('button');
                    // <button id="popupOpenButton" name="" onclick="loadPopup(this)" type="button" class="btn main_page_watch_button" data-bs-toggle="modal" data-bs-target="#popupAnime">
                    //                     More...
                    //                 </button>
                    //                 <a id="resultAnimePageLink" href=""><button type="button" class="btn popup_watch_button mt-1">Watch</button></a>
                    // resultAnime.innerHTML = img + "<p>" + animeName + "</p>"
                    inImageOpenPopupButton.setAttribute("id", "popupOpenButton");
                    inImageOpenPopupButton.setAttribute("onclick", "loadPopup(this)");
                    inImageOpenPopupButton.setAttribute("type", "button");
                    inImageOpenPopupButton.setAttribute("name", animelist[i].animeId);
                    inImageOpenPopupButton.setAttribute("class", "btn main_page_watch_button");
                    inImageOpenPopupButton.setAttribute("data-bs-toggle", "modal");
                    inImageOpenPopupButton.setAttribute("data-bs-target", "#popupAnime");
                    let inImageOpenPopupButtonText = document.createTextNode("More...");
                    inImageOpenPopupButton.appendChild(inImageOpenPopupButtonText);
                    let a = document.createElement('a');
                    a.href = "anime-page?id=" + animelist[i].animeId;
                    inImageAnimePageLinkButton.setAttribute("id", "resultAnimePageLink");
                    inImageAnimePageLinkButton.setAttribute("class", "btn popup_watch_button mt-1");
                    let inImageAnimePageLinkButtonText = document.createTextNode("Watch");

                    inImageAnimePageLinkButton.appendChild(inImageAnimePageLinkButtonText);

                    a.appendChild(inImageAnimePageLinkButton);
                    inImageButtons.appendChild(inImageOpenPopupButton);
                    inImageButtons.appendChild(a);


                    resultAnime.appendChild(img);
                    resultAnime.appendChild(inImageButtons);
                    resultAnime.appendChild(p);
                    resultInfo.appendChild(resultAnime);
                    window.scrollBy(0, 0)
                }


                // document.getElementById('resultAnimeTitle').innerHTML = "Title: " + JSON.stringify(animelist[i].animeTitle).slice(1, -1);
                // document.getElementById('resultAnimeImg').src = JSON.stringify(animelist[i].animeImg).slice(1, -1);
                // document.getElementById('popupOpenButton').name = JSON.stringify(animelist[i].animeId).slice(1, -1);
                // document.getElementById('resultAnimePageLink').href = "anime-page?id=" + JSON.stringify(animelist[i].animeId).slice(1, -1);
            }
        })


    // while(count--) {


    //     if (count === 0) {
    //         document.getElementById('popup-genres').appendChild(a);

    //     } else {
    //         document.getElementById('popup-genres').appendChild(a);
    //         document.getElementById('popup-genres').innerHTML += ", ";
    //     }

    // }
}