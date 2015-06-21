<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <style type="text/css">
            
            @font-face{
                font-family:"HelveticaNeueW01-75Bold";
                src:url("fonts/c07fef9e-a934-42d7-92ad-69205f2b8a00.eot?#iefix");
                src:url("fonts/c07fef9e-a934-42d7-92ad-69205f2b8a00.eot?#iefix") format("eot"),url("fonts/14ff6081-326d-4dae-b778-d7afa66166fc.woff") format("woff"),url("fonts/8fda1e47-19be-46c7-8d83-8d4fb35572f0.ttf") format("truetype"),url("fonts/f751c8ae-1057-46d9-8d74-62592e002568.svg#f751c8ae-1057-46d9-8d74-62592e002568") format("svg");
            }
            
            @font-face {
                font-family: 'VisaBold';
                src: url("fonts/visabold-webfont.eot?#iefix");
                src: url("fonts/visabold-webfont.eot?#iefix") format("eot"), url("fonts/visabold-webfont.woff") format("woff"), url("fonts/visabold-webfont.ttf") format("truetype"), url("fonts/visabold-webfont.svg#VisaBold") format("svg");
                font-weight: normal;
                font-style: normal;
            }
            
            html, body {
                height: 100%;
                width: 100%;
                margin: 0;
            }
            #background {
                width: 100%;
                height: 100%;
                background-image: url(background.jpg);
                background-size: cover;
                position: fixed;
            }
            
            .blur {
                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                filter: blur(5px);
                filter: url("#blur5px");
            }
            
            #text {
                position: absolute;
                top: 0;
                left: 0;
                
                
                display: inline-block;
            }
            
            #text p {
                font-size: 3.5em;
                line-height: 1.25;
                color: #FFF;
                font-family: 'VisaBold';
                text-align: left;
            }
            
            #text p span {
                height: 100%;
                display: inline-block;
            }
            
            .red-square {
                width: 1px;
                height: 1px;
                float: left;
                margin: 1px;
                background-color: red;
                position: relative;
                opacity: 0.5;
            }
            
            
        </style>
        
        <script type="text/javascript" src="jquery-1.10.1.min.js"></script>
        
        <script type="text/javascript">
            
            $(document).ready(function(){
               
                var startDate = new Date();
                
                var $ele = $("#text p span"), str = $ele.text(), progress = 0;
                $ele.text('');
                
                var timer = setInterval(function() {
                    
                    $ele.text(str.substring(0, progress++) + (progress & 1 ? '' : ''));
                    if (progress >= str.length+1){
                        clearInterval(timer);
                    }
                }, 60);
        
            });
            
            
        </script>
        
    </head>
    <body>
        <div id="background" class="blur">
                        
        </div>
        <?php for($i=0;$i<100000;$i++){ ?>
        <div class="red-square"></div>
        <?php } ?>
        <div id="text">
            <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula blandit malesuada. Integer elementum condimentum facilisis. Morbi felis leo, vulputate in tortor sed, interdum eleifend metus. Fusce porta justo vitae mollis gravida. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce dignissim nisl in urna luctus, sed varius lorem dapibus. Mauris eleifend felis eu leo consequat, id dapibus odio pharetra. Etiam id semper orci, sit amet dignissim velit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum bibendum neque eget lectus viverra, sed iaculis eros volutpat.</span></p>
        </div>
    </body>
</html>
