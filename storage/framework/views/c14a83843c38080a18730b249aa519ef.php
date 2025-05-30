<div class="row">
    <div class="col-md-8 col-xs-12 col-md-offset-2">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <select id="search_settings" class="form-control" style="width: 100%;">
            </select>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('load', function() {
        //Search Settings
        //Set all labels as select2 options
        label_objects = [];
        search_options = [{
            id: '',
            text: ''
        }];
        var i = 0;
        $('.pos-tab-container label').each( function(){
            if(!$(this).parent().hasClass('dataTables_length') && !$(this).parent().hasClass('dataTables_filter')){
                label_objects.push($(this));
                var label_text = $(this).text().trim().replace(":", "").replace("*", "");
                search_options.push(
                    {
                        id: i,
                        text: label_text
                    }
                );
                i++;
            }
        });

       setTimeout(function() {
        $('#search_settings').select2({
            data: search_options,
            placeholder: '<?php echo app('translator')->get("lang_v1.search_settings"); ?>',
        });
    }, 100);
        

        $('#search_settings').change( function(){
            //Get label position and add active class to the tab
            $('.search_label').css('background-color', '');
            var label_index = $(this).val();
            var label = label_objects[label_index];
            $('.pos-tab-content.active').removeClass('active');
            var tab_content = label.closest('.pos-tab-content');
            tab_content.addClass('active');
            tab_index = $('.pos-tab-content').index(tab_content);
            $('.list-group-item.active').removeClass('active');
            $('.list-group-item').eq(tab_index).addClass('active');

            //Highlight the label for three seconds
            $([document.documentElement, document.body]).animate({
		        scrollTop: label.offset().top - 100
		    }, 500);
            label.css('background-color', 'yellow');
            // setTimeout(function(){ 
            //     label.css('background-color', ''); 
            // }, 3000);
        });
    });
</script><?php /**PATH /home/vimi31/public_html/resources/views/layouts/partials/search_settings.blade.php ENDPATH**/ ?>