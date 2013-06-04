 <?php


 $html ='<a href="'.Site::url().'"class="left" title="Remove this">X</a>
            <ul id="themeSelector">
                <li>'.
                Form::open().
                Form::hidden('csrf', Security::token()).
                Form::label('themes', __('Select Theme', 'themes'),array('class'=>'labelSelector')).
                '<div class="selectOption">';
        $html .=    '<select name="themes" id="themes" class="selectOption" onchange="if (this.value) window.location.href=this.value">';
        $html .=        '<option value="'.$thistheme.'" selected>Current theme: '.$thistheme.'</option>';
            foreach ($themes_site as $theme) {
        $html .=        '<option value="'.Site::url().'selector?th='.$theme.'">Select theme: '.$theme.'</option>';

            }
        $html .=    '</select>
                </div>'.Form::close().'
                </li>
                <li><span class="infoSelector">'.__('If not render well please reload Thanks','themes').'</span></li>
                <li><a class="spFull" class="active" title="Fullscreen" href="#" data-viewport-width="100%" data-viewport-height="100%"></a></li>
                <li><a class="spDesktop" title="Desktop" href="#" data-viewport-width="1920" data-viewport-height="1080"></a></li>
                <li><a class="spLaptop" title="13&quot; MacBook" href="#" data-viewport-width="1280px" data-viewport-height="800px"></a></li>
                <li><a class="spTablet" title="Small Tablet" href="#" data-rotate="true" data-viewport-width="720px" data-viewport-height="1280px"></a></li>
                <li><a class="spIphone" title="Mobile Phone" href="#" data-rotate="true" data-viewport-width="480px" data-viewport-height="720px"></a></li>
                <li><a title="Rotate" href="#" class="rotate spRotate"></a></li>
            </ul>
            <div class="clear"></div>


            <iframe id="resizerFrame" class="preview-frame" src="'.Site::url().'" width="100%" height="100%"></iframe>

            <link rel="stylesheet" href="'.Site::url().'plugins/switch/lib/selector.css">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script src="'.Site::url().'plugins/switch/lib/selector.js"></script>';
        echo $html;



?>