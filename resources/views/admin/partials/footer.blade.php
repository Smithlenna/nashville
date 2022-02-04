</div>
</section>
<footer>
   <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0       
   </div>
   <strong>&copy; <a href="https://nashville.edu.np"> Nashville Institute</a>.</strong>
   All rights reserved.
</footer>
</div>
<!-- ===============  SCRIPTS ===============-->
<script src="/admin/js/style.js"></script>
<script src="/admin/js/toastr.min.js"></script>
<!-- sticky Js-->
<script src="/admin/js/jquery.sticky.min.js"></script>
<script src="/admin/js/theia-sticky-sidebar.min.js"></script>
<script>
   ! function(e) {
       var t = e(window),
           a = e(document),
           o = e("body");
       e(function() {
           o = e();
           var n = e('[data-sticky-content="true"]');
           n.length && n.theiaStickySidebar({
               additionalMarginTop: o.length ? o.outerHeight() : 0
           })
       })
   }(jQuery);
</script>
<!-- MODERNIZR-->
<script src="/admin/js/modernizr.custom.js"></script>
<!-- BOOTSTRAP-->
<script src="/admin/js/bootstrap.min.js"></script>
<!-- STORAGE API-->


<!--- dropzone ---->
<!--- malihu-custom-scrollbar ---->
<link rel="stylesheet" type="text/css"
   href="/admin/css/jquery.mCustomScrollbar.min.css">
<script type="text/javascript"
   src="/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="/admin/js/app.js"></script>
<script src = "/admin/js/dataTables.bootstrap.min.js"></script>
</body>
@yield('scripts')
</html>

<!-- SELECT2-->
<script src="/admin/js/select2.min.js"></script>
<script src="{{ asset('/vendor/fancybox/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('/vendor/ck/ckeditor.js') }}"></script>
<script>
//    $('.iframe-btn').fancybox({
//        'width'		: 900,
//        'height'	: 400,
//        'type'		: 'iframe',
//        'autoScale'    	: false
//    });
   CKEDITOR.replaceClass = 'editor';
</script>
<script>
   setTimeout(function(){
       $(".alert").removeClass('fadeInRight');
       $(".alert").addClass('fadeOutRight');
   }, 5000);
   
   
   function responsive_filemanager_callback(field_id){
       var url=jQuery('#'+field_id).val();
       $("#"+field_id+"holder").attr("src",url);
       $('#thumbnail'+field_id).val(url.replace('http://news.local',''));
   }
   
   
</script>
<script>
   @if(Session::has('message'))
   	var type="{{Session::get('alert-type','info')}}"
   	switch(type){
   		case 'info':
           toastr.info("{{ Session::get('message') }}");
           break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
       	case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
   	}
   @endif
</script>
