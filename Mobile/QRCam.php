<html>

<head>
  <title>QR Code Scanner</title>
  <script type="text/javascript" src="/PAP_Site/JS/jquery.min.js"></script>
  <script type="text/javascript" src="/PAP_Site/JS/adapter.min.js"></script>
  <script type="text/javascript" src="/PAP_Site/JS/instascan.js"></script>
  <script type="text/javascript" src="/PAP_Site/JS/QrCodeScanner.js"></script>
</head>

<body background="/PAP_Site/Pattern.jpg">
  <video width="100%" height="100%" playsinline autoplay controls="true" id="preview"></video>
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({
      video: document.getElementById('preview'),
      mirror: false
    });
    scanner.addListener('scan', function (content) {
      console.log(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        var selectedCam = cameras[0];
        $.each(cameras, (i, c) => {
          if (c.name.indexOf('back') != -1) {
            selectedCam = c;
            return false;
          }
        });

        scanner.start(selectedCam);
      } else {
        console.error('No cameras found.');
        window.location = "/PAP_Site/Mobile/inicio.php";
      }
    }).catch(function (e) {
      console.error(e);
      window.location = "/PAP_Site/Mobile/inicio.php";
    });
    scanStart(function (data) {
      //alert(data);
      window.location = "/PAP_Site/Mobile/inicio.php?QRVar=" + data;

      



    });
  </script>
</body>

</html>
