
    <!-- ========= JS Files =========  -->
    <script src="assets/js/bundle.js?ver=2.9.0"></script>
    <script src="assets/js/scripts.js?ver=2.9.0"></script>
    <script src="assets/js/charts/gd-invest.js?ver=2.9.0"></script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
function hide_element(x) {
        document.querySelector(x).style.display='none';
}

function show_element(x) {
        document.querySelector(x).style.display='block';
}      
      function get_options(y,val,x) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
	data: y+'='+val,
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
	}
	});
}

function copy_add(data,btn,msg,theme) {
  var copyText = document.getElementById(data);
  copyText.select();
  document.execCommand("copy");
  $(btn).removeClass('btn-'+theme);
  $(btn).addClass('btn-success');
  $(btn).html('You have copied '+ msg +' <i class="fa fa-check"></i>');
  
}
    </script>
    
    <!--Start of Tawk.to Script-->

    <script>
   function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>


<script>
const text = document.querySelector(".content h4");
const popup = document.querySelector(".popup");

if (text && popup) {
  text.addEventListener("click", () => {
    popup.classList.add("active");
    copyToClipBoard();
  });
  popup.addEventListener("animationend", () => {
    popup.classList.remove("active");
  });
}

function copyToClipBoard() {
  const textarea = document.createElement("textarea");
  textarea.setAttribute("readonly", "");
  textarea.value = text.innerText;
  textarea.style.position = "absolute";
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy");
  document.body.removeChild(textarea);
}

</script>
