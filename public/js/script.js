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


  function videoPlayerEpisodeLoad() {
      if (Hls.isSupported()) {
        var video = document.getElementById('video-{{$animeId}}-2');
        var hls = new Hls();
        hls.loadSource('{{$episodeData['sources_bk'][0]['file']}}');
        hls.attachMedia(video);
    }
  }