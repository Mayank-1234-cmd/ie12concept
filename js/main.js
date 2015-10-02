function change_tab(tab) {
    var url = $(tab).attr('data-tab-url');
    
    $('#website-frame-1').attr('src', url);

    $('.ie-tab.active').each(function() {
        $(this).removeClass('active');
    });

    $(tab).addClass('active');   
}

function disable_change() {
    $('.ie-tab.change').each(function() {
        $(this).removeClass('change');
    });
}

function enable_change() {
    $('.ie-tab.active').each(function() {
        var thisTab = this;

        $(this).find('.ie-tab-favicon, .ie-tab-label').click(function() {
            $(thisTab).addClass('change');
            $(thisTab).find('.ie-tab-address-input').select();
        });
    });
}

if(!( (window.fullScreen) ||
   (window.innerWidth === screen.width && window.innerHeight === screen.height) )) {
    $('#fullscreen-info').show();
    
    setTimeout(function() {
        $('#fullscreen-info').fadeOut('slow');
    }, 4000);
}   

$(function() {
    $('.window').on('click focus mousedown', function() {
        var this_window_id = '#' + $(this).attr('id');
        $('.window').each(function() {
            var window_id = '#' + $(this).attr('id');
            $(this).addClass('inactive');
            $('.task[data-toggle="' + window_id + '"]').removeClass('active');
            $('.task[data-toggle="' + window_id + '"]').addClass('open');
        });
        
        $(this).removeClass('inactive');
            $('.task[data-toggle="' + this_window_id + '"]').removeClass('open');
            $('.task[data-toggle="' + this_window_id + '"]').addClass('active');
    });
    
    $('.window-minimize').click(function() {
        var window_id = $(this).attr('data-minimize');
        
        $(window_id).fadeOut('fast');
        
        $('.task[data-toggle="' + window_id + '"]').each(function() {
            $(this).removeClass('active');
            $(this).addClass('open');
        });
    });
    
    function window_maximize(window_id) {
        $(window_id).toggleClass('maximized');
        $(window_id).attr('style', '');        
    }
    
    $('.window-maximize').click(function() {
        window_maximize($(this).attr('data-maximize'));
    });  
    
    $('.window').dblclick(function() {
        window_maximize('#' + $(this).attr('id'));
    });  
    
    $('.window-close').click(function() {
        var window_id = $(this).attr('data-close');
        $(window_id).remove();
        $('.task[data-toggle="' + window_id + '"]').each(function() {
            $(this).removeClass('active open');
            $(this).addClass('closed');
        });
    });  
    
    $('.task').click(function() {
        if ($(this).is('.closed')) {
            location.href = 'index.php';
        }
        else {
            var window_id = $(this).attr('data-toggle');

            $(window_id).fadeToggle('fast');
            $(this).toggleClass('open active');
        }
    });
    
    $('.ie-tab').click(function() {
        if (!$(this).is('.active')) {
            change_tab(this);
            enable_change();
        }
    });
    
    $('.ie-tab').each(function() {
        var thisTab = this;
        
        $(this).find('.ie-tab-close').click(function() {
            $(thisTab).remove();
            change_tab('.ie-tab:first-child');
        });
    });
    
    $('.ie-tab-address-input').blur(function() {
        disable_change();
    });
    
    $('.ie-tab-address-input').keypress(function(e) {
        var value = $(this).val();
        var this_tab = $(this).parent().parent();
        
        if (e.which === 13) {
            if (!(value.indexOf('.') > -1)) {
                value = 'http://www.bing.com/search?q=' + value;
            }
            else if (value.substring(0, 4) !== 'http') {
                value = 'http://' + value;
            }            
            
            $('#website-frame-1').attr('src', value);
            disable_change();
    
            $(this_tab).find('.ie-tab-favicon, .ie-tab-address-favicon').attr('src', 'http://www.google.com/s2/favicons?domain=' + value);
            
            var title = value.substring(7);
            var title_splitted = title.split('.');
            
            if (title_splitted[0] == 'www') {
                title = title_splitted[1];
            }
            else {
                title = title_splitted[0];
            }
            
            $(this_tab).find('.ie-tab-label').text(title);
            $(this_tab).find('.ie-tab-address-input').val(value);
        }
    });
    
    $('.ie-tab-new').click(function() {
        location.href = 'index.php?action=new-tab';
    });
    
    $('.ie-menu-info').click(function() {
        location.href = 'index.php?action=info-tab';
    });
    
    $('#layer').click(function() {
        $('.window').addClass('inactive');
        $('.task.active').each(function() {
            $(this).removeClass('active');
            $(this).addClass('open');
        });
        disable_change();
    });
    
    $('.droppable.left').droppable({
        drop: function(event, ui) {
            var window_id = $(ui.helper).attr('id');
            $('#' + window_id).addClass('snapped left');
        }
    });
    $('.droppable.right').droppable({
        drop: function(event, ui) {
            var window_id = '#' + $(ui.helper).attr('id');
            $(window_id).addClass('snapped right');
        }
    });
    
    $('#taskbar-windows').click(function() {
        $('#taskbar-startmenu').toggle();
        $(this).toggleClass('active');
        
        $('.window:not(.inactive)').toggleClass('inactive pause');
    });
});

$(document).ready(function() {
    setTimeout(function() {
        $('.window').draggable({
            drag: function(event, ui) {
                var window_id = '#' + $(this).attr('id');
                $(this).removeClass('snapped left right');
                if ($(window_id).is('.maximized')) {
                    window_maximize(window_id);
                }
            }
        });
        
        $('.ie-tabs-sortable').sortable();
        
        enable_change();
    }, 500);
});