function playVideo(url) {
    let videoPlayer = document.getElementById('videoPlayer');
    let videoItems = document.querySelectorAll('.video-item');
    
    // Check if the URL is a YouTube unlisted link
    if (url.includes("youtube.com") || url.includes("youtu.be")) {
    // Update the iframe src
      videoPlayer.src = url;
      videoPlayer.style.display = "block";
    }

    // Remove 'active' class from all video items and add to the clicked one
    videoItems.forEach(item => item.classList.remove('active'));
    event.target.classList.add('active');
  }
