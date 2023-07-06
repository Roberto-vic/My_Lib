<div class="row">
    <div class="col-lg-4 offset-lg-4" style="color: #F4D35E;">
        &copy; Copyright Realitätspause <?php echo date('Y'); ?> - All Rights Reserved
    </div>
</div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var buchCards = document.querySelectorAll('.buch-card');

  buchCards.forEach(function(buchCard) {
    var popover = new bootstrap.Popover(buchCard, {
      content: buchCard.getAttribute('data-bs-content'),
      placement: buchCard.getAttribute('data-bs-placement'),
      trigger: buchCard.getAttribute('data-bs-trigger'),
      html: true
    });
  });
});
</script>

</body>

</html>