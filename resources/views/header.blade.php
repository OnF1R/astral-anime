<nav class="navbar mt-3 sticky-top">
    <div class="container-fluid header">
        <a href="{{ route('anime.main') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
            <h3>Astral</h3>
            <img src="{{asset('images/logo/logo.png')}}" width="96" height="96" class="rounded-circle ms-4" alt="">
        </a>
        <div class="position-relative text-center">
            <form onsubmit="searchAnime(); return false;" action="" class="d-flex" method="get">
                <input id="searchForm" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
                <button class="btn anime_page_watch_button" type="submit">Search</button>
            </form>
            <div id="result-container" class="result-container position-absolute rounded">
                <div id="loadingResult"></div>
                <div id="resultInfo" class=""></div>
                </div>
                </div>
            </div>
</nav>
<script>
    function searchAnime() {
        const loader = document.querySelector("#loadingResult");

        loader.classList.add("display");
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
                for (let i = 0; i < animelist.length; i++) {
                    let resultContailer = document.getElementById('result-container');
                    let img = document.createElement('img');
                    img.setAttribute("class", "img_main_anime_display_hot works_image")
                    img.src = animelist[i].animeImg;
                    let resultAnime = document.createElement('div');
                    let animeName = document.createTextNode(animelist[i].animeTitle);

                    let p = document.createElement('p');
                    p.appendChild(animeName);

                    resultAnime.setAttribute("class","rounded_main_popular position-relative popular_anime_main scale m-2 p-0");
                    let inImageButtons = document.createElement('div');
                    inImageButtons.setAttribute("class","position-absolute position-center-in-block");
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
                    inImageAnimePageLinkButton.setAttribute("id","resultAnimePageLink");
                    inImageAnimePageLinkButton.setAttribute("class","btn popup_watch_button mt-1");
                    let inImageAnimePageLinkButtonText = document.createTextNode("Watch");

                    inImageAnimePageLinkButton.appendChild(inImageAnimePageLinkButtonText);

                    a.appendChild(inImageAnimePageLinkButton);
                    inImageButtons.appendChild(inImageOpenPopupButton);
                    inImageButtons.appendChild(a);
                    
                    
                    resultAnime.appendChild(img);
                    resultAnime.appendChild(inImageButtons);
                    resultAnime.appendChild(p);
                    resultContailer.appendChild(resultAnime);
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
</script>