<div class="modal fade" id="popupAnime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="loading"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="popupContent">
            <div class="modal-body" id="popupBody">
                <div class="row" id="popupInfo_1">
                    <div class="col-5 position-relative">
                        <div class="popup_item">
                            <img loading="lazy" id="popup-img" src="" alt="" class="img_main_anime_display_hot" style="height: 400px; overflow:hidden">
                            <div class="popup_info">
                                <a id="popupWatchLink" href=""><button type="button" class="mb-2 btn popup_watch_button">Watch</button></a>
                                <button class="mb-2 btn popup_watch_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add to list
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Favorite</a></li>
                                    <li><a class="dropdown-item" href="#">Watched</a></li>
                                    <li><a class="dropdown-item" href="#">Will watch</a></li>
                                    <li><a class="dropdown-item" href="#">Abandoned</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col popup_anime_info pt-3">
                        <p><strong id="popup-title"></strong></p>
                        <p id="popup-other-names"></p>
                        <p id="popup-type"></p>
                        <p id="popup-release-date"></p>
                        <p id="popup-status"></p>
                        <p id="popup-genres"></p>
                        <p id="popup-episodes-avalible"></p>
                        <p></p>

                    </div>
                </div>
                <div class="row pt-3" id="popupInfo_2" style="padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);">
                    <div class="col popup_anime_synopsis p-3">
                        <p id="popup-synopsis"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>