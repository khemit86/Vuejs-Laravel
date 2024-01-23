<template>
	<div>
    <slot name="frontheader"><frontheader/></slot>
	<slot name="frontslider"><frontslider/></slot>	
	<slot name="frontbody"></slot>
	<slot name="footer"><frontfooter/></slot>  
	<FlashMessage :position="'right bottom'"></FlashMessage>
    </div>
</template>

<script>
	import frontheader from '../includes/frontheader.vue';
	import frontslider from '../includes/frontslider.vue';
	import frontfooter from '../includes/frontfooter.vue';	
	export default {
		components:
		{
			frontheader,
			frontslider,	
			frontfooter,
		},
		mounted()
		{
			
		}
	}
</script>