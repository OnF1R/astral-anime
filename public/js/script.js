function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
       change.target.classList.add('element-show');
      }
    });
  }
  
  let options = {
    threshold: [0.5] };
  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.element-animation');
  
  for (let elm of elements) {
    observer.observe(elm);
  }

function videoPlayerEpisodeLoadFirstSource() {
    if (Hls.isSupported()) {
      var video = document.getElementById('video-{{$animeId}}');
      var hls = new Hls();
      hls.loadSource('{{$episodeData['sources'][0]['file']}}');
      hls.attachMedia(video);
    }
  }

function videoPlayerEpisodeLoadSecondSource() {
      if (Hls.isSupported()) {
        var video = document.getElementById('video-{{$animeId}}-2');
        var hls = new Hls();
        hls.loadSource('{{$episodeData['sources_bk'][0]['file']}}');
        hls.attachMedia(video);
    }
  }

  function changeEpisode(el) {
    var episode = el.id;
    var request = new XMLHttpRequest();
    request.open('GET', '{{$vidcdnAnimeEpisodes}}'+ episode);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var episodeUrl = request.response;
        var video = document.getElementById('video-{{$animeId}}');
        if (Hls.isSupported()) {
          var hls = new Hls();
          hls.loadSource(episodeUrl['sources'][0]['file']);
          hls.attachMedia(video);
        }
    }
}  