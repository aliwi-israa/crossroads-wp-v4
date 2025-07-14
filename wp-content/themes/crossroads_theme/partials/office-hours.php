<div class="office-hours mt-3">
  <div class="contact-box contact-box-1">
    <h5 class="contact-box-title"><i class="icon-clock"></i> Office Hours</h5>
      <?php
      $office_hours = get_field('office_hours', 'option');
      echo '<p>'.$office_hours.'</p>';
      ?>
  </div>
</div>