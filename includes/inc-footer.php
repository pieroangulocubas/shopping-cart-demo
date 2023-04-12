<footer>
  <h2>Footer</h2>
</footer>
  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Pooper -->
  <script src="<?php echo PLUGINS.'pooper/popper.min.js'?>"></script>
  <!-- Boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
   <!-- Sweet alert 2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- waitme -->
  <script src="<?php echo PLUGINS.'waitme/waitMe.min.js'?>"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>
  
  <!-- Main script -->
 <script src="<?php echo JS.'main.js'?>"></script>
</body>
</html>