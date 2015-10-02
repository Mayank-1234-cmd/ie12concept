<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>About this live demo</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">    
        
        <style type="text/css">
            .row .col-md-4 {
                text-align: center;
            }
            @media screen and (max-width: 768px) {
                .row .col-md-4:first-child {
                    text-align: right;
                }
                .row .col-md-4:last-child {
                    text-align: left;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1 class="page-header">About this live demo</h1>
            
            <p>
                This live browser demo shows how I think the next version of the Internet Explorer should look like.<br>
                Or at least kind of. ;)
            </p>
            
            <h2>A combination of address bar and tabs</h2>
            
            <p>
                Since IE 9 the website gets the most part of place. But I think Microsoft could go further.<br>
                I thought of a combination of the address bar and the current tab.
            </p>
            
            <p>
                While you are on a website you see on the current tab the favicon and the title of the page.<br>
                When you click on the tab or press <code>[Strg]+[L]</code> the tab turns into a search and address bar.
            </p>
            
            <h3>Try it on the live demo</h3>
            
            <p>
                Just click on the current tab. The tab should become larger and you can start typing.
            </p>
            
            <p>
                Many sites like Facebook or Google won't load inside an iframe.<br>
                But here are some URLs which will work:
            </p>
            
            <ul>
                <li><code>http://windows.com</code></li>
                <li><code>http://lgkonline.deivantart.com</code></li>
                <li><code>http://jquery.com</code></li>
            </ul>
            
            <hr>
            
            <h1>Tell me what you think</h1>
            
            <p>
                I would be grateful if you would like to share your opinion about my concept.
            </p>
            
            
            <div class="row">
                <div class="col-md-4">
                    <a href="https://twitter.com/intent/tweet?screen_name=lgkonline" class="twitter-mention-button" data-size="large">Tweet to @lgkonline</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>                     
                </div>
                
                <div class="col-md-4">
                    <a href="mailto:info@lgkonline.com" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> mailto:info@lgkonline.com</a>
                </div>
                
                <div class="col-md-4">
                    <a href="http://about.lgkonline.com/kontakt" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Use my contact form</a>
                </div>
            </div>
            
            <hr>
            
            <p style="text-align: center;">
                <a href="http://lgkonline.com/" target="_blank"><img src="http://lib.lgkonline.com/logo.png"></a><br>
                <small>&copy; 2014<?php if (date('Y') > '2014') { echo '-' . date('Y'); } ?></small>
            </p>
        </div>
        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> 
    </body>
</html>