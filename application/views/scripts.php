	<script>
		$(document).ready(function() {
			$('.message-container').fadeOut(3000,
				function() {
					$(this).remove();
				});

			$(".info-block").click(function() {
				$(this).toggleClass('active');
			});

			$('input:text:visible:first')[0].focus();
			$('.form-control').focus(function() {
				$(this).val('').toggleClass('active');
			});
		});
	</script>
</body>
</html>
