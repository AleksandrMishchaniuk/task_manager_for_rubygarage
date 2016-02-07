<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notes.RubyGarage</title>
        <link rel="stylesheet" href="/css/main-styles.css"/>
        <script src="/js/jquery-2.1.4.min.js"></script>
        <script src="/js/ajax.js"></script>
        <script src="/js/main-functions.js"></script>
        <script src="/js/actions.js"></script>
    </head>
    <body>
        <div id="main">
            <div id="div_login" style="display: none"></div>
            <div id="div_reg" style="display: none"></div>
            <div id="div_projects" style="display: none"></div>
        </div>
        
        <script>
            $().ready(function(){
                $.post("/start", {}, initApp);
            });
        </script>
    </body>
</html>