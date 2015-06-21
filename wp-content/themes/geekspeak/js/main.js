/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var isOpen = false;
    if(parseInt(window.innerWidth) >= 900){
        var posTop = $('#sidebar-container').find('.absolute').offset().top;
    }
    $(".search-share").click(function(){
        if($('#sidebar-container').css('display') == 'none'){
            $('#sidebar-container').slideDown();
            $(this).find('.up-down-arrows').css('background-position', 'top left');
            isOpen = true;
        }else{
            $('#sidebar-container').slideUp();
            $(this).find('.up-down-arrows').css('background-position', 'bottom left');
            isOpen = false;
        }
    });
    
    $(window).resize(function() {
        
        if(parseInt(window.innerWidth) >= 900){
            $('#sidebar-container').css('display', 'block');
            posTop = $('#sidebar-container').find('.absolute').offset().top;
            reposSidebar();
        }else{
            console.log('position');
            $('#sidebar-container').find('.absolute').css('position', '');
            if(isOpen){
                $('#sidebar-container').css('display', 'block');
            }else{
                $('#sidebar-container').css('display', 'none');
            }
        }
    });
    
    $(window).scroll(function(){
            reposSidebar();
    });
    
    function reposSidebar(){
        if(parseInt(window.innerWidth) >= 900){
            var newTop = parseInt(window.innerHeight) * 0.01;
            if(parseInt($(window).scrollTop()) > (posTop - newTop)){           
               $('#sidebar-container').find('.absolute').css('position', 'fixed');
               $('#sidebar-container').find('.absolute').css('top', newTop+'px');
               var newWidth = $('#sidebar-container').find('.relative').width();
               $('#sidebar-container').find('.absolute').css('width', newWidth+'px');
            }else{
               $('#sidebar-container').find('.absolute').css('position', 'absolute');
               $('#sidebar-container').find('.absolute').css('top', '0');
               $('#sidebar-container').find('.absolute').css('width', '100%');
            }
        }
    }
    
});