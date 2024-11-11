function playVideo(url, event) {
    let videoPlayer = document.getElementById('videoPlayer');
    let videoItems = document.querySelectorAll('.video-item');
    
    // Convert URL to embed format if it's a YouTube link
    if (url.includes("watch?v=")) {
      const videoId = url.split("watch?v=")[1];
      url = "https://www.youtube.com/embed/" + videoId;
    } else if (url.includes("youtu.be/")) {
      const videoId = url.split("youtu.be/")[1];
      url = "https://www.youtube.com/embed/" + videoId;
    }
    // Update the iframe src
      videoPlayer.src = url;
      videoPlayer.style.display = "block";
    // }

    // Remove 'active' class from all video items and add to the clicked one
    videoItems.forEach(item => item.classList.remove('active'));
    event.target.classList.add('active');
  }
