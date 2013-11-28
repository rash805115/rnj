<?php
    
?>
<body>
<footer>
      <script type="text/javascript">
        var currentTime = new Date();
        var month = currentTime.getMonth() + 1;
        var date = currentTime.getDate();
        var year = currentTime.getFullYear();
        var hr = currentTime.getHours();
        var min = currentTime.getMinutes();
        document.writeln("Current Date and Time:  ");
        document.writeln(month + "/" + date + "/" + year + " ," + hr + ":" + min + "   |   ");       
        document.write("Last Modified: ");
        document.write(document.lastModified);
      </script>
</footer>
</body>
