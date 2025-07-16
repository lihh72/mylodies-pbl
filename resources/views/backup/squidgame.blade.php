<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nonton Squid Game</title>

  <!-- Video.js CSS & JS (versi stabil) -->
  <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
  <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>

  <style>
    body {
      background: #111;
      color: white;
      text-align: center;
      margin: 0;
      padding: 30px;
      font-family: sans-serif;
    }
    .video-js {
      width: 90%;
      max-width: 960px;
      margin: 20px auto;
    }
  </style>
</head>
<body>

  <h2>Nonton Squid Game S03E01</h2>

  <video id="video-player" class="video-js vjs-default-skin" controls preload="auto">
    <source src="https://mylodies.xyz/images/dark.nuns.mp4" type="video/mp4" />
    
    <track 
      src="{{ asset('images/Dark.Nuns.2025.WEBRip.id.vtt') }}"
      kind="subtitles"
      srclang="id"
      label="Bahasa Indonesia"
      default>
  </video>

  <script>
    const player = videojs('video-player', {
      controlBar: {
        children: [
          'playToggle',
          'volumePanel',
          'progressControl',
          'currentTimeDisplay',
          'timeDivider',
          'durationDisplay',
          'subsCapsButton',  // ⬅️ Penting untuk tombol subtitle
          'fullscreenToggle'
        ]
      }
    });
  </script>

</body>
</html>
