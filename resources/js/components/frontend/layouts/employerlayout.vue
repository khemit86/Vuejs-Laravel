<template>
	<div>
		<div class="wrapper" style="height: auto; min-height: 100%;" >
    <slot name="employerheader"><employerheader/></slot>
	<slot name="employersidebar"><employersidebar/></slot>	
	<slot name="employerbody"></slot>
	  <footer class="main-footer">
            Copyright © 2021. All rights Reserved by Proslipsi.
         </footer>
	
	<FlashMessage :position="'right bottom'"></FlashMessage>
	<vue-confirm-dialog></vue-confirm-dialog>
    </div>
</div>
</template>

<script>
	import employerheader from '../includes/employerheader.vue';
	import employersidebar from '../includes/employersidebar.vue';
	import employerfooter from '../includes/employerfooter.vue';		
	export default {
		components:
		{
			employerheader,	
			employersidebar,
			employerfooter,
		},
		mounted()
		{
            
		},
	}
</script>