</div>
<script src="<?php echo URLROOT;?>js/dashboard/jquery.min.js"></script>
<script src="<?php echo URLROOT;?>js/dashboard/popper.min.js"></script>
<script src="<?php echo URLROOT;?>js/dashboard/bootstrap.min.js"></script>
<script src="<?php echo URLROOT;?>js/dashboard/main.js"></script>
<script src="<?php echo URLROOT;?>js/dashboard/Chart.bundle.min.js"></script>
<script src="<?php echo URLROOT;?>js/dashboard/dashboard.js"></script>
<script src="{{ URL::asset('js/dashboard/widgets.js') }}"></script>

<!-- <script src="js/jquery.vmap.sampledata.js"></script>
<script src="js/jquery.vmap.world.js"></script> -->
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
</body>

</html>