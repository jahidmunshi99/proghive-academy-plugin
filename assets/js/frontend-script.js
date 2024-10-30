function playVideo(url) {
    let videoPlayer = document.getElementById('videoPlayer');
    let videoItems = document.querySelectorAll('.video-item');
    
    // Update the iframe src
    videoPlayer.src = url;

    // Remove 'active' class from all video items and add to the clicked one
    videoItems.forEach(item => item.classList.remove('active'));
    event.target.classList.add('active');
  }