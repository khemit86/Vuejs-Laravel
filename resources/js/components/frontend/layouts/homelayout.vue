<template>
	<div>
    <slot name="header"><frontheader/></slot>	
	<slot name="frontbody"></slot>
	<slot name="footer"><frontfooter/></slot>  
	<FlashMessage :position="'right bottom'"></FlashMessage>
	<vue-confirm-dialog></vue-confirm-dialog>
    </div>
</template>

<script>
	import frontheader from '../includes/frontheader.vue';
	import frontfooter from '../includes/frontfooter.vue';	
	export default {
		components:
		{
			frontheader,	
			frontfooter,
		},
		mounted()
		{
            
		},
	}
</script>