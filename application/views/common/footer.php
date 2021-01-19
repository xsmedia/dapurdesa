    </div> <!-- .wrapper -->

    <?php
        if( ! empty( $js ) ) { 
            foreach ($js as $linkjs) echo '<script src="' . base_url() . $linkjs . '.js" /></script>', "\n"; 
        }
        ?>
        
        <script type="text/javascript">
            $(".alert").delay(3000).slideUp(200, function () {
                $(this).alert('close');
            });
        </script>
  </body>
</html>